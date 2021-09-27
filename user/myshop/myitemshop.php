<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

	if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

	$sql = "SELECT * FROM products WHERE acc_id = '".$_SESSION['Uall_id']."'";
	$sql .= "ORDER BY product_id DESC";
	$query = mysqli_query($conn, $sql);
	$countorder = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $vps;?>assets/css/myitemshop.css?v=<?=time();?>" rel="stylesheet">
    <title>Seller Center</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	
</head>
<body>
	<div class="modal fade" id="editmyitem">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">รายละเอียดสินค้า</h5>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
			</div>
			<div class="modal-body">
				<div id="item_detail">  
				</div> 
			</div>
			</div>
		</div>
	</div>
	<div class="headmenu">
		<span class="marker">จัดการสินค้า</span>	
	</div>
	<div class="display-serach">
		<div class="search">
			<input type="text" placeholder="ค้นหาสินค้า">
		</div>
		<div class="dateDeli">
			<label for="telphone">ค้นสินค้าโดยวันที่</label>
			<input id="dateitem" name="dateitem" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo date('Y-m-d'); ?>">
			<button id="deli" type="submit">ค้นหา</button>
		</div>
	</div>
	<div class="headcountitem">
		<div class="headcountorder">
			<h5><?php echo $countorder;?> สินค้า</h5>
		</div>
	</div>
	<div class="card-itemlist" style="overflow-x:auto; overflow-y:auto;">
		<table class="tableitemlist">
			<tr>
				<th>สินค้าทั้งหมด</th>
				<th>ราคาสินค้า</th>
				<th>รายละเอียด</th>
				<th>จำนวนที่ขายได้</th>
				<th>ดำเนินการ</th>
				
			</tr>
			<?php while($rowdata = mysqli_fetch_array($query)){?>
			<tr>
				<td class="itemshow"><img src="<?php echo $vps;?><?php echo $rowdata['product_img'];?>"> <a href="<?php echo $vps;?>shopitem/shop_item?itemid=<?php echo $rowdata['product_id'];?>"><?php echo $rowdata['product_name'];?></a> <font color="red">x<?php echo $rowdata['product_count'];?></font></td>
				<td class="itemprice">฿<?php echo number_format($rowdata['product_price']);?></td>
				<td><?php echo $rowdata['product_details'];?></td>
				<td><?php echo $rowdata['product_countsell'];?></td>
				<td class="itemaction">
				<a href="#" id="<?php echo $rowdata['product_id'];?>" class="view_data" role="button" data-bs-toggle="modal" data-bs-target="#editmyitem">
					<button class="edit">แก้ไข</button>
				</a> 
				<a href="<?php echo $vps;?>api/removemyitem?myproduct_id=<?php echo $rowdata['product_id'];?>"><button class="cancel">ลบ</button></a></td>
			</tr>
			<?php }?>
		</table>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script>

	$(document).ready(function(){  
		$('.view_data').click(function(){  
			var itemid = $(this).attr("id");  
			$.ajax({  
					url:"<?php echo $vps;?>api/editmyitem",  
					method:"post",  
					data:{itemid:itemid},  
					success:function(data){  
						$('#item_detail').html(data);  
					}  
			});  
		});  
	}); 

	$("#dateitem").on("change", function() {
		this.setAttribute(
			"data-date",
			moment(this.value, "YYYY-MM-DD")
			.format( this.getAttribute("data-date-format") )
		)
	}).trigger("change")
</script>
</html>