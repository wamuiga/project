<?php
session_start();
include_once 'utils.php';

echo <<<_END

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receptionist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <form action="desk.php" method="post">
        <input type="text" name="search_term" id="" class="form-control" placeholder="Enter patient name or registration number...">
        <button type="submit">search</button>
    </form>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add
    </button>
_END;

if (isset($_POST['patient_id'])) {
    $_SESSION['patient_id']=sanitizeString($_POST['patient_id']);;
    $_SESSION['patient_first_name']=sanitizeString($_POST['patient_first_name']);
    $_SESSION['patient_last_name']=sanitizeString($_POST['patient_last_name']);
    $_SESSION['patient_reg_no']=sanitizeString($_POST['patient_reg_no']);
}



if (isset($_POST['search_term']) && $_POST['search_term']!="") {
    $term=sanitizeString($_POST['search_term']);
    $patient=searchPatients($term);
    if ($patient->num_rows) {
        echo("Found ".mysqli_num_rows($patient)." results");
        while ($mrow=$patient->fetch_array(MYSQLI_ASSOC)) {
                $pid=$mrow['patients_id'];
                $fname=$mrow['firstname'];
                $lname=$mrow['lastname'];
                $regno=$mrow['reg_no'];          
echo <<<_END
            <form action='desk.php'method='post' >
                <input type='hidden' name='patient_id' value='$pid'>
                <input type='hidden' name='patient_first_name' value='$fname'>
                <input type='hidden' name='patient_last_name' value='$lname'>
                <input type='hidden' name='patient_reg_no' value='$regno'>
                <button type="submit">$fname</button>
            </form>
_END;
            }
     } else {
          echo ('<p style="color:#700070;text-decoration: none;">Sorry :-(  </br>No Such Patient found!!</br></p><br/>');

        }
}else {
    if (isset($_SESSION['patient_id'])) {
        
        $patient_id=$_SESSION['patient_id'];
        $patient_fname=$_SESSION['patient_first_name'];
        $patient_lname=$_SESSION['patient_last_name'];
        $patient_reg_no=$_SESSION['patient_reg_no'];

        echo <<<_END
        <div class="card">
            <label>$patient_fname</label>
            <label>$patient_lname</label>
            <label>$patient_reg_no</label>
        </div>
_END;
    } 
}

if (isset($_POST['fname'])) {
    $firstname=sanitizeString($_POST['fname']);
    $lastname=sanitizeString($_POST['lname']);
    $city=sanitizeString($_POST['city']);
    $age=sanitizeString($_POST['age']);
    $username=sanitizeString($_POST['username']);
    $phonenumber=sanitizeString($_POST['phonenumber']);
    $huduma=sanitizeString($_POST['huduma']);
    $register_patient="INSERT INTO patients(firstname,lastname,age,city,username,phonenumber,reg_no) VALUES('$firstname','$lastname',$age,'$city','$username','$phonenumber','$huduma');";
    if(!queryMysql($register_patient)){
        echo "something went wrong";
    }else{

    }
}

echo <<<_END
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>\
      <form action="desk.php" method="post">
        <div class="modal-body">
                <input type="text" class='form-control' name="fname" placeholder="Enter first name...">
                <input type="text" class='form-control' name="lname" placeholder="Enter last name...">
                <input type="text" class='form-control' name="city" placeholder="Enter city name...">
                <input type="text" class='form-control' name="age" placeholder="Enter age">
                <input type="text" class='form-control' name="username" placeholder="Enter username...">
                <input type="text" class='form-control' name="phonenumber" placeholder="Enter phone no.">
                <input type="text" class='form-control' name="huduma" placeholder="Enter huduma no..."> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register Patient</button>
        </div>
      </form>
    </div>
  </div>
</div>
_END;

if (isset($_POST['add_ticket'])) {
    $patient_id=$_SESSION['patient_id'];
    $generate_ticket="INSERT INTO ticket(id,patient_id) VALUES(NULL,$patient_id);";

    queryMysql($generate_ticket);
    $ticket_no=queryMysql("SELECT max(id) as latest FROM `ticket` WHERE 1");
    $row=$ticket_no->fetch_array(MYSQLI_ASSOC);
    $latest=$row['latest'];
    echo "<div class='card'><h1>Ticket No: $latest</h1></div>";
}

echo <<<_END

<form action="desk.php" method='post'>
<input type='hidden' value="some ticket" name="add_ticket" >
<input class='btn btn-primary' type='submit' value='Generate Ticket'>
</form>

_END;
?>
<!--<script src="desk.js"></script> -->