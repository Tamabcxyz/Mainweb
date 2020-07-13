<?php 
	include_once "inc/header.php";
	include_once "inc/sidebar.php";
	include_once '../classes/brand.php';
?>
<?php 
    $deletebrand="";
    $brand = new Brand();
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];
        $deletebrand = $brand->delete_brand($id);
    }
?>
	<div class="main">
		<div class="topmain">Danh sách thương hiệu</div>
		<div class="centmain">
		<?php 
		if(isset($deletebrand)){
		    echo $deletebrand;
		}
		?>
			<table class="listUser">
					<tr>
					<td><b>ID</b></td>
					<td><b>Tên thương hiệu</b></td>
					<td colspan="2"><b>Quản lý</b></td>
					</tr>
					<?php 
					   $show_brand = $brand->show_brand();
					   if($show_brand){
					       $i=0;
					       while ($result = $show_brand->fetch_assoc()){
					           $i++;
					   
					?>
					<tr>
					<td><?php echo $i?></td>
					<td><?php echo $result['TenTH']?></td>
					<td><a href="brandedit.php?idbrand=<?php echo $result['MaTH']?>">Sửa</a></td>
					<td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?delid=<?php echo $result['MaTH']?>">Xóa</a></td>
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