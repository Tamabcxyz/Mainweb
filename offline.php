<?php
include "inc/header.php";
?>
<?php 
if(isset($_GET['orderid'])&&$_GET['orderid']=='order'){
    $customerid = Session::get('customer_id');
    $insertorder = $cart->insert_from_cart_to_order($customerid);
    $deletecart=$cart->delete_all_productincart();// sau khi them vao order xoa cac giu lieu trong cart
    header("Location:success.php");
}
?>
<form action="" method="post">
	<div class="contentdetail">
		<div class="topboxsp"><h3>Thanh toán Offline</h3></div>
		<div class="box_left">
    	<h2>Giỏ hàng của bạn</h2>
				<table class="tblone">
						<tr>
							<th width="5%">ID</th>
							<th width="35%">Tên sản phẩm</th>
							<th width="20%">Giá/1sp</th>
							<th width="15%">Số lượng</th>
							<th width="25%">Tổng tiền</th>
						</tr>
						<?php 
						      $showmycart = $cart->show_mycart();
						      $subtotal =0;
						      if($showmycart){
						         $qty=0;
						         $i=0;
						          while($result = $showmycart->fetch_assoc()){
						     		$i++;				         
						?>
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $result['TenSanPham']?></td>
								<td><?php echo $fm->format_currency($result['GiaSanPham']).' '.'VND'?></td>
								<td><?php echo $result['SoLuong']?></td>
								<td><?php 
								$total = $result['GiaSanPham']*$result['SoLuong'];
								echo $fm->format_currency($total).' '.'VND';
								?></td>
							</tr>
						<?php 
						          $subtotal += $total;
						          $qty += $result['SoLuong'];
						          }
						      }
						?>	
							
						</table>
						<?php 
						// kiem tra neu gio hang co ton tai moi in ra subtotal vat va grand total
						$checkcart = $cart->check_cart();
						if($checkcart){   
						?>
						<table style="float:right;text-align:left; margin-top:10px" width="50%">
							<tr>
								<th>Sub Total : </th>
								<td><b><?php 
								echo $fm->format_currency($subtotal).' '.'VND';
								Session::set('sum',$subtotal);
								Session::set('qty', $qty);
								?></b></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td><b>10%</b></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><b>
								<?php 
								    $vat = $subtotal * 0.1;
								    $gtotal = $subtotal + $vat;
								    echo $fm->format_currency($gtotal).' '.'VND'; 
								?>
								</b></td>
							</tr>
					   </table>	
					   <?php 
						}else{
						    echo "<span class='success'>Giỏ hàng của bạn đang bị rỗng mua hàng ngay nào!</span>";
						}
					   ?> 	
		</div>
		<div class="box_right">
			<h2>Thông tin tài khoản</h2>
			<table>
			<?php 
			 $id = Session::get('customer_id');
			     $showcustomer = $cs->show_customer($id);
			     if($showcustomer){
			         while ($result = $showcustomer->fetch_assoc()){
			      
			?>
				<tr>
					<td class="profilebold">Tên tài khoản:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['HoTenKH']?></td>
				</tr>
				<tr>
					<td class="profilebold">Địa chỉ:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['DiaChi']?></td>
				</tr>
				<tr>
					<td class="profilebold">Số điện thoại:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['SoDienThoai']?></td>
				</tr>
				<tr>
					<td class="profilebold">Mail:</td>
					<td></td>
					<td class="profileitalic"><?php echo $result['email']?></td>
				</tr>
				<tr>
					<td colspan="3" class="profilebold"><center><a href="editprofile.php"><i>Thay đổi thông tin</i></a></center></td>
				</tr>
			<?php 
			         }
			     }
			?>
			</table>
		</div>
		<a href="?orderid=order" class="button_order">Đặt hàng</a>
 	</div>
 </form>
<?php 
	include "inc/footer.php";
?>