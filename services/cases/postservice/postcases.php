<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


    $name = '';
    $description = '';
    $clientid = '';
    $status ='';
    $case_number='';
    $physical_location = '';
    $priority = '';
    $FileCategoryId = ' ';


// $databaseService = new DatabaseService();
// $conn = $databaseService->getConnection();



// $data = json_decode(file_get_contents("php://input"));

//    $name= $_POST["name"];


    $case_number= $_POST["case"];
    $description = $_POST["parties"];
    $client_id = $_POST["client"];
    $FileCategoryId =  $_POST["category"];
//    $priority = isset($_POST['pr']) ? $_GET['id'] : '';
    $priority =  $_POST["prio"];
    $status = $_POST["stat"];
    $physical_location =  $_POST["location"];



    $url = "https://ifs.ambience.co.ke/files/api/v1/folders";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//    "name": "$name",
//TODO LAWYER ID
    $data = <<<DATA
{
    "description": "$description",
    "client_id": "$client_id",
    "status": "$status",
    "case_number": "$case_number",
    "physical_location": "$physical_location",
    "priority" : "$priority",
    "FileCategoryId" : "$FileCategoryId",
    "reference": " ",
    "lawyer_id": " ",
    "name": " "
 
}
DATA;

    echo $data;
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
//    var_dump($resp);
//    $resp = json_decode($resp);

    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_msg)) {
        // TODO - Handle cURL error accordingly
        header('HTTP/1.1 500 Internal Server Booboo');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));

    }




//var_dump($resp);
//    $resp = json_decode($resp);
//    header("location: index.php");
}
?>