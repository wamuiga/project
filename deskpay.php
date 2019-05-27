<?php


require_once 'utils.php';



if (isset($_GET["action"]) && $_GET["action"]=="new_patient") {
    $result=queryMysql("SELECT id FROM ticket WHERE exit_stamp IS NULL ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $id=$row['id'];

    $result=queryMysql("SELECT * FROM patients as p INNER JOIN ticket as t ON p.patients_id=t.patient_id WHERE t.id = $id AND exit_stamp IS NULL");
    $patient=$result->fetch_array(MYSQLI_ASSOC);
    


    $result=queryMysql("UPDATE `ticket` SET `exit_stamp` = CURRENT_TIMESTAMP WHERE `ticket`.`id` = $id;");


}

/*

if action is next patient,get next patient; select patient details from

if
pid,test_id

*/


$result=queryMysql("SELECT COUNT(id) as remaining FROM ticket WHERE exit_stamp IS NULL;");
$row=$result->fetch_array(MYSQLI_ASSOC);
$tickets_remaining=$row['remaining'];

?>


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
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #FFFFFFB3;;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 10px;
  font-size: 10px;
  text-align: center;
}
@import url(https://fonts.googleapis.com/css?family=Open+Sans);



.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 60px;
 
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 15px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
 
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
    
             
        .rightcolumn {
         float: right;
         width: 40%;
         height: 65%;
         padding-left: 50px;
         padding-top: 20px;
         font-size: 12px;
         text-align: center;    
         border-radius: 10px;
         background-color: #ffffff;
     }
    
</style>

<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Tables</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Icons</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="content mt-3">


<div class="row">
<div class="col-md-8 col-lg-4">
            <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'wamuiga_db';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT SUM(total_tickets) FROM ticket' ) as $row ){

    echo "
  
                <div class='card'>
                    <div class='card text-black bg-flat-color-8'>
                        <div class='stat-widget-one'>
                            <div class='stat-icon dib'><i class='ti-user text-primary border-primary'></i></div>
                            <div class='stat-content dib'>
    <h5><br> TOTAL TICKETS <br>";
    echo "-----> " . $row['SUM(total_tickets)'];

    echo "<?php echo $tickets_remaining;  ?><br></div></div></div></div></div>";
    
    }
 
$output = NULL; 
?>


<div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-content dib">
           <h5>----><?php echo $tickets_remaining;  ?>----Tickets remaining </h5>
           
       
       
            <a href="deskpay.php?action=new_patient" class="btn btn success" >Next Ticket</a> </div>
            </div>
       
    </div>
    </div>
    <form method="post">
    <div class="col-md-2 col-lg-2">
<select name="department" type="text" >
    <option value="1">Ear nose and throat (ENT)</option>
    <option value="2">Gynecology</option>
    <option value="3">Microbiology</option>
    <option value="4">Oncology</option>
    <option value="5">Ophthalmology</option>
    <option value="6">Pharmacy</option>
   
  
    </select>

    <?php
    
    echo $patient;
    
    ?>
    </div>

    </div>
<?php

$connect = mysqli_connect("localhost", "root", "", "wamuiga_db");

?>
<div class="row">

</div>

  <h3>Test</h3>
    <div class="grid-container">
  <div class="grid-item">
 
  <div class="grid-item"><input type="checkbox" name="language[]" value="Height / weight check"> Height / weight check  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Blood pressure check">  Blood pressure check  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Cholesterol level check"> Cholesterol level check </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Blood sugar test"> Blood sugar test  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Throat check"> Throat check  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Ear check"> Ear check</div>
  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Eye check"> Eye check  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Chest x-ray (for heavy smokers)"> Chest x-ray (for heavy smokers)  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Hemoglobin"> Hemoglobin  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Urinalysis"> Urinalysis  </div>  
  <div class="grid-item"><input type="checkbox" name="language[]" value="Platelet count" > Platelet count </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Occult Blood in stool" > Occult Blood in stool  </div>
  <div class="grid-item"><input type="checkbox" name="language[]" value="Glucose Serum" > Glucose Serum   </div>
 <div class="grid-item"><input type="checkbox" name="language[]"  value="Electrocardiogram" > Electrocardiogram </div>
      
  </div>
  </div>
  <input type="submit" name="submit" class="btn btn-info" value="Submit" />
  </form>

<br><br><br><br><br>

  <?php
          if(isset($_POST["submit"]))
          {
           $for_query = '';
           if(!empty($_POST["language"]))
           {
            foreach($_POST["language"] as $language)
            {
             $for_query .= $language . ', ';
            }
            $for_query = substr($for_query, 0, -2);
            $query = "INSERT INTO tbl_language (name) VALUES ('$for_query')";
            if(mysqli_query($connect, $query))
            {
             echo '<h3>You have select following language</h3>';
                echo '<label class="text-success">' . $for_query . '</label>';
            }
           }
           else
           {
            echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
           }
          }
          ?>
    </div>
    </div><!-- .row1 -->
        </div> <!-- .content -->

    

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
