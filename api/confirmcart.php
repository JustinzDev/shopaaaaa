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
        $newlink = $mylocalhost."login";
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

    $sql = "SELECT * FROM `carts` INNER JOIN products ON carts.product_id = products.product_id WHERE carts.acc_id = '".$_SESSION['Uall_id']."'";
    $query = mysqli_query($conn, $sql);


    while($rowdata = mysqli_fetch_array($query)){
        $totalprice = $rowdata['item_quantity'] * $rowdata['product_price'];
        $sql2 = "INSERT INTO `listproducts`(`product_id`, `acc_id`, `seller_id`, `list_counto`, `list_totalprice`, `list_state`) VALUES ('".$rowdata['product_id']."', 
        '".$_SESSION['Uall_id']."','".$rowdata['acc_id']."', '".$rowdata['item_quantity']."', '".$totalprice."' , 'wait')";
        $query2 = mysqli_query($conn, $sql2);

        $sql3 = "INSERT INTO `invoices`(`item_id`, `invoice_total`, `invoice_date`) VALUES ('".$rowdata['product_id']."', '".$totalprice."', '".date("Y-m-d")."')";
        $query3 = mysqli_query($conn, $sql3);
    }
    
    $removecart = "DELETE FROM carts WHERE acc_id = '".$_SESSION['Uall_id']."'";
    $query = mysqli_query($conn, $removecart);

    echo '
    <script>
        setTimeout(function(){
            swal({
                title: "สำเร็จ",
                text: "คุณได้สั่งซื้อสินค้าของคุณเรียบร้อยแล้ว \n *เช็ครายละเอียดสินค้าได้ที่ การซื้อของฉัน*",
                type: "success",
                showButtonCancel: true,
            }, function(isConfirm){
                if(isConfirm) window.location = "'.$mylocalhost.'";
                if(isCancel) window.location = "'.$mylocalhost.'";
            });
        }, 300);
    </script>
    ';

?>
