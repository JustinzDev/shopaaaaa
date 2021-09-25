<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <script>
        $(document).ready(function(){
            var trigger = $('#nav li ul a'),
                container = $('#contentdata');

            trigger.on('click', function(){
                var $this = $(this)
                target = $this.data('target');

                container.load(target);
                return false;
            });
        });
    </script>
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/shop.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="htpps://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="htpps://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <ul id="nav">
        <li><a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side.png" />การจัดส่ง</a><img alt="" />
            <ul>
                <li><a href="#" data-target="manageitem">การจัดส่งของฉัน</a></li>
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
</body>
</html>