<?php 
require_once('layouts/header.php');

$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 order by Product.updated_at desc limit 0,9";
$lastestItems = executeResult($sql);
?>


<div class="container">
	<h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h1>
	<div class="row">
	<?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item services__card">
					<a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="detail.php?id='.$item['id'].'"><p style="font-weight: bold; color: white;">'.$item['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button></p>
				</div>';
		}
	?>
	</div>
</div>
<!-- danh muc san pham -->
<?php
$count = 0;
foreach($menuItems as $item) {
	$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.category_id = ".$item['id']." and Product.deleted = 0 order by Product.updated_at desc limit 0,3";
	$Firstitems = executeResult($sql);
	 if($Firstitems == null || count($Firstitems) < 3) continue;
?>
<div class="container">
<h1 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['name']?></h1>
<div class="row">
<?php
		foreach($Firstitems as $items) {
			echo '<div class="col-md-3 col-6 product-item services__card">
					<a href="detail.php?id='.$items['id'].'"><img src="'.$items['thumbnail'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$items['category_name'].'</p>
					<a href="detail.php?id='.$items['id'].'"><p style="font-weight: bold; color: white;">'.$items['title'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($items['discount']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$items['id'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button></p>
				</div>';
		}
	?>
</div>
</div>
<!-- </div> -->
<?php
}
?>
<?php
require_once('layouts/footer.php');
?>