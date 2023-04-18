<?php
require "../../../sec/vendor/autoload.php";
require "../../../DBConnect.php";
require "../../../sharedFunctions.php";
use \Firebase\JWT\JWT;
//setting header to json

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//database
//define('DB_HOST', '127.0.0.1');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'ishfinal');




$logpath ="../../../log.txt";
$jwt = null;
file_put_contents($logpath,date("Y-m-d H:i(worry)"). " Non Recurring Tasks Agenda Test: ".print_r($jwt,true)."\n",FILE_APPEND);


 $data = json_decode(file_get_contents("php://input"));

 $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
 $arr = explode(" ", $authHeader);
 $jwt = $arr[1];
 if($jwt) {

     try {

         $decoded = getUserDetails($jwt,$logpath);


         $pop = json_encode($decoded);
         // echo $pop["Team"];
         // echo $pop;
         // echo $decoded->firstName;


         $tod = strftime('%F');


//get connection
         $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

         if (!$mysqli) {
             die("Connection failed: " . $mysqli->error);
         }

//query to get data from the table
         $query = sprintf("SELECT * FROM `tasks_report`  WHERE  `rpt` = 'Never' AND `start` <= '$tod' AND `status` <> 'Completed' AND `User`= $decoded->id");
// -- AND `User`='$decoded->firstName'
//execute query

         file_put_contents($logpath,date("Y-m-d H:i(worry)"). "Tasks Non recurring Agenda Query: ".print_r($query,true)."\n",FILE_APPEND);

         $result = $mysqli->query($query);

//loop through the returned data
         $data = array();
         foreach ($result as $row) {
             $data[] = $row;
         }

         file_put_contents($logpath,date("Y-m-d H:i(worry)"). "Tasks Agenda Result: ".print_r($data,true)."\n",FILE_APPEND);



//free memory associated with result
         $result->close();


//close connection
         $mysqli->close();

//now print the data

// $myarray =array(json_encode($data));
// print myarray;


     } catch (Exception $e) {

         http_response_code(401);

         echo json_encode(array(
             "message" => "Access denied.",
             "error" => $e->getMessage()
         ));
     }


// }

// }
// print json_encode($data);
//print (",");
     print json_encode($data);
 }




//     }catch (Exception $e){

//     http_response_code(401);

//     echo json_encode(array(
//         "message" => "Access denied.",
//         "error" => $e->getMessage()
//     ));
// }

// }


 

?>