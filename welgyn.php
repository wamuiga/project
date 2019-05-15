
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
   
   echo "<h1> </h1>";
}
else
{
   echo '<h3>Session not started properly. Please log in using fingerprint scanner.</h3>';
}


require_once 'utils.php';



if (isset($_GET["action"]) && $_GET["action"]=="new_patient") {
    $result=queryMysql("SELECT id FROM gyn WHERE exit_stamp IS NULL ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $id=$row['id'];
    
    $result=queryMysql("UPDATE `gyn` SET `exit_stamp` = CURRENT_TIMESTAMP WHERE `gyn`.`id` = $id;");


}


$result=queryMysql("SELECT COUNT(id) as remaining FROM gyn WHERE exit_stamp IS NULL;");
$row=$result->fetch_array(MYSQLI_ASSOC);
$tickets_remaining=$row['remaining'];

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "games";


$db = mysqli_connect('localhost','root','','games')
or die('Error connecting to MySQL server.');
  if (isset($_POST["send"]))
{
  $username = trim($_SESSION["username"]); 
   
   $query = "INSERT INTO gyndrtp (  username ) values ('$username')";
   mysqli_query($db , $query) or die('Error in inserting.');

}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "games";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

  $search = $_POST['search'];

  $sql = "SELECT * FROM infor WHERE city = '$search'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row

    echo "<br><hr>SHOW AVAILABLE BLOODTYPE  AND CITY <br><hr>";
      while($row = mysqli_fetch_assoc($result))
       {
         
          echo "
               <div class='rightcolumn'>
               <h1> " . $row["city"]."</h1>".  

              "<span> CITY :<h1> " . $row["city"]."</h1>".
              "</div>";
      }
  }
   else  
  {
    $output = "0 results:";
  }

}
?>


<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doctors side</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doctor</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
    <style type="text/css">
        .navbar {
  overflow: hidden;
  background-color: #63c5de;
  
  top: 0;
  width: 100%;
}


.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 8px;
}

.navbar a:hover {
  background: #ddd;
  color: white;
}
        body{ font: 14px sans-serif; text-align: center; }
        .rightcolumn {
         float: right;
         width: 15%;
         left: 5;
         padding-top: 10px;
         font-size: 8px;
     }
     
     
     /* Fake image */
     .fakeimg {
         background-color: #aaa;
         width: 100%;
         padding: 20px;
     }
     
     /* Add a card effect for articles */
     
     
     .grid-container {
         float: right;
       display: grid;
       top: 5;
       grid-template-columns: auto auto auto;
       
       
     }
     .grid-item {
      
       text-align: center;
      background-color: #ffffff;     '
       padding: 10px;
       
     
     }
     
    </style>
    <script src="main.js"></script>
<body>
<div class="navbar">
    <div class="page-header">
    <h2>Gynaecology</h2>
    </div>

    <div class="row">
    <div class="col-md-4 col-lg-2">
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
     </div>

     <div class="col-md-4 col-lg-2">
    <div class="grid-container">
<div class="grid-item">
           <h1 ><?php echo $tickets_remaining;  ?><h1>
           <h6> Patients remaining <h6>
        </div>
            </div>
        <div class="col-md-6 col-lg-3">
        <form action="" method="post" >
        <button  class="btn btn-success">Call Next Patient
        <a href="welgyn.php?action=new_patient" > 
       
        <input type="submit" name="send" value="send"  id="send"  ></a>
        </button>
        </form>
       
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <h2>Gynaecology</h2>
    </div>

    </div>


<br><br>


    <br><br>
<div class="row">



            <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM entdb' ) as $row ){

    echo "
    
    <div class='col-md-4 col-lg-2'>
    <div class='card text-white bg-flat-color-3'><a href='welent.php'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5><br> Ear nose and throat (ENT)";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "<br></div></div></a></div>";
    
    }
 
$output = NULL; 
?>

<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM gyn' ) as $row ){

    echo "

    <div class='col-md-4 col-lg-2'>
    <div class='card text-black bg-flat-color-6'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5><br>Gynaecology</h5></h5><br><br><br>";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "</div></div></div>";
    
    }
 
$output = NULL; 
?>

<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM micrdb' ) as $row ){

    echo "
    
    <div class='col-md-4 col-lg-2'>
    <div class='card text-white bg-flat-color-1'><a href='welmicr.php'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5> Microbiology</h5>";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "</div></div></a></div>";
    
    }
 
$output = NULL; 
?>


<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM oncdb' ) as $row ){

    echo "
    
    <div class='col-md-4 col-lg-2'>
    <div class='card text-white bg-flat-color-4'><a href='welonc.php'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5> Oncology</h5>";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "</div></div></a></div>";
    
    }
 
$output = NULL; 
?>
     <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM opthdb' ) as $row ){

    echo "
    
    <div class='col-md-4 col-lg-2'>
    <div class='card text-white alt bg-dark'><a href='welopth.php'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5> Ophthalmology</h5>";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "</div></div></a></div>";
    
    }
 
$output = NULL; 
?>  
  <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'games';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM phydb' ) as $row ){

    echo "
    
    <div class='col-md-4 col-lg-2'>
    <div class='card text-white bg-flat-color-5'><a href='welphy.php'>
    <div class='card-body p-0 clearfix'>
    <i class='fa fa-users bg-flat-color-6 p-3 font-2xl mr-3 float-left text-light'></i>
    <h5> Pharmacy</h5>";
    echo "TOTAL tickets : " . $row['SUM(total_tickets)'];

    echo "</div></div></a></div>";
    
    }
 
$output = NULL; 
?>      




</div>


   

</div>
    <a href="regpage.php" class="btn btn-danger">Register Patient</a>


   <h6>OR</h6>
 

   <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
                <form class="search-form">
                    <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" input type="submit" name ="submit" value="search"type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>

 

<div>    



<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>


</body>
</html>
