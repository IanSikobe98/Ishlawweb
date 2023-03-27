<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    function generate_random_string($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=,.<>?;:[]{}|';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $string;
    }


$emailAddress = '';
$password = '';
$firstName = '';
$secondName = '';
$phoneNumber = '';
$TeamId = '';


// $databaseService = new DatabaseService();
// $conn = $databaseService->getConnection();



// $data = json_decode(file_get_contents("php://input"));

$emailAddress = $_POST["email"];
$TeamId = $_POST["team"];
$secondName = $_POST["second"];
$firstName = $_POST["fname"];
$phoneNumber = $_POST["phone"];
$username = $firstName ." ". $secondName;

$password = generate_random_string( 10);

$url = "http://localhost:8056/auth/createUser";
$logpath ="../../log.txt";
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

    "firstName":"$firstName",
    "secondName":"$secondName",
    "emailAddress":"$emailAddress",
    "phoneNumber":"$phoneNumber",
    "TeamId":"$TeamId",
    "password":"$password"

}
DATA;
//echo $data;

    $data2 = <<<DATA
{

    "username":"$username",
    "emailAddress":"$emailAddress",
    "password":"$password"

}
DATA;

    file_put_contents($logpath,date("Y-m-d H:i(worry)"). "user registration data: ".print_r($data,true)."\n",FILE_APPEND);
if( isset($data)){
    // echo "Records added successfully.";
     

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
    file_put_contents($logpath,date("Y-m-d H:i(worry)"). "result: ".print_r($resp,true)."\n",FILE_APPEND);

//curl_close($curl);

//$resp = json_decode($resp);
// echo $resp;
    $arr = json_decode($resp, true);


    $resp = json_decode($resp);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "responseObject: ".print_r($resp,true)."\n",FILE_APPEND);
    $response_message = $resp->message;
    $response_code = $resp->responseCode;


    if ($httpcode == 200) {
        if($response_code === "00"){
            $url = "http://localhost:8085/sendemail";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Accept: application/json",
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


            curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);

//for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp2 = curl_exec($curl);
            $arr = json_decode($resp, true);
            curl_close($curl);

            file_put_contents($logpath,date("Y-m-d H:i(worry)"). "result: ".print_r($resp2,true)."\n",FILE_APPEND);

        }
        else{
            header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.$response_message, true, 500);
        }
    }
    else{
        header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.'Error occurred Processing Request', true, 500);
    }

    if (empty($arr["message"])) {
//  echo "<script type='text/javascript'>
         
     
//     document.getElementById('myModal').style.display = 'block';
//
//            document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
//            document.getElementById('status3').innerHTML = '.<br><br>';
//
//      document.getElementById('status').style.color= 'green';

      


//</script>";
//    $url = "http://localhost:8085/sendemail";
//
//    $curl = curl_init($url);
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//    $headers = array(
//        "Accept: application/json",
//        "Content-Type: application/json",
//    );
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//
//
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $data2);
//
////for debug only!
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//    $resp2 = curl_exec($curl);
//    $arr = json_decode($resp, true);
//    curl_close($curl);
//
//    echo $data2;
//echo $arr;
//    if ($arr["code"]== 200) {
//        echo 'successful sending of email';
//    }
//    else{
//        header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.$arr["message"], true, 500);
//    }

}

}
//header('location: ../../../index.php');
}



?>