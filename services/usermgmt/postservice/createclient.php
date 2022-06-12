<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
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

$password = rand_string( 10);

$url = "https://ishlaw_auth.ambience.co.ke/api/auth/v1/local/signUp";

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
echo $data;

    $data2 = <<<DATA
{

    "username":"$username",
    "emailAddress":"$emailAddress",
    "password":"$password"

}
DATA;


if( isset($data)){
    // echo "Records added successfully.";
     

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);

//curl_close($curl);

//$resp = json_decode($resp);
// echo $resp;
    $arr = json_decode($resp, true);
if (empty($arr["message"])) {
//  echo "<script type='text/javascript'>
         
     
//     document.getElementById('myModal').style.display = 'block';
//
//            document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
//            document.getElementById('status3').innerHTML = '.<br><br>';
//
//      document.getElementById('status').style.color= 'green';

      


//</script>";
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

    echo $data2;
//echo $arr;
//    if ($arr["code"]== 200) {
//        echo 'successful sending of email';
//    }
//    else{
//        header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.$arr["message"], true, 500);
//    }

}
else
{
    if(isset($arr["message"])=="Validation error"){
        $msg = "Your phone number or email credentials are already present in the system";
    }
    else{
        $msg ="You have sent invalid data for data creation";
    }
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.$msg, true, 500);


//    echo "<script type='text/javascript'>
//
//
//     document.getElementById('myModal').style.display = 'block';
//
//            document.getElementById('status').innerHTML = 'Registration error please retry. .';
//            document.getElementById('status3').innerHTML = '.<br><br>';
//
//      document.getElementById('status').style.color= 'red';

      


//</script>";
}
}
//header('location: ../../../index.php');
}



?>