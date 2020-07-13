<?php
include "inc/headernv.php";
include_once '../classes/order.php';
include_once '../classes/customer.php';
?>
<?php 
$order=new Order();
$cus= new Customer();
if(isset($_GET['idorder'])){
    $orderid=$_GET['idorder'];  
}
?>
<div class="main">
		<div class="topmain">Thông tin đơn hàng <?php echo "<b>$orderid</b>"?></div>
		<div class="centmain">
		<table class="listOrder">
					<tr>
							<th width="5%">ID</th>
							<th width="35%">Tên sản phẩm</th>
							<th width="20%">Giá/1sp</th>
							<th width="15%">Số lượng</th>
							<th width="25%">Tổng tiền</th>
					</tr>
					
				<?php 
				$show_order_detail = $order->show_order_detail($orderid);
				$idkh=0;
				if($show_order_detail){
					       $i=0;
					       while ($result = $show_order_detail->fetch_assoc()){
					           $i++;

					
				?>
 					<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['TenHH']?></td>
								<td><?php echo $result['GiaDatHang'].' '.'VND'?></td>
								<td><?php echo $result['SoLuong']?></td>
								<td><?php 
								$total = $result['GiaDatHang']*$result['SoLuong'];
								echo $total.' '.'VND';
								$idkh=$result['MSKH'];
								?></td>
								
					</tr>
					<?php 
					       }
					   }
					   $show_info_customer=$cus->show_customer($idkh);
					   while ($result1=$show_info_customer->fetch_assoc()){
					       echo "Họ tên khách hàng: <b>".$result1['HoTenKH']."</b><br>";
					       echo "Số điện thoại: <b>".$result1['SoDienThoai']."</b>";
					   }
					?>
					
			</table>
			<a href="indexnv.php">Quay lai</a>
		</div>
	</div>
<?php 
	include "inc/footer.php";
?>
