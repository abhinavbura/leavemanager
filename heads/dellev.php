<?php include('../includes/session.php')?>
<?php include('../includes/config.php')?>
<?php
$lid=intval($_GET['leaveid']);
$sql = "SELECT admin_status from tblleaves where id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    $admins=$result->admin_status;
    

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
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    $levtyp=$result->LeaveType;
    $empid=$result->empid;
    $numdays=$result->num_days;

}  }
$qname=familyName($levtyp);



}
?>