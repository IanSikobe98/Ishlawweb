<?php
require "sec/vendor/autoload.php";
use \Firebase\JWT\JWT;
// Initialize the session
$jwt = new \Firebase\JWT\JWT;
$jwt::$leeway = 5;

session_start();

function getUserDetails($jwt) {

    $reponseData = null;
    $url = "http://localhost:8056/auth/getUserDetails";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $authorization = "Ulinzi: Bearer ".$jwt;
    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
        $authorization
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "Response: ".print_r($resp,true)."\n",FILE_APPEND);
    $arr = json_decode($resp, true);
    //var_dump($resp);
    $resp = json_decode($resp);

    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);;

    file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "responseArray: ".print_r($arr,true)."\n",FILE_APPEND);
    file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "responseObject: ".print_r($resp,true)."\n",FILE_APPEND);
    $response_message = $resp->message;
    $response_code = $resp->responseCode;

    if ($httpcode == 200) {
        if($response_code === "00"){
            file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "is valid jwt: " . print_r("true", true) . "\n", FILE_APPEND);
            $responseBody = $resp->responseBody;
            $reponseData= $responseBody;
        }
        else{
            file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "error decoding jwt: " . print_r("false", true) . "\n", FILE_APPEND);
        }
    }
    else{
        file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "error decoding jwt: " . print_r("httpCode ".$httpcode, true) . "\n", FILE_APPEND);
    }
    return $reponseData;
}
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_COOKIE["resp"]) || !isset($_SESSION["id"])){
    header('location: login.php');
    exit;
}

else
{


// if(verify($_COOKIE["resp"])==true)

// {
//    $secret_key = "-----BEGIN PUBLIC KEY-----
//MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAhetV5WWfvm52j2u7ZRuG
//ufbRf3GidT6pVlX9SmSwRvSuj3+ewk8rnmIxXopM4sZEyW0WVvnnc+99MUNe6jDx
//i+5brB+1WrYaLs4jaoqchTRCsW4NOk/sod1yBO1DtLA8yCMwDTgPpgAA9iDhVTZq
//M38tH1fKpFlam69IIsoUmsMGH2qZrdKoBXAHcemJyVSD3eKYgKFUlMfMTP6uf8sU
//0wCYW2GIvsg/tJg9UUczenAlGs8iAUTRNtLU3D4adzYmqcOEf4xydP5XGxqCL8Vg
//xKjOZNphycx4ZdLX8Gj7jCzQ1tN8r/ZLhtzZ1rTLDI2/Ah9s+NOcJM55b9C5Yw4B
//tQIDAQAB
//-----END PUBLIC KEY-----";

    $jwt = null;
    $jwt = htmlspecialchars($_COOKIE["resp"]);
    file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "token: ".print_r($jwt,true)."\n",FILE_APPEND);

    if($jwt){
        try {

            //decode jwt
            $decoded = getUserDetails($jwt);
            if($decoded) {
                file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "successful decoding: " . print_r("true", true) . "\n", FILE_APPEND);
                file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "responseBody : " . print_r($decoded, true) . "\n", FILE_APPEND);


                $arr2 = json_decode(json_encode($decoded->team->Permissions), true);
                $arr = json_decode(json_encode($decoded->team->name), true);
                file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "team name: " . print_r($arr[0], true) . "\n", FILE_APPEND);
                file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "firstname: " . print_r($decoded->firstName, true) . "\n", FILE_APPEND);
                file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "permissions: " . print_r($arr2, true) . "\n", FILE_APPEND);


                //Set User details in cookie
                setcookie('fna', $decoded->firstName, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['fna'] = $decoded->firstName;
                setcookie('sna', $decoded->secondName, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['sna'] = $decoded->secondName;
                setcookie('role', $arr[0], time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['role'] = $arr[0];

                setcookie('emailAddress', $decoded->emailAddress, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['emailAddress'] = $decoded->emailAddress;
                setcookie('phoneNumber', $decoded->msisdn, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['phoneNumber'] = $decoded->msisdn;

                setcookie('id', $decoded->phoneNumber, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['id'] = $decoded->id;

                setcookie('loginsuccess', true, time() + (30), 'http://localhost/admin//', '', '');
                $_COOKIE['loginsuccess'] = true;


                //Set permissions in cookie
                foreach ($arr2 as $item) {
                    file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "permission : " . print_r($item, true) . "\n", FILE_APPEND);

                    if ($item == 'addvisitors') {
                        setcookie('addvis', 'addvisitors', time() + (30), 'http://localhost/admin//', '', '');
                        $_COOKIE['addvis'] = 'addvisitors';
                    }
                    if ($item == 'addclients') {
                        setcookie('addcli', 'addclients', time() + (30), 'http://localhost/admin//', '', '');
                        $_COOKIE['addcli'] = 'addclients';
                    }

                    if ($item == 'viewclients') {
                        setcookie('viewcli', 'viewclients', time() + (30), 'http://localhost/admin//', '', '');
                        $_COOKIE['viewcli'] = 'viewclients';
                    }

                    if ($item == 'viewvisitors') {
                        setcookie('viewvis', 'viewvisitors', time() + (30), 'http://localhost/admin//', '', '');
                        $_COOKIE['viewvis'] = 'viewvisitors';
                    }

                    if ($item == 'viewvisitors' || $item == 'addvisitors') {
                        setcookie('vis', 'visitors', time() + (30), 'http://localhost/admin//', '', '');
                        $_COOKIE['vis'] = 'visitors';
                    }
                    if ($item == 'addclients' || $item == 'viewclients') {
                        setcookie('cli', 'clients', time() + (30), 'http://localhost/admin/', '', '');
                        $_COOKIE['cli'] = 'clients';
                    }

                    if ($item == 'viewasignees') {
                        setcookie('viewasign', 'viewasignees', time() + (30), 'http://localhost/admin/', '', '');
                        $_COOKIE['viewasign'] = 'viewasignees';
                    }


                }
            }
            else{
                setcookie("resp", "", time() - 3600);
                header('location: login.php');

            }
        }catch (Exception $e){

            file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "succesful decoding: ".print_r("false",true)."\n",FILE_APPEND);
            file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "error: ".print_r($e->getMessage(),true)."\n",FILE_APPEND);
            file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "error: ".print_r($e,true)."\n",FILE_APPEND);

            setcookie("resp", "", time() - 3600);
            header('location: login.php');

        }

    }
    else {
        file_put_contents("log.txt", date("Y-m-d H:i(worry)") . "is invalid jwt: " . print_r("false", true) . "\n", FILE_APPEND);
        setcookie("resp", "", time() - 3600);
        header('location: login.php');
    }
// }

// else{
//   header('location: login.php');
//    exit;


// echo ($_COOKIE["jwt"]);

// }

}



?>
