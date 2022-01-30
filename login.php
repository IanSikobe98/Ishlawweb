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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body onload="setcounter()" class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">User Login </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Sign in to continue</h3>
		      	<form action="login.php" method="POST" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control"  name="user" placeholder="Enter email address" required>

		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btn" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>

	            </div>
	            <?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

//    echo "
//    <script>
//    $(document).ready(function () {
//
//    swal({
//        title: 'Checking...',
//        text: 'Please wait',
//        icon: 'images/ajaxloader.gif',
//        iconHtml: 1500,
//        showConfirmButton: false,
//        allowOutsideClick: false
//
//    });
//    });
//    </script>
//    ";
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
    $arr = json_decode($resp, true);
//var_dump($resp);
    $resp = json_decode($resp);

    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
//    echo $httpcode;

    if ($httpcode == 200) {
        setcookie('resp', $resp->token, time() + (30000), 'http://localhost/admin/', '', '', 'true');
        // setcookie('jwt', "",time() -3600, 'http://localhost/jawert/php-jwt-example/api/');
        $_COOKIE['resp'] = $resp->token;
        // echo $resp->token;

        session_start();

        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $resp->token;

         header("location: index.php");
    }
    else if ($httpcode == 401) {
        if(isset($arr["message"]) &&$arr["message"] =="Incorrect password"){
            echo "<script>
            swal({
                title: 'Error !',
                text: 'Incorrect Password',
                icon: 'error',
                button: 'Close',
            });
</script>
";
        }

        else if(isset($arr["message"]) && $arr["message"] =="User does not exist"){
            echo "<script>
            swal({
                title: 'Error !',
                text: 'User does not exist',
                icon: 'error',
                button: 'Close',
            });
</script>
";

        }



//        header('location: https://www.google.com/intl/en-GB/gmail/about/');


    }
}



?>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

<!--	<script src="js/jquery.min.js"></script>-->
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

