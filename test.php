<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.intdev.registration.payscape.com/programs/46",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoidGVzdDFAbWFpbC5jb20iLCJlbWFpbCI6InRlc3QxQG1haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJpc3MiOiJodHRwczovL3BheXNjYXBlLmF1dGgwLmNvbS8iLCJzdWIiOiJhdXRoMHw1YjA1YTJlZGUxZmVlMDY2NzAwYzQ4N2IiLCJhdWQiOiJZVHd2Q2pBd2R4Znd1YnpNWGN3TE1DbENKZWZycEtwTCIsImlhdCI6MTUyNzYxMTg3MSwiZXhwIjoxNTI3Njk4MjcxfQ.ROHcPr43gFFIqsn8PPqwuEuXcHifI9r8BRrOYUdQUbw"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);



if ($err) {
    echo "cURL Error #:" . $err;
} else {
    if(json_decode($response, true)[0]['status'] == "Draft") {
        echo "Program is still a Draft!";
    }
    $program = $response;
    echo $program;

}

?>