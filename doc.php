<?php

require_once 'utils.php';

if (isset($_GET["action"]) && $_GET["action"]=="new_patient") {
    $result=queryMysql("SELECT id FROM ticket WHERE exit_stamp IS NULL ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $id=$row['id'];
    
    $result=queryMysql("UPDATE `ticket` SET `exit_stamp` = CURRENT_TIMESTAMP WHERE `ticket`.`id` = $id;");


}


$result=queryMysql("SELECT COUNT(id) as remaining FROM ticket WHERE exit_stamp IS NULL;");
$row=$result->fetch_array(MYSQLI_ASSOC);
$tickets_remaining=$row['remaining'];


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

    <script src="main.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-success">GreenLeaf Clinic</h1>
        <div class="card shadow-sm" style="width:400px;height:300px;padding-left:100px;">
           <h1 style="font-size:80px; color:#006060;padding-top:100px;" ><?php echo $tickets_remaining;  ?><h1>
           <h6> Patients remaining <h6>
        </div>
        <a href="doc.php?action=new_patient" class="btn btn-success"> Call Next Patient</a>
        <a href="index.php">add ticket</a>
    </div>
    
    
</body>
</html>