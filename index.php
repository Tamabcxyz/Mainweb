<?php 
	include "inc/header.php";
?>
	<div class="contain">
	<div class="br"></div>	
	
	<div class="containboxsp2">
		<div class="topboxsp"><h3>Mặt hàng mới</h3></div>
		<div class="listboxsp">
		<?php 
		  $getpronew = $pro->getproductnew();
		  if($getpronew){
		      while ($result1 = $getpronew->fetch_assoc()){
		          
		     
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result1['Hinh']?>" >
				<b><?php echo $result1['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result1['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result1['MSHH']?>">Xem chi tiet</a></span></div>
			</div>
		<?php 
		      }
		  }
		?>
		</div>
	</div>
	<div class="containboxsp1">
		<div class="topboxsp"><h3>Mặt hàng nổi bậc</h3></div>
		<div class="listboxsp">
		<?php 
		  $getprotype1 = $pro->getproducttype1();
		  if($getprotype1){
		      while ($result = $getprotype1->fetch_assoc()){
		          
		     
		?>
			<div class="boxsp">
				<img alt="image" src="admin/uploads/<?php echo $result['Hinh']?>" >
				<b><?php echo $result['TenHH']?></b><br />
				<div class="price"><?php echo $fm->format_currency($result['Gia']).".VND"?></div><br />
				<div class="button"><span><a href="preview.php?proid=<?php echo $result['MSHH']?>">Xem chi tiet</a></span></div>
			</div>
		<?php 
		      }
		  }
		?>
		</div>
	</div>
	<div class="">
			<?php 
			 $productall=$pro->getproductall();
			 $productcount=mysqli_num_rows($productall);
			 $productpage=ceil($productcount/8);
			 $i=1;
			 echo '<p>Trang:</p>';
			 for($i=1;$i<=$productpage;$i++){
			     echo '<a style="margin:0px 5px" href="index.php?page='.$i.'">'.$i.'</a>';
			 }
			?>
		</div>
	</div>
<?php 
	include "inc/footer.php";
?>