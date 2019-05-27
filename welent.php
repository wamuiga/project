
<?php



require_once 'utils.php';



if (isset($_GET["action"]) && $_GET["action"]=="new_patient") {
    $result=queryMysql("SELECT id FROM entdb WHERE exit_stamp IS NULL ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $id=$row['id'];
    
    $result=queryMysql("UPDATE `entdb` SET `exit_stamp` = CURRENT_TIMESTAMP WHERE `entdb`.`id` = $id;");


}


$result=queryMysql("SELECT COUNT(id) as remaining FROM entdb WHERE exit_stamp IS NULL;");
$row=$result->fetch_array(MYSQLI_ASSOC);
$tickets_remaining=$row['remaining'];

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wamuiga_db";


$db = mysqli_connect('localhost','root','','wamuiga_db')
or die('Error connecting to MySQL server.');
  if (isset($_POST["send"]))
{
  $username = trim($_SESSION["username"]); 
   
   $query = "INSERT INTO entdrtp (  username ) values ('$username')";
   mysqli_query($db , $query) or die('Error in inserting.');

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
     body{ font: 14px sans-serif;
         text-align: center; 
          background-color: #fff;
        }
        .navbar {
  overflow: hidden;
  background-color: #f3f3f3;
  
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
       
        .rightcolumn {
       
         width: 65%;
       
         padding-top: 10px;
         font-size: 18px;
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
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
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
    <script src="main.js"></script>
<body>
<div class="navbar">
    <div class="page-header">
    
    <h2>Ear nose and throat (ENT)</h2>
    
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
        <a href="welent.php?action=new_patient" > 
       
        <input type="submit" name="send" value="send"  id="send"  ></a>
        </button>
        </form>
       
    </div>
    </div>
   

    </div>

<div class="row">
<div class="header-left">
   <div class="form1"><br>
    
    <form method="post">
        
    <div class="wrap">
   <div class="search">
      <input type="text" name="search" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" name ="submit" value="search" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>
        
    </CENTER>
                </div>
            </div>
        </header>
    </div>
</div>
</div> 

    </section>

 
      <?php
    $output = NULL; 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wamuiga_db";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if(isset($_POST['submit'])){
    
      $search = $_POST['search'];
    
      $sql = "SELECT * FROM infor WHERE reg_no = '$search'";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result))
           {
             
              echo "
              <div class='row'>
     <div class='col-xl-2 col-lg-2'>
              <div class='card'>
                  <div class='card-body'>
                      <div class='stat-widget-one'>
                          <div class='stat-content dib'>
                              <div class='stat-text'><h3>Name :</h3>". $row["lastname"].
                               "</div></div></div></div></div></div>

                               <div class='col-xl-2 col-lg-2'>
              <div class='card'>
                  <div class='card-body'>
                      <div class='stat-widget-one'>
                          <div class='stat-content dib'><h3>PhoneNumber :</h3>". $row["phonenumber"]. "
                          </div></div></div></div></div>

                          <div class='col-xl-2 col-lg-2'>
              <div class='card'>
                  <div class='card-body'>
                      <div class='stat-widget-one'>
                          <div class='stat-content dib'><h3>Reg No :</h3>".$row["reg_no"]."</div></div></div></div></div>
                          
                          <div class='col-xl-2 col-lg-2'>
              <div class='card'>
                  <div class='card-body'>
                      <div class='stat-widget-one'>
                          <div class='stat-content dib'>
                          <select name='diagosis' type='text' >
    <option value='volvo'>d i a g n o s e s</option>
    <option value='Hypertension'>Hypertension</option>
    <option value='Hyperlipidemia'>Hyperlipidemia</option>
    <option value='Diabetes'>Diabetes</option>
    <option value='Back pain'>Back pain</option>
    <option value='Anxiety'>Anxiety</option>
    
  
    </select>
    </div></div></div></div></div>
    
    <div class='col-xl-6 col-lg-3'>
    <div class='card'>
        <div class='card-body'>
            <div class='stat-widget-one'>
                <div class='stat-content dib'>

                <h6>Additional Comments: Optional</h6>
                <textarea type='text' name='comment' id='comment' rows='20' cols='40' placeholder='more detailed diagnoses.....' 
                style='background:rgba(252, 248, 227, 0.62);'></textarea>

                         </div></div></div></div></div></div> ";
          }
      }
       else  
      {
        $output = "0 results:";
      }
    
    }
    ?>
    <?php  echo $output; ?>

   
<div class="rightcolumn">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wamuiga_db";

$db = mysqli_connect('localhost','root','','wamuiga_db')
or die('Error connecting to MySQL server.');
if (isset($_POST["send"]))
{

  $reg_no = trim($row["reg_no"]); 
 
   
  $query = "INSERT INTO infor ( firstname, lastname ) values ('$firstname')";
 mysqli_query($db , $query) or die('Error in inserting.');
}

  
?>


  <div>
        <form action="" method="post" >
        <button  class="btn btn-success">Call Next Patient
        <a href="welent.php?action=new_patient" > 
       
        <input type="submit" name="send" value="send"  id="send"  ></a>
        </button>
        </form>
       
   

   


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
