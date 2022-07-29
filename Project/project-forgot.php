<?php
session_start();
include_once("project-mysql-connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid3"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0) {
    echo "Sorry User ID does not exist!";
} else {
    $_SESSION["active_user"]=$uid;
    while($row=mysqli_fetch_array($table)) {
        $resp=SendSMS($row['mobile'],"Password:".$row['pwd']);
        echo "$resp";
    }
}
?>
