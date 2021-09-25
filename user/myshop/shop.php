<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/shop.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="htpps://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="htpps://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="container">

<ul id="nav">
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side.png" />การจัดส่ง</a><img alt="" />
        <ul>
            <li><a href="#">การจัดส่งของฉัน</a></li>
            <li><a href="#">การจัดส่งแบบชุด</a></li>
            <li><a href="#">ตั้งค่าการจัดส่ง</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side2.png" />คำสั่งซื้อ</a><img alt="" />
        <ul>
            <li><a href="#">คำสั่งซื้อของฉัน</a></li>
            <li><a href="#">การยกเลิก</a></li>
            <li><a href="#">การคืนเงิน/คืนสินค้า</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side3.png" />สินค้า</a><img  alt="" />
        <ul>
            <li><a href="#">สินค้าของฉัน</a></li>
            <li><a href="#">เพิ่มสินค้าใหม่</a></li>
            <li><a href="#">สินค้าที่ถูกระงับ</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side4.png" />Marketing Centre</a><img  alt="" />
        <ul>
            <li><a href="#">Marketing Centre</a></li>
            <li><a href="#">Shopa Ads</a></li>
            <li><a href="#">โค้ดส่วนลด</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side5.png" />การเงิน</a><img  alt="" />
        <ul>
            <li><a href="#">รายรับของฉัน</a></li>
            <li><a href="#">Seller Balance</a></li>
            <li><a href="#">บัญชีธนาคาร</a></li>
            <li><a href="#">ตั้งค่าการชำระเงิน</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side6.png" />ข้อมูล</a><img  alt="" />
        <ul>
            <li><a href="#">Business Insights</a></li>
            <li><a href="#">Account Health</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side7.png" />การเติบโต</a><img  alt="" />
        <ul>
            <li><a href="#">Seller Missions</a></li>
            <li><a href="#">ร้านค้าแนะนำ</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side8.png" />การบริการลูกค้า</a><img  alt="" />
        <ul>
            <li><a href="#">ตัวช่วยตอบแชท</a></li>
            <li><a href="#">ตัวช่วยจัดการ FAQ</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side9.png" />ร้านค้า</a><img  alt="" />
        <ul>
            <li><a href="#">คะแนนร้านค้า</a></li>
            <li><a href="#">รายละเอียดร้านค้า</a></li>
            <li><a href="#">การตกแต่งหน้าร้าน</a></li>
            <li><a href="#">หมวดหมู่ในร้านค้า</a></li>
            <li><a href="#">รายงานของฉัน</a></li>
        </ul>
    </li>
    <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side10.png" />การตั้งค่า</a><img  alt="" />
        <ul>
            <li><a href="#">ที่อยู่ของฉัน</a></li>
            <li><a href="#">ตั้งค่าร้านค้า</a></li>
            <li><a href="#">บัญชี</a></li>
            <li><a href="#">พาร์ทเนอร์แพลตฟอร์ม</a></li>
        </ul>
    </li>
</ul>

</div>
</body>
</html>