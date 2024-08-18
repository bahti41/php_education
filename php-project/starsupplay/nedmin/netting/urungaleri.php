<?php

ob_start();
session_start();

include 'baglan.php';


if (!empty($_FILES)) {


	// // Urun ID'yi al
	// if (isset($_POST['urun_id'])) {
	// 	$urun_id = $_POST['urun_id'];
	// } else {
	// 	die("Hata: Urun ID eksik.");
	// }

	$uploads_dir = '../../dimg/urun';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$benzersizsayi1 = rand(20000, 32000);
	$benzersizsayi2 = rand(20000, 32000);
	$benzersizsayi3 = rand(20000, 32000);
	$benzersizsayi4 = rand(20000, 32000);

	$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
	$refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$urun_id = $_POST['urun_id'];

	$kaydet = $db->prepare("INSERT INTO urunfoto SET
		urunfoto_resimyol=:resimyol,
		urun_id=:urun_id");
	$insert = $kaydet->execute(array(
		'resimyol' => $refimgyol,
		'urun_id' => $urun_id
	));

	// // Sorgunun başarılı olup olmadığını kontrol et
	// if ($insert) {
	// 	echo "Kayıt başarılı.";
	// } else {
	// 	print_r($kaydet->errorInfo());
	// }
}
