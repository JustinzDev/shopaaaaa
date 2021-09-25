<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

	$sql = "SELECT * FROM listproducts WHERE seller_id = '".$_SESSION['Uall_id']."'";
	$query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

	$loadproduct = "SELECT * FROM products WHERE acc_id = '".$_SESSION['Uall_id']."' AND product_id = '".$result['product_id']."'";
	$queryproduct = mysqli_query($conn, $loadproduct);

	$myname = "SELECT acc_username FROM accounts WHERE acc_id = '".$result['acc_id']."'";
	$querynameuser = mysqli_query($conn, $myname);

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
			<?php while($rowdata = mysqli_fetch_array($queryproduct)){?>
			<tr>
				<td class="itemshow"><img src="<?php echo $mylocalhost;?><?php echo $rowdata['product_img'];?>"> <a href="#"><?php echo $rowdata['product_name'];?></a></td>
				<td class="itemprice">10,000</td>
				<td>ยังไม่ได้ชำระเงิน</td>
				<td><?php echo $rowdata['product_name'];?></td>
				<td>เก็บปลายทาง</td>
				<td class="itemaction"><a href="#"><button class="confirm">ยอมรับ</button></a> <a href="#"><button class="cancel">ปฏิเสธ</button></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
</body>
</html>