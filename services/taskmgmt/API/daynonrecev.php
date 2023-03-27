<?php
require "../../../sec/vendor/autoload.php";
require "../../../DBConnect.php";
require "../../../sharedFunctions.php";
use \Firebase\JWT\JWT;
//setting header to json
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//database
//define('DB_HOST', '127.0.0.1');
//define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_NAME', 'ishfinal');


$logpath ="../../../log.txt";


$jwt = null;


$data = json_decode(file_get_contents("php://input"));

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];
if($jwt){

    try {

        $decoded = getUserDetails($jwt,$logpath);


     $pop = json_encode($decoded); 




 $tod = strftime('%F');
$data = array();
$data2 = array();

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
$sql ="SELECT `id` ,DATE(`events`.`start`) AS `start`,DATE_ADD(DATE(`events`.`end`), INTERVAL 1 DAY) AS `end` FROM `events` WHERE `user`='$decoded->id'";
        file_put_contents($logpath,date("Y-m-d H:i(worry)"). " E-Query1: ".print_r($sql,true)."\n",FILE_APPEND);

// $sql = "SELECT * FROM `events`  WHERE  `rpt` = 'Never'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


// $ end =" ";
// $end = .$row["end"]+ "1";
 $period = new DatePeriod(
     new DateTime($row["start"]),
     new DateInterval('P1D'),
     new DateTime($row["end"])
);

 foreach ($period as $key => $value) {
    // echo $row["id"];  
    $value =$value->format('Y-m-d')    ;
    // echo $value;   
    // echo  "\t ";
    $tyid = $row["id"];
    // echo $tyid;  


if($value==$tod){
   $query = sprintf( "SELECT * FROM `events` WHERE `rpt` = 'Never'  AND `id`='$tyid' AND `user`='$decoded->id'");

    file_put_contents($logpath,date("Y-m-d H:i(worry)"). " E-Query2: ".print_r($query,true)."\n",FILE_APPEND);

    // "SELECT * FROM `events`  WHERE  `rpt` = 'Never' AND DATE(`start`) = '$tod' ");

//execute query
$result3 = $mysqli->query($query);

//loop through the returned data

foreach ($result3 as $row2) {
	$data[] = $row2;
}
}

}

  

    // echo "id: " . $row["start"]. " - start: " ;


// $data2=.$data
  }
  $data2 = array_merge($data, $data2);
} else {
  echo "0 results";
}









// //query to get data from the table
// $query = sprintf("SELECT * FROM `events`  WHERE  `rpt` = 'Never' AND DATE(`start`) = '$tod' ");

// //execute query
// $result = $mysqli->query($query);

// //loop through the returned data
// $data = array();
// foreach ($result as $row) {
// 	$data[] = $row;
// }


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
print json_encode($data2);


    }catch (Exception $e){

    http_response_code(401);

    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}

}
?>