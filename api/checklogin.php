<?php
    session_start();
    include('../mysql_connection/my_connection.php');

    $username = $_POST['Uname'];
    $password = $_POST['pw1'];

    $sql = "SELECT *  FROM customers WHERE cus_username =  '".$username."' OR cus_email = '".$username."' OR cus_contact = '".$username."' 
    AND cus_password = '".mysqli_real_escape_string($conn, strtoupper(hash("whirlpool", $password)))."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        echo "คุณ login สำเร็จเเล้วเด้อ";
        $_SESSION['Uall_id'] = $result['cus_id'];
        $_SESSION['Uall_username'] = $result['cus_username'];
        $_SESSION['Uall_email'] = $result['cus_email'];
        $_SESSION['Uall_address'] = $result['cus_address'];
        $_SESSION['Uall_contact'] = $result['cus_contact'];
        session_write_close();
        echo "<script>window.location='../index';</script>";

    }
    else{
        $message = "Username หรือ Password ของท่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้งค่ะ";
            echo "<script>alert('$message');</script>";
            echo "<script>window.location='../login';</script>";
    }
    mysqli_close($conn);
?>