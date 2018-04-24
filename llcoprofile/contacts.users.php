<?php

require_once './config.php';
include './header.php';
try {
   $sql = "SELECT * FROM users WHERE 1 AND contact_id = :cid";
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
      <li><a href="index_users.php">Home</a></li>
      <li class="active"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> User</li>
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New User</h3>
      </div>
      <div class="panel-body">

        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="process_form.users.php">
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
              <label class="col-lg-4 control-label" for="last_name"><span class="required">*</span>Last Name:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["last_name"] ?>" placeholder="Last Name" id="last_name" class="form-control" name="last_name"><span id="last_name_err" class="error"></span>
              </div>
            </div>
            
					
			
			<div class="form-group">
              <label class="col-lg-4 control-label" for="region">Region:</label>
			  <br>
				<div class="col-lg-5">			
					<select name="region">
						<option value="">Select Region</option>
						<option <?php if($results[0]['region']=="BWC"){echo "selected";}?>>BWC</option>
						<option <?php if($results[0]['region']=="NCR"){echo "selected";}?>>NCR</option>
						<option <?php if($results[0]['region']=="CAR"){echo "selected";}?>>CAR</option>
						<option <?php if($results[0]['region']=="RO I"){echo "selected";}?>>RO I</option>
						<option <?php if($results[0]['region']=="RO II"){echo "selected";}?>>RO II</option>
						<option <?php if($results[0]['region']=="RO III"){echo "selected";}?>>RO III</option>
						<option <?php if($results[0]['region']=="RO IV-A"){echo "selected";}?>>RO IV-A</option>
						<option <?php if($results[0]['region']=="RO IV-B"){echo "selected";}?>>RO IV-B</option>
						<option <?php if($results[0]['region']=="RO V"){echo "selected";}?>>RO V</option>
						<option <?php if($results[0]['region']=="RO VI"){echo "selected";}?>>RO VI</option>
						<option <?php if($results[0]['region']=="NIR"){echo "selected";}?>>NIR</option>
						<option <?php if($results[0]['region']=="RO VII"){echo "selected";}?>>RO VII</option>
						<option <?php if($results[0]['region']=="RO VIII"){echo "selected";}?>>RO VIII</option>
						<option <?php if($results[0]['region']=="RO IX"){echo "selected";}?>>RO IX</option>
						<option <?php if($results[0]['region']=="RO X"){echo "selected";}?>>RO X</option>
						<option <?php if($results[0]['region']=="RO XI"){echo "selected";}?>>RO XI</option>
						<option <?php if($results[0]['region']=="RO XII"){echo "selected";}?>>RO XII</option>
						<option <?php if($results[0]['region']=="CARAGA"){echo "selected";}?>>CARAGA</option>
					</select>
				</div>
			</div>	
			
			

            <div class="form-group">
              <label class="col-lg-4 control-label" for="email_id">Email Address:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["email_address"] ?>" placeholder="Email Address" id="email_address" class="form-control" name="email_address"><span id="email_address_err" class="error"></span>
              </div>
            </div>
			
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no1">Contact Number:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["contact_no1"] ?>" placeholder="Contact Number" id="contact_no1" class="form-control" name="contact_no1"><span id="contact_no1_err" class="error"></span>
                <span class="help-block">Enter valid contact number.</span>
              </div>
            </div>
            
            
			<div class="form-group">
              <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Username:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["username"] ?>" placeholder="Username" id="username" class="form-control" name="username"><span id="username_err" class="error"></span>
              </div>
            </div>			

			<div class="form-group">
              <label class="col-lg-4 control-label" for="password"><span class="required">*</span>Password:</label>
              <div class="col-lg-5">
                <input type="text" value="<?php echo $results[0]["pw"] ?>" placeholder="Password" id="pw" class="form-control" name="pw"><span id="pw_err" class="error"></span>
              </div>
            </div>				
			
            
 
            
            
            <div class="form-group">
              <div class="col-lg-5 col-lg-offset-4">
                <button class="btn btn-primary" type="submit">Submit</button>
				<a href="index_users.php">Cancel</a> 
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
    
    if (!isValidEmail(email_id)) {
		$("#email_id_err").html("Enter valid email.");
		$('#email_id_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (contact_no1 == "" ) {
		$("#contact_no1_err").html("Enter contact number.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	}  else if (contact_no1.length <= 9 || contact_no1.length > 10 ) {
		$("#contact_no1_err").html("Enter 10 digits only.");
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
    
    
	if(errCnt > 0) return false; else return true;
}

function isValidEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>
<?php
include './footer.php';
?>