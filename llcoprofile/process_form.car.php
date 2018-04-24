<?php

require './config.php';
$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $first_name = trim($_POST['first_name']);
  $middle_name = trim($_POST['middle_name']);
  $last_name = trim($_POST['last_name']);
  $sex = trim($_POST['sex']);
  $email_address = trim($_POST['email_address']);
  $status=trim($_POST['status']);
  $position=trim($_POST['position']);
  $course=trim($_POST['course']);
  $rating=trim($_POST['rating']);
  $cert=trim($_POST['cert']);
  $office_assgn=trim($_POST['office_assgn']);
  $profession=trim($_POST['profession']);
  $duties=trim($_POST['duties']);
  $contact_no1 = trim($_POST['contact_no1']);
  $contact_no2 = trim($_POST['contact_no2']);
  $birthday = trim($_POST['birthday']);
  $filename = "";
  $error = FALSE;
  
  if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["profile_pic"]["name"];
    $filepath = 'profile_pics/' . $filename;
    if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  }

  if (!$error) {
	 
    $sql = "INSERT INTO `tbl_contacts` (`first_name`, `middle_name`, `last_name`, `sex`, `contact_no1`, `contact_no2`, `email_address`, `status`, `position`, `course`, `rating`, `cert`, `office_assgn`, `profession`, `duties`, `profile_pic`, `birthday`) VALUES "
            . "( :fname, :mname, :lname, :sex, :contact1, :contact2, :email, :status, :position, :course, :rating, :cert, :office_assgn, :profession, :duties, :pic, :birthday)";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);
      $stmt->bindValue(":mname", $middle_name);
      $stmt->bindValue(":lname", $last_name);
	  $stmt->bindValue(":sex", $sex);
      $stmt->bindValue(":contact1", $contact_no1);
      $stmt->bindValue(":contact2", $contact_no2);
      $stmt->bindValue(":email", $email_address);
	  $stmt->bindValue(":status", $status);
	  $stmt->bindValue(":position", $position);
	  $stmt->bindValue(":course", $course);
	  $stmt->bindValue(":rating", $rating);
	  $stmt->bindValue(":cert", $cert);
	  $stmt->bindValue(":office_assgn", $office_assgn);
	  $stmt->bindValue(":profession", $profession);
	  $stmt->bindValue(":duties", $duties);
      $stmt->bindValue(":pic", $filename);
	  $stmt->bindValue(":birthday", $birthday);
	  

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
  header("location:index_car.php");
} elseif ( $mode == "update_old" ) {
  
  $first_name = trim($_POST['first_name']);
  $middle_name = trim($_POST['middle_name']);
  $last_name = trim($_POST['last_name']);
  $sex = trim($_POST['sex']);
  $email_address = trim($_POST['email_address']);
  $status = trim($_POST['status']);
  $position=trim($_POST['position']);
  $course=trim($_POST['course']);
  $rating=trim($_POST['rating']);
  $cert=trim($_POST['cert']);
  $office_assgn=trim($_POST['office_assgn']);
  $profession=trim($_POST['profession']);
  $duties=trim($_POST['duties']);
  $contact_no1 = trim($_POST['contact_no1']);
  $contact_no2 = trim($_POST['contact_no2']);
  $birthday = trim($_POST['birthday']);
  $cid = trim($_POST['cid']);
  $filename = "";
  $error = FALSE;

  if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["profile_pic"]["name"];
    $filepath = 'profile_pics/' . $filename;
    if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  } else {
     $filename = $_POST['old_pic'];
  }

  if (!$error) { 
	 
    $sql = "UPDATE `tbl_contacts` SET `first_name` = :fname, `middle_name` = :mname, `last_name` = :lname, `sex` = :sex, `contact_no1` = :contact1, `contact_no2` = :contact2, `email_address` = :email, `status` = :status, `position` = :position, `course` = :course, `rating` = :rating, `cert` = :cert, `office_assgn` = :office_assgn, `profession` = :profession, `duties` = :duties, `profile_pic` = :pic, `birthday` = :birthday "
            . "WHERE contact_id = :cid ";

    try {
      $stmt = $DB->prepare($sql);

      // bind the values
      $stmt->bindValue(":fname", $first_name);
      $stmt->bindValue(":mname", $middle_name);
      $stmt->bindValue(":lname", $last_name);
	  $stmt->bindValue(":sex", $sex);
      $stmt->bindValue(":contact1", $contact_no1);
      $stmt->bindValue(":contact2", $contact_no2);
      $stmt->bindValue(":email", $email_address);
	  $stmt->bindValue(":status", $status);
	  $stmt->bindValue(":position", $position);
	  $stmt->bindValue(":course", $course);
	  $stmt->bindValue(":rating", $rating);
	  $stmt->bindValue(":cert", $cert);
	  $stmt->bindValue(":office_assgn", $office_assgn);
	  $stmt->bindValue(":profession", $profession);
	  $stmt->bindValue(":duties", $duties);
      $stmt->bindValue(":pic", $filename);
	  $stmt->bindValue(":birthday", $birthday);
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
  header("location:index_car.php?pagenum=".$_POST['pagenum']);
} elseif ( $mode == "delete" ) {
   $cid = intval($_GET['cid']);
   
   $sql = "DELETE FROM `tbl_contacts` WHERE contact_id = :cid";
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
   
   header("location:index_car.php?pagenum=".$_GET['pagenum']);
}
?>