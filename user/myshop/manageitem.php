<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

	$sql = "SELECT * FROM ((products INNER JOIN listproducts ON products.product_id = listproducts.product_id) INNER JOIN accounts ON listproducts.acc_id = accounts.acc_id AND listproducts.seller_id = '".$_SESSION['Uall_id']."') ORDER BY listproducts.list_id DESC";
	$query = mysqli_query($conn, $sql);
	$countorder = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $vps;?>assets/css/manageitem.css?v=<?=time();?>" rel="stylesheet">
    <title>Seller Center</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	
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
			<h5><?php echo $countorder;?> คำสั่งซื้อ</h5>
		</div>
		<div class="headbuttonright">
			<button id="totalorder">จัดส่งแบบชุด</button>
		</div>
	</div>
	<div class="card-itemlist" style="overflow-x:auto; overflow-y:auto;">
		<table class="tableitemlist">
			<tr>
				<th>สินค้าทั้งหมด</th>
				<th>ยอดคำสั่งซื้อทั้งหมด</th>
				<th>สถานะ</th>
				<th>สั่งซื้อโดย</th>
				<th>ช่องทางการชำระเงิน</th>
				<th>ดำเนินการ</th>
				
			</tr>
			<?php while($rowdata = mysqli_fetch_array($query)){?>
			<tr>
				<td class="itemshow"><img src="<?php echo $vps;?><?php echo $rowdata['product_img'];?>"> <a href="<?php echo $vps;?>shopitem/shop_item?itemid=<?php echo $rowdata['product_id'];?>"><?php echo $rowdata['product_name'];?></a> <font color="red">x<?php echo $rowdata['list_counto'];?></font></td>
				<td class="itemprice">฿<?php echo number_format($rowdata['list_totalprice']);?></td>
				<td><?php if($rowdata['list_state'] == "wait"){?>
						รอดำเนินการ
					<?php }?>
					<?php if($rowdata['list_state'] == "payment"){?>
						กำลังจัดส่ง
					<?php }?>
					<?php if($rowdata['list_state'] == "finish"){?>
						สำเร็จแล้ว
					<?php }?>
				</td>
				<td><?php echo $rowdata['acc_username'];?></td>
				<td>เก็บปลายทาง</td>
				<td class="itemaction">
					<?php if($rowdata['list_state'] == "payment"){?>
						<a href="<?php echo $vps;?>api/cancelorder?list_productid=<?php echo $rowdata['list_id'];?>"><button class="cancel">ยกเลิก</button></a>
					<?php }?>
					<?php if($rowdata['list_state'] == "wait"){?>
						<a href="<?php echo $vps;?>api/acceptorder?list_productid=<?php echo $rowdata['list_id'];?>"><button class="confirm">ยอมรับ</button></a> <a href="<?php echo $vps;?>api/refuseorder?list_productid=<?php echo $rowdata['list_id'];?>"><button class="cancel">ปฏิเสธ</button></a>
					<?php }?>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>
</body>
<script>
	$("#dateitem").on("change", function() {
		this.setAttribute(
			"data-date",
			moment(this.value, "YYYY-MM-DD")
			.format( this.getAttribute("data-date-format") )
		)
	}).trigger("change")
</script>
</html>