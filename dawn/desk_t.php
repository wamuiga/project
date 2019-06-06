
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Receptionist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">

    <form action="desk.php?action=search_patient" method="get">
        <input type="text" name="search_term" id="" class="form-control">
        <button type="submit">search</button>
    </form>
    <?php
    if ($patients!="") {
        echo "results";
    }
    ?>
    <form action="desk.php?action=add_patient" method="post">
    <input type="text" class="form-control" placeholder="Enter patient name...">
     <button class="btn btn-success" type="submit">register</button>
    </form>
    </div>
    
</body>
</html>