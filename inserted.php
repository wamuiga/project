
welcome

$doc_id=$_SESSION["id"];
    $result=queryMysql("INSERT INTO 'case_case'('ticket_id','doctor_id','patient_id','comment','diagnosis') VALUES($id,$doc_id,NULL,NULL,NULL)");
    $result=queryMysql("SELECT id FROM case_case  ORDER BY id DESC;");
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $case_id=$row['id'];

    ///////////////////


    register