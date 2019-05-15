<!DOCTYPE html>
<html>

<?php



// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$db = mysqli_connect('localhost','root','','games')
 or die('Error connecting to MySQL server.');
   if (isset($_POST["send"]))
 {
 
 
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $age = trim($_POST['age']);
  $city = trim($_POST['city']);
   $phonenumber = trim($_POST['phonenumber']);
  $diagosis = trim($_POST['diagosis']);
  $comment = trim($_POST['comment']);
  $username = trim($_SESSION["username"]); 
   
   $query = "INSERT INTO infor ( firstname, lastname, city, age, phonenumber, diagosis, comment, username ) values ('$firstname',
    '$lastname','$city','$age','$phonenumber','$diagosis','$comment','$username')";
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
<a class="page-scroll" href="welcome.php" style="color: #fff;">Back</a>
  <H2><CENTER>SUBMIT  INFORMATION:</CENTER></H2><hr>
  <CENTER>
<input type="text" name="firstname"  id="firstname" placeholder="f i r s t  n a m e"><br>
<input type="text" name="lastname"  id="lastname" placeholder="l a s t n a m e"><br>
   <input type="text" name="age" id="age" placeholder="a g e "/><br>
    <input type="text" name="city" id="city" placeholder="c i t y "/><br>
<input type="text" name="phonenumber"  id="phonenumber" placeholder="p h o n e n u m b e r  "><br>

<select name="diagosis" type="text" >
    <option value="volvo">d i a g n o s e s</option>
    <option value="Hypertension">Hypertension</option>
    <option value="Hyperlipidemia">Hyperlipidemia</option>
    <option value="Diabetes">Diabetes</option>
    <option value="Back pain">Back pain</option>
    <option value="Anxiety">Anxiety</option>
    <option value="Obesity">Obesity</option>
    <option value="Allergic rhinitis">Allergic rhinitis</option>
    <option value="Reflux esophagitis">Reflux esophagitis</option>
    <option value="Respiratory problems">Respiratory problems</option>
    <option value="Hypothyroidism">Hypothyroidism</option>
    <option value="Visual refractive errors">Visual refractive errors</option>
    <option value="General medical exam">General medical exam</option>
    <option value="Osteoarthritis">Osteoarthritis</option>
    <option value="Fibromyalgia / myositis">Fibromyalgia / myositis</option>
    <option value="Malaise and fatigue">Malaise and fatigue</option>
    <option value="Pain in joint">Pain in joint</option>
    <option value="Acute laryngopharyngitis">Acute laryngopharyngitis</option>
    <option value="Acute maxillary sinusitis">Acute maxillary sinusitis</option>
    <option value="Major depressive disorder">Major depressive disorder</option>
    <option value="Acute bronchitis">Acute bronchitis</option>
    <option value="Asthma">Asthma</option>
    <option value="Depressive disorder">Depressive disorder</option>
    <option value="Nail fungus">Nail fungus</option>
    <option value="Coronary atherosclerosis">Coronary atherosclerosis</option>
    <option value="Urinary tract infection">Urinary tract infection</option>
  
    </select>
 <hr>
  </div>
 </CENTER>

<div class="rightcolumn">
<br>Additional Comments: <br><h6>Optional</h6>
  <textarea type="text" name="comment" id="comment" rows="20" cols="90" placeholder="more detailed diagnoses................ " 
  style="background:rgba(252, 248, 227, 0.62);"></textarea>

<br><br>
<input type="submit" name="send" value="send"  id="send" class="btn btn-success">
<br><hr>
</div>

</body>
</html>