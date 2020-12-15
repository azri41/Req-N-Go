<?php 
session_start(); 
include "config.php";

	if($_POST['fever']!='Yes')
		$_POST['fever']='No';
	if($_POST['breath']!='Yes')
		$_POST['breath']='No';
	if($_POST['cough']!='Yes')
		$_POST['cough']='No';
	if($_POST['throat']!='Yes')
		$_POST['throat']='No';

if (isset($_POST['area']) && isset($_POST['fever']) && isset($_POST['breath']) && isset($_POST['cough']) && isset($_POST['throat']) && isset($_POST['symtoms']) && isset($_POST['contact'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$area = validate($_POST['area']);
	$fever = validate($_POST['fever']);
	$breath = validate($_POST['breath']);
	$cough = validate($_POST['cough']);
	$throat = validate($_POST['throat']);
	$symtoms = validate($_POST['symtoms']);
	$contact = validate($_POST['contact']);


	if($fever=='Yes' || $breath=='Yes' || $cough=='Yes' || $throat=='Yes' || $area=='Yes' || $contact=='Yes'){
		$status='Bad';
	}else{
		$status='Good';
	}

	if (empty($area)) {
		header("Location: form.php?error1=Question No.1 is required");
	    exit();
	}
	else if(empty($contact)){
        header("Location: form.php?error2=Question No.3 is required");
	    exit();
	}
	else{
        $sql = "INSERT INTO health (IsFever, IsCough, IsSore_Throat, IsDifficult_Breath, OtherSymtoms, CloseContact, IsRed_Area, Health_Status) VALUES ('$fever', '$cough', '$throat', '$breath', '$symtoms', '$contact', '$area', '$status')";
		$result = mysqli_query($conn, $sql);
        if ($result) {
    		header("Location: form.php?success=The form already sumbit. Thank you!");
	        exit();
        }else {
	        header("Location: form.php?error=unknown error occurred");
		    exit();
        }
	}
	
}else{
	header("Location: form.php?error=Incomplete Input. Please answer question 1 and 3.");
	exit();
}
