<!DOCTYPE html>
<html lang="en">
<head>
    <title>welcomepage</title>
</head>
<body>
    <center>
<br><br><br>
<?php
session_start();
echo"<h3><u>Details</u></h3>";
echo"<h4>First name : ".$_SESSION['fname']."</h4>";
echo"<h4>Last name : ".$_SESSION['lname']."</h4>";
echo"<h4>Email id : ".$_SESSION['email']."</h4>";
echo"<h4>Mobile No : ".$_SESSION['mob']."</h4>";
echo"<h4>Age : ".$_SESSION['age']."</h4>";
echo"<h4>Gender : ".$_SESSION['gender']."</h4>";
echo"<h4>Qualification : ".$_SESSION['qn']."</h4>";
?>  
</center>
</body>
</html>