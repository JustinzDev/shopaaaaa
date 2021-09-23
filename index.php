<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
    include('api/setlink.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                <div class="eventimg">
                    <a href="#"><img style="border-radius: 10px;" src="./assets/img/event3.png"></a>
                </div>

                <div class="category_box">
                    <h5>หมวดหมู่</h5>
                    <div class="category_carditem">
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/1.png"> เสื้อผ้าแฟชั่นผู้ชาย</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/2.png"> มือถือและอุปกรณ์เสริม</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/3.png"> อาการเสริมและผลิตภัณฑ์สุขภาพ</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/4.png"> นาฬิกาและแว่นตา</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/5.png"> รองเท้าผู้ชาย</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/6.png"> คอมพิวเตอร์และแล็ปท็อป</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/7.png"> กล้องและอุปกรณ์ถ่ายภาพ</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/8.png"> กิฬาและกิจกรรมกลางแจ้ง</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/9.png"> สื่อบันเทิงภายในบ้าน</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/10.png"> เกมและอุปกรณ์เสริม</a>
                        </div>
                        <!-- rows 2 -->
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/11.png"> เสื้อผ้าแฟชั่นผู้หญิง</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/12.png"> ความงามและของใช้ส่วนตัว</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/13.png"> ของเล่น สินค้าแม่และเด็ก</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/14.png"> เครื่องใช้ในบ้าน</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/15.png"> กระเป๋า</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/16.png"> รองเท้าผู้หญิง</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/17.png"> เครื่องประดับ</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/18.png"> อาหารและเครื่องดื่ม</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/19.png"> เครื่องใช้ไฟฟ้าภายในบ้าน</a>
                        </div>
                        <div class="img-carditem">
                            <a href="#"><img style="width:100px;" src="assets/img/categorys/20.png"> สัตว์เลี้ยง</a>
                        </div>
                    </div>
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