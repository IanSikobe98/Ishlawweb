<?php
require "../../../DBConnect.php";
$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    header('HTTP/1.1 500 Internal Server ');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'Unable to connect to Database', 'code' => 1337)));
//    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){


    $approval = ' ';
    $request_id = ' ';


    $approval= $_POST["approval"];
    $request_id = $_POST["id"];
    echo $approval;
    echo $request_id;

    $sql = "  UPDATE `casereq` SET  `Approval` =  '$approval' WHERE `Rqid` = '$request_id'  " ;


    if(mysqli_query($link, $sql)){

    }

    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        header('HTTP/1.1 500 Internal Server ');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'Could not insert into the database', 'code' => 1337)));

    }

}
?>