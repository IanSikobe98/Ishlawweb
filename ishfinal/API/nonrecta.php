<?php
//setting header to json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ishfinal');





//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
$numm =10;
if(isset($_GET["page"]))
{
 
 $page =$_GET["page"];
}

else{
  $page=1;
}
$start_from=($page-1)*0.5;

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT * FROM `rpttasks3` WHERE  `status` <> 'Completed'  limit $start_from,$numm");
//query to get data from the table
$query = sprintf("SELECT * FROM `tasks`  WHERE  `rpt` = 'Never' ORDER BY `start` DESC");

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
print json_encode($data);
//print (",");
//print json_encode($data);

?>