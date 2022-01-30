<?php
require "../../../sec/vendor/autoload.php";
use \Firebase\JWT\JWT;
//setting header to json
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$secret_key = "-----BEGIN PUBLIC KEY-----

MIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBo7XX/N2WuOUtnB1zW/xoi
Juz5/Lh0NXORSx3eo0cKcMoSghxpoPDeL21+mluVDeHr37VVbl25P9ItwWfRcCKl
GBuM4WPS6k6b83zzNlRHGoJL9mooj27Cn8mc2elCBbBkbDi6t0NEXYbVrINtyU2x
F9yaUkryveNOwwUd6t1mjeF8H8xKU3SBc+E3Vm+gzpV/6ED78PdAaVBKvVxNQEMX
b01tKzMMwzfY3K1IA5jbVY5tHNCbc/EA/9UqzV4awH1o35v12Q1oCb28und0eJ33
D5KHVUmIZcLQgG6ivP1mmPoZ3O0udPzN2Qnm1mepQp/oNsY0V4VSt/hcqXHwyY5H
AgMBAAE=
-----END PUBLIC KEY-----";

$jwt =null;
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = '';
    $password = '';
    $newpassword = '';
    $token = '';




// $databaseService = new DatabaseService();
// $conn = $databaseService->getConnection();


// $data = json_decode(file_get_contents("php://input"));

//    $username = $_POST["user"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];
    $jwt = $_POST["token"];

    try{
        $decoded = JWT::decode($jwt, $secret_key, array('RS256'));

        $username = $decoded->emailAddress;
        $url = "https://ishlaw_auth.ambience.co.ke/api/auth/v1/local/sign_in";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA
{
  "username": "$username",
  "password": "$password"

}
DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        $arr = json_decode($resp, true);
//var_dump($resp);
        $resp = json_decode($resp);

        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//        curl_close($curl);
//    echo $httpcode;

        if ($httpcode == 200) {
            $url = "https://ishlaw_auth.ambience.co.ke/api/auth/v1/local/resetPassword";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Accept: application/json",
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = <<<DATA
{
  "token": "$jwt",
  "newPassword": "$newpassword"
  

}
DATA;

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            $arr = json_decode($resp, true);
//var_dump($resp);
            $resp = json_decode($resp);

            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if($httpcode == 200){

                echo json_encode(array('message' => 'Successful Message change', 'code' => 200));
            }
            else{
                header('HTTP/1.1 500 Internal Server ');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'We are unable to process your request', 'code' => 500)));

            }


        }




        else if ($httpcode == 401) {
//            echo "Unauthorized Action";
            header('HTTP/1.1 400 Internal Server ');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Current Password is wrong', 'code' => 400)));

        }
    }

catch (Exception $e){
//    echo "Invalid";
    header('HTTP/1.1 401 Internal Server ');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => $e->getMessage(), 'code' => 401)));
    }







//        header('location: https://www.google.com/intl/en-GB/gmail/about/');



}
?>