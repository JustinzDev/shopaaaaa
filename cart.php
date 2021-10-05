<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
    include('api/setlink.php');

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='".$mylocalhost."';</script>";
        exit();
    }

    $sql = "SELECT * FROM (carts INNER JOIN products ON carts.product_id = products.product_id AND carts.acc_id = '".$_SESSION['Uall_id']."') ORDER BY carts.product_id DESC;";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
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
        <div class="topiccart"><h2>ตะกร้า | Cart</h2></div>
        <div class="headercart">
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
                        <td style="width:450px;"><img src="<?php echo $mylocalhost;?><?php echo $rowdata['product_img'];?>"/><?php echo $rowdata['product_name'];?></td>
                        <td style="width:150px;"><?php echo number_format($rowdata['product_price'], 2);?></td>
                        <td style="width:150px;"><?php echo $rowdata['item_quantity'];?></td>
                        <td style="width:150px;"><?php echo number_format($rowdata['item_cost'], 2);?></td>
                        <td style="width:150px;">ลบ</td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
</body>
</html>