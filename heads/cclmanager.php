<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if(isset($_POST['apply'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
	$role="staff";
	$sql="SELECT FirstName,LastName,emp_id from tblemployees where role='$role'";
	$query = mysqli_query($conn, $sql) or die(mysqli_error());
	$cnt=1;
	while ($row = mysqli_fetch_array($query)) {
		$name=$row["FirstName"].$row["LastName"];

		if(in_array($name,$_POST['check_list'],false))
		{
			$id=$row['emp_id'];
			$status=1;
			$result = mysqli_query($conn,"update tblemployees set cclgrant='$status' where emp_id = '$id'");
					if ($result) {
					   } else{
						 die(mysqli_error());
					  }
		}
		else
		{
			$id=$row['emp_id'];
			$status=0;
			$result = mysqli_query($conn,"update tblemployees set cclgrant='$status' where emp_id = '$id'");
					if ($result) {
					   } else{
						 die(mysqli_error());
					  }
		}
	}
}
}
?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/images-removebg-preview.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

	<?php include('includes/right_sidebar.php')?>

	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Staff Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">CCL Manager</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Staff Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form method="post" action="#">
                            <?php 
                            $role="staff";
                            $sql="SELECT FirstName,LastName,emp_id from tblemployees where role='$role'";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                            $cnt=1;
                            while ($row = mysqli_fetch_array($query)) {
								$data[$row['emp_id']]=$row["FirstName"].$row["LastName"];
                            ?>
                            <input type="checkbox" name="check_list[]" value=<?php echo htmlentities ($row["FirstName"].$row["LastName"]) ?>><label><?php echo htmlentities ($row["FirstName"].$row["LastName"]) ?></label><br/>
                            <?php $cnt++;} ?>
                            <div class="modal-footer justify-content-center">
							<button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Apply&nbsp;Leave</button>
							</div>
						</form>
					</div>
				</div>

			</div>
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->
	<?php include('includes/scripts.php')?>
</body>
</html>