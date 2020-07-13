<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/category.php';
	include_once '../classes/brand.php';
	include_once '../classes/product.php';
	include_once '../format/format.php';
?>
<?php 
$pro =new Product();
$fm =new Format();
    $delpro="";
    if(isset($_GET['productid'])){
        $id = $_GET['productid'];
        $delpro = $pro->delete_product($id);
    }
?>
	<div class="main">
		<div class="topmain">Danh sách hàng hóa</div>
		<div class="centmain">
		<?php 
		if(isset($delpro)){
		    echo $delpro;
		}
		?>
			<table class="listProduct">
					<tr>
					<td><b>Tên hàng hóa</b></td>
					<td><b>Loại hàng hóa</b></td>
					<td><b>Thương hiệu</b></td>
					<td><b>Mô tả</b></td>
					<td><b>Giá</b></td>
					<td><b>Số lượng</b></td>
					<td><b>Hình ảnh</b></td>
					<td><b>Loại</b></td>
					<td colspan="2"><b>Quản lý</b></td>
					</tr>
					<?php 
					 $listpro = $pro->show_product();
					 if($listpro){
					     while($result = $listpro->fetch_assoc()){
					         
					  
					?>
					<tr>
					<td><b><?php echo $result['TenHH']?></b></td>
					<td><?php echo $result['TenNhom']?></td>
					<td><?php echo $result['TenTH']?></td>
					<td><?php echo $fm->textShorten($result['MoTaHH'],15) ?></td>
					<td><?php echo $result['Gia']?></td>
					<td><?php echo $result['SoLuongHang']?></td>
					<td><img alt="img" src="uploads/<?php echo $result['Hinh']?>"></td>
					<td><?php 
					if($result['type']==1){
					    echo "Nổi bậc";
					}else{
					    echo "Không nổi bậc";
					}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['MSHH']?>">Sửa</a></td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?productid=<?php echo $result['MSHH']?>">Xóa</a></td>
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