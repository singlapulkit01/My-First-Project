<?php
include_once("project-mysql-connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid1"];
$pwd=$_GET["pass1"];
$mobile=$_GET["mob1"];
$type=$_GET["type1"];
$query="insert into users value('$uid','$pwd','$mobile',current_date(),'$type')";
$table=mysqli_query($conn,$query);
$msg=mysqli_error($conn);
if($msg=="") {
    $resp=SendSMS($mobile,"User ID: $uid and Password: $pwd");
    echo "Signed Up Successfull and $resp";
} else {
    echo "Sign Up Failed";
}
?>
