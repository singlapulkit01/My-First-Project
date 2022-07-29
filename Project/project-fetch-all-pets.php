<?php
include_once("project-mysql-connection.php");
$query="select distinct pet from sellpet";
$table=mysqli_query($conn,$query);
$ary=array();
while($record=mysqli_fetch_array($table)) {
    $ary[]=$record;//each record is stored in array
}
echo json_encode($ary);
?>
