<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $mylocalhost;?>assets/css/manageitem.css?v=<?=time();?>" rel="stylesheet">
    <title>Seller Center</title>
	
</head>
<body>
	<div class="headmenu">
		<span class="marker">ทั้งหมด</span>	
	</div>
	<div class="display-serach">
		<div class="search">
			<input type="text" placeholder="ค้นหาคำสั่งซื้อ">
		</div>
		<div class="dateDeli">
			<label for="telphone">วันที่ทำการสั่งซื้อ</label>
			<input id="dateitem" name="dateitem" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo date('Y-m-d'); ?>">
			<button id="deli" type="submit">ส่งออก</button>
		</div>
	</div>
	<div class="headcountitem">
		<div class="headcountorder">
			<h5>0 คำสั่งซื้อ</h5>
		</div>
		<div class="headbuttonright">
			<button id="totalorder">จัดส่งแบบชุด</button>
		</div>
	</div>
	<div class="card-itemlist">
		<table class="tableitemlist">
			<tr>
				<th>สินค้าทั้งหมด</th>
				<th>ยอดคำสั่งซื้อทั้งหมด</th>
				<th>สถานะ</th>
				<th>สั่งซื้อโดย</th>
				<th>ช่องทางการชำระเงิน</th>
				<th>ดำเนินการ</th>
			</tr>
			<tr>
				<td class="itemshow"><img src="<?php echo $mylocalhost;?>assets/img/shop/shop1.jpg"> <a href="#">ชื่อสินค้า</a></td>
				<td class="itemprice">10,000</td>
				<td>ยังไม่ได้ชำระเงิน</td>
				<td>JustinzDev</td>
				<td>เก็บปลายทาง</td>
				<td class="itemaction"><a href="#"><button class="confirm">ยอมรับ</button></a> <a href="#"><button class="cancel">ปฏิเสธ</button></a></td>
			</tr>
		</table>
	</div>
</body>
</html>