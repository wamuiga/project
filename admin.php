<?php
 require_once 'utils.php';
    $query="SELECT id as patient_id,TIMEDIFF(exit_stamp, entry_stamp) as time_taken FROM ticket WHERE exit_stamp is not null";
    $result=queryMysql($query);
   
    
 
?>



<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="main.js"></script>
</head>
<body>
<div class="container">
<table class="table table-sm">
  <thead class="thead-primary bg-primary">
    <tr>
      <th scope="col">Patient Number</th>
      <th scope="col">Time Taken</th>
    </tr>
  </thead>
  <tbody>
<?php
 while ($patient=$result->fetch_array(MYSQLI_ASSOC)) {
    $id=$patient['patient_id'];
    $time_taken=$patient['time_taken'];
    echo "<tr><td>".$id."</td><td>".$time_taken."</td></tr>";
}
?>
</tbody>
<table>
 
</body>
<script>
function print_ticket() {
   var ticket=document.getElementById("ticket");
   window.print();
}

</script>
</html>