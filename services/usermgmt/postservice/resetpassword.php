<?php
require "../../../DBConnect.php";
require "../../../sharedFunctions.php";


$logpath ="../../../log.txt";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $jwt = null;

    $data = json_decode(file_get_contents("php://input"));

    $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    $arr = explode(" ", $authHeader);
    $jwt = $arr[1];

    if($jwt){
        try {
            file_put_contents($logpath,date("Y-m-d H:i(worry)"). "Reset Password Test: ".print_r($jwt,true)."\n",FILE_APPEND);
            //Get user details
            $decoded = getUserDetails($jwt,$logpath);

            $password = "";
            $newpassword = "";


            $password = $_POST["oldPassword"];
            $newpassword = $_POST["newPassword"];


            $url = "http://localhost:8056/auth/resetPassword";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Accept: application/json",
                "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


            $data = <<<DATA
            {
    "oldPassword":"$password",
    "newPassword":"$newpassword",
    "msisdn":"$decoded->msisdn"
     }
DATA;

            file_put_contents($logpath, date("Y-m-d H:i(worry)") . "Change Password data: " . print_r($data, true) . "\n", FILE_APPEND);
            if (isset($data)) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $resp = curl_exec($curl);
                file_put_contents($logpath, date("Y-m-d H:i(worry)") . "result: " . print_r($resp, true) . "\n", FILE_APPEND);
                $arr = json_decode($resp, true);


                $resp = json_decode($resp);
                $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                file_put_contents($logpath, date("Y-m-d H:i(worry)") . "responseObject: " . print_r($resp, true) . "\n", FILE_APPEND);
                $response_message = $resp->message;
                $response_code = $resp->responseCode;
                curl_close($curl);

                if ($httpcode == 200) {
                    if ($response_code === "00") {

                    } else {
                        header($_SERVER["SERVER_PROTOCOL"] . ' 400 ' . $response_message, true, 500);
                        echo json_encode(array(
                            "message" => "Access denied.",
                            "error" => $response_message
                        ));
                    }
                } else {
                    header($_SERVER["SERVER_PROTOCOL"] . ' 400 ' . 'Error occurred Processing Request', true, 500);
                    echo json_encode(array(
                        "message" => "Access denied.",
                        "error" => $response_message
                    ));
                }


            }
        }
        catch (Exception $e) {

                http_response_code(401);

                echo json_encode(array(
                    "message" => "Access denied.",
                    "error" => $e->getMessage()
                ));
            }
    }
    else{
        http_response_code(401);

        echo json_encode(array(
            "message" => "Access denied.",
            "error" => "Acess denied"
        ));
    }

    }


?>