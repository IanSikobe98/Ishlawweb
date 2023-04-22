<?php
//setting header to json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require "../../../DBConnect.php";
require "../../../sharedFunctions.php";

//database
//define('DB_HOST', '127.0.0.1');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'ishfinal');


// $tod = strftime('%F');

$logpath ="../../../log.txt";
$jwt = null;
file_put_contents($logpath,date("Y-m-d H:i(worry)"). "Recurring Tasks Agenda Test: ".print_r($jwt,true)."\n",FILE_APPEND);
$data = json_decode(file_get_contents("php://input"));

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];
if($jwt){
    try {
        $decoded = getUserDetails($jwt,$logpath);
//get connection
        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$mysqli) {
            die("Connection failed: " . $mysqli->error);
        }

//query to get data from the table
        $query = sprintf("SELECT * FROM `rptevent3` WHERE `User` = '$decoded->id' ");

//execute query
        $result = $mysqli->query($query);

//loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }


//free memory associated with result
        $result->close();


//close connection
        $mysqli->close();

//now print the data

// $myarray =array(json_encode($data));
// print myarray;


// }

// }
// print json_encode($data);
//print (",");
        print json_encode($data);
    }
    catch (Exception $e) {

        http_response_code(401);

        echo json_encode(array(
            "message" => "Access denied.",
            "error" => $e->getMessage()
        ));
    }
}
?>