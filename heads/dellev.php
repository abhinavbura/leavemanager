<?php include('../includes/session.php')?>
<?php include('../includes/config.php')?>
<?php
$lid=intval($_GET['leaveid']);
<<<<<<< HEAD
$sql = "SELECT admin_status,empid from tblleaves where id=:lid";
=======
$sql = "SELECT admin_status from tblleaves where id=:lid";
>>>>>>> master
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    $admins=$result->admin_status;
<<<<<<< HEAD
    $empid=$result->empid;
    

}  }

if ($admins==1) {
$sql = "SELECT tblemployees.emp_id,tblleaves.num_days,tblleaves.LeaveType from tblleaves join tblemployees on tblleaves.empid=tblemployees.emp_id where tblleaves.id=:lid";
=======
    

}  }
if($admins==0)
{
    $sss=1;
    $result = mysqli_query($conn,"update tblleaves set breathing='$sss' where id='$lid'");

	if ($result) {
	echo "<script>alert('Leave updated Successfully');</script>";
	} else{
	die(mysqli_error());
	}
}
elseif ($admins==1) {
$sql = "SELECT tblemployees.emp_idtblleaves.num_days,tblleaves.LeaveType from tblleaves join tblemployees on tblleaves.empid=tblemployees.emp_id where tblleaves.id=:lid";
>>>>>>> master
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    $levtyp=$result->LeaveType;
<<<<<<< HEAD
    $empid=$result->emp_id;
=======
    $empid=$result->empid;
>>>>>>> master
    $numdays=$result->num_days;

}  }
$qname=familyName($levtyp);

<<<<<<< HEAD
$sql = "SELECT $qname from tblemployees where emp_id=:empid";
$query = $dbh -> prepare($sql);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{ 
    $left=$result->$qname;

} 
$final=$left+$numdays;
$update=mysqli_query($conn,"update tblemployees set $qname='$final' where emp_id='$empid'");
if ($update) {
	echo "<script>alert('Leave updated Successfully');</script>";
	} else{
	die(mysqli_error());
	}
}
$sss=1;
    $result = mysqli_query($conn,"update tblleaves set breathing='$sss' where id='$lid'");

	if ($result) {
	echo "<script>alert('Leave updated Successfully');</script>";
	} else{
	die(mysqli_error());
	}

header("location: index.php");
=======


}
>>>>>>> master
?>