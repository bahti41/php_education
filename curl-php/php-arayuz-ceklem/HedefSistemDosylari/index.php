<?php include_once("baglan.php"); ?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Curl işlemleri için sistem</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
		<a class="navbar-brand js-scroll-trigger" href="#page-top">
			<span class="d-block d-lg-none">Curl sistem</span>
			<span class="d-none d-lg-block">
				<img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/res.png" alt="">
			</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" target="_blank" href="islemler.php?islem=normal">Normal Veri</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" target="_blank" href="islemler.php?islem=oturum">Oturum</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" target="_blank" href="islemler.php?islem=dosyalar">Dosyalar</a>
				</li>

			</ul>
		</div>
	</nav>

	<div class="container-fluid  text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="mt-5 text-center">CURL İÇİN TEST İŞLEMLERİ YAN MENÜDE</h1>
			</div>

		</div>


		<?php


		switch (@$_GET["hareket"]):

			case "ekle":
		?>
				<div class="row text-dark mt-5 ">
					<div class="col-lg-3  bg-light mx-auto border border-dark table-borderless">
						<div class="row">
							<div class="col-lg-12">
								<h4>KİŞİ EKLE</h4>
							</div>

							<div class="col-lg-6 p-2 mt-2 ">Ad</div>
							<div class="col-lg-6 p-2">
								<form action="http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/islemler.php?islem=kayitekle" method="post">
									<input type="text" name="ad" class="form-control">
							</div>
							<div class="col-lg-6 p-2 mt-2">Soyad</div>
							<div class="col-lg-6 p-2"><input type="text" name="soyad" class="form-control"></div>
							<div class="col-lg-6 p-2 mt-2">Meslek</div>
							<div class="col-lg-6 p-2"><input type="text" name="meslek" class="form-control"></div>
							<div class="col-lg-12 p-2 mt-2"><input type="submit" name="gonder" value="EKLE" class="btn btn-success"></form>
							</div>

						</div>

					</div>
				</div>



			<?php


				break;




			case "guncelle":
				$uyeninid = $_GET["uyeid"];

				$uyeal = $baglanti->prepare("select * from uyeler where id=" . $uyeninid);
				$uyeal->execute();
				$uyeninBilgileri = $uyeal->fetch();
			?>
				<div class="row text-dark mt-5 ">
					<div class="col-lg-3  bg-light mx-auto border border-dark table-borderless">
						<div class="row">
							<div class="col-lg-12">
								<h4>KİŞİ GÜNCELLE</h4>
							</div>

							<div class="col-lg-6 p-2 mt-2 ">Ad</div>
							<div class="col-lg-6 p-2">
								<form action="http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/islemler.php?islem=kayitguncelle" method="post">
									<input type="text" name="ad" class="form-control" value="<?php echo $uyeninBilgileri["ad"]; ?>">
							</div>
							<div class="col-lg-6 p-2 mt-2">Soyad</div>
							<div class="col-lg-6 p-2"><input type="text" name="soyad" value="<?php echo $uyeninBilgileri["soyad"]; ?>" class="form-control"></div>
							<div class="col-lg-6 p-2 mt-2">Meslek</div>
							<div class="col-lg-6 p-2"><input type="text" name="meslek" class="form-control" value="<?php echo $uyeninBilgileri["meslek"]; ?>"></div>
							<div class="col-lg-12 p-2 mt-2"><input type="submit" name="gonder" value="GÜNCELLE" class="btn btn-success">
								<input type="hidden" name="uyeid" value="<?php echo $uyeninBilgileri["id"]; ?>"></form>
							</div>

						</div>

					</div>
				</div>



			<?php


				break;

			default:
			?>
				<div class="row mt-5 pr-0 text-dark">
					<div class="col-lg-5 bg-danger bg-light mx-auto border border-dark">
						<div class="row">
							<div class="col-lg-12">
								<h4> <a href="http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/index.php?hareket=ekle" class="btn btn-primary btn-sm">Ekle</a> ÜYELER</h4>
							</div>
							<div class="col-lg-3 bg-dark text-white font-weight-bold">Ad</div>
							<div class="col-lg-2 bg-dark text-white font-weight-bold">Soyad</div>
							<div class="col-lg-3 bg-dark text-white font-weight-bold">Meslek</div>
							<div class="col-lg-4 bg-dark text-white font-weight-bold">İşlem</div>



							<?php

							$uyeler = $baglanti->prepare("select * from uyeler");
							$uyeler->execute();
							while ($sonucum = $uyeler->fetch(PDO::FETCH_ASSOC)) :

								echo ' <div class="col-lg-3 p-2">' . $sonucum["ad"] . '</div>
                    <div class="col-lg-2 p-2">' . $sonucum["soyad"] . '</div>
                    <div class="col-lg-3 p-2">' . $sonucum["meslek"] . '</div>
                    <div class="col-lg-4 p-2">
					<a href="http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/index.php?hareket=guncelle&uyeid=' . $sonucum["id"] . '" class="btn btn-success btn-sm">Güncelle</a>
					<a href="http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/islemler.php?islem=kayitsil&uyeid=' . $sonucum["id"] . '" class="btn btn-danger btn-sm">Sil</a></div>';
							endwhile;

							?>


						</div>


					</div>
				</div>
		<?php



		endswitch;

		?>











	</div>


</body>

</html>