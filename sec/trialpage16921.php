<?php
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

// echo 'Hello ' . htmlspecialchars($_COOKIE["resp"]) . '!';
$secret_key = "-----BEGIN PUBLIC KEY-----
MIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBo7XX/N2WuOUtnB1zW/xoi
Juz5/Lh0NXORSx3eo0cKcMoSghxpoPDeL21+mluVDeHr37VVbl25P9ItwWfRcCKl
GBuM4WPS6k6b83zzNlRHGoJL9mooj27Cn8mc2elCBbBkbDi6t0NEXYbVrINtyU2x
F9yaUkryveNOwwUd6t1mjeF8H8xKU3SBc+E3Vm+gzpV/6ED78PdAaVBKvVxNQEMX
b01tKzMMwzfY3K1IA5jbVY5tHNCbc/EA/9UqzV4awH1o35v12Q1oCb28und0eJ33
D5KHVUmIZcLQgG6ivP1mmPoZ3O0udPzN2Qnm1mepQp/oNsY0V4VSt/hcqXHwyY5H
AgMBAAE=
-----END PUBLIC KEY-----";

$jwt = null;
$jwt = htmlspecialchars($_COOKIE["resp"]);

if($jwt){

    try {

        $decoded = JWT::decode($jwt, $secret_key, array('RS256'));

        // Access is granted. Add code of the operation here 

        // echo json_encode(array(
        //     "message" => "Access granted:",
        //     "data" => $decoded 
        // ));

     $pop = json_encode($decoded);   
     // echo $pop["Team"];
     // echo $decoded->Team->name;
     // setcookie('pop', json_encode($decoded->Team->Permissions[0]->name),time() + (30), 'http://localhost/admin/','','');
     // $_COOKIE['pop'] = json_encode($decoded->Team->Permissions[0]->name);



     $arr2 = json_decode(json_encode($decoded->Team->Permissions), true);

      foreach($arr2 as $item) {
if ($item['name']== 'viewvisitors') {
	     setcookie('pop', $decoded->Team->Permissions[0]->name,time() + (30), 'http://localhost/admin/','','');
     $_COOKIE['pop'] = $decoded->Team->Permissions[0]->name;
}
}
    }catch (Exception $e){

    http_response_code(401);

    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
    .div-1 {
        background-color: #EBEBEB;
        display: none;
    }
    
    .div-2 {
    	background-color: #ABBAEA;
    	 display: none;
    }
    
    .div-3 {
    	background-color: #FBD603;
    	 display: none;
    }

        .li1{
    	background-color: #FBD603;
    	 display: none;
    }
</style>
<body onload="myfunction()">

<div class="div-1" id ="1"> I love HTML </div>
<div class="div-2" id ="2"> I love CSS </div>
<div class="div-3" id ="3"> I love JavaScript </div>
<ul>
<li class="li1" id = "5">bimas</li>
<li>bimas2</li>
</ul>

</body>

<script type="text/javascript">
	function myfunction(){
		
		var perm = '<?php echo $_COOKIE["pop"]; ?>'
		console.log(perm);

		if(perm =="viewAdminDashboard")
		{
			console.log("allowed")

			document.getElementById("1").style.display ="block";
			document.getElementById("2").style.display ="block";
			document.getElementById("5").style.display ="block";
		}
	}
</script>

</html>