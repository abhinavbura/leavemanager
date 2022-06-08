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



function geDate($start_date, $end_date) {
	$cnt=0;
   $today=date("d-m-Y");
   $dates=array();
   $sql = "SELECT fromdate, status from calender";
	$query = $dbh -> prepare($sql);
	$query->execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{
                            echo $result->fromdate."<br>";
                            $daa=strtotime($result->fromdate);
                            $dates[$daa]=$result->status;

                  } }
    var_dump($dates);
	while (strtotime($start_date) <= strtotime($end_date)) {
        $check=false;
		$timestamp = strtotime($start_date);
		echo $timestamp."<br>";
        $day = date('D', $timestamp);
		if(array_key_exists($timestamp,$dates))
        {
            echo $timestamp."-->".$dates[$timestamp];

            if($dates[$timestamp]!='holiday')
            {
                $check=true;
            }
        }
		if($day!="Sun" && !array_key_exists($timestamp,$dates) && $check)
		{
			$cnt++;
		}

		$start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
	}
	return $cnt;
  }

?>