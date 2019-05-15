<?php
require_once('database_connection.php');

if(isset($_GET["session_id"])) {
   $query = "SELECT * FROM login_session_ids WHERE session_id = '".$_GET["session_id"]."'";
   $result = mysqli_query($dbc,$query);

	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_array($result);
		$lifetime = $row['lifetime'];
		$u_id = $row['u_id'];
		$date_created = $row['date_created'];
		
		$date     = strtotime($date_created);
		$current  = time();;
		$difference = $current - $date;
		
		if(($difference - $lifetime)>0)
		{
			echo '<h3>Session expired. Please log in again</h3>';
			exit;
		}
			
		mysqli_close($dbc);
	}
	else
	{
		echo '<h3>Session not started properly. Please log in using fingerprint scanner.</h3>';
	}
   
   echo "<h1>Welcome to your session </h1><br />";
}
else
{
   echo '<h3>Session not started properly. Please log in using fingerprint scanner.</h3>';
}


?>
