<?php
include 'header.php';

if (isset($_GET['sef'])) {
	$kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl=:seo");
	$kategorisor->execute(array(
		'seo' => $_GET['sef']
	));
	$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);
	//EŞLEŞTİRİLECEK id ALINIYOR
	$kategori_id = $kategoricek['kategori_id'];

	$urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id order by urun_id DESC");
	$urunsor->execute(array(
		'kategori_id' => $kategori_id
	));

	$say = $urunsor->rowCount();
} else {
	//BELİRTİLEN VERİLER CEKİLDİ
	$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
	$urunsor->execute();
}



?>


<div class="container">
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Category - All products</div>
			</div>
			<!--Products-->
			<div class="row prdct">
				<?php
				if ($say == 0) {
					echo 'BU KATEGORİDE ÜRÜN BULUNAMDI...';
				}

				while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
				?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="urun-<?= seo($uruncek['urun_ad']) . '-' . $uruncek['urun_id'] ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale">
									<div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $uruncek['urun_fiyat'] * 1.5 ?>TL</span><?php echo $uruncek['urun_fiyat'] ?>TL</span></div>
								</div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad'] ?></a></span>
							<span class="smalldesc">Ürün Kodu.: <?php echo $uruncek['urun_id'] ?></span>
						</div>
					</div>

				<?php } ?>

			</div>
			<!--Products-->


			<!--pagination-->
			<!-- <ul class="pagination shop-pag">
				<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
			</ul> -->
			<!--pagination-->

		</div>
		<?php include 'sidebar.php'; ?>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>