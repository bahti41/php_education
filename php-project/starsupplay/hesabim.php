<?php include 'header.php';


// KULLANICI TABLOSU
$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
	'id' => $_GET['kullanici_id']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);


?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p>Kullanıcı işlemlerini aşağıda ki form aracılığı ile güncelleyebilirsiniz.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<?php
			if (isset($_GET['durum'])) {
				if ($_GET['durum'] == "ok") { ?>
					<b style="color:green">İşlem Başarılı...</b>
				<?php } elseif ($_GET['durum'] == "no") { ?>
					<b style="color:red">İşlem Başarısız...</b>
			<?php }
			}
			?>
			<div class="title-bg">
				<center>
					<div class="title">Kayıt Bilgileri</div>
				</center>
			</div>

			<div class="col-md-6">

				<!-- KULLLANICI TC -->
				<div class="form-group dob">
					<div class="col-sm-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TC kimlik<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
				</div>


				<!-- KULLLANICI GSM -->
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="first-name" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 ">
				<!-- KULLLANICI İL -->
				<div class="form-group dob">
					<div class="col-sm-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İl<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="first-name" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
				</div>


				<!-- KULLLANICI İLCE -->
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="first-name" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
				</div>

				<!-- KULLLANICI ADRESS -->
				<div class="form-group">
					<div class="col-sm-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Adres<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea type="text" id="first-name" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres'] ?>" class="form-control col-md-7 col-xs-12"><?php echo $kullanicicek['kullanici_adres'] ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
			<center><button type="submit" name="kullanicihesapkaydet" class="btn btn-default btn-red">Bilgilerimi Güncelle</button></center>

	</form>
</div>
</div>

<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>