<?php include('includes/session.php')?>

<?php 

$timestamp = strtotime('2009-10-22');
$day = date('l', $timestamp);
echo $day."<br>";
?>


<?php

echo geDate($end_date,$start_date)."<br>";




?>