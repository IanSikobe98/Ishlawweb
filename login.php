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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="head.css">

    <title>Africa Claims</title>
  </head>
  <body>
      <section class="form my-4 mx-5">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-5">
              <img src="images/pixel.jpg" alt="" class="img-fluid">
            </div>

            <div class="col-lg-7 px-5 pt-5">
    
              <h1 class="font-weight-bold py-3">AFRICA CLAIMS</h1>
              
    
              <h4>Sign into your account</h4>
              <form action="login.php" method="POST">
                <div class="form-row">
                  <div class="col-lg-7">
                    <input type="text" name="user" required id="userName" class="form-control my-3 p-4" placeholder="username" >
                  </div>
                </div>
                                <div class="form-row">
                  <div class="col-lg-7">
                    <input type="password" name="password" required id="password-field" class="form-control my-3 p-4" placeholder="*****" name="">
                  </div>
                </div>
                                <div class="form-row">
                  <div class="col-lg-7">
                   <button type="submit" name="btn" class="btn1 mt-3 mb-5 " >Login</button>
                  </div>
                </div>
                <a href="index.html">Home</a><br>
                <a href="forgot-password.php">Forgot password?</a><br>
                
  
                <div class="text-center mt-4 name"><h6>
    Copyright Africa Claims&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </h6></div>
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


        $url = "https://localhost:8056/auth/authenticate";

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
      </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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