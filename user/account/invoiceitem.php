<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

    $sql = "SELECT * FROM invoices INNER JOIN listproducts ON invoices.item_id = listproducts.product_id INNER JOIN products ON invoices.item_id = products.product_id 
    INNER JOIN accounts ON products.acc_id = accounts.acc_id WHERE invoices.item_id = '".$_GET['itemid']."' AND listproducts.acc_id = '".$_SESSION['Uall_id']."'";
	$query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $mylocalhost;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/css/myorder.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $mylocalhost;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>
<body style="background-color: #f1f1f1;">
    <?php include('../../navbar.php');?>
    <div id="main">
        <div clsss="contain">
            <div class="body1">
                <div class="navbar-left">
                    <div class="ontop">
                        <div class="profileimg" style="width:60px; height:60px;">
                            <img id="output2">
                        </div>
                        <h6><?php echo $_SESSION['Uall_username'];?> <br>ข้อมูลส่วนตัว</h6>
                    </div>
                    <div class="ondown">
                        <span class="myaccounts"><i style="color:#008FFF;" class="fas fa-user-alt"></i> บัญชีของฉัน</span>
                        <span class="history" id="profile">ประวัติส่วนตัว</span>
                        <span class="bank_card">บัญชีธนาคาร&บัตร</span>
                        <span class="address">ที่อยู่</span>
                        <span class="changepass">เปลี่ยนรหัสผ่าน</span>
                        <span class="mybuying" style="color:#ee4d2d;"><i style="color:#008FFF;" class="fas fa-clipboard"></i> การซื้อของฉัน</span>
                        <span class="notify"><i style="color:#FF7800;" class="fas fa-bell"></i> การแจ้งเตือน</span>
                        <span class="codeseller"><i style="color:#FF7800;" class="fas fa-archive"></i> โค้ดส่วนลดของฉัน</span>
                        <span class="shopcoin"><i style="color:#FFBD00;" class="fas fa-coins"></i> Shopee Coins ของฉัน</span>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="top">
                        <div class="topstatus">
                            <h6>หมายเลขคำสั่งซื้อ:######</h6>
                        </div>
                    </div>
                    <div class="down" style="background-color:white;">
                        <div class="left-info">
                            <h5>ที่อยู่จัดส่ง</h5>
                            <h6>
                                <br>
                                เบอร์โทรติดต่อ: <?php echo $result['acc_contact'];?><br>
                                <?php echo $_SESSION['Uall_address'];?>
                            </h6>
                        </div>
                        <div class="right-info">
                            <h5>การจัดส่ง</h5>
                            <br><h6>กำลังรอการจัดส่ง..........</h6>
                        </div>
                    </div>
                    <div class="item-list">
                        <div class="card-boxorder">
                            <div class="text-header">
                                ซื้อจาก: <?php echo $result['acc_username'];?>
                                <div class="text-right">
                                    (<?php echo $result['invoice_date'];?>)
                                    <?php if($result['list_state'] == 'wait'){?> รอดำเนินการ <?php }?>
                                    <?php if($result['list_state'] == 'payment') {?> ที่ต้องจัดส่ง <?php }?>
                                    <?php if($result['list_state'] == 'finish') {?> สำเร็จแล้ว <?php }?>
                                </div>
                            </div>
                            <div class="body-boxitem">
                                <img style="width:100px;" src="<?php echo $mylocalhost;?><?php echo $result['product_img'];?>">
                                <div class="infomessage-item">
                                    <span><?php echo $result['product_details'];?></span><br>
                                    <span>x<?php echo $result['list_counto'];?></span>
                                    <div class="item-price">
                                        ราคาต่อชิ้น: ฿<?php echo number_format($result['product_price'], 2);?><br>
                                        ราคารวม: ฿<?php echo number_format($result['invoice_total'], 2);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
<script>

    function changename(){
        $(".nameinput").addClass("show");
        $("#nameuser").addClass("hide");
    }

    var imgUrl = "<?php echo $mylocalhost;?>assets/img/users/<?php echo $_SESSION['Uall_username']?>";
    var tester = new Image();
    tester.onload=function() {
        document.getElementById("output2").src = imgUrl + '.png?t=' + new Date().getTime();
    };
    tester.onerror=function() { 
        document.getElementById("output2").src = imgUrl + '.jpeg?t=' + new Date().getTime();       
    };

    tester.src=imgUrl + '.png';

    var loadFile = function(event) {
        var image2 = document.getElementById('output2');
        image2.src = URL.createObjectURL(event.target.files[0]);
    };

    $("#inputdate").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")

    $('.buttonuploadimg').click(function() {
        $('#myfilepic').click();
    });

    $('#profile').click(function(){
        window.location = "<?php echo $mylocalhost;?>user/account/profile";
    })

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