<?php
include_once("project-mysql-connection.php");
$uid=$_GET["uid1"];
$name=$_GET["name1"];
$mob=$_GET["mob1"];
$address=$_GET["address1"];
$pet=$_GET["pet1"];
$info=$_GET["info"];
$query="insert into sellpet value('$uid','$name','$mob','$address','$pet','$info',current_date())";
$table=mysqli_query($conn,$query);
$msg=mysqli_error($conn);
if($msg=="") {
    echo "Post Added Successfully";
} else {
    echo "There Was Some Error";
}
?>
