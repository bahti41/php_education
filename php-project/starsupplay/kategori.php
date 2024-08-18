<?php

include 'header.php';

?>

<div class="container">
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Ürünler</div>
			</div>
			<div class="row prdct"><!--Products-->

				<?php

				$sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.

				// Eğer kategori seçildiyse, sadece o kategoriye ait ürünleri say
				if (isset($_GET['sef'])) {
					$kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_seourl=:seourl");
					$kategorisor->execute(array(
						'seourl' => $_GET['sef']
					));

					$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);
					$kategori_id = $kategoricek['kategori_id'];

					// Kategoriye ait ürün sayısını al
					$sorgu = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id");
					$sorgu->execute(array('kategori_id' => $kategori_id));
				} else {
					// Tüm ürünleri say
					$sorgu = $db->prepare("SELECT * FROM urun");
					$sorgu->execute();
				}

				$toplam_icerik = $sorgu->rowCount();
				$toplam_sayfa = ceil($toplam_icerik / $sayfada);

				// Eğer sayfa girilmemişse 1 varsayalım.
				$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
				// Eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
				if ($sayfa < 1) $sayfa = 1;
				// Toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
				if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

				$limit = ($sayfa - 1) * $sayfada;

				// Ürünleri getir
				if (isset($_GET['sef'])) {
					$urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id ORDER BY urun_id DESC LIMIT $limit, $sayfada");
					$urunsor->execute(array('kategori_id' => $kategori_id));
				} else {
					$urunsor = $db->prepare("SELECT * FROM urun ORDER BY urun_id DESC LIMIT $limit, $sayfada");
					$urunsor->execute();
				}

				if ($toplam_icerik == 0) {
					echo "Bu kategoride ürün bulunamadı";
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

				<div align="right" class="col-md-12">
					<ul class="pagination">

						<?php

						$s = 0;

						while ($s < $toplam_sayfa) {

							$s++; ?>

							<?php if ($s == $sayfa) { ?>

								<li class="active">
									<a href="kategori?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
								</li>

							<?php } else { ?>

								<li>
									<a href="kategori?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
								</li>

						<?php }
						}

						?>

					</ul>
				</div>

			</div><!--Products-->

		</div>

		<?php include 'sidebar.php' ?>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>