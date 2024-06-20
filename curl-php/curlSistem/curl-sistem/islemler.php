d<?php
	ob_start();
	include_once("baglan.php");

	$uye = array(
		"id" => 1,
		"ad" => "bahtiyar",
		"soyad" => "sonmez"
	);



	switch (@$_GET["islem"]):


		case "normal":

			echo json_encode($uye);

			break;

		case "kayitlekle":

			$ad = htmlspecialchars(strip_tags($_POST["ad"]));
			$soyad = htmlspecialchars(strip_tags($_POST["soyad"]));
			$meslek = htmlspecialchars(strip_tags($_POST["meslek"]));

			$ekle = $baglantı->prepare("insert into uyeler (ad,soyad,meslek) VALUES('$ad','$soyad','$meslek')");

			if ($ekle->execute()) :
				echo 'Ekleme Başarılı';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			else :
				echo 'Ekleme Başarısız';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			endif;

			break;

		case "kayitguncelle":

			$ad = htmlspecialchars(strip_tags($_POST["ad"]));
			$soyad = htmlspecialchars(strip_tags($_POST["soyad"]));
			$meslek = htmlspecialchars(strip_tags($_POST["meslek"]));
			$uyeid = htmlspecialchars(strip_tags($_POST["uyeid"]));

			$guncelle = $baglantı->prepare("update uyeler set ad='$ad',soyad='$soyad',meslek='$meslek' where id=" . $uyeid);

			if ($guncelle->execute()) :
				echo ' Guncelle Başarılı ';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			else :
				echo ' Guncelle Başarısız ';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			endif;

			break;

		case "kayıtsil":
			$sil = $baglantı->prepare("delete from uyeler where id=" . $_GET["uyeid"]);

			if ($sil->execute()) :
				echo ' Silme Başarılı ';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			else :
				echo ' Silme Başarısız ';
				header("Location:http://localhost/php-dersleri/php_Udmey/curlSistem/curl-sistem/");
			endif;
			break;


		case "oturum":

			echo 'Oturum İşlemleri olacak';

			break;

		case "dosyalar":

			echo 'Dosyalar ile ilgili bilgi olacak';

			break;



	endswitch;
