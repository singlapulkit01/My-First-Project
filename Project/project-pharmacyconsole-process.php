<?php
include_once("project-mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="Send")
    dosubmit($conn);
else
    doupdate($conn);
function dosubmit($conn) {
    $uid=$_POST["uid"];
    $fname=$_POST["fname"];
    $mob=$_POST["mob"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $licence=$_POST["licence"];
    $orgname=$_FILES["qrpic"]["name"];
    $orgname=$uid."-".$orgname;
    $tmppath=$_FILES["qrpic"]["tmp_name"];
    move_uploaded_file($tmppath,"uploads/".$orgname);
    $query="insert into pharmacy values('$uid','$fname','$mob','$address','$city','$licence','$orgname',current_date())";
    mysqli_query($conn,$query);
	$msg=mysqli_error($conn);
	if($msg=="") {
        echo "Record Inserted Successfullyyyyy";
    } else {
		echo $msg;
    }
}
function doupdate($conn) {
    $uid=$_POST["uid"];
    $fname=$_POST["fname"];
    $mob=$_POST["mob"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $licence=$_POST["licence"];
    $oldPicName=$_POST["hdnbox"];
    $orgname=$_FILES["qrpic"]["name"];
    $tmppath=$_FILES["qrpic"]["tmp_name"];
    if($orgname=="") {
        $finalPicName=$oldPicName;
    } else {
        $finalPicName=$uid."-".$orgname;
        move_uploaded_file($tmppath,"uploads/".$finalPicName);
    }
    $query="update pharmacy set fname='$fname',mob='$mob',address='$address',city='$city',licence='$licence',qrpic='$finalPicName',date=current_date() where uid='$uid'";
    mysqli_query($conn,$query);
	$msg=mysqli_error($conn);
	if($msg=="") {
        echo "Record Updated Successfullyyyyy";
    } else {
		echo $msg;
    }
}
?>
