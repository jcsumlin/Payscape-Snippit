<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://raw.githubusercontent.com/jcsumlin/Payscape-Snippit/master/test.php"></script>
    <?php require 'mainFunction.php';
        $bearer = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoidGVzdDFAbWFpbC5jb20iLCJlbWFpbCI6InRlc3QxQG1haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJpc3MiOiJodHRwczovL3BheXNjYXBlLmF1dGgwLmNvbS8iLCJzdWIiOiJhdXRoMHw1YjA1YTJlZGUxZmVlMDY2NzAwYzQ4N2IiLCJhdWQiOiJZVHd2Q2pBd2R4Znd1YnpNWGN3TE1DbENKZWZycEtwTCIsImlhdCI6MTUyNzY4Nzk0MywiZXhwIjoxNTI3Nzc0MzQzfQ._noEDKaCO8V3Sr18-Bgamzjb-6KwqsoYXOHsy-b2KZk";
        $url = "http://api.intdev.registration.payscape.com/programs/";
        $id = "46";
        $program = CallAPI("GET", $bearer, $url, $id);
        $org = CallAPI("GET", $bearer, "http://api.intdev.registration.payscape.com/organizations/", $program['organization_id']);
    ?>


    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<span class="col-md-3"></span>
<span class="col-md-6 center">
    <h1><?php echo $program['title']; ?></h1>
    <p><bold>Dates: </bold> <?php echo date("F d, Y", strtotime($program['start_date'])); ?></p>
    <p>Ages: Requires different end point</p>
    <p><bold>Price: </bold><?php echo $program[''] ?></p>
    <p><?php echo $program['description']; ?></p>
    <a href="http://<?php echo $org['sub_domain_name'] ?>.intdev.registration.payscape.com/programs/<?php echo $program['id'] ?>/" ><button><?php echo $program['registration_button_text']; ?></button></a>
</span>
<span class="col-md-3"></span>

</body>
</html>