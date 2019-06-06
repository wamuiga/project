<?php
require_once 'utils.php';

$req="SELECT patient_id,id FROM `ticket` WHERE exit_stamp IS NULL";
$count="SELECT COUNT(id) as remaining FROM `ticket` WHERE exit_stamp is NULL;";
$next_patient="SELECT * from `ticket` as t INNER JOIN `patients` as p ON p.patient_id=t.patient_id WHERE t.exit_stamp IS NULL AND t.id=(SELECT MAX(id) FROM `ticket`);";

echo <<<_END
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cashier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1> Cashier page </h1>
_END;

$remaining=queryMysql($count);
$row=$remaining->fetch_array(MYSQLI_ASSOC);
$t_count=$row['remaining'];
echo <<<_END
<div class="card">
<h1>Tickets remaining: $t_count</h1>
</div>
_END;
echo <<<_END
<form action="cashier.php" method='post'>
<input type='hidden' value="some ticket" name="next_ticket" >
<input class='btn btn-primary' type='submit' value='Next Ticket'>
</form>

_END;

if(isset($_POST['next_ticket'])){
    $next=queryMysql($next_patient);
    $row=$next->fetch_array(MYSQLI_ASSOC);
    $fname=$row['firstname'];
    echo $fname;
}
$result=queryMysql($req);

echo "</div></body></html>";
?>