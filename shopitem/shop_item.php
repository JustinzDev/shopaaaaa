<?php
    session_start();
    include('../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../api/setlink.php');

    $sql = "SELECT *  FROM (products INNER JOIN accounts ON products.acc_id = accounts.acc_id) WHERE product_id = '".$_GET['itemid']."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
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
    <?php include('../navbar.php');?>
    <?php if(!$result){
        echo "<script>window.location='".$mylocalhost."';</script>";
        exit();
    }
    ?>
    <div clsss="contain">
        <form action="<?php echo $mylocalhost;?>api/orderlist?itemid=<?php echo $result['product_id'];?>" method="POST">
            <div class="bodyproducts">
                <div class="headlink">
                    <h6><a href="<?php echo $mylocalhost;?>">Shopa</a> > <?php echo $result['product_details'];?></h6>
                </div>
                <div class="product_box">
                    <div class="product-left">
                        <img src="<?php echo $mylocalhost;?><?php echo $result['product_img'];?>">
                    </div>
                    <div class="product-right">
                        <h5 class="shopad">ร้านแนะนำ</h5>
                        <h5 class="product-name"><?php echo $result['product_name'];?></h5>
                        <h5 class="product-name"><?php echo $result['product_details'];?></h5>
                        <div class="product-details">
                            <h5 class="product-score">ยังไม่มีคะแนน</h5> <h5 class="countsell"><?php echo $result['product_countsell'];?> ขายแล้ว</h5>
                        </div>
                        <div class="product-price">
                            <h3>฿<?php echo number_format($result['product_price'], 2);?></h3>
                        </div>
                        <div class="select-count-product">
                            <div class="product-selectcount">
                                <button type="button" id="remove">-</button>
                                <input type="text" id="countitem" name="countitem" value="1">
                                <button type="button" id="add">+</button>
                            </div>
                            <h6 class="product-countitem">มีสินค้าทั้งหมด <?php echo $result['product_count'];?> ชิ้น</h6>
                        </div>
                        <div class="product-buttonaction">
                            <?php if($result['product_count'] >= 1){?>
                                <a href="javascript:;" onclick="this.href='<?php echo $mylocalhost;?>api/addcartitem?itemid=<?php echo $result['product_id'];?>&quantity='+document.getElementById('countitem').value"><button id="addcart" type="button">เพิ่มไปยังรถเข็น</button></a>
                                <button id="buying" type="submit">ซื้อสินค้า</button>
                            <?php }else{?>
                                <button id="outstrock" type="button" disabled>สินค้าหมด</button>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="namestore">
            <div class="storeleft">
                <span><?php echo $result['acc_username'];?><br>
                <div class="chat-view-buttonaction">
                    <button id="chat" type="button"><i class="far fa-comment-dots"></i> แชทเลย</button>
                    <button id="viewstore" type="button"><i class="fas fa-store-alt"></i> ดูร้านค้า</button>
                </div> 
                </span>
            </div> 
        </div>
    </div>
</body>
<script>
    $('#remove').click(function(){
        var countitem = document.getElementById("countitem").value;
        document.getElementById("countitem").value--;
        if(document.getElementById("countitem").value < 1){
            document.getElementById("countitem").value = 1;
        }
    })

    $('#add').click(function(){
        var countitem = document.getElementById("countitem").value;
        document.getElementById("countitem").value++;
        if(document.getElementById("countitem").value > <?php echo number_format($result['product_count'], 2);?>){
            document.getElementById("countitem").value = <?php echo number_format($result['product_count'], 2);?>;
        }
    })

    $("#countitem").on("change", function() {
        var countitem = document.getElementById("countitem").value;
        if(document.getElementById("countitem").value < 0){
            document.getElementById("countitem").value = 0;
        }
        else if(document.getElementById("countitem").value > <?php echo number_format($result['product_count'], 2);?>){
            document.getElementById("countitem").value = <?php echo number_format($result['product_count'], 2);?>;
        }
    })
</script>
</html>