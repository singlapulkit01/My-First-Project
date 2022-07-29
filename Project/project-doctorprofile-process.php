<?php
include_once("project-mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="Update")
    doupdate($conn);
else
    dosubmit($conn);
function dosubmit($conn) {
    $uid=$_POST["uid"];
    $name=$_POST["name"];
    $mob=$_POST["mob"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $qualification=$_POST["qualification"];
    $exp=$_POST["exp"];
    $spl=$_POST["spl"];
    $orgname1=$_FILES["ppic1"]["name"];
    $orgname1=$uid."-".$orgname1;
    $orgname2=$_FILES["ppic2"]["name"];
    $orgname2=$uid."-".$orgname2;
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
    move_uploaded_file($tmppath1,"uploads/".$orgname1);
    move_uploaded_file($tmppath2,"uploads/".$orgname2);
    $query="insert into doctors values('$uid','$name','$mob','$email','$address','$state','$city','$qualification','$exp','$spl','$orgname1','$orgname2',current_date())";
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
    $name=$_POST["name"];
    $mob=$_POST["mob"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $qualification=$_POST["qualification"];
    $strqualification="";
    $exp=$_POST["exp"];
    $spl=$_POST["spl"];
    $oldPicName1=$_POST["hdnbox1"];
    $oldPicName2=$_POST["hdnbox2"];
    $orgname1=$_FILES["ppic1"]["name"];
    $orgname2=$_FILES["ppic2"]["name"];
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
    if($orgname1=="") {
        $finalPicName1=$oldPicName1;
    } else {
        $finalPicName1=$uid."-".$orgname1;
        move_uploaded_file($tmppath1,"uploads/".$finalPicName1);
    }
    if($orgname2=="") {
        $finalPicName2=$oldPicName2;
    } else {
        $finalPicName2=$uid."-".$orgname2;
        move_uploaded_file($tmppath2,"uploads/".$finalPicName2);
    }
    $query="update doctors set name='$name',mob='$mob',email='$email',address='$address',state='$state',city='$city',qualification='$qualification',exp='$exp',spl='$spl',prev1='$finalPicName1',prev2='$finalPicName2',date=current_date() where uid='$uid'";
    mysqli_query($conn,$query);
	$msg=mysqli_error($conn);
	if($msg=="") {
        echo "Record Updated Successfullyyyyy";
    } else {
		echo $msg;
    }
}
?>
