<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    header("Content-Type: application/json");

    $username = $_POST['Uname'];
    $password = $_POST['pw1'];

    $sql = "SELECT *  FROM accounts WHERE (acc_username = '".$username."' OR acc_email = '".$username."' OR acc_contact = '".$username."')
    AND acc_password = '".mysqli_real_escape_string($conn, strtoupper(hash("whirlpool", $password)))."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    /*$selectdate = "SELECT DATE_FORMAT(`acc_birthday`, '%d-%m-%Y') AS `acc_birthday` FROM accounts WHERE (acc_username = '".$username."' OR acc_email = '".$username."' OR acc_contact = '".$username."')
    AND acc_password = '".mysqli_real_escape_string($conn, strtoupper(hash("whirlpool", $password)))."'";
    $querydate = mysqli_query($conn, $selectdate);
    $resultdate = mysqli_fetch_array($querydate, MYSQLI_ASSOC);*/

    if($result){
        $_SESSION['Uall_id'] = $result['acc_id'];
        $_SESSION['Uall_username'] = $result['acc_username'];
        $_SESSION['Uall_email'] = $result['acc_email'];
        $_SESSION['Uall_address'] = $result['acc_address'];
        $_SESSION['Uall_contact'] = $result['acc_contact'];
        $_SESSION['Uall_nameuser'] = $result['acc_name'];
        $_SESSION['Uall_genderuser'] = $result['acc_gender'];
        $_SESSION['Uall_birthday'] = $result['acc_birthday'];
        //$_SESSION['Uall_birthday'] = $resultdate['acc_birthday'];
        session_write_close();
        echo json_encode(array('status'=> 1,'message'=> 'Success'));
    }
    else{
        echo json_encode(array('status'=> 0,'message'=> 'Fail'));
    }
    mysqli_close($conn);
?>