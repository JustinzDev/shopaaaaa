<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
    include('api/setlink.php');

    $loaditemshop = "SELECT * FROM products WHERE product_name LIKE '%".$_POST['search']."%'";
    $query = mysqli_query($conn, $loaditemshop);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<body>
    <?php include('navbar.php');?>
    <div id="main">
        <div clsss="contain">
            <div class="body1">
                <div class="slide-show">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="./assets/img/slide1.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/img/slide2.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/img/slide3.png" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>  
                <div class="eventshow">
                    <img src="./assets/img/event1.png">
                    <img src="./assets/img/event2.png">
                </div>
            </div>
            <div class="body2">
                <a href="#"><img src="./assets/img/Deliverly.png"><br>โค้ดส่งฟรี*</a>
                <a href="#"><img src="./assets/img/down arrow.png"><br>แบรนด์แท้ถูกชัวร์</a>
                <a href="#"><img src="./assets/img/electronic.png"><br>สินค้า <br>อิเล็กทรอนิกส์</a>
                <a href="#"><img src="./assets/img/gamer.png"><br>Gamer Zone</a>
                <a href="#"><img src="./assets/img/newuser.png"><br>สิทธิพิเศษลูกค้าใหม่</a>
                <a href="#"><img src="./assets/img/cart.png"><br>Supermarket <br>ช็อป รับคะแนน*</a>
                <a href="#"><img src="./assets/img/coins.png"><br>แลกรางวัล <br>Shopa Coins</a>
                <a href="#"><img src="./assets/img/dollar bank.png"><br>โค้ดส่วนลด 15%</a>
                <a href="#"><img src="./assets/img/hanger.png"><br>แฟชั่น ส่งฟรี*</a>
                <a href="#"><img src="./assets/img/Promotion.png"><br>โปรโมชั่นพิเศษ</a>
            </div>
            <br><hr>
            <div class="body3">
                <div class="header_shopbox" style="margin-top: 25px;">
                    <span class="checkedbox">สินค้าทั้งหมด</span>
                </div>
                <div class="shop_box">
                    <?php
                        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                    ?>
                        <div class="shopbodybox">
                            <a href="<?php echo $mylocalhost;?>shopitem/shop_item?itemid=<?php echo $row['product_id'];?>">   
                                <div class="boximg">
                                    <img src="<?php echo $row['product_img'];?>">
                                </div>
                                <h6 class="caption"><?php echo $row['product_details'];?></h6>
                                <div class="topdown">
                                    <h6 class="price">฿<?php echo number_format($row['product_price'], 2);?></h6>
                                    <h6 class="countsell">ขายแล้ว <?php echo $row['product_countsell'];?> ชิ้น</h6>
                                </div>
                            </a>
                        </div>
                    <?php   
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>  
</body>
<script>

function clickonme(){
    swal({
        title: "ออกจากระบบ",
        text: "คุณออกจากระบบสำเร็จ!",
        type: "success",
        showButtonCancel: true,
    }, function(isConfirm) {
            if(isConfirm){
                window.location = "<?php echo $mylocalhost;?>logout";
            }
            if(isCancel){
                window.location = "<?php echo $mylocalhost;?>logout";
            }
    });
}
</script>
</html>