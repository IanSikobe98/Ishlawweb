<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


    $username = '';
    $password = '';

// $databaseService = new DatabaseService();
// $conn = $databaseService->getConnection();



// $data = json_decode(file_get_contents("php://input"));

    $username = $_POST["user"];
    $password = $_POST["password"];



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
    curl_close($curl);
//var_dump($resp);
    $resp = json_decode($resp);

    setcookie('resp', $resp->token,time() + (30000), 'http://localhost/','','','true');
    // setcookie('jwt', "",time() -3600, 'http://localhost/jawert/php-jwt-example/api/');
    $_COOKIE['resp'] = $resp->token;
    // echo $resp->token;

    session_start();

    // Store data in session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $resp->token;

//    header("location: index.php");

echo "Login Success";
}


?>