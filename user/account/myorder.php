<?php
    session_start();
    include('../../mysql_connection/my_connection.php');
    error_reporting(0);
    include('../../api/setlink.php');

    if($_SESSION['Uall_id'] == ""){
		echo "<script>window.location='index';</script>";
        exit();
    }

    $sql = "SELECT * FROM ((products INNER JOIN listproducts ON products.product_id = listproducts.product_id) 
    INNER JOIN accounts ON listproducts.seller_id = accounts.acc_id) 
    WHERE listproducts.acc_id = '".$_SESSION['Uall_id']."' ORDER BY list_id DESC";
	$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopa</title>
    <link href="<?php echo $vps;?>assets/css/main.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/css/myorder.css?v=<?=time();?>" rel="stylesheet">
    <link href="<?php echo $vps;?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
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
                        <span class="address" id="myaddress">ที่อยู่</span>
                        <span class="changepass">เปลี่ยนรหัสผ่าน</span>
                        <span class="mybuying" style="color:#ee4d2d;"><i style="color:#008FFF;" class="fas fa-clipboard"></i> การซื้อของฉัน</span>
                        <span class="notify"><i style="color:#FF7800;" class="fas fa-bell"></i> การแจ้งเตือน</span>
                        <span class="codeseller"><i style="color:#FF7800;" class="fas fa-archive"></i> โค้ดส่วนลดของฉัน</span>
                        <span class="shopcoin"><i style="color:#FFBD00;" class="fas fa-coins"></i> Shopee Coins ของฉัน</span>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="top">
                        <span class="spanchecked">ทั้งหมด</span>
                        <span>ที่ต้องชำระ</span>
                        <span>ที่ต้องจัดส่ง</span>
                        <span>ที่ต้องได้รับ</span>
                        <span>สำเร็จแล้ว</span>
                        <span>ยกเลิกแล้ว</span>
                    </div>
                    <div class="down">
                        <?php while($rowdata = mysqli_fetch_array($query)){?>
                            <div class="card-boxorder">
                                <div class="text-header">
                                    ซื้อจาก: <?php echo $rowdata['acc_username'];?>
                                    <div class="text-right">
                                        <?php if($rowdata['list_state'] == 'wait'){?> รอดำเนินการ <?php }?>
                                        <?php if($rowdata['list_state'] == 'payment') {?> ที่ต้องจัดส่ง <?php }?>
                                        <?php if($rowdata['list_state'] == 'finish') {?> สำเร็จแล้ว <?php }?>
                                    </div>
                                </div>
                                <a href="<?php echo $vps;?>user/account/invoiceitem?itemid=<?php echo $rowdata['product_id'];?>">
                                    <div class="body-boxitem">
                                        <img src="<?php echo $vps;?><?php echo $rowdata['product_img'];?>">
                                        <div class="infomessage-item">
                                            <span><?php echo $rowdata['product_details'];?></span><br>
                                            <span>x<?php echo $rowdata['list_counto'];?></span>
                                            <div class="item-price">฿<?php echo number_format($rowdata['list_totalprice'], 2);?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
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

    var imgUrl = "<?php echo $vps;?>assets/img/users/<?php echo $_SESSION['Uall_username']?>";
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
        window.location = "<?php echo $vps;?>user/account/profile";
    })

    $('#myaddress').click(function(){
        window.location = "<?php echo $vps;?>user/account/myaddress";
    })

    function clickonme(){
        swal({
            title: "ออกจากระบบ",
            text: "คุณออกจากระบบสำเร็จ!",
            type: "success",
            showButtonCancel: true,
        }, function(isConfirm) {
                if(isConfirm){
                    window.location = "<?php echo $vps;?>logout";
                }
                if(isCancel){
                    window.location = "<?php echo $vps;?>logout";
                }
        });
    }
</script>
</html>