<?php 
include_once "inc/headernv.php";
include_once '../classes/order.php';
?>
<?php 
$order=new Order();
if(isset($_GET['idorder'])){
    $seid=Session::get('employeeID');
    $orderid = $_GET['idorder'];
    $updateorder=$order->update_order($orderid,$seid);
}
if(isset($_GET['delorderid'])){
    $delid = $_GET['delorderid'];
    $deletedetailorder=$order->delete_detail_order($delid);// xoa chi tiet dat hang truoc
    $deleteorder = $order->delete_order($delid);// xoa don dat hang
}
?>
	<div class="main">
		<div class="topmain">Duyệt đơn hàng</div>
		<div class="centmain">
		<table class="listOrder">
					<tr>
					<td width="5%"><b>STT</b></td>
					<td width="20%"><b>Tên khách hàng</b></td>
					<td width="20%"><b>Người duyệt đơn</b></td>
					<td width="25%"><b>Ngày đặt</b></td>
					<td width="10%"><b>Tình trạng</b></td>
					<td colspan="3" width="25%" ><b>Quản lý</b></td>
					
					</tr>
					
				<?php 
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
					<td><a href="detailsorder.php?idorder=<?php echo $result['SoDonDH']?>">Xem</a></td>
					<td>
					<?php 
					$checkTT=$result["TrangThai"];
					if($checkTT=="chua duyet"){
					    echo '<a href="indexnv.php?idorder='.$result['SoDonDH'].'">Duyệt</a>';
					}
					    
					?>

					</td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?delorderid=<?php echo $result['SoDonDH']?>">Xóa</a></td>
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
