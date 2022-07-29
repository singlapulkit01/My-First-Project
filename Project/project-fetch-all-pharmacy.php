<?php
include_once("project-mysql-connection.php");
$city=$_GET["city"];
$query="select * from pharmacy where city='$city'";
$table=mysqli_query($conn,$query);
$ary=array();
while($record=mysqli_fetch_array($table)) {
    $ary[]=$record;
}
echo json_encode($ary);
?>
