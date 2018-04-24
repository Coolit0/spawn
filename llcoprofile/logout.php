<?php
session_start();
include 'config.php';

if ($_SESSION['user']['username']) {
	session_destroy();
}
header('Location:'.LOGIN);