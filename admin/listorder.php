<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/order.php';
?>
	<div class="main">
		<div class="topmain">Danh sách đơn hàng</div>
		<div class="centmain">
		<table class="listOrder">
					<tr>
					<td><b>STT</b></td>
					<td><b>Tên khách hàng</b></td>
					<td><b>Người duyệt đơn</b></td>
					<td><b>Ngày đặt</b></td>
					<td><b>Tình trạng</b></td>
					</tr>
					
				<?php 
				$order=new Order();
					$show_order = $order->show_order();
					   if($show_order){
					       $i=0;
					       while ($result = $show_order->fetch_assoc()){
					           $i++;

					
				?>
 					<tr>
					<td><?php echo $i?></td>
					<td><?php echo $result["HoTenKH"]?></td>
					<td><?php echo $result["HoTenNV"]?></td>
					<td><?php echo $result["NgayDH"]?></td>
					<td><?php echo $result["TrangThai"]?></td>
					</tr>
					<?php 
					       }
					   }
					?>
	
			</table>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>