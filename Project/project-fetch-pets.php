<?php
include_once("project-mysql-connection.php");
$pet=$_GET["pet"];
$query="select * from sellpet where pet='$pet'";
$table=mysqli_query($conn,$query);
$ary=array();
while($record=mysqli_fetch_array($table)) {
    $ary[]=$record;
}
echo json_encode($ary);
?>
