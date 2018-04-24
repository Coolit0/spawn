<?php

$link = mysqli_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
if (!$link) {
	$message = "Cannot connect to the database.";
	$_SESSION['message'] = array('danger',$message);
} else {
	$_SESSION['dbconn'] = $link;
}


