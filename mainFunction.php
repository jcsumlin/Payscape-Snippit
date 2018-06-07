<?php

function CallAPI($bearer, $url, $id)
{
    $method = 'GET'
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
        if (strpos($url, 'program') !== false) {
            if (($result['price_range']['min'] == $result['price_range']['max']) && $result['price_range']['min'] == "0") {
                $result['price'] = "Free!";

            } elseif ($result['price_range']['min'] == $result['price_range']['max'])   {
                $result['price'] = $result['price_range']['min'];
            } else {
                $result['price'] = $result['price_range']['min'] . " - " . $result['price_range']['max'];
            }
        }

        return $result;
    }
    $default = array('title' => 'Something went wrong',
        'price' => "NULL",
        'description' => "NULL",
        'start_date' => "NULL",

        );
    return $default;
}

?>