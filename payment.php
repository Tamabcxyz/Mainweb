<?php
include "inc/header.php";
?>
<?php 
// neu nguoi dung chua dang nhap nhung ho co the danh nhap tren url thi cho ho quay lai trang login
    $logincheck = Session::get('customer_login');
    if($logincheck==FALSE){
        header('Location:login.php');
    }
?>
	<div class="contentdetail">
		<div class="topboxsp"><h3>Thanh toán</h3></div>
		<div class="profile">
			<div class="payment">
				<div class="titlepay">Chọn phương thức thanh toán của bạn</div>
				<div class="choosepay">
					<div class="leftchoose"><a href="offline.php">Thanh toán offline</a></div>
					<div class="rightchoose"><a href="online.php">Thanh toán online</a></div>
				</div>
				<div class="previous"><a href="mycart.php">&#x3C;&#x3C;Quay lại</a></div>
			</div>
		</div>
	</div>
<?php 
	include "inc/footer.php";
?>

