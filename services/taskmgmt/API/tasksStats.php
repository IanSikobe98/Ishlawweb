<?php
//setting header to json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


require "../../../DBConnect.php";
require "../../../sharedFunctions.php";
$logpath ="../../../log.txt";

$data = json_decode(file_get_contents("php://input"));

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];

if($jwt) {

    try {

        $decoded = getUserDetails($jwt, $logpath);


        $pop = json_encode($decoded);

//get connection
        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (!$mysqli) {
            die("Connection failed: " . $mysqli->error);
        }

//query to get data from the table
        $query = sprintf("SELECT * FROM `task_stats` WHERE `user`= $decoded->id ");
        file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Tasks Statistics Query: " . print_r($query, true) . "\n", FILE_APPEND);


//execute query
        $result = $mysqli->query($query);

//loop through the returned data
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
            file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Tasks Statistics Result row: " . print_r($row["total"], true) . "\n", FILE_APPEND);

            //Calculate Percentage completion results
            $testdata = $row;
            $completion_percetage = $row["completed"] / $row["total"] *100;
            $testdata["completion"] = round($completion_percetage,2) . "%";
            $updated_data[] = $testdata;
        }


        file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Tasks Statistics Result: " . print_r($updated_data, true) . "\n", FILE_APPEND);


//free memory associated with result
        $result->close();


//close connection
        $mysqli->close();

//now print the data
print json_encode($updated_data);
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