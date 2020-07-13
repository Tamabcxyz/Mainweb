<?php
include "inc/header.php";
?>
	<div class="contain">
	<div class="br"></div>	
	<div class="containboxsearch">
		<div class="topboxsp"><h3>Bạn đang tìm kiếm</h3></div>
		<div class="listboxspsearch">
		<?php 
		if(!isset($_GET['name'])|| $_GET['name']==NULL){
		    echo "<script>window.location='index.php'</script>";
		}else{
		    $searchname = $_GET['name'];
		}
		  $Searchproduct = $pro->getproductnamelike($searchname);
		  if($Searchproduct){
		      while ($result = $Searchproduct->fetch_assoc()){
		          
		     
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result['Hinh']?>" >
				<b><?php echo $result['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result['MSHH']?>">Xem chi tiet</a></span></div>
			</div>
		<?php 
		      }
		  }else{
		      echo "Không có sản phẩm bạn muốn tìm thử tìm kiếm với từ khóa khác!";
		  }
		?>
		</div>
	</div>
	</div>
<?php 
	include "inc/footer.php";
?>
