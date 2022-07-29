<?php
session_start();
include_once("project-mysql-connection.php");
$uid2=$_GET["uid2"];
$pass2=$_GET["pass2"];
$query="select * from users where uid='$uid2' AND pwd='$pass2'";
$table=mysqli_query($conn,$query);
$count=mysqli_num_rows($table);
if($count==0) {
    echo "Please check User ID and Password";
} else {
    $_SESSION["active_user"]=$uid2;
    while($row=mysqli_fetch_array($table)) {
        echo $row['type'];
    }
}
?>
