<footer style="background-color: #81d742 !important;">
	<div class="container">
		<div style="font-size: 4em;";>Teams DHD</div>
		<div class="row">
			<div class="col-md-4">
				<h4>Thành viên 1</h4>
				<ul>
					<li>Nguyễn Công Duẩn</li>
					<li><i class="bi bi-mailbox2"></i> duan.nc194509@sis.hust.edu</li>
					<li><i class="bi bi-telephone-fill"></i>0373746891</li>
					<li><i class="bi bi-map-fill"></i> Hai Duong, Viet Nam</li>
					<li>If you do not it in front of me, then don’t do it behind my back</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Thành Viên 2</h4>
				<ul>
					<li>Đỗ Thế Dương</li>
					<li><i class="bi bi-mailbox2"></i> duong.dt194529@sis.hust.edu</li>
					<li><i class="bi bi-telephone-fill"></i>037xxxxxxx</li>
					<li><i class="bi bi-map-fill"></i> Thai Binh, Viet Nam</li>
					<li>The best fan of Eimi Fukada</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h4>Thành Viên 3</h4>
				<ul>
					<li>Nguyễn Quý Hải</li>
					<li><i class="bi bi-mailbox2"></i> hai.nq194549@sis.hust.edu</li>
					<li><i class="bi bi-telephone-fill"></i>037xxxxxxx</li>
					<li><i class="bi bi-map-fill"></i> Bac Ninh, Viet Nam</li>
					<li>The best Cat players</li>
				</ul>
			</div>
		</div>
	</div>
	<div style="background-color: #3f9609; width: 100%; text-align: center; padding: 20px; color: red;font:4em;" ;>
		Chúc các bạn có buổi mua sắm đầu năm vui vẻ!!!! <br> HAPPY NEW YEAR !!!!
	</div>
</footer>

<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$count = 0;
// var_dump($_SESSION['cart']);
foreach($_SESSION['cart'] as $item) {
	$count += $item['num'];
}
?>
<script type="text/javascript">
	function addCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>
<!-- Cart start -->
<span class="cart_icon">
	<span class="cart_count"><?=$count?></span>
	<a href="cart.php"><img src="https://gokisoft.com/img/cart.png"></a>
</span>
<!-- Cart stop -->
</body>
</html>