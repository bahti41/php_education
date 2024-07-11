<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
	<div class="title-bg">
		<div class="title">Ödeme Sayfası</div>
	</div>
	<form action="nedmin/netting/islem.php" method="POST">
		<div class="table-responsive">


			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Ürün Resim</th>
						<th>Ürün Ad</th>
						<th>Ürün Kodu</th>
						<th>Adet</th>
						<th>Toplam Fiyat</th>
					</tr>
				</thead>

				<tbody>


					<?php

					$toplam_fiyat = 0;

					$kullanici_id = $kullanicicek['kullanici_id'];
					// KULLANICI TABLOSU
					$sepetsor = $db->prepare("SELECT * FROM sepet where kullanici_id=:id");
					$sepetsor->execute(array(
						'id' => $kullanici_id
					));
					while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {

						$urun_id = $sepetcek['urun_id'];
						// Ürün TABLOSU
						$urunsor = $db->prepare("SELECT * from urun where urun_id=:urun_id");
						$urunsor->execute(array(
							'urun_id' => $urun_id
						));

						$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

						$toplam_fiyat += $uruncek['urun_fiyat'] * $sepetcek['urun_adet'];
					?>

						<!-- <input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>"> -->

						<tr>
							<td><img src="images\demo-img.jpg" width="100" alt=""></td>
							<td><?php echo $uruncek['urun_ad'] ?></td>
							<td><?php echo $uruncek['urun_id'] ?></td>
							<td>
								<form><?php echo $sepetcek['urun_adet'] ?></form>
							</td>
							<td><?php echo $uruncek['urun_fiyat'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
			</div>
			<div class="col-md-3 col-md-offset-3">
				<div class="subtotal-wrap">
					<!-- <div class="subtotal">
											<p>Toplam Fiyat : $26.00</p>
											<p>Vat 17% : $54.00</p>
										</div> -->
					<div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam_fiyat ?>TL</span></div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!--ÖDEME İŞLEMİ İŞLEMLERİ -->

		<div class="tab-review">
			<ul id="myTab" class="nav nav-tabs shop-tab">
				<li>
					<a class="active" href="#desc" data-toggle="tab">Kredi Kartı</a>
				</li>



				<li>
					<a class="" href="#rev" data-toggle="tab">Banka Havalesi</a>
				</li>
			</ul>

			<div id="myTabContent" class="tab-content shop-tab-ct">
				<div class="tab-pane fade active in" id="desc">
					<p>
						<span>Kredi Kartı İle Ödeme</span>
					</p>
				</div>

				<div class="tab-pane fade" id="rev">


					<p class="dash">
						<span>Ödeme Yapacagınız Hesap Numarasını Secerek İşlemi Tamamlanyınız...</span>
					</p>

					<?php
					//BELİRTİLEN VERİLER CEKİLDİ
					$bankasor = $db->prepare("SELECT * FROM banka order by banka_id ASC");
					$bankasor->execute();

					while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

						<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad'] ?>">
						<?php echo $bankacek['banka_ad'];
						echo " "; ?><br>

					<?php } ?>
					<hr>
					<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
					<input type="hidden" name="siparis_toplam" value="<?php echo $toplam_fiyat ?>">
					<button type="submit" name="bankasiparisekle" class="btn btn-success">Sipariş Ver</button>




				</div>
			</div>


		</div>
	</form>
	<!--ÖDEME İŞLEMİ İŞLEMLERİ BİTİŞ-->
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>