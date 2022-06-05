<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','leave_staff');

$conn = mysqli_connect('localhost','root','','leave_staff') or die(mysqli_error());

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>
<?php 
function familyName($fname) {
    if($fname == "Casual Leave")
     {
        return "casual_leave";
     }
     elseif($fname == "Medical Leave")
     {
        return "medical_leave";
     }
     elseif($fname == "On Duty")
     {
        return "on_duty_leave";
     }
     elseif($fname == "paid leave")
     {
        return "paid_leave";
     }
     elseif($fname == "Compensatory Casual Leave")
     {
        return "compensatory_casual_leave";
     }
     elseif($fname == "Health Care Leave")
     {
        return "health_care_leave";
     }
     else
     {
        return "error";
     }
  }

?>