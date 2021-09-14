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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <a class="aspec right" href="#">สมัครใหม่</a>
                    <a class="alogin right" href="#">เข้าสู่ระบบ</a>
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
                    <a href="#"><img src="./assets/img/event3.png"></a>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>