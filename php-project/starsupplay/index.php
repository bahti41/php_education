﻿<?php
include 'header.php';

?>


<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>

	<!--  SLİDER BAR  -->
	<?php include 'slider.php'; ?>
	<!--  SLİDER BAR  -->

</div>
<div class="f-widget featpro">
	<div class="container">
		<div class="title-widget-bg">
			<div class="title-widget">Öne Cıkan Ürünler</div>
			<div class="carousel-nav">
				<a class="prev"></a>
				<a class="next"></a>
			</div>
		</div>
		<div id="product-carousel" class="owl-carousel owl-theme">


			<?php
			// Ürün TABLOSU
			$urunsor = $db->prepare("SELECT * from urun where urun_durum=:urun_durum and urun_onecikar=:urun_onecikar");
			$urunsor->execute(array(
				'urun_durum' => 1,
				'urun_onecikar' => 1
			));

			$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);


			while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>


				<div class="item">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag blue">
								<div class="inner"><span><?php echo $uruncek['urun_fiyat'] ?>TL</span></div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad'] ?></a></span>
						<span class="smalldesc">Ürün Kodu.: <?php echo $uruncek['urun_id'] ?></span>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">About Shopping</div>
			</div>
			<p class="ct">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p class="ct">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<a href="" class="btn btn-default btn-red btn-sm">Read More</a>

			<div class="title-bg">
				<div class="title">Lastest Products</div>
			</div>
			<div class="row prdct"><!--Products-->
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale">
								<div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Red T- Shirt</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag">
								<div class="inner">$199</div>
							</div>
						</div>
						<span class="smalltitle"><a href="product.htm">Red T-Shirt</a></span>
						<span class="smalldesc">Item no.: 1000</span>
					</div>
				</div>
			</div><!--Products-->
			<div class="spacer"></div>
		</div><!--Main content-->
		<?php include 'sidebar.php' ?>
	</div>
</div>

<?php

include 'footer.php';

?>