<?php
include_once("baglan.php");

$uye = array(
	"id" => 1,
	"ad" => "olcay",
	"soyad" => "php"
);



switch (@$_GET["islem"]):


	case "normal":

		echo json_encode($uye);


		break;

	case "kayitlar":

		echo 'veritabanı kayıtları ve işlemleri olacak';

		break;

	case "oturum":

		echo 'Oturum İşlemleri olacak';

		break;

	case "dosyalar":

		echo 'Dosyalar ile ilgili bilgi olacak';

		break;



endswitch;
