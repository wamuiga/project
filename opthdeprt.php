<?php
 require_once 'utils.php';
    $ticket_number="";
    $ticket_timestamp="";
   
 if (isset($_GET['action']) && $_GET['action']=="new_ticket") {
    queryMysql("INSERT INTO `opthdb` (`id`, `entry_stamp`, `exit_stamp`) VALUES (NULL, CURRENT_TIMESTAMP, NULL);");
    $result=queryMysql("SELECT * FROM opthdb ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $ticket_number=$row['id'];
    $ticket_timestamp=$row['entry_stamp'];
    
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
  background-color: #fbff00f7;

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
         height: 600px;
         padding-left: 50px;
         padding-top: 20px;
         font-size: 12px;
         text-align: center;    
         border-radius: 10px;
         background-color: #fbff00f7;
     }
     
div {
    float: left;
    width: 60%;
  border-radius: 5px;
  background-color: #ffffff;
  padding: 20px;
  height: 600px;
}
.button {
 
 background-color: #eee;
  color: black;
  font-size: 24px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  margin: 40px 20px;
  width: 85%;
  display: block;
}

.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
#printTable{
  float: center;
  width: 40%;
  border-radius: 5px;
  background-color: #ffffff;
  padding: 20px;
  height: 20%;
}
</style>

    <script src="main.js"></script>
    <script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'http://localhost/project/home.php';
}, 10000);

</script>
<body>
<br><br>
<h1>Ophthalmology</h1>
<br><br><br>
<div>

<h2>
Eye departments provide a range of ophthalmic services for adults and children, including:
</h2><br><br>
<p>
general eye clinic appointments
<br>
laser treatments
<br>
optometry (sight testing)
<br>
orthoptics (non-surgical treatments, eg for squints)
<br>
prosthetic eye services
<br>
ophthalmic imaging (eye scans).

</p>
</div>


<div class="rightcolumn">
<br><br><br>
<h1></h1>
<br><br>
<a href="opthdeprt.php?action=new_ticket"  class="button" onclick="printDiv('printTable')" value="print a div!" >
    <br><br><br><br>
request ticket
<br><br><br><br>
</button></a>

<div id="printTable">
        <?php
            echo "ticket Number: OP".$ticket_number;
            echo "<br>ticket timestamp:".$ticket_timestamp
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