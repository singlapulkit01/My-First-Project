<?php
include_once("project-mysql-connection.php");
$btn=$_POST["btn"];
if($btn=="Submit") {
    dosubmit($conn);
} else {
    doupdate($conn);
}
function dosubmit($conn) {
    $uid=$_POST["uid"];
    $pname=$_POST["pname"];
    $contact=$_POST["contact"];
    $maxd=$_POST["maxd"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $selpets=$_POST["selpets"];
    $oinfo=$_POST["oinfo"];
    $orgname1=$_FILES["ppic1"]["name"];
    $orgname1=$uid."-".$orgname1;
    $orgname2=$_FILES["ppic2"]["name"];
    $orgname2=$uid."-".$orgname2;
    $orgname3=$_FILES["ppic3"]["name"];
    $orgname3=$uid."-".$orgname3;
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
    $tmppath3=$_FILES["ppic3"]["tmp_name"];
    move_uploaded_file($tmppath1,"uploads/".$orgname1);
    move_uploaded_file($tmppath2,"uploads/".$orgname2);
    move_uploaded_file($tmppath3,"uploads/".$orgname3);
    $query="insert into shelter values('$uid','$pname','$contact','$address','$city','$maxd','$selpets','$info','$orgname1','$orgname2','$orgname3',current_date())";
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
    $pname=$_POST["pname"];
    $contact=$_POST["contact"];
    $maxd=$_POST["maxd"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $selpets=$_POST["selpets"];
    $oinfo=$_POST["oinfo"];
    $oldPicName1=$_POST["hdnbox1"];
    $oldPicName2=$_POST["hdnbox2"];
    $oldPicName3=$_POST["hdnbox3"];
    $orgname1=$_FILES["ppic1"]["name"];
    $orgname2=$_FILES["ppic2"]["name"];
    $orgname3=$_FILES["ppic3"]["name"];
    $tmppath1=$_FILES["ppic1"]["tmp_name"];
    $tmppath2=$_FILES["ppic2"]["tmp_name"];
    $tmppath3=$_FILES["ppic3"]["tmp_name"];
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
    if($orgname3=="") {
        $finalPicName3=$oldPicName3;
    } else {
        $finalPicName3=$uid."-".$orgname3;
        move_uploaded_file($tmppath3,"uploads/".$finalPicName3);
    }
    $query="update shelter set pname='$pname',contact='$contact',address='$address',city='$city',maxd='$maxd',selpets='$selpets',oinfo='$oinfo',pic1='$finalPicName1',pic2='$finalPicName2',pic3='$finalPicName3',date=current_date() where uid='$uid'";
    mysqli_query($conn,$query);
	$msg=mysqli_error($conn);
	if($msg=="") {
        echo "Record Updated Successfullyyyyy";
    } else {
		echo $msg;
    }
}