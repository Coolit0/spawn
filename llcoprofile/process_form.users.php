<?php

require './config.php';
$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $region=trim($_POST['region']);
  $email_id = trim($_POST['email_address']);
  $contact_no1 = trim($_POST['contact_no1']);
  $username = trim($_POST['username']);
  $password = trim($_POST['pw']);
  $error = FALSE;


  if (!$error) {
	 
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `region`, `contact_no1`, `email_address`, `username`, `pw`) VALUES "
            . "( :fname, :lname, :region, :contact1, :email, :username, :pw)";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);
      $stmt->bindValue(":lname", $last_name);
	  $stmt->bindValue(":region", $region);
      $stmt->bindValue(":contact1", $contact_no1);
      $stmt->bindValue(":email", $email_id);
	  $stmt->bindValue(":username", $username);
	  $stmt->bindValue(":pw", $password);
	  

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact added successfully.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Failed to add contact.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "failed to upload image.";
  }
  header("location:index_users.php");
} elseif ( $mode == "update_old" ) {
  
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $region=trim($_POST['region']);
  $email_id = trim($_POST['email_address']);
  $contact_no1 = trim($_POST['contact_no1']);
  $username = trim($_POST['username']);
  $password = trim($_POST['pw']);
  $cid = trim($_POST['cid']);
  $error = FALSE;


  if (!$error) { 
	 
    $sql = "UPDATE `users` SET `first_name` = :fname, `last_name` = :lname, `region` = :region, `contact_no1` = :contact1, `email_address` = :email, `username` = :username, `pw` = :pw "
            . "WHERE contact_id = :cid ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);
      $stmt->bindValue(":lname", $last_name);
	  $stmt->bindValue(":region", $region);
      $stmt->bindValue(":contact1", $contact_no1);
      $stmt->bindValue(":email", $email_id);
	  $stmt->bindValue(":username", $username);
	  $stmt->bindValue(":pw", $password);
      $stmt->bindValue(":cid", $cid);

      // execute Query
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to contact.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "Failed to upload image.";
  }
  header("location:index_users.php?pagenum=".$_POST['pagenum']);
} elseif ( $mode == "delete" ) {
   $cid = intval($_GET['cid']);
   
   $sql = "DELETE FROM `users` WHERE contact_id = :cid";
   try {
     
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":cid", $cid);
        
       $stmt->execute();  
       $res = $stmt->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Contact deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete contact.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:index_users.php?pagenum=".$_GET['pagenum']);
}
?>