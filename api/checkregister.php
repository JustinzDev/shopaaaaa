<?php
    include('../mysql_connection/my_connection.php');
    header("Content-Type: application/json");

    $username = $_POST['uname'];
    $email = $_POST['uemail'];
    $numberphone = $_POST['telphone'];

    if($username != "" && $email != "" && $numberphone != "" && $_POST['pw1']) != ""){
        $sql = "SELECT cus_username, cus_email, cus_contact FROM customers WHERE cus_username = '".$username."' OR cus_email = '".$email."' OR cus_contact = '".$numberphone."'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if($result){
            echo json_encode(array('status'=> 0,'message'=> 'Fail'));
        }
        else{
            $register = "INSERT INTO customers (cus_username, cus_password, cus_email, cus_contact)
            VALUES ('".$username."', '".strtoupper(hash("whirlpool", $_POST['pw1']))."', '".$email."', '".$numberphone."')";
            $query = mysqli_query($conn, $register);

            if($query){
                $message = "คุณได้สมัครสมาชิกด้วย ".$username." เรียบร้อยแล้ว";
                echo "<script>alert('$message');</script>";
                echo "<script>window.location='../index';</script>";
            }
        }
    }
?>