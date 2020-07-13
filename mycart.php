<?php 
	include "inc/header.php";
?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $cartid = $_POST['cartid'];
    $quantity = $_POST['quantity'];
    $updatequantitycart = $cart->update_quantity_cart($quantity, $cartid);
}
if(isset($_GET['cartid'])){
    $id = $_GET['cartid'];
    $deletecartid = $cart->delete_cartid($id);
}
?>
<?php 
// tu dong refesh trang cap nhat tuc thi du lieu
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
	<div class="containcart">
    	<h2>Giỏ hàng của bạn</h2>
    	<?php 
    	if(isset($updatequantitycart)){
    	    echo $updatequantitycart;
    	}
    	if(isset($deletecartid)){
    	    echo $deletecartid;
    	}
    	?>
				<table class="tblone">
						<tr>
							<th width="20%">Tên sản phẩm</th>
							<th width="10%">Ảnh</th>
							<th width="15%">Giá/1sp</th>
							<th width="25%">Số lượng</th>
							<th width="20%">Tổng tiền</th>
							<th width="10%">Hành động</th>
						</tr>
						<?php 
						      $showmycart = $cart->show_mycart();
						      $subtotal =0;
						      if($showmycart){
						         $qty=0;
						          while($result = $showmycart->fetch_assoc()){
						     						         
						?>
							<tr>
								<td><?php echo $result['TenSanPham']?></td>
								<td><img src="admin/uploads/<?php echo $result['HinhAnh']?>" alt="img"/></td>
								<td><?php echo $fm->format_currency($result['GiaSanPham'])?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['IdGiohang']?>"/>
										<input type="number" name="quantity" value="<?php echo $result['SoLuong']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td><?php 
								$total = $result['GiaSanPham']*$result['SoLuong'];
								echo $fm->format_currency($total);
								?></td>
								<td><a href="?cartid=<?php echo $result['IdGiohang']?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="30%">
							<tr>
								<th>Sub Total : </th>
								<td><b><?php 
								echo $fm->format_currency($subtotal);
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
								    echo $fm->format_currency($gtotal); 
								?>
								</b></td>
							</tr>
					   </table>	
					   <?php 
						}else{
						    echo "<span class='success'>Giỏ hàng của bạn đang bị rỗng mua hàng ngay nào!</span>";
						}
					   ?>
			<div class="shoping">
					<div class="shopingleft">
						<a href="index.php"><img alt="continueshoping" src="image/shop.png"></a>
					</div>
					<div class="shopingright">
						<a href="payment.php"><img alt="checkout" src="image/check.png"></a>
					</div>
			</div>
    </div>  	
<?php 
	include "inc/footer.php";
?>