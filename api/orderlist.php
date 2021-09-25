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

    $sql = "SELECT * FROM products WHERE product_id = '".$_GET['itemid']."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if($result){
        $totalprice = $_POST['countitem'] * $result['product_price'];
        $sql = "INSERT INTO `listproducts`(`product_id`, `acc_id`, `seller_id`, `list_counto`, `list_totalprice`) VALUES ('".$_GET['itemid']."', 
        '".$_SESSION['Uall_id']."','".$result['acc_id']."', '".$_POST['countitem']."', '".$totalprice."')";
        $query = mysqli_query($conn, $sql);
        

        echo '
        <script>
            setTimeout(function(){
                swal({
                    title: "สำเร็จ",
                    text: "คุณได้สั่งซื้อสิน [ '.$result['product_name'].' ] \n จำนวน [ '.$_POST['countitem'].' ] ชิ้น \n ในราคา [ ฿'.number_format($totalprice).' ] เรียบร้อยแล้ว",
                    type: "success",
                    showButtonCancel: true,
                }, function(isConfirm){
                    if(isConfirm) window.location = "'.$mylocalhost.'";
                    if(isCancel) window.location = "'.$mylocalhost.'";
                });
            }, 300);
        </script>
        ';

    }
?>
