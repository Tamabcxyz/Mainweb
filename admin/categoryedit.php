<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/category.php';
?>
<?php 
$cat = new Category();
if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
   echo "<script>window.location='listcategory.php';</script>";
}else{
    $id = $_GET['catid'];
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $catName = $_POST['categoryname'];
    $updatecategory = $cat->update_category($catName, $id);
}
?>
	<div class="main">
		<div class="topmain">Sửa loại sản phẩm</div>
		<div class="centmain">
		<?php 
		if(isset($updatecategory)){
		    echo $updatecategory;
		}
		?>
		<?php 
		$getcatname = $cat->getcatbyid($id);
		if($getcatname){
		    while($result = $getcatname->fetch_assoc()){
		        
		   
		?>
			<form action="" method="post"><!-- action o day phai la rong no moi gui catid ve dung nhu link khi click vao sua neu gui trang khac thi se ko co id de capnhat vao csdl -->
				<table class="form">					
                <tr>
                    <td>
                        <label>Tên loại:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Bạn muốn sửa thành loại gì?"  name="categoryname" value="<?php echo $result['TenNhom']?>" />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Sửa" />
                    </td>
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
