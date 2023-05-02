<?php
require "../../../DBConnect.php";
require "../../../sharedFunctions.php";
use \Firebase\JWT\JWT;
//setting header to jso
//database


$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$logpath ="../../../log.txt";

$jwt = null;


$data = json_decode(file_get_contents("php://input"));

$authHeader = $_SERVER['HTTP_AUTHORIZATION'];
$arr = explode(" ", $authHeader);
$jwt = $arr[1];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

try {

    $decoded = getUserDetails($jwt, $logpath);

    if($decoded){
    file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Submit Form auth: " . print_r($decoded, true) . "\n", FILE_APPEND);



    $pop = json_encode($decoded);

    if (isset($_POST['caseNo']) && isset($_POST['atendee']) && isset($_POST['adv']) && isset($_POST['duty']) && isset($_POST['orders']) && isset($_POST['action']) && isset($_POST['directions']) && isset($_POST['date']) && isset($_POST['clino'])
        // && isset($_POST['matter'])
    ) {
        $caseNo = mysqli_real_escape_string($link, $_REQUEST['caseNo']);
        $atendee = mysqli_real_escape_string($link, $_REQUEST['atendee']);
        $adv = mysqli_real_escape_string($link, $_REQUEST['adv']);

        $duty = mysqli_real_escape_string($link, $_REQUEST['duty']);
        $orders = mysqli_real_escape_string($link, $_REQUEST['orders']);
        $action = mysqli_real_escape_string($link, $_REQUEST['action']);

        $directions = mysqli_real_escape_string($link, $_REQUEST['directions']);
        $date = mysqli_real_escape_string($link, $_REQUEST['date']);
        $clino = mysqli_real_escape_string($link, $_REQUEST['clino']);


        $sql = "INSERT INTO `court_attendance_form`( `Case_Number`, `Atendee_Id`, `Client_Name`, `Other_Advocates`, `Nature_Of_Duty`, `Orders_Made`, `Next_Action`, `Directions`, `Date`) 
     VALUES ('$caseNo','$atendee','$clino','$adv','$duty','$orders','$action','$directions','$date')";

        file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Submit Form query: " . print_r($sql, true) . "\n", FILE_APPEND);


        if (mysqli_query($link, $sql)) {
            echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Form Submitted  successfully. .';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'green';

      


</script>";

        } else {
            echo "<script type='text/javascript'>
         
     
     document.getElementById('myModal').style.display = 'block';

            document.getElementById('status').innerHTML = 'Error submitting  form...';
            document.getElementById('status3').innerHTML = '.<br><br>';

      document.getElementById('status').style.color= 'red';

      


</script>";


        }
        file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Submit Form DOne: " . print_r($sql, true) . "\n", FILE_APPEND);

    }
    }
    else{
        http_response_code(401);

        echo json_encode(array(
            "message" => "Access denied.",
            "error" => "Access Denied"
        ));
    }
}
catch (Exception $e){
    file_put_contents($logpath, date("Y-m-d H:i(worry)") . "exception: " . print_r($e, true) . "\n", FILE_APPEND);


    http_response_code(401);

    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}

?>