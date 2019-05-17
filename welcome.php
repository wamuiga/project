
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
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


<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
              
       
   
                <a class="navbar-brand" href="./"><img src="img/People-Doctor-Male-icon.png" height="75px" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="img/People-Doctor-Male-icon.png" height="75px" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                
                    <h3 class="menu-title">
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
   
   echo "<h6 class='card text-white bg-flat-color-4'>Doctor ID" .$row['u_id']. "</h6>";
   
 
}
else
{
   echo '<h3>Session not started properly. Please log in using fingerprint scanner.</h3>';
}


?>
                    <?php

$link = mysqli_connect("localhost", "root", "", "wamuiga_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT t1.u_id, t2.surname FROM login_session_ids AS t1 INNER JOIN user_accounts AS t2 on t1.u_id = t2.u_id WHERE t1.session_id ";
 
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
               
                echo "<h6 class='card text-white bg-flat-color-2'>DR," . $row['surname'] . "</h6>";
            echo "</tr>";
        }
       
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?></h3>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="welent.php">VIEW TICKETS</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">VIEW REPORTS</a></li>
                           
                        </ul>
                    </li>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
    <header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
  
    <div class="col-md-4 col-lg-2">
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
     </div>
        <div class="header-left">
          
            
            
    
         
   
        
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

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
