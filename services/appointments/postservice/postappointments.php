<?php
require "../../../sec/vendor/autoload.php";
require "../../../DBConnect.php";
use \Firebase\JWT\JWT;
//setting header to json
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$secret_key = "-----BEGIN PUBLIC KEY-----

MIIBITANBgkqhkiG9w0BAQEFAAOCAQ4AMIIBCQKCAQBo7XX/N2WuOUtnB1zW/xoi
Juz5/Lh0NXORSx3eo0cKcMoSghxpoPDeL21+mluVDeHr37VVbl25P9ItwWfRcCKl
GBuM4WPS6k6b83zzNlRHGoJL9mooj27Cn8mc2elCBbBkbDi6t0NEXYbVrINtyU2x
F9yaUkryveNOwwUd6t1mjeF8H8xKU3SBc+E3Vm+gzpV/6ED78PdAaVBKvVxNQEMX
b01tKzMMwzfY3K1IA5jbVY5tHNCbc/EA/9UqzV4awH1o35v12Q1oCb28und0eJ33
D5KHVUmIZcLQgG6ivP1mmPoZ3O0udPzN2Qnm1mepQp/oNsY0V4VSt/hcqXHwyY5H
AgMBAAE=
-----END PUBLIC KEY-----";

$jwt = null;


$data = json_decode(file_get_contents("php://input"));
$authHeader = $_SERVER['HTTP_AUTHORIZATION'];

//$authHeader = 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY3ZGU0ZDJlLWY5NjEtNDI3OS1iYWMyLWEyMGYzODc5ZDdmNyIsImZpcnN0TmFtZSI6ImlhbiIsInNlY29uZE5hbWUiOiJ3YWx0ZXIiLCJlbWFpbEFkZHJlc3MiOiJpYW53YWx0ZXIzMDlAZ21haWwuY29tIiwicGhvbmVOdW1iZXIiOiIwNzE2NTYxNTA3IiwiZW1haWxWZXJpZmllZCI6ZmFsc2UsImlzRW5hYmxlZCI6dHJ1ZSwiZGVsZXRlZEF0IjpudWxsLCJUZWFtSWQiOjIsIlRlYW0iOnsibmFtZSI6IlJlY2VwdGlvbmlzdCIsImRlc2NyaXB0aW9uIjoiUmVnaXN0ZXJzIHZpc2l0b3JzIGFuZCBjbGllbnRzIiwiUGVybWlzc2lvbnMiOlt7Im5hbWUiOiJhZGR2aXNpdG9ycyIsImRlc2NyaXB0aW9uIjoiVGhlIHBlcnNvbiBjYW4gYWRkdmlzaXRvcnMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDA6MjMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDA6MjMuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjoxLCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJhZGRjbGllbnRzIiwiZGVzY3JpcHRpb24iOiJUaGUgcGVyc29uIGNhbiBhZGQgY2xpZW50cyIsIlRlYW1fUGVybWlzc2lvbnMiOnsiY3JlYXRlZEF0IjoiMjAyMS0xMC0xNlQxOTowMDo1Ny4wMDBaIiwidXBkYXRlZEF0IjoiMjAyMS0xMC0xNlQxOTowMDo1Ny4wMDBaIiwiZGVsZXRlZEF0IjpudWxsLCJQZXJtaXNzaW9uSWQiOjIsIlRlYW1JZCI6Mn19LHsibmFtZSI6InZpZXdjbGllbnRzIiwiZGVzY3JpcHRpb24iOiJUaGUgcGVyc29uIGNhbiB2aWV3IGNsaWVudHMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MDcuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MDcuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjozLCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJ2aWV3dmlzaXRvcnMiLCJkZXNjcmlwdGlvbiI6IlRoZSBwZXJzb24gY2FuIHZpZXcgdmlzaXRvcnMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MjMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MjMuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjo0LCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJlZGl0cHJvZmlsZSIsImRlc2NyaXB0aW9uIjoiRWRpdCBQcm9maWxlIiwiVGVhbV9QZXJtaXNzaW9ucyI6eyJjcmVhdGVkQXQiOiIyMDIxLTEwLTE2VDE5OjAxOjMzLjAwMFoiLCJ1cGRhdGVkQXQiOiIyMDIxLTEwLTE2VDE5OjAxOjMzLjAwMFoiLCJkZWxldGVkQXQiOm51bGwsIlBlcm1pc3Npb25JZCI6NiwiVGVhbUlkIjoyfX1dfSwiUGVybWlzc2lvbnMiOlt7Im5hbWUiOiJhZGR2aXNpdG9ycyIsImRlc2NyaXB0aW9uIjoiVGhlIHBlcnNvbiBjYW4gYWRkdmlzaXRvcnMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDA6MjMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDA6MjMuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjoxLCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJhZGRjbGllbnRzIiwiZGVzY3JpcHRpb24iOiJUaGUgcGVyc29uIGNhbiBhZGQgY2xpZW50cyIsIlRlYW1fUGVybWlzc2lvbnMiOnsiY3JlYXRlZEF0IjoiMjAyMS0xMC0xNlQxOTowMDo1Ny4wMDBaIiwidXBkYXRlZEF0IjoiMjAyMS0xMC0xNlQxOTowMDo1Ny4wMDBaIiwiZGVsZXRlZEF0IjpudWxsLCJQZXJtaXNzaW9uSWQiOjIsIlRlYW1JZCI6Mn19LHsibmFtZSI6InZpZXdjbGllbnRzIiwiZGVzY3JpcHRpb24iOiJUaGUgcGVyc29uIGNhbiB2aWV3IGNsaWVudHMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MDcuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MDcuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjozLCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJ2aWV3dmlzaXRvcnMiLCJkZXNjcmlwdGlvbiI6IlRoZSBwZXJzb24gY2FuIHZpZXcgdmlzaXRvcnMiLCJUZWFtX1Blcm1pc3Npb25zIjp7ImNyZWF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MjMuMDAwWiIsInVwZGF0ZWRBdCI6IjIwMjEtMTAtMTZUMTk6MDE6MjMuMDAwWiIsImRlbGV0ZWRBdCI6bnVsbCwiUGVybWlzc2lvbklkIjo0LCJUZWFtSWQiOjJ9fSx7Im5hbWUiOiJlZGl0cHJvZmlsZSIsImRlc2NyaXB0aW9uIjoiRWRpdCBQcm9maWxlIiwiVGVhbV9QZXJtaXNzaW9ucyI6eyJjcmVhdGVkQXQiOiIyMDIxLTEwLTE2VDE5OjAxOjMzLjAwMFoiLCJ1cGRhdGVkQXQiOiIyMDIxLTEwLTE2VDE5OjAxOjMzLjAwMFoiLCJkZWxldGVkQXQiOm51bGwsIlBlcm1pc3Npb25JZCI6NiwiVGVhbUlkIjoyfX1dLCJpYXQiOjE2NDEwMzI1MzksImV4cCI6MTY0MTA3NTczOX0.UeKOiS8ncDUsnAoRKHnjVD0dFJmYPe4hGt1FmlFsrPYS38T9rcteoQA73E0pzyEcqBH-EfsDJvlek2sZPWjGNVf5ouQIoKxC7y5EYNhIMAtnu9awHgOdeB1hGNbsc40iF6bdg_p-zjaqvdsI80hAa2EJoQLDiCn-GqowHSmm5OTK6ozSOvYeVe1p28ECkXMoRyVG4kOWY1m7ayiPcN-kwykriu2gy1oON_DVWP2NnK7LOzXEkGN4HEFS-Z4muN1nlMBijCGbXMA8AyL03X_KyR3MEl3T8Awcf4A98xnmKjY8rRKId9rcMbHz1mVNvq-gYmU7lYDl9xCf5TiZH53GNA';

$arr = explode(" ", $authHeader);
$jwt = $arr[1];

if($jwt){

    try {

        $decoded = JWT::decode($jwt, $secret_key, array('RS256'));

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['subject']) && isset($_POST['start']) &&isset($_POST['fname']) &&isset($_POST['sname'])&& isset($_POST['cliemail']) && isset($_POST['descri']) && isset($_POST['user']) && isset($_POST['clino'])
    // && isset($_POST['matter'])
) {

// Escape user inputs for security
    $subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
    $start = mysqli_real_escape_string($link, $_REQUEST['start']);
    $fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
    $sname = mysqli_real_escape_string($link, $_REQUEST['sname']);
    $cliemail = mysqli_real_escape_string($link, $_REQUEST['cliemail']);
    $descri = mysqli_real_escape_string($link, $_REQUEST['descri']);
    $clino = mysqli_real_escape_string($link, $_REQUEST['clino']);
    $user = mysqli_real_escape_string($link, $_REQUEST['user']);
    $sender_id = $decoded->id;




//        $sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`, `hotodo`, `comment`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu','$hotodo','$comment') ";
//
//    $sql = "INSERT INTO `tasks`(`title`, `start`, `description`, `rpt`, `rpun`, `User`, `Priority`, `clino`, `status`, `hotodo`, `comment`) VALUES ('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu','$hotodo','$comment') ";

// for($i=0;$i<$user; $i++){
// , '".$_POST['user'][$i]."'
// $sql .="('$title','$start', '$descri', '$rpt','$rptun', '$user','$prio','$clino','$stu'),";

// }
// $psql = rtrim($sql,',');

//        if(mysqli_query($link, $sql)){
//            echo "<script type='text/javascript'>
//
//
//     document.getElementById('myModal').style.display = 'block';
//
//            document.getElementById('status').innerHTML = 'Task Added successfully. .';
//            document.getElementById('status3').innerHTML = '.<br><br>';
//
//      document.getElementById('status').style.color= 'green';
//
//
//
//
//</script>";
//
//        } else{
//            echo "<script type='text/javascript'>
//
//
//     document.getElementById('myModal').style.display = 'block';
//
//            document.getElementById('status').innerHTML = 'Registration error please retry...';
//            document.getElementById('status3').innerHTML = '.<br><br>';
//
//      document.getElementById('status').style.color= 'red';
//
//
//
//
//</script>";
//        }


    // Attempt insert query execution
    $sql = "INSERT INTO casereq (Phone_number,Fname,Sname,Email,Message,Datetime,Type,Approval,Asignee) VALUES ('$clino','$fname','$sname','$cliemail', '$descri','$start','$subject','Accepted','$user')";
    if (mysqli_query($link, $sql)) {

        //    SET BROADCAST ID
//query to get id from table
        $query = sprintf("SELECT MAX(`id`) AS `number1` FROM `messages` ");

        //execute query
        $result = $link->query($query);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }


        $iddata = $data[0]['number1'];
        if ($iddata != null) {
            $broadcast_id = $data[0]['number1'];
        } else {
            $broadcast_id = 2;
        }
        if ($sender_id == '' || $user == '') {
//                echo "ERROR: No data";
            header('HTTP/1.1 400 Internal Server ');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'No Data', 'code' => 400)));

        }


        $sql2 = "INSERT INTO `messages`( `Category`, `subject`, `compose`, `receiver_id`, `sender_id`, `Status`, `broadcastId`,`CreatedAt`) VALUES ('NEW APPOINTMENT','$subject','$descri','$user','$sender_id','Unread','$broadcast_id',NOW())";
//

        if (mysqli_query($link, $sql2)) {
//            echo "start";
//            echo $jwt;
//            header('HTTP/1.1 200');
//            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode(array('message' => 'Successful Appointments Registration', 'code' => 200));
//            echo json_encode(array('message' => 'Succesful Message Composition', 'code' => 200));

        }
        else {
            header('HTTP/1.1 500 Internal Server MESSAGE ');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'We are unable to process your request', 'code' => 500)));

        }
    } else {
        header('HTTP/1.1 500 Internal Server APPOINTMENT ');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'We are unable to process your request', 'code' => 500)));

    }


// Close connection
    mysqli_close($link);

}
else{
    http_response_code(400);

    echo json_encode(array(
        "message" => "Bad Request",
//        "error" => $e->getMessage()
    ));
//        echo "Invalid Jwt";
    header('HTTP/1.1 400 Bad Request ');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => "Bad Request" ,'code' => 400)));
}




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










?>