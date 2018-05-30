<?php

function CallAPI($method = "GET", $bearer, $url, $id)
{
    if ($bearer == NULL || $url == NULL || $id == NULL) {
        echo "One of the required parameters is not provided!";
    } else {
        $curl = curl_init();
        if ($method == 'GET') {
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url . $id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json",
                    "Authorization: $bearer"
                ),
            ));

        } else {
            echo "Invalid Method";
        }
        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if(strpos($url, 'program') !== false && json_decode($response, true)[0]['status'] == "Draft") {
                echo "This Program is still a Draft!";
            }
            $result = json_decode($response, true)[0];

            return $result;
        }
    }

}
?>