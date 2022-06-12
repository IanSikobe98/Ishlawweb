
<?php
require "../../sec/vendor/autoload.php";
require "../../DBConnect.php";
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

        // Access is granted. Add code of the operation here
        //        echo json_encode(array(
//            "message" => "Access granted:",
//            "data" => $decoded
//        ));





//get connection
//        $link = mysqli_connect("127.0.0.1", "root", "", "ishfinal");
        $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
        if($link === false){
            header('HTTP/1.1 500 Internal Server ');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Unable to connect to Database', 'code' => 1337)));
//    die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            $Status = '';
            $request_id = '';


            $Status= $_POST["Status"];
            $request_id = $_POST["id"];
//            echo $Status;
//            echo $request_id;

            if($Status == ''  || $request_id == '')
            {
//                echo "ERROR: No data";
                header('HTTP/1.1 400 Internal Server ');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'No Data', 'code' => 400)));

            }

            $sql = "  UPDATE `messages` SET  `Status` =  '$Status' WHERE `id` = '$request_id'  " ;


            if(mysqli_query($link, $sql)){
                json_encode(array('message' => 'Succesful Update', 'code' => 200));
            }

            else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                header('HTTP/1.1 500 Internal Server ');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Could not insert into the database', 'code' => 1337)));

            }

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

