<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $mylocalhost;?>assets/css/delivery.css?v=<?=time();?>" rel="stylesheet">
    <title>Seller Center</title>

</head>
<body>
	<nav class="style-4">
		<ul class="menu-4">
		  
		  <li><a href="#" data-hover="ทั้งหมด">ทั้งหมด</a></li>
		  <li><a href="#" data-hover="ยังไม่ชำระ">ยังไม่ชำระ</a></li>
          <li class="current"><a href="#" data-hover="ที่ต้องจัดส่ง">ที่ต้องจัดส่ง</a></li>
		  <li><a href="#" data-hover="การจัดส่ง">การจัดส่ง</a></li>
		  <li><a href="#" data-hover="สำเร็จ">สำเร็จ</a></li>
		  <li><a href="#" data-hover="การยกเลิก">การยกเลิก</a></li>
		  <li><a href="#" data-hover="การคืนเงิน/คืนสินค้า">การคืนเงิน/คืนสินค้า</a></li>
		</ul>
	</nav>
    <div class="search">
        <input type="text" placeholder="ค้นหาคำสั่งซื้อ">
    </div>
    <div class="dateDeli">
        <label for="telphone">วันที่ทำการสั่งซื้อ</label>
        <input type="date" id="birthday" name="birthday" value="<?php echo date('Y-m-d'); ?>" require><br>
        <button id="deli" type="submit">ส่งออก</button>
    </div>

    <div class="spacer"></div>

    <nav class="style-1">
		<a href="#" class="btn">ทั้งหมด</a>
		<a href="#" class="btn">ยังไม่ดำเนินการ</a>
		<a href="#" class="btn">ดำเนินการแล้ว</a>
	</nav>

    </div>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>&nbsp;</th>
						    	<th>Product</th>
						      <th>Price</th>
						      <th>Quantity</th>
						      <th>total</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
						    	<td>
						    		<div <a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side3.png" /></a><img  alt="" /></div>
						    	</td>
						      <td>
						      	<div class="email">
						      		<span>Sneakers Shoes 2020 For Men </span>
						      		<span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
						      	</div>
						      </td>
						      <td>$44.99</td>
						      <td class="quantity">
					        	<div class="input-group">
				             	<input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
				          	</div>
				          </td>
				          <td>$89.98</td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>&nbsp;</th>
						    	<th>Product</th>
						      <th>Price</th>
						      <th>Quantity</th>
						      <th>total</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
						    	<td>
						    		<div <a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side3.png" /></a><img  alt="" /></div>
						    	</td>
						      <td>
						      	<div class="email">
						      		<span>Sneakers Shoes 2020 For Men </span>
						      		<span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
						      	</div>
						      </td>
						      <td>$44.99</td>
						      <td class="quantity">
					        	<div class="input-group">
				             	<input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
				          	</div>
				          </td>
				          <td>$89.98</td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>&nbsp;</th>
						    	<th>Product</th>
						      <th>Price</th>
						      <th>Quantity</th>
						      <th>total</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
						    	<td>
						    		<div <a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side3.png" /></a><img  alt="" /></div>
						    	</td>
						      <td>
						      	<div class="email">
						      		<span>Sneakers Shoes 2020 For Men </span>
						      		<span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
						      	</div>
						      </td>
						      <td>$44.99</td>
						      <td class="quantity">
					        	<div class="input-group">
				             	<input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
				          	</div>
				          </td>
				          <td>$89.98</td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
						    	<th>&nbsp;</th>
						    	<th>Product</th>
						      <th>Price</th>
						      <th>Quantity</th>
						      <th>total</th>
						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
						    	<td>
						    		<div <a href="#" class="sub" tabindex="1"><img src="<?php echo $mylocalhost;?>/assets/img/side3.png" /></a><img  alt="" /></div>
						    	</td>
						      <td>
						      	<div class="email">
						      		<span>Sneakers Shoes 2020 For Men </span>
						      		<span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
						      	</div>
						      </td>
						      <td>$44.99</td>
						      <td class="quantity">
					        	<div class="input-group">
				             	<input type="text" name="quantity" class="quantity form-control input-number" value="2" min="1" max="100">
				          	</div>
				          </td>
				          <td>$89.98</td>
						      <td>
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>