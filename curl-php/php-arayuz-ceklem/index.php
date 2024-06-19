<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>İşlem yaptığımız sistem</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

	<div class="container border border-dark mt-1 text-center">
		<div class="row">
			<div class="col-lg-12 bg-dark text-white   pt-2">
				<h5>İŞLEM YAPILAN SİSTEM</h5>
			</div>

			<div class="col-lg-12">
				<?php

				switch (@$_GET["curl"]):



					case "ekle":

						break;

					case "sil":

						break;

					case "guncelle":

						break;

					default:

						echo "<h1>veriler çekilecek</h1>";

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
									$oturum = curl_init("http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/islemler.php?islem=verileriver"); // oturumu başlattık.



									$options = array(
										CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused",
										CURLOPT_REFERER => "http://www.google.com",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_HEADER => false,
										CURLOPT_TIMEOUT => 10,
										CURLOPT_CONNECTTIMEOUT => 30,
										CURLOPT_SSL_VERIFYPEER => false,
										CURLOPT_FOLLOWLOCATION => true

									);

									curl_setopt_array($oturum, $options);


									$gelenveri = curl_exec($oturum);

									$sonuc = curl_getinfo($oturum);

									if ($sonuc["http_code"] != 200) :
										//echo curl_errno($oturum); // belirtilen oturumdaki son hatanın kodu
										echo curl_error($oturum); // belirtilen oturumdaki son hatanın string

									endif; // hatayı kontrol

									curl_close($oturum);

									$al = json_decode($gelenveri, true);
									echo "<pre>";
									print_r($al);
									echo "</pre>";
									echo ' <div class="col-lg-3 p-2"></div>
									<div class="col-lg-2 p-2"></div>
									<div class="col-lg-3 p-2"></div>
									<div class="col-lg-4 p-2">
									<a href="#" class="btn btn-success btn-sm">Güncelle</a>
									<a href="#" class="btn btn-danger btn-sm">Sil</a></div>';


									?>


								</div>


							</div>
						</div>

				<?php

				endswitch;

				?>





			</div>



		</div>



	</div>

</body>

</html>







<?php

/*
// CURL İŞLEVİ VE ÖRNEKLERİ
$uyeid=13;

$oturum=curl_init("http://websitekurma.xyz/curltest/islemler.php?islem=kayitsil&uyeid=".$uyeid); // oturumu başlattık.



$options=array(
	CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 		Chrome/76.0.3809.132 Safari/537.36",
	CURLOPT_REFERER => "http://www.google.com",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
	CURLOPT_TIMEOUT => 10,
	CURLOPT_CONNECTTIMEOUT => 30,	
	CURLOPT_SSL_VERIFYPEER => false,	
	CURLOPT_FOLLOWLOCATION => true
	
);

curl_setopt_array($oturum,$options);


$gelenveri=curl_exec($oturum);

$sonuc=curl_getinfo($oturum);

if ($sonuc["http_code"]!=200):
//echo curl_errno($oturum); // belirtilen oturumdaki son hatanın kodu
echo curl_error($oturum); // belirtilen oturumdaki son hatanın string

endif; // hatayı kontrol

curl_close($oturum);

echo $gelenveri;

/* GÜNCELLEME İŞLEMİ

$oturum=curl_init("http://websitekurma.xyz/curltest/islemler.php?islem=kayitguncelle"); // oturumu başlattık.

$elemanlar=array(
	"ad" => "musaD",
	"soyad" =>"yılmazD",
	"meslek" =>"İşçiD",
	"uyeid" => 13,
	"gonder"=> "GÜNCELLE"
);

$options=array(
	CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 		Chrome/76.0.3809.132 Safari/537.36",
	CURLOPT_REFERER => "http://www.google.com",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
	CURLOPT_TIMEOUT => 10,
	CURLOPT_CONNECTTIMEOUT => 30,	
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $elemanlar,
	CURLOPT_FOLLOWLOCATION => true
	
);

curl_setopt_array($oturum,$options);


$gelenveri=curl_exec($oturum);

$sonuc=curl_getinfo($oturum);

if ($sonuc["http_code"]!=200):
//echo curl_errno($oturum); // belirtilen oturumdaki son hatanın kodu
echo curl_error($oturum); // belirtilen oturumdaki son hatanın string

endif; // hatayı kontrol

curl_close($oturum);

echo $gelenveri;

*/

/* POST İŞLEMİ

$oturum=curl_init("http://websitekurma.xyz/curltest/islemler.php?islem=kayitekle"); // oturumu başlattık.

$elemanlar=array(
	"ad" => "musa",
	"soyad" =>"yılmaz",
	"meslek" =>"İşçi",
	"gonder"=> "EKLE"
);

$options=array(
	CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) 		Chrome/76.0.3809.132 Safari/537.36",
	CURLOPT_REFERER => "http://www.google.com",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER => false,
	CURLOPT_TIMEOUT => 10,
	CURLOPT_CONNECTTIMEOUT => 30,	
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $elemanlar,
	CURLOPT_FOLLOWLOCATION => true
	
);

curl_setopt_array($oturum,$options);


$gelenveri=curl_exec($oturum);

$sonuc=curl_getinfo($oturum);

if ($sonuc["http_code"]!=200):
//echo curl_errno($oturum); // belirtilen oturumdaki son hatanın kodu
echo curl_error($oturum); // belirtilen oturumdaki son hatanın string

endif; // hatayı kontrol

curl_close($oturum);

echo $gelenveri;



*/



/*
	optionları tek tek yazmak

curl_setopt($oturum,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36");
curl_setopt($oturum,CURLOPT_REFERER,"http://www.google.com");
curl_setopt($oturum,CURLOPT_RETURNTRANSFER,true);




echo "<pre>";
print_r(curl_getinfo($oturum));
echo "</pre>";
*/

?>