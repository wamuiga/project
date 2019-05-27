<?php
 require_once 'utils.php';
    $ticket_number="";
    $ticket_timestamp="";
   
 if (isset($_GET['action']) && $_GET['action']=="new_ticket") {
    queryMysql("INSERT INTO `ticket` (`id`, `entry_stamp`, `exit_stamp`) VALUES (NULL, CURRENT_TIMESTAMP, NULL);");
    $result=queryMysql("SELECT * FROM ticket ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $ticket_number=$row['id'];
    $ticket_timestamp=$row['entry_stamp'];
    
    }
 
?>
<!DOCTYPE html>
<html>

<?php



// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: desk.php");
    exit;
}

$db = mysqli_connect('localhost','root','','wamuiga_db')
 or die('Error connecting to MySQL server.');
   if (isset($_POST["send"]))
 {
 
 
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $age = trim($_POST['age']);
  $city = trim($_POST['city']);
   $phonenumber = trim($_POST['phonenumber']);
  $reg_no = trim($_POST['reg_no']);
  
  $username = trim($_SESSION["username"]); 
   
   $query = "INSERT INTO infor ( firstname, lastname, city, age, phonenumber, reg_no, username ) values ('$firstname',
    '$lastname','$city','$age','$phonenumber','$reg_no', '$username')";
   mysqli_query($db , $query) or die('Error in inserting.');

   

    
  
    
}

?>
 <style type="text/css">
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
        body{ font: 14px sans-serif; text-align: center; }
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
     
     input[type=text], select {
  width: 50%;
  float: center;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  background-color: #f0f7ff73;
  
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
    float: left;
    width: 60%;
  border-radius: 5px;
  background-color: #fbff00f7;
  padding: 20px;
}
    </style>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Doctors side</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="main.js"></script>
</head>

<body>

<section class="section" id="section"> 
  
  
   <div>    
<form action="" method="post" >
<br>
<a class="page-scroll" href="desk.php" style="color: #fff;">Back</a>
  <H2><CENTER>SUBMIT  INFORMATION:</CENTER></H2><hr>
  <CENTER>
<input type="text" name="firstname"  id="firstname" placeholder="f i r s t  n a m e"><br>
<input type="text" name="lastname"  id="lastname" placeholder="l a s t n a m e"><br>
   <input type="text" name="age" id="age" placeholder="a g e "/><br>
    <input type="text" name="city" id="city" placeholder="c i t y "/><br>
    <input type="text" name="reg_no" id="reg_no" placeholder="R E G___N O "/><br>
<input type="text" name="phonenumber"  id="phonenumber" placeholder="p h o n e n u m b e r  "><br>

<a href="regpage.php?action=new_ticket"  class="button" onclick="printDiv('printTable')" value="print a div!" >
<input type="submit" name="send" value="send"  id="send" class="btn btn-success">
</a>

<br><hr>
</div>
<div class="rightcolumn">
<br><br><br>


<div id="printTable">
        <?php
            
            echo "<h2>ticket Number: G</h2>".$ticket_number;
            echo "<br>ticket timestamp:".$ticket_timestamp;
            ?>
            </div>
     

    </div>
    </div>
  <script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</body>
</html>