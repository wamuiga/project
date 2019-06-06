<?php
 require_once 'utils.php';
    $ticket_number="";
    $ticket_timestamp="";
  

    $patients_id = trim($_POST['patients_id']);
   
 if (isset($_GET['action']) && $_GET['action']=="new_ticket") {
    
    queryMysql("INSERT INTO `ticket` (`id`, `entry_stamp`, `exit_stamp`, `patients_id`) VALUES (NULL, CURRENT_TIMESTAMP, NULL, $patients_id) (SELECT MAX(patients_id) FROM patients)");
   
   
    $result=queryMysql("SELECT * FROM ticket ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $ticket_number=$row['id'];
    $ticket_timestamp=$row['entry_stamp'];


    
    }
?>
 <?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'wamuiga_db';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
foreach($mysqli->query('SELECT MAX(patients_id) FROM patients' ) as $row ){

    echo "
  
                <div class='card'>
                    <div class='card text-black bg-flat-color-5'>
                        <div class='stat-widget-one'>
                            <div class='stat-icon dib'><i class='ti-user text-primary border-primary'></i></div>
                            <div class='stat-content dib'>
    <h5><br> last patient id regestared <br>";
    echo "-----> " . $row['MAX(patients_id)'];
"<br></div></div></div></div></div>";
    
    }
 
$output = NULL; 
?>
 
<style>
     .column2 {
        width: 25%;
        display: grid;
        box-shadow: 0 4px 8px 0 rgba(76, 175, 80, 0.78);
        font-size: 10px;
      text-align: left;
      padding : 1%;
      background-color: #bde49fe0;
       
      }
    
    
    /* Style the counter cards */
    .card2 {
      box-shadow: 0 4px 8px 0 rgba(153, 236, 184, 0.62);
      height: 25%;
      text-align: center;
      background-color: #bde49fe0;
    }
    * {
    box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS'; 

  
    background-color: #eae0e030;
}

/* Header/Blog Title */
.header {
    padding: 30px;
    font-size: 40px;
    text-align: center;
    background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: center;
    width: 20%;
    padding-left: 30px;
    font-size: 8px;
}

/* Right column */
.rightcolumn {
    float: center;
    width: 20%;
    padding-left: 10px;
    font-size: 8px;
}
.rightcolumn1{
  float: center;
  padding-right: 55px;
    width: 20%;
    padding-left: 10px;
    font-size: 8px;
    background-color: #00816A;
}
#clockdiv > div{ 
	padding: 10px; 
	border-radius: 3px; 
	background: #e1e4e440; 
	display: inline-block; 
} 
.centercolumn{
  float: right;
    padding-right: 55px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 3px; 
    width: 58%;
    font-size: 13px;
    font-family: sans-serif; 
	color: #fff; 
	display: inline-block; 
	
	text-align: center;  
    background-color: #00816A;
}
.slipa {   
  float: left;
    width: 38%;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 25px;
   
    font-family: Caviar Dreams; 
	color: #fff; 
	display: inline-block; 
	border-radius: 3px; 
	text-align: center; 
	font-size: 13px; 
    background-color: #00816A;
}


/* Fake image */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
   
  padding: 10px;
  font-size: 16px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      height: 15%;
      text-align: center;
      background-color: #bde49fe0;
}

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;

  padding: 5px;
}
.grid-item {
  
  background-color: white;
     
  
  font-size: 10px;

}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 15%;

}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 15px 10px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: green;
}

/* Style the tab content */
.tabcontent {
    float: center;
    padding: 10px;
 
    width: 98%;
    border-left: none;

}
  p1{

    color :red;
}
p2{

color :green;
font-size: 15px;


}
.btn {
  border: 2px solid black;
  background-color: white;
  color: red;
  height: 25px;
  font-size: 11px;
  width:95%;
  cursor: pointer;

}

/* Green */
.success {
  border-color: red;
  color: rgb(44, 154, 31, 0.71);
  height: 25px;
}

.success:hover {
  background-color: rgb(68, 118, 255);
  color: rgb(44, 154, 31, 0.71);
}
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #00816A;

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
  color: black;
}
.rightcolumn {
         float: center;
         width: 40%;
         height: 600px;
         padding-left: 50px;
         padding-top: 20px;
         font-size: 12px;
         text-align: center;    
         border-radius: 10px;
         background-color: #fbff00f7;
     }

</style>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticket Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="main.js"></script>
</head>
<body>

       

<div class="rightcolumn">
<br><br><br>
<h1></h1>
<br><br>
<a>
<a href="index.php?action=new_ticket"   >
<button class="success" onclick="printDiv('printTable')" value="print a div!">
    <br><br><br><br>
request ticket
<br><br><br><br>
</button></a>

<div id="printTable">
        <?php
            echo "ticket Number: M".$ticket_number;
            echo "<br>ticket timestamp:".$ticket_timestamp
            ?>
            </div>

           
 
</body>
<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</html>