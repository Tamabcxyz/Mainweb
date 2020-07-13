<?php 
	include "inc/header.php";
?>
	<div class="containsuccess">
    			<div class="success">Đặt hàng thành công</div>
    			<p>Chúng tôi sẽ gọi cho bạn qua SDT:<?php echo "<b>" .Session::get('phone')."</b>"?> để xác nhận thông tin đơn hàng!</p>
    			<p>Kiểm tra đơn hàng <a href="orderdetail.php">tại đây</a></p>
 	</div>
<?php 
	include "inc/footer.php";
?>