<?php include 'header.php'; ?>

<div class="container">
	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row justify-content-center w-100">
			<div class="col-md-6 ">
				<div class="title-bg">
					<div class="title">Şifre Güncelle</div>
				</div>

				<?php
				if (isset($_GET['durum'])) {
					$durum = $_GET['durum'];
					if ($durum == "eskisifrehatali") { ?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Lütfen Gecerli Bir Şifre Giriniz..
						</div>
					<?php } elseif ($durum == "eksiksifre") { ?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
						</div>
					<?php } elseif ($durum == "sifreleruyusmuyor") { ?>
						<div class="alert alert-danger">
							<strong>Hata!</strong> Şifreleriniz Uyuşmuyor Tekrardan Daha Dikkatli Şifre Oluşturunuz...
						</div>
					<?php } elseif ($durum == "sifredegisti") { ?>
						<div class="alert alert-success">
							<strong>Başarılı!</strong> Şifreniz Başarılı Şekilde Degiştirildi...
						</div>
				<?php }
				}
				?>



				<!-- KULLLANICI ADI GİRİŞ -->
				<div class="form-group dob">
					<div class="col-sm-12">

						<input type="password" class="form-control" required name="kullanici_eskipassword" placeholder="Eski şifrenizi giriniz...">
					</div>
				</div>

				<!-- KULLLANICI ŞİFRE GİRİŞ -->
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="password" class="form-control" required name="kullanici_passwordone" placeholder="Yeni şifrenizi giriniz...">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<input type="password" class="form-control" required name="kullanici_passwordtwo" placeholder="Yeni şifrenizi tekrar giriniz...">
					</div>
				</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">


				<button type="submit" name="sifreguncellemeislemi" class="btn btn-default btn-red">Şifre Degiştir</button>
			</div>
		</div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>