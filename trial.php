<?php
// Initialize the session


// Check if the user is logged in, if not then redirect him to login page
// !isset($_COOKIE["jwt"]) && !isset($_COOKIE["log"])


if(isset($_COOKIE["resp"]) && isset($_SESSION["id"])){
    header("location: index.php");
    exit;
// echo ($_COOKIE["jwt"]);

}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Ishlaw</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="twitter.css">


</head>
<style>
    body {
        background-image: url('');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<section class="ftco-section">
    <div class="wrapper" style="style=position:absolute; right:9000;">
        <div class="logo"> <img src="justice.png" alt=""> </div>
        <div class="text-center mt-4 name"> ISHLAW </div>
        <form action="login.php" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center "> <span class="far fa-user"></span>
                <input type="text" name="user" class="form-control" id="userName" placeholder="Username"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="password-field" placeholder="Password"> </div>
            <button type="submit" name="btn" class="btn mt-3">Login</button>
        </form>
        <!-- <div class="text-center mt-4 name"><h6> Ishmael Nyaribo and Co. Advocates</h6></div> -->
        <div class="text-center mt-4 name"><h6>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </h6></div>
        <!-- <div class="text-center fs-6"> <a href="#">Forget password?</a>  </div> -->
    </div>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = '';
        $password = '';

// $databaseService = new DatabaseService();
// $conn = $databaseService->getConnection();


// $data = json_decode(file_get_contents("php://input"));

        $username = $_POST["user"];
        $password = $_POST["password"];


        $url = "http://localhost:8056/auth/authenticate";

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

        file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "request: ".print_r($data,true)."\n",FILE_APPEND);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

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
                $token = $resp->responseBody->token;
                setcookie('resp', $token, time() + (30000), 'http://localhost/admin/', '', '', 'true');
                // setcookie('jwt', "",time() -3600, 'http://localhost/jawert/php-jwt-example/api/');
                $_COOKIE['resp'] = $token;
                // echo $resp->token;

                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $token;
                file_put_contents("log.txt",date("Y-m-d H:i(worry)"). "message: ".print_r($response_message,true)."\n",FILE_APPEND);
                header("location: index.php");
            }
            else{
                echo "<script>
            swal({
                title: 'Error !',
                text: '$response_message',
                icon: 'error',
                button: 'Close',
            });
                      </script>";
            }



        }
        else{
            echo "<script>
            swal({
                title: 'Error !',
                text: 'Incorrect Password',
                icon: 'error',
                button: 'Close',
            });
                      </script>";

        }

    }



    ?>
    </form>

    </div>
    </div>
    </div>
    </div>
</section>

<!--    <script src="js/jquery.min.js"></script>-->
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script>
    function setcounter() {
        sessionStorage.setItem("counter", 0);
    }
</script>

</body>
</html>

