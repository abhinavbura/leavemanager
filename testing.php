<?php include('includes/session.php')?>
<?php include('includes/config.php')?>

<?php 

$empid=1;
$leave='Medical Leave';
$tblname=familyName($leave);
$val=3;
$name=familyName($leave);
$description='something';
$count=23;
$admremarkdate=date('d-m-Y');
$did=34;
$sql = "update tblleaves, tblemployees set tblemployees.$name='$count' where tblleaves.empid = tblemployees.emp_id AND tblleaves.id='$did'";
if ($sql) {
    echo "<script>alert('Leave updated Successfully');</script>";
   } else{
     die(mysqli_error());
  }



?>