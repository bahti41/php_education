<?php
ob_start();
include_once("baglan.php");
$uye = array(
	"id" => 1,
	"ad" => "olcay",
	"soyad" => "php"
);



switch (@$_GET["islem"]):


	case "verileriver":

		$uyeler = $baglanti->prepare("select * from uyeler");
		$uyeler->execute();

		echo json_encode($uyeler->fetchAll());


		break;

	case "kayitekle":
		$ad = htmlspecialchars(strip_tags($_POST["ad"]));
		$soyad = htmlspecialchars(strip_tags($_POST["soyad"]));
		$meslek = htmlspecialchars(strip_tags($_POST["meslek"]));

		$ekle = $baglanti->prepare("insert into uyeler (ad,soyad,meslek) VALUES('$ad','$soyad','$meslek')");


		if ($ekle->execute()) :
			echo 'Ekleme Başarılı';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");

		else :
			echo 'Hata Oluştu';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");
		endif;





		break;


	case "kayitguncelle":
		$ad = htmlspecialchars(strip_tags($_POST["ad"]));
		$soyad = htmlspecialchars(strip_tags($_POST["soyad"]));
		$meslek = htmlspecialchars(strip_tags($_POST["meslek"]));
		$uyeid = htmlspecialchars(strip_tags($_POST["uyeid"]));

		$guncelle = $baglanti->prepare("update uyeler set ad='$ad',soyad='$soyad',meslek='$meslek' where id=" . $uyeid);


		if ($guncelle->execute()) :
			echo 'Güncelleme Başarılı';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");

		else :
			echo 'Hata Oluştu';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");
		endif;





		break;
	case "kayitsil":
		$sil = $baglanti->prepare("delete from uyeler where id=" . $_GET["uyeid"]);

		if ($sil->execute()) :
			echo 'Silme Başarılı';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");

		else :
			echo 'Hata Oluştu';
			header("Location:http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem");
		endif;

		break;



	case "oturum":

		echo 'Oturum İşlemleri olacak';

		break;

	case "dosyalar":

		echo 'Dosyalar ile ilgili bilgi olacak';

		break;



endswitch;
