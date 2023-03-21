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
        //get connection
        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if(!$mysqli){
            die("Connection failed: " . $mysqli->error);
        }

//query to get data from the table
        $query = sprintf("SELECT * FROM `sentmessages` WHERE `sender_id`='$decoded->id'  ");
        file_put_contents($logpath,date("Y-m-d H:i(worry)"). "query: ".print_r($query,true)."\n",FILE_APPEND);


//execute query
        $result = $mysqli->query($query);

//loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        file_put_contents($logpath,date("Y-m-d H:i(worry)"). "data: ".print_r($data,true)."\n",FILE_APPEND);


//free memory associated with result
        $result->close();

//close connection
        $mysqli->close();

//now print the data

// $myarray =array(json_encode($data));
// print myarray;

        print json_encode($data);



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

