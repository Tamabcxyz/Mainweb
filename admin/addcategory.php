<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/category.php';
?>
<?php 
$cat = new Category();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $catName = $_POST['categoryname'];
    $insercategory = $cat->insert_category($catName);
}
?>
	<div class="main">
		<div class="topmain">Thêm loại sản phẩm</div>
		<div class="centmain">
		<?php 
		if(isset($insercategory)){
		    echo $insercategory;
		}
		?>
			<form action="addcategory.php" method="post">
				<table class="form">					
                <tr>
                    <td>
                        <label>Tên loại:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Tên loại sp..."  name="categoryname" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
			</form>
		</div>
	</div>
<?php 
	include_once "inc/footer.php";
?>	