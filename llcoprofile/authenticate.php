<?php
session_start();
ini_set('display_errors',0);
include 'config.php';
include 'dbconnect.php';
include 'utilities.php';

if ($_POST) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$query="SELECT * FROM users WHERE username='".$username."'
				AND password='".$password."'";
	$result=mysqli_query($_SESSION['dbconn'],$query);
	$record=mysqli_fetch_assoc($result);
	if ($record){
		$_SESSION['user']= array();
		$_SESSION['user']['username']=$record['username'];
		$_SESSION['user']['admin']=$record['admin'];
		$_SESSION['user']['can_view']=$record['can_view'];
		$_SESSION['user']['can_add']=$record['can_add'];
		$_SESSION['user']['can_edit']=$record['can_edit'];
		$_SESSION['user']['can_delete']=$record['can_delete'];
		$_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Welcome ".$_SESSION['user']['username'];
		header('Location:'.SITE_URL);

	
	if ($_SESSION['user']['ncr']=$record['ncr']){
		header ('Location:'.NCR_ADMIN); 
	}

	if ($_SESSION['user']['ncr_admin']=$record['ncr_admin']){
		header ('Location:'.NCR_BWC_ADMIN);
	}
	
	if ($_SESSION['user']['car']=$record['car']){
		header ('Location:'.CAR_ADMIN);
	}
	
	if ($_SESSION['user']['ro1']=$record['ro1']){
		header ('Location:'.RO1_ADMIN);
	}
	
	if ($_SESSION['user']['ro2']=$record['ro2']){
		header ('Location:'.RO2_ADMIN);
	}
	
	if ($_SESSION['user']['ro3']=$record['ro3']){
		header ('Location:'.RO3_ADMIN);
	}
	
	if ($_SESSION['user']['ro4a']=$record['ro4A']){
		header ('Location:'.RO4A_ADMIN);
	}
	
	if ($_SESSION['user']['ro4b']=$record['ro4b']){
		header ('Location:'.RO4B_ADMIN);
	}
	
	if ($_SESSION['user']['ro5']=$record['ro5']){
		header ('Location:'.RO5_ADMIN);
	}
	
	if ($_SESSION['user']['ro6']=$record['ro6']){
		header ('Location:'.RO6_ADMIN);
	}
	
	if ($_SESSION['user']['ro7']=$record['ro7']){
		header ('Location:'.RO7_ADMIN);
	}
	
	if ($_SESSION['user']['ro8']=$record['ro8']){
		header ('Location:'.RO8_ADMIN);
	}
	
	if ($_SESSION['user']['ro9']=$record['ro9']){
		header ('Location:'.RO9_ADMIN);
	}
	
	if ($_SESSION['user']['ro10']=$record['ro10']){
		header ('Location:'.RO10_ADMIN);
	}
	
	if ($_SESSION['user']['ro11']=$record['ro11']){
		header ('Location:'.RO11_ADMIN);
	}
	
	if ($_SESSION['user']['ro12']=$record['ro12']){
		header ('Location:'.RO12_ADMIN);
	}
	
	if ($_SESSION['user']['ro13']=$record['ro13']){
		header ('Location:'.RO13_ADMIN);
	}
}
	
	else{
		$_SESSION['message']=array('danger','User cannot be logged!');
		header('Location:'.LOGIN);
		}
}