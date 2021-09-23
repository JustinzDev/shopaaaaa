<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    header("Content-Type: application/json");

    $username = $_POST['Uname'];
    $password = $_POST['pw1'];

    $sql = "SELECT *  FROM customers WHERE (cus_username = '".$username."' OR cus_email = '".$username."' OR cus_contact = '".$username."')
    AND cus_password = '".mysqli_real_escape_string($conn, strtoupper(hash("whirlpool", $password)))."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    /*$selectdate = "SELECT DATE_FORMAT(`cus_birthday`, '%d-%m-%Y') AS `cus_birthday` FROM customers WHERE (cus_username = '".$username."' OR cus_email = '".$username."' OR cus_contact = '".$username."')
    AND cus_password = '".mysqli_real_escape_string($conn, strtoupper(hash("whirlpool", $password)))."'";
    $querydate = mysqli_query($conn, $selectdate);
    $resultdate = mysqli_fetch_array($querydate, MYSQLI_ASSOC);*/

    if($result){
        $_SESSION['Uall_id'] = $result['cus_id'];
        $_SESSION['Uall_username'] = $result['cus_username'];
        $_SESSION['Uall_email'] = $result['cus_email'];
        $_SESSION['Uall_address'] = $result['cus_address'];
        $_SESSION['Uall_contact'] = $result['cus_contact'];
        $_SESSION['Uall_nameuser'] = $result['cus_name'];
        $_SESSION['Uall_genderuser'] = $result['cus_gender'];
        $_SESSION['Uall_birthday'] = $result['cus_birthday'];
        //$_SESSION['Uall_birthday'] = $resultdate['cus_birthday'];
        session_write_close();
        echo json_encode(array('status'=> 1,'message'=> 'Success'));
    }
    else{
        echo json_encode(array('status'=> 0,'message'=> 'Fail'));
    }
    mysqli_close($conn);
?>