<?php
session_start();
include 'config.php';
if (isset($_SESSION['user']['username'])){
	header('Location: '.SITE_URL);
}
ini_set('display_errors',0);
include_once 'config.php';
include_once 'utilities.php';

$page_title="Login";

include 'logindesign.php';

if (isset($_SESSION['message'])) {
	if ($_SESSION['message']) {
		print message($_SESSION['message']);
		$_SESSION['message'] = array();
	}
}

?>
<!--<h3 class='panel-title'><center>Please sign in</center></h3>-->
<center><img src="dole logo3.png" alt="DOLE logo"/></center>
<div class='container'>
	<div class='row'>
		<div class='col-md-offset-4 col-md-4 col-md-offset-4'> 
			<!--<div class='panel panel-default'>-->
				<!--<div class='panel-heading'><h2 class='panel-title'>Please sign in</h2></div>-->
							
				<!--<div class='panel-body'>-->
					<form class='form-horizontal' method='post' action='authenticate.php'>
						<div class='form-group'>
							<!--<label for='username' class='col-md-4 form-control-label'>Username</label>-->
							<div class='col-md-11'>
								<input type='text' name='username' placeholder='Username'class='form-control'style="height: 38px;">
							</div>
						</div>
						<div class='form-group'>
							<!--<label for='password' class='col-md-4 form-control-label'>Password</label>-->
							<div class='col-md-11'>
								<input type='password' name='password' placeholder='Password' class='form-control'style="height: 38px;">
							</div>
						</div>
						<div class='form-group'>
							<div class='col-md-offset-7 col-md-11'>
								<button type='submit' class='btn btn-primary'>
								Login
								</button>
							</div>
					</form>
						</div>
				<!--</div>-->
			<!--</div>-->
		</div>
</div>


<!--include 'footer.php';-->
<br><br><br><br><br>
    <footer>
      <div class="navbar navbar-inverse footer">
        <div class="container-fluid">
          <div class="copyright">
            <a href="http://bwc.dole.gov.ph" target="_blank">&copy; Bureau of Working Conditions - <?php echo date("Y"); ?></a> All Rights Reserved
          </div>
        </div>
      </div>
    </footer>

    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php