<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/category.php';
?>
<?php 
    $delcat="";
    $cat = new Category();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $delcat = $cat->delete_category($id);
    }
?>
	<div class="main">
		<div class="topmain">Danh sách loại sản phẩm</div>
		<div class="centmain">
		<?php 
		if($delcat){
		    echo $delcat;
		}
		?>
			<table class="listUser">
					<tr>
					<td><b>ID</b></td>
					<td><b>Tên loại sản phẩm</b></td>
					<td colspan="2"><b>Quản lý</b></td>
					</tr>
					<?php 
					   $show_cat = $cat->show_category();
					   if($show_cat){
					       $i=0;
					       while($result = $show_cat->fetch_assoc()){
					        $i++;   
					  
					?>
					<tr>
					<td><?php echo $i?></td>
					<td><?php echo $result['TenNhom']?></td>
					<td><a href="categoryedit.php?catid=<?php echo $result['MaNhom'] ?>">Sửa</a></td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?delid=<?php echo $result['MaNhom'] ?>">Xóa</a></td>
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