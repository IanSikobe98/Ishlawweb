
<?php
require "../../sec/vendor/autoload.php";
require "../../DBConnect.php";
require "../../sharedFunctions.php";
use \Firebase\JWT\JWT;
//setting header to json
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$logpath ="../../log.txt";

$jwt = null;
$data = json_decode(file_get_contents("php://input"));
$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];
file_put_contents($logpath,date("Y-m-d H:i(worry)"). "token: ".print_r($jwt,true)."\n",FILE_APPEND);


if($jwt){

    try {

        $decoded = getUserDetails($jwt,$logpath);

        // Access is granted. Add code of the operation here
        //        echo json_encode(array(
//            "message" => "Access granted:",
//            "data" => $decoded
//        ));





//get connection
//        $link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
        $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
        if($link === false){
            header('HTTP/1.1 500 Internal Server ');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Unable to connect to Database', 'code' => 1337)));
//    die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            $Status = '';
            $request_id = '';


            $Status= $_POST["Status"];
            $request_id = $_POST["id"];
//            echo $Status;
//            echo $request_id;

            if($Status == ''  || $request_id == '')
            {
//                echo "ERROR: No data";
                header('HTTP/1.1 400 Internal Server ');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'No Data', 'code' => 400)));

            }

            $sql = "  UPDATE `messages` SET  `Status` =  '$Status' WHERE `id` = '$request_id'  " ;


            if(mysqli_query($link, $sql)){
                json_encode(array('message' => 'Succesful Update', 'code' => 200));
            }

            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                header('HTTP/1.1 500 Internal Server ');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Could not insert into the database', 'code' => 1337)));

            }

        }


    }catch (Exception $e){

        http_response_code(401);

        echo json_encode(array(
            "message" => "Access denied.",
            "error" => $e->getMessage()
        ));
//        echo "Invalid Jwt";
        header('HTTP/1.1 500 Internal Server ');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => $e->getMessage(), 'code' => 401)));
    }

}

else{
    echo "Invalid Jwt";
    header('HTTP/1.1 500 Internal Server ');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'Invalid Jwt', 'code' => 1337)));
}

