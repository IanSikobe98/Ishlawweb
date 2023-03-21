<?php

function getUserDetails($jwt,$logpath) {

    $reponseData = null;
    $url = "http://localhost:8056/auth/getUserDetails";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $authorization = "Ulinzi: Bearer ".$jwt;
    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
        $authorization
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    file_put_contents($logpath,date("Y-m-d H:i(worry)"). "Response: ".print_r($resp,true)."\n",FILE_APPEND);
    $arr = json_decode($resp, true);
    //var_dump($resp);
    $resp = json_decode($resp);

    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);;

    file_put_contents($logpath,date("Y-m-d H:i(worry)"). "responseArray: ".print_r($arr,true)."\n",FILE_APPEND);
    file_put_contents($logpath,date("Y-m-d H:i(worry)"). "responseObject: ".print_r($resp,true)."\n",FILE_APPEND);
    $response_message = $resp->message;
    $response_code = $resp->responseCode;

    if ($httpcode == 200) {
        if($response_code === "00"){
            file_put_contents($logpath, date("Y-m-d H:i(worry)") . "is valid jwt: " . print_r("true", true) . "\n", FILE_APPEND);
            $responseBody = $resp->responseBody;
            $reponseData= $responseBody;
        }
        else{
            file_put_contents($logpath, date("Y-m-d H:i(worry)") . "error decoding jwt: " . print_r("false", true) . "\n", FILE_APPEND);
        }
    }
    else{
        file_put_contents($logpath, date("Y-m-d H:i(worry)") . "error decoding jwt: " . print_r("httpCode ".$httpcode, true) . "\n", FILE_APPEND);
    }
    return $reponseData;
}

?>