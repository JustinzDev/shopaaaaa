<?php
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    $username = $_POST['uname'];
    $email = $_POST['uemail'];
    $numberphone = $_POST['telphone'];
    $date = $_POST['birthday'];

    if($username == "" || $email == "" || $numberphone == "" || $date == ""){
        echo "<script>window.location='../register';</script>";
        exit();
    }

    header("Content-Type: application/json");
    
    $sql = "SELECT acc_username, acc_email, acc_contact FROM accounts WHERE acc_username = '".$username."' OR acc_email = '".$email."' OR acc_contact = '".$numberphone."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        echo json_encode(array('status'=> 0,'message'=> 'Fail'));
    }
    else{
        $register = "INSERT INTO accounts (acc_username, acc_password, acc_email, acc_contact, acc_birthday) 
        VALUES ('".$username."', '".strtoupper(hash("whirlpool", $_POST['pw1']))."', '".$email."', '".$numberphone."', '".$date."')";
        $query = mysqli_query($conn, $register);

        $img = copy('../assets/img/users/avatar.png', '../assets/img/users/'.$username.'.png');

        $message = "คุณได้สมัครสมาชิกด้วย ".$username." เรียบร้อยแล้ว";
        echo json_encode(array('status'=> 1,'message'=> ''.$message.''));
    }  
?>