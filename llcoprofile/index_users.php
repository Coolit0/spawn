<?php

session_start();
ini_set('display_errors',1);
include_once './config.php';
include_once 'dbconnect.php';
include_once 'utilities.php';
include './header.php';

if (isset($_SESSION['message'])) {
	if ($_SESSION['message']) {
		print message($_SESSION['message']);
		$_SESSION['message'] = array();
	}
}

if ($_SESSION['dbconn']) {
	if ($_SESSION['user']['username']){
		$loginbutton="<a href='logout.php'><span class='glyphicon glyphicon-log-out'><b> Logout</b></span></a>";
	}	else {
		$loginbutton="<a href='loginform.php'><span class='glyphicon glyphicon-log-in'><b> Login</b></span></a>";
	}
}

//Can Add	
	if ($_SESSION['dbconn']) {
	if ($_SESSION['user']['can_add'] or $_SESSION['user']['admin']){
		$add_button="<a href='contacts.users.php'><span class='glyphicon glyphicon-pencil'> Add New User </span></a>";
		$can_add=1;
		} else {
			$add_button=null;
			$can_add=0;
			}
	}
	
//Can Edit
	if ($_SESSION['dbconn']) {
	if ($_SESSION['user']['can_edit'] or $_SESSION['user']['admin']){
		$edit_table_head="<th>Edit</th>";
		$can_edit=1;
	} else {
		$edit_table_head=null;
		$can_edit=0;
		}
}

//Can Delete	
	if ($_SESSION['dbconn']) {
	if ($_SESSION['user']['can_delete'] or $_SESSION['user']['admin']){
		$delete_table_head="<th>Delete</th>";
		$can_delete=1;
	} else {
		$delete_table_head=null;
		$can_delete=0;
		}
}			


/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 10;


try {
	$keyword = trim($_GET["keyword"]);
	if ($keyword <> ""){
    $sql = "SELECT * FROM users WHERE user_id <=19 AND " . " (last_name LIKE :keyword) ORDER BY last_name ";
    $stmt = $DB->prepare($sql);
    
    $stmt->bindValue(":keyword", $keyword."%");
		} 

  else {
    $sql = "SELECT * FROM users WHERE user_id <=19 ORDER BY last_name ";
    $stmt = $DB->prepare($sql);
  }
 
  $stmt->execute();
  $total_count = count($stmt->fetchAll());
  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";
  $stmt = $DB->prepare($sql2);
  
  if ($keyword <> "" ) {
    $stmt->bindValue(":keyword", $keyword."%");
   }
   
  $stmt->execute();
  $results = $stmt->fetchAll();
} 
  catch (Exception $ex) {
  echo $ex->getMessage();
  }   


/*******PAGINATION CODE ENDS*****************/
?>
<div class="row">
<?php if ($ERROR_MSG <> "") { ?>
    <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
      <button data-dismiss="alert" class="close" type="button">×</button>
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>
<br>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Labor Laws Compliance Officers</h3>
    </div>
	
<div class="panel-body">
<div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
	  <div class="pull-left"><a href="index_admin.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Home</button></a>
		<a href="index_users.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Users</button></a>
	  <?php if ($can_add) { 
		echo $add_button;} ?>	
	  </div>
 
	<form action="index_users.php" method="get" >
        <div class="pull-right"style="padding-left: 0;">
          <span class="pull-left">  
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search by Last Name" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
          </span>
			<button class="btn btn-primary">Search</button>
			<?php echo $loginbutton;?>

		</div>
	</form>
</div>
	  
<div class="clearfix"></div>
<?php if (count($results) > 0) { ?>
        <div class="table-responsive">
		<br>
          <table class="table table-striped table-hover table-bordered ">
            <tbody>
			<tr>
				<th>Region</th>
				<th>Last Name</th>
                <th>First Name</th>
				<th>Username</th>
				<?php if ($can_edit) {
					  echo $edit_table_head; }
					  if ($can_delete){
					  echo $delete_table_head;}
		    	?> 
             </tr>

			 
<?php foreach ($results as $res) { ?>
                <tr>
				  <td><?php echo $res["region"];?></td>
				  <td><?php echo $res["last_name"]; ?></td>
				  <td><?php echo $res["first_name"]; ?></td>
				  <td><?php echo $res["username"];?></td>

				  <?php if ($can_edit){ ?>
				  <td><a href="contacts.users.php?m=update&cid=<?php echo $res["contact_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;</td>
				  <?php } ?>
				  <?php if ($can_delete){ ?>
				  <td><a href="process_form.users.php?mode=delete&cid=<?php echo $res["contact_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;</td>
				  <?php } ?>
			  
			   </tr>

<?php } ?>
	     </tbody></table>
        </div>
  <div class="col-lg-12 center">
  <ul class="pagination pagination-sm">
  <?php
  //Show page links
  for ($i = 1; $i <= $last; $i++) {
    if ($i == $pagenum) {
      ?>
                <li class="active"><a href="javascript:void(0);" ><?php echo $i ?></a></li>
                <?php } else { ?>
                <li><a href="index_users.php?pagenum=<?php echo $i; ?>&keyword=<?php echo $_GET["keyword"]; ?>" class="links"  onclick="displayRecords('<?php echo $page_limit; ?>', '<?php echo $i; ?>');" ><?php echo $i ?></a></li>
                <?php }      } ?>

   </ul>
   </div>

        <?php } else { ?>
        <div class="well well-lg">No contacts found.</div>
<?php } ?>
    </div>
  </div>
</div>
     <?php include './footer.php'; ?>