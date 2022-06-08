<?php include('includes/session.php')?>
<?php include('includes/config.php')?>

<?php 

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
	echo $cnt;



?>