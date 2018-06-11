<!DOCTYPE html>
<body>
<span>
<?php
include 'https://raw.githubusercontent.com/jcsumlin/Payscape-Snippit/master/mainFunction.php';
$bearer = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoicmVnaXN0cmF0aW9uLmRlbW9AcGF5c2NhcGUuY29tIiwiZW1haWwiOiJyZWdpc3RyYXRpb24uZGVtb0BwYXlzY2FwZS5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiaXNzIjoiaHR0cHM6Ly9wYXlzY2FwZS5hdXRoMC5jb20vIiwic3ViIjoiYXV0aDB8NTliYTlkNjc3YzJlYWI3ODdjMTYyYmZmIiwiYXVkIjoiWVR3dkNqQXdkeGZ3dWJ6TVhjd0xNQ2xDSmVmcnBLcEwiLCJleHAiOjE1Mjg4MDkwNzUsImlhdCI6MTUyODcyMjY3NSwiYXpwIjoiWVR3dkNqQXdkeGZ3dWJ6TVhjd0xNQ2xDSmVmcnBLcEwifQ.EL0sfQK29q0IkBEBCvk-JFNY6vAk-DErDCzY_Bv6krA";
$program = CallAPI($bearer, "http://api.intdev.registration.payscape.com/programs/", "19");
$org = CallAPI($bearer, "http://api.intdev.registration.payscape.com/organizations/", $program['organization_id']);
?>
<h1><?php echo $program['title'];?></h1>
<ul>
    <li><strong>Dates: </strong><?php echo $program['start_date']; echo ' - '.$program['end_date']; ?></li>
    <li><strong>Price: </strong> <?php echo $program['price']; ?></li>
</ul>
<p><?php echo $program['description']; ?></p>
<a href="http://<?php echo $org['sub_domain_name'] ?>.intdev.registration.payscape.com/programs/<?php echo $program['id'] ?>/" target="_blank" rel="noopener noreferrer">
    <button>
        <?php echo $program['registration_button_text']; ?>
    </button>
</a>
</span>
</body>