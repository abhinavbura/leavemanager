<?php include('includes/session.php')?>
<?php include('includes/config.php')?>

<form action="#" method="post">
<input type="checkbox" name="check_list[]" value="data"><label>C/C++</label><br/>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
<input type="checkbox" name="check_list[]" value="no"><label>PHP</label><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
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
	}
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}
}
}
?>

<!-- <?php
	$data=array();
	if(isset($_POST['apply']))
	{
		$choice=array();
		echo "checkone";
		echo sizeof($data);
			
				foreach($data as $id => $name)
				{
					echo "check two";
					if(true)
					{
						$status=0;
					}
					else
					{
						$status=1;
					}
					$result = mysqli_query($conn,"update tblemployees set cclgrant='$status' where empid = '$id'");
					if ($result) {
						echo "<script>alert('Leave updated Successfully');</script>";
					   } else{
						 die(mysqli_error());
					  }
				}
			}
			
	
	

?> -->
<form method="post" action="#">
                            <?php 
                            $role="staff";
                            $sql="SELECT FirstName,LastName,emp_id from tblemployees where role='$role'";
                            $query = mysqli_query($conn, $sql) or die(mysqli_error());
                            $cnt=1;
                            while ($row = mysqli_fetch_array($query)) {
								array_push($data,$row);
                            ?>
                            <input type="checkbox" name="check_list[]" value=<?php echo htmlentities ($row["FirstName"].$row["LastName"]) ?>><label><?php echo htmlentities ($row["FirstName"].$row["LastName"]) ?></label><br/>
                            <?php $cnt++;} ?>
                            <div class="modal-footer justify-content-center">
							<button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Apply&nbsp;Leave</button>
							</div>
						</form>


						