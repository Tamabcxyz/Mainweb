<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/customer.php';
?>
<?php 
$cus = new Customer();
?>
	<div class="main">
		<div class="topmain">Danh sách khách hàng</div>
		<div class="centmain">
			<table class="listCustomer">
					<tr>
					<td><b>STT</b></td>
					<td><b>Họ tên</b></td>
					<td><b>Địa chỉ</b></td>
					<td><b>Số điện thoại</b></td>
					<td><b>Mail</b></td>
					
					</tr>
					<?php 
					   $showlist=$cus->show_listcustomer();
					   if($showlist){
					       $i=0;
					       while($result =$showlist->fetch_assoc()){
					          $i++;    
					?>
					<tr>
					<td><?php echo $i?></td>
					<td><?php echo $result['HoTenKH']?></td>
					<td><?php echo $result['DiaChi']?></td>
					<td><?php echo $result['SoDienThoai']?></td>
					<td><?php echo $result['email']?></td>
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