<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
    include('api/setlink.php');

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='".$vps."';</script>";
        exit();
    }

    $sql = "SELECT * FROM (carts INNER JOIN products ON carts.product_id = products.product_id AND carts.acc_id = '".$_SESSION['Uall_id']."') ORDER BY carts.item_id DESC;";
    $query = mysqli_query($conn, $sql);
    $countitem = mysqli_num_rows($query);

    $totalprice = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $vps;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<body style="background-color: rgba(156, 156, 156, 0.1);">
    <?php include('navbar.php');?>
    <div clsss="contain">
        <div class="topiccart"><h2>รถเข็น</h2></div>
        <div class="headercart" style="overflow-x:auto; overflow-y:auto;">
            <table class="tablecart">
                <tr>
                    <th>สินค้า</th>
                    <th>ราคาต่อชิ้น</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>แอคชั่น</th>
                <tr>
                <?php while($rowdata = mysqli_fetch_array($query)){?>
                    <tr>
                        <td><img src="<?php echo $vps;?><?php echo $rowdata['product_img'];?>"/><?php echo $rowdata['product_name'];?></td>
                        <td>฿<?php echo number_format($rowdata['product_price'], 2);?></td>
                        <td><?php echo $rowdata['item_quantity'];?></td>
                        <td>฿<?php echo number_format($rowdata['item_cost'], 2);?></td>
                        <td><a href="<?php echo $vps;?>api/removecartitem?itemid=<?php echo $rowdata['item_id'];?>">ลบ</a></td>
                    </tr>
                <?php 
                    $totalprice += $rowdata['item_cost'];
                    }?>
            </table>
        </div>
        <div class="down-div">
            <h4>รวม (<?php echo $countitem;?> สินค้า): <font color="#ee4d2d">฿<?php echo number_format($totalprice, 2);?></font></h4>
            <a href="<?php echo $vps;?>api/confirmcart"><button id="submitbutton">สั่งซื้อสินค้า</button></a>
        </div>
    </div>
</body>
<script>
    if(<?php echo $countitem;?> == 0){
        document.getElementById("submitbutton").style.background="#C8C8C8";
        document.getElementById("submitbutton").style.cursor = "context-menu";
        document.getElementById("submitbutton").disabled = true;
    }
    else{
        document.getElementById("submitbutton").style.background="#ee4d2d";
        document.getElementById("submitbutton").style.cursor="pointer";
        document.getElementById("submitbutton").disabled = false;
    }
</script>
</html>