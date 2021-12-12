<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


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
$password = $_POST["password"];
$TeamId = $_POST["team"];
$secondName = $_POST["second"];
$firstName = $_POST["fname"];
$phoneNumber = $_POST["phone"];


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
if( isset($data)){
    // echo "Records added successfully.";
     

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);

curl_close($curl);

//$resp = json_decode($resp);
// echo $resp;
    $arr = json_decode($resp, true);
if (empty($arr["message"])) {
  echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Registration Completed successfully. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'green';

      


</script>";
}
else
{
    header($_SERVER["SERVER_PROTOCOL"] . ' 400 '.$arr["message"], true, 500);
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