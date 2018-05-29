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
    $program = json_decode($response, true)[0];
    if (($program['price_range']['min'] == $program['price_range']['max']) && $program['price_range']['min'] == "0") {
        $price = "Free!";

    } elseif ($program['price_range']['min'] == $program['price_range']['max'])   {
        $price = $program['price_range']['min'];
    } else {
        $price = $program['price_range']['min'] . " - " . $program['price_range']['max'];
    }
}

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "http://api.intdev.registration.payscape.com/organizations/".$program['organization_id'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoidGVzdDFAbWFpbC5jb20iLCJlbWFpbCI6InRlc3QxQG1haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJpc3MiOiJodHRwczovL3BheXNjYXBlLmF1dGgwLmNvbS8iLCJzdWIiOiJhdXRoMHw1YjA1YTJlZGUxZmVlMDY2NzAwYzQ4N2IiLCJhdWQiOiJZVHd2Q2pBd2R4Znd1YnpNWGN3TE1DbENKZWZycEtwTCIsImlhdCI6MTUyNzYxMTg3MSwiZXhwIjoxNTI3Njk4MjcxfQ.ROHcPr43gFFIqsn8PPqwuEuXcHifI9r8BRrOYUdQUbw"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $org = json_decode($response, true)[0];
}




?>
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style type="text/css">
        h1 {
            text-align: center;
        }
        button {
            text-align: center;
        }
    </style>
</head>
<body>
<span class="col-md-3"></span>
<span class="col-md-6 center">
    <h1><?php echo $program['title']; ?></h1>
    <p><bold>Dates: </bold><?php echo $program['start_date']; ?></p>
    <p>Ages: Requires different end point</p>
    <p><bold>Price: </bold><?php echo $price ?></p>
    <p><?php echo $program['description']; ?></p>
    <a href="http://<?php echo $org['sub_domain_name'] ?>.intdev.registration.payscape.com" ><button><?php echo $program['registration_button_text']; ?></button></a>
</span>
<span class="col-md-3"></span>
</body>
</html>