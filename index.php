<?php
    session_start();
    include('mysql_connection/my_connection.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee</title>
    <link href="assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<body>
    <header>    
        <div class="navbartop">
            <div class="navbar-warpper">
                <div class="navbar-warpperleft">
                    <a class="anormal" href="#">Seller Centre</a>
                    <a class="anormal" href="#">ขายสินค้ากับช้อปปี้</a>
                    <a class="anormal"href="#">ดาวน์โหลด</a>
                    <a class="aspec" href="#">ติดต่อเราบน</a>
                    <a class="iconapp" href="#"><i class="fab fa-facebook"></i></a>
                    <a class="iconapp" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="iconapp" href="#"><i class="fab fa-line"></i></a>
                </div>

                <div class="navbar-warpperright">
                    <a class="iconapp" href="#"><i class="far fa-bell"></i></a>
                    <a class="aspec right" href="#">การแจ้งเตือน</a>
                    <a class="iconapp" href="#"><i class="far fa-question-circle"></i></a>
                    <a class="aspec right" href="#">ช่วยเหลือ</a>
                    <?php if($_SESSION['Uall_id'] == ""){ ?>
                        <a class="aspec right" href="register">สมัครใหม่</a>
                        <a class="alogin right" href="login">เข้าสู่ระบบ</a>
                    <?php } else { ?>
                        <div class="dropdown">
                            <span class="dropbtn"><?php echo $_SESSION['Uall_username']; ?></span>
                            <div class="dropdown-content">
                                <a href="#">บัญชีของฉัน</a>
                                <a href="#">การซื้อของฉัน</a>
                                <a href="#" onclick="clickonme();">ออกจากระบบ</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="navbar-warpperdown">
                <img src="assets/img/logo.png">
                <input type="text" placeholder=" ค้นหาสินค้าและร้านค้า" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
                <i class="fas fa-shopping-cart cart"></i>
            </div>
            
            <div class="navbar-warpperdowntoo">
                <a href="#">ผักอบกรอบ</a>
                <a href="#">ชุดนอน</a>
                <a href="#">รองเท้าแตะผู้หญิง</a>
                <a href="#">แมส</a>
                <a href="#">กางเกงขาสั้น</a>
                <a href="#">เสื้อยืด</a>
                <a href="#">เสื้อครอป</a>
                <a href="#">ชั้นวางของ</a>
            </div>
        </div>
    </header>
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
                window.location = "logout";
            }
            if(isCancel){
                window.location = "logout";
            }
    });
}
</script>
</html>