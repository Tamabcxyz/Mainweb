<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/category.php';
	include_once '../classes/brand.php';
	include_once '../classes/product.php';
?>
<?php 
    $pro = new Product();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $inserproduct = $pro->insert_product($_POST, $_FILES);
}
?>

	<div class="main">
		<div class="topmain">Thêm sản phẩm</div>
		<div class="centmain">
		<?php 
		if(isset($inserproduct)){
		    echo $inserproduct;
		}
		?>
			<form action="addproduct.php" method="post" name="formAddProduct" class="formAddProduct" enctype="multipart/form-data">
				<table>
					<tr>
					<td>Tên hàng hóa:</td>
					<td><input type="text" value="" name="nameproduct"></td>
					</tr>
					<tr>
					<td>Loại hàng hóa:</td>
					<td>
						<select name="category">
						<option>------select-------</option>
						<?php 
						  $cat = new Category();
						  $listcategory = $cat->show_category();
						  if($listcategory){
						      while ($result = $listcategory->fetch_assoc()){
						          
						     
						?>
						<option value="<?php echo $result['MaNhom']?>"><?php echo $result['TenNhom']?></option>
						<?php 
						      }
						  }
						?>
						</select>
					</td>
					</tr>
					<tr>
					<td>Thương hiệu:</td>
					<td>
						<select name="brand">
						<option>------select-------</option>
						<?php 
						  $brand = new Brand();
						  $brandlist = $brand->show_brand();
						  if($brandlist){
						      while($result = $brandlist->fetch_assoc()){
						          
						     
						?>
						<option value="<?php echo $result['MaTH']?>"><?php echo $result['TenTH']?></option>
						<?php 
						      }
						  }
						?>
						</select>
					</td>
					</tr>
					<tr>
					<td>Mô tả:</td>
					<td><textarea name="product_desc"></textarea></td>
					</tr>
					<tr>
					<tr>
					<td>Giá:</td>
					<td><input type="text" value="" name="priceproduct"></td>
					</tr>
					<tr>
					<td>Số lượng:</td>
					<td><input type="text" value="" name="numproduct"></td>
					</tr>
					<td>Hình ảnh:</td>
					<td><input type="file" name="imgProduct"></td>
					</tr>
					<tr>
					<td>Loại:</td>
					<td>
						<select name="selecttype">
						<option value="1">Nổi bậc</option>
						<option value="0">Không nổi bậc</option>
					</select>
					</td>
					</tr>
					<tr>
					<td colspan="2"><center><input type="submit" value="Thêm" name="submit"></center></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>	