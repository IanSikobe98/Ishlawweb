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

//query to get data from the table
$query = sprintf("SELECT * FROM `events`  WHERE  `rpt` = 'Never'");

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