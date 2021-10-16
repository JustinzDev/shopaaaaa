<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../api/setlink.php'); 

    echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    ';

    if($_SESSION['Uall_id'] == ""){
        $newlink = $vps."login";
        echo '
            <script>
                setTimeout(function(){
                    swal({
                        title: "เกิดข้อผิดพลาด",
                        text: "คุณจำเป็นต้องเข้าสู่ระบบ!!",
                        type: "error",
                        showButtonCancel: true,
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
            ';
        exit();
    }

    $sql = "SELECT * FROM products WHERE product_id = '".$_GET['itemid']."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $checkhave = "SELECT * FROM carts WHERE acc_id = '".$_SESSION['Uall_id']."' AND product_id = '".$_GET['itemid']."'";
    $queryhave = mysqli_query($conn, $checkhave);
    $resulthave = mysqli_fetch_array($queryhave);
    if($resulthave){
        header("location:$vps");
        exit();
    }

    if($result){

        $totalprice = $_GET['quantity'] * $result['product_price'];

        $insertcart = "INSERT INTO carts (acc_id, product_id, item_cost, item_quantity) 
        VALUES ('".$_SESSION['Uall_id']."', '".$_GET['itemid']."', '".$totalprice."', '".$_GET['quantity']."')";
        $query = mysqli_query($conn, $insertcart);

        $newlink = $vps."cart";
        echo '
            <script>

                setTimeout(function(){
                    swal({
                        title: "คุณได้นำสินค้าใส่ตะกร้าสำเร็จ",
                        text: "คุณได้นำสินค้า: '.$result['product_name'].' จำนวน '.$_GET['quantity'].' ชิ้น ใส่ตะกร้าเรียบร้อยแล้ว",
                        type: "success",
                        showButtonCancel: true,
                        confirmButtonColor: "#2DEE4D",
                        confirmButtonText: "ตกลง",
                    }, function(isConfirm){
                        if(isConfirm) window.location = "'.$newlink.'";
                        if(isCancel) window.location = "'.$newlink.'";
                    });
                }, 300);
            </script>
        ';
    }


?>