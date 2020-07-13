<?php
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once '../classes/category.php';
include_once '../classes/brand.php';
include_once '../classes/product.php';
?>
<?php 
    $pro = new Product();
    if(!isset($_GET['productid'])|| $_GET['productid']==NULL){
        echo "<script>window.location='listproduct.php'</script>";
    }else{
        $productid = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        $updateproduct = $pro->update_product($_POST, $_FILES,$productid);
    }
?>

	<div class="main">
		<div class="topmain">Sửa sản phẩm</div>
		<div class="centmain">
		<?php 
		if(isset($updateproduct)){
		    echo $updateproduct;
		}
		?>
		<?php 
		  $getproductbyid = $pro->getproductbyid($productid);
		  if($getproductbyid){
		      while ($resultproduc = $getproductbyid->fetch_assoc()){
		          
		      
		?>
			<form action="" method="post" name="formAddProduct" class="formAddProduct" enctype="multipart/form-data">
				<table>
					<tr>
					<td>Tên hàng hóa:</td>
					<td><input type="text" value="<?php echo $resultproduc['TenHH']?>" name="nameproduct"></td>
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
						<option 
						<?php 
						if($result['MaNhom']==$resultproduc['MaNhom']){echo "selected";}
						?>
						value="<?php echo $result['MaNhom']?>"><?php echo $result['TenNhom']?></option>
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
						<option 
						<?php 
						if($result['MaTH']==$resultproduc['MaTH']){echo "selected";}
						?>
						value="<?php echo $result['MaTH']?>"><?php echo $result['TenTH']?></option>
						<?php 
						      }
						  }
						?>
						</select>
					</td>
					</tr>
					<tr>
					<td>Mô tả:</td>
					<td><textarea name="product_desc"><?php echo $resultproduc['MoTaHH']?></textarea></td>
					</tr>
					<tr>
					<tr>
					<td>Giá:</td>
					<td><input type="text" value="<?php echo $resultproduc['Gia']?>" name="priceproduct"></td>
					</tr>
					<tr>
					<td>Số lượng:</td>
					<td><input type="text" value="<?php echo $resultproduc['SoLuongHang']?>" name="numproduct"></td>
					</tr>
					<td>Hình ảnh:</td>
					<td><input type="file" name="imgProduct"></td>
					</tr>
					<tr>
						<td></td>
						<td><img alt="img" src="uploads/<?php echo $resultproduc['Hinh']?>" width="100px" height="100px"></td>
					</tr>
					<tr>
					<td>Loại:</td>
					<td>
					<select name="selecttype">
					<?php 
					if($resultproduc['type']==1){
					    
					?>
						<option value="1" selected>Nổi bậc</option>
						<option value="0">Không nổi bậc</option>
						<?php 
					}
					else{
					   
						?>
						<option value="1">Nổi bậc</option>
						<option value="0" selected>Không nổi bậc</option>
						<?php 
					   }
						?>
					</select>
					</td>
					</tr>
					<tr>
					<td colspan="2"><center><input type="submit" value="Sửa" name="submit"></center></td>
					</tr>
				</table>
			</form>
			<?php 
		      }
		  }
			?>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>	
