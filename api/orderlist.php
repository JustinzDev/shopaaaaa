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
                        text: "คุณจำเป็นต้องเข้าสู่ระบบก่อนสั่งซื้อสินค้า!!",
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

    if(!$result){
        echo "<script>window.location='".$vps."';</script>";
        exit();
    }

    $totalprice = $_POST['countitem'] * $result['product_price'];
    $sql = "INSERT INTO `listproducts`(`product_id`, `acc_id`, `seller_id`, `list_counto`, `list_totalprice`, `list_state`) VALUES ('".$_GET['itemid']."', 
    '".$_SESSION['Uall_id']."','".$result['acc_id']."', '".$_POST['countitem']."', '".$totalprice."' , 'wait')";
    $query = mysqli_query($conn, $sql);
    

    $sql3 = "INSERT INTO `invoices`(`item_id`, `invoice_total`, `invoice_date`) VALUES ('".$_GET['itemid']."', '".$totalprice."', '".date("Y-m-d")."')";
    $query3 = mysqli_query($conn, $sql3);

    echo '
    <script>
        setTimeout(function(){
            swal({
                title: "สำเร็จ",
                text: "คุณได้สั่งซื้อสิน [ '.$result['product_name'].' ] \n จำนวน [ '.$_POST['countitem'].' ] ชิ้น \n ในราคา [ ฿'.number_format($totalprice, 2).' ] เรียบร้อยแล้ว",
                type: "success",
                showButtonCancel: true,
            }, function(isConfirm){
                if(isConfirm) window.location = "'.$vps.'";
                if(isCancel) window.location = "'.$vps.'";
            });
        }, 300);
    </script>
    ';
?>
