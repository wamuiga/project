<!DOCTYPE html>
<html>
<head>
      
<?php

// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)



// get the records from the database
if ($result = $mysqli->query(" SELECT   username FROM doctor ;"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table


// set table headers

$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT username, count(*) FROM doctor group by username;' ) as $row ){

    echo "<h5><CENTER>Teckets : " . $row['SUM(username)'] . "<CENTER></h5>";
    
while ($row = $result->fetch_object())
{
    echo " <div class='col-sm-6 col-lg-3'>
    <div class='card text-white bg-flat-color-1'>
        <div class='card-body pb-0'>";
    echo "<p> Doctor <br></p><p2>" . $row->username . "</p2><hr>";
  
    echo "</div></div></div>";


    
}
}

}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $mysqli->error;
}

// close database connection
$mysqli->close();

     
//

mysqli_report(MYSQLI_REPORT_ERROR);

?>




</html>