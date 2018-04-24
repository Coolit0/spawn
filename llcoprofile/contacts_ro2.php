<?php

require_once './config.php';
include './header.php';
try {
   $sql = "SELECT * FROM tbl_contacts WHERE 1 AND contact_id = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<div class="row">
  <ul class="breadcrumb">
      <li><a href="index_ncr.php">Home</a></li>
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> Contacts</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New Contact</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="process_form.ncr.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="old_pic" value="<?php echo $results[0]["profile_pic"] ?>" >
          <input type="hidden" name="cid" value="<?php echo intval($results[0]["contact_id"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>
            
			<div class="form-group">
              <label class="col-lg-4 control-label" for="first_name"><span class="required">*</span>First Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["first_name"] ?>" placeholder="First Name" id="first_name" class="form-control" name="first_name"><span id="first_name_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="middle_name">Middle Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["middle_name"] ?>" placeholder="Middle Name" id="middle_name" class="form-control" name="middle_name">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="last_name"><span class="required">*</span>Last Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["last_name"] ?>" placeholder="Last Name" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-4 control-label" for="sex">Sex:</label>
              <div class="col-lg-5"><td><input type="radio" name="sex" value = "M" <?php if ($results[0]["sex"] == "M") {echo "checked";} ?>/>                Male </div>
			  <div class="col-lg-5"><td><input type="radio" name="sex" value = "F" <?php if ($results[0]["sex"] == "F") {echo "checked";} ?>/>                Female</div>
			</div>			
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="status">Status:</label>
			  <br>
				<div class="col-lg-5">			
					<select name="status">
						<option value="">Select Status</option>
						<option <?php if($results[0]['status']=="Active"){echo "selected";}?>>Active</option>
						<option <?php if($results[0]['status']=="Deactivated"){echo "selected";}?>>Deactivated</option>
						<option <?php if($results[0]['status']=="Transferred"){echo "selected";}?>>Transferred</option>
						<option <?php if($results[0]['status']=="Resigned"){echo "selected";}?>>Resigned</option>
						<option <?php if($results[0]['status']=="Complement"){echo "selected";}?>>Complement</option>
					</select>
				</div>
			</div>
					
				
			<div class="form-group">
              <label class="col-lg-4 control-label" for="position">Position:</label>
              <div class="col-lg-5"><td><input type="radio" name="position" value = "LEO III" <?php if ($results[0]["position"] == "LEO III") {echo "checked";} ?>/>                    LEO III</div>
			  <div class="col-lg-5"><td><input type="radio" name="position" value = "Senior LEO" <?php if ($results[0]["position"] == "Senior LEO") {echo "checked";} ?>/>              Senior LEO</div>
			</div>
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="course">Basic Course for LLCOs:</label>
              <div class="col-lg-5">
				<input type="text" value="<?php echo $results[0]["course"] ?>" placeholder="Level 1A and/or Level 1B" id="course" class="form-control" name="course"><span id="course_err" class="error"></span>
              </div>
            </div>	
			
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="rating">Last Performance Rating:</label>
				<div class="col-lg-5">			
					<select name="rating">
						<option value="">Select Rating</option>
						<option <?php if($results[0]['rating']=="Very Satisfactory"){echo "selected";}?>>Very Satisfactory</option>
						<option <?php if($results[0]['rating']=="Satisfactory"){echo "selected";}?>>Satisfactory</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="cert">Issued with Certificate of Good Standing:</label>
              <div class="col-lg-5"><td><input type="radio" name="cert" value = "Yes" <?php if ($results[0]["cert"] == "Yes") {echo "checked";} ?>/>                    Yes</div>
			  <div class="col-lg-5"><td><input type="radio" name="cert" value = "No" <?php if ($results[0]["cert"] == "No") {echo "checked";} ?>/>              	No</div>
			</div>	
				
			<div class="form-group">
              <label class="col-lg-4 control-label" for="office_assgn">Office Assignment:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["office_assgn"] ?>" placeholder="Office Assignment" id="office_assgn" class="form-control" name="office_assgn"><span id="office_assgn_err" class="error"></span>
              </div>
            </div>		
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="profession">Education:</label>
              <div class="col-lg-5">
			  <textarea id="profession" name="profession" rows="3" class="form-control" placeholder="Education"><?php echo $results[0]["profession"] ?></textarea>
              </div>
            </div>	
	
			<div class="form-group">
              <label class="col-lg-4 control-label" for="duties">Duties/Programs Handled:</label>
              <div class="col-lg-5">
			  <textarea id="duties" name="duties" rows="3" class="form-control" placeholder="Duties"><?php echo $results[0]["duties"] ?></textarea>
              </div>
            </div>	
		
			<div class="form-group">
              <label class="col-lg-4 control-label" for="birthday"><span class="required">*</span>Birthday:</label>
              <div class="col-lg-5">
                <input type="date" value="<?php echo $results[0]["birthday"] ?>" placeholder="Birthday" id="birthday" class="form-control" name="birthday"><span id="birthday_err" class="error"></span>
              </div>
            </div>	

	
            <div class="form-group">
              <label class="col-lg-4 control-label" for="email_address"><span class="required">*</span>Email Address:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["email_address"] ?>" placeholder="Email Address" id="email_address" class="form-control" name="email_address"><span id="email_address_err" class="error"></span>
              </div>
            </div>
			
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no1"><span class="required">*</span>Contact Number 1:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["contact_no1"] ?>" placeholder="Contact Number" id="contact_no1" class="form-control" name="contact_no1"><span id="contact_no1_err" class="error"></span>
				<span class="help-block">Maximum of 11 digits only.</span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no2">Contact Number 2:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["contact_no2"] ?>" placeholder="Contact Number" id="contact_no2" class="form-control" name="contact_no2"><span id="contact_no2_err" class="error"></span>
                <span class="help-block">Enter valid contact number.</span>		
              </div>
            </div>	
			
            <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic">Profile picture:</label>
              <div class="col-lg-5">
                <input type="file"  id="profile_pic" class="form-control file" name="profile_pic"><span id="profile_pic_err" class="error"></span>
                <span class="help-block">Must me jpg, jpeg, png, gif, bmp image only.</span>
              </div>
            </div>
            
            <?php if ($_GET["m"] == "update") { ?>
            <div class="form-group">
              <div class="col-lg-1 col-lg-offset-4">
                <?php $pic = ($results[0]["profile_pic"] <> "" ) ? $results[0]["profile_pic"] : "no_avatar.png" ?>
                <a href="profile_pics/<?php echo $pic ?>" target="_blank"><img src="profile_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>
            <?php 
            }
            ?>
            
            
            <div class="form-group">
              <div class="col-lg-5 col-lg-offset-4">
                <button class="btn btn-primary" type="submit">Submit</button>
				<a href="index_ncr.php">Cancel</a> 
              </div>
            </div>
          </fieldset>
        </form>

      </div>
    </div>
  </div>

<script type="text/javascript">
$(document).ready(function() {
	
	// the fade out effect on hover
	$('.error').hover(function() {
		$(this).fadeOut(200);  
	});
	
	
	$("#contact_form").submit(function() {
		$('.error').fadeOut(200);  
		if(!validateForm()) {
            // go to the top of form first
            $(window).scrollTop($("#contact_form").offset().top);
			return false;
		}     
		return true;
    });

});

function validateForm() {
	 var errCnt = 0;
	 
	 var first_name = $.trim( $("#first_name").val());
     var last_name = $.trim( $("#last_name").val());
	 var email_id = $.trim( $("#email_id").val());
	 var contact_no1 = $.trim( $("#contact_no1").val());
	 var contact_no2 = $.trim( $("#contact_no2").val());
     
	 var profile_pic =  $.trim( $("#profile_pic").val());

	// validate name
	if (first_name == "" ) {
		$("#first_name_err").html("Enter your first name.");
		$('#first_name_err').fadeIn("fast"); 
		errCnt++;
	}  else if (first_name.length <= 2 ) {
		$("#first_name_err").html("Enter atleast 3 letter.");
		$('#first_name_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (last_name == "" ) {
		$("#last_name_err").html("Enter your last name.");
		$('#last_name_err').fadeIn("fast"); 
		errCnt++;
	}  else if (last_name.length <= 2 ) {
		$("#last_name_err").html("Enter atleast 3 letter.");
		$('#last_name_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (!isValidEmail(email_address)) {
		$("#email_address_err").html("Enter valid email.");
		$('#email_address_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (contact_no1 == "" ) {
		$("#contact_no1_err").html("Enter contact number.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	}  else if (contact_no1.length <= 10 || contact_no1.length > 11 ) {
		$("#contact_no1_err").html("Enter 11 digits only.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(contact_no1) ) {
		$("#contact_no1_err").html("Must be digits only.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (contact_no2.length > 0) {
      if (contact_no2.length <= 10 || contact_no2.length > 11 ) {
		$("#contact_no2_err").html("Enter digits only.");
		$('#contact_no2_err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(contact_no2) ) {
		$("#contact_no2_err").html("Must be digits only.");
		$('#contact_no2_err').fadeIn("fast"); 
		errCnt++;
	}
    }
    
    
    if (profile_pic.length > 0) {
        var exts = ['jpg','jpeg','png','gif', 'bmp'];
		var get_ext = profile_pic.split('.');
		get_ext = get_ext.reverse();
        
       
        if ($.inArray ( get_ext[0].toLowerCase(), exts ) <= -1 ){
          $("#profile_pic_err").html("Must me jpg, jpeg, png, gif, bmp image only..");
          $('#profile_pic_err').fadeIn("fast"); 
        }
       
    }
    
	if(errCnt > 0) return false; else return true;
}

function isValidEmail(email_address) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>
<?php
include './footer.php';
?>