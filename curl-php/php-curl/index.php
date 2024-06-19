<?php

// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused
// echo $_SERVER["HTTP_USER_AGENT"]; Tarayıcı bilgimi service yazıyor.Bot kullanırken bu şekil bulunuyor.
$uyeid = 11;

$oturum = curl_init("http://localhost/php-dersleri/php_Udmey/curlSistem/islemler.php?islem=kayıtsil&uyeid=" . $uyeid); // sadece deneme icin bir olacalde calıştırıyorum.

// $option = array(
//     CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused",
//     CURLOPT_REFERER => "http://www.google.com",
//     CURLOPT_RETURNTRANSFER => true
//     curl_setopt($oturum, CURLOPT_HEADER, true);
//     curl_setopt($oturum, CURLOPT_TIMEOUT, 10);
// ); 
// curl_setopt_array($oturum,$option)   // Array ile nasıl yazılır. 


curl_setopt($oturum, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused"); // Sayfaya atılan istekte tarayıcı bilgisini gönderiyor 

curl_setopt($oturum, CURLOPT_REFERER, "http://www.google.com"); // Sayfaya atılan istekte kim tarafından (nereden) istek atıldıgını gönderiyor 

curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true); // Atılan isteyin gelen değeri ekrana yazdırılmadan ceşitli işlemler yaptırılır 

curl_setopt($oturum, CURLOPT_HEADER, false); // Gelen isteyin header icerigine bunun ile authentication işlemleri vb. yapılabilir.

curl_setopt($oturum, CURLOPT_TIMEOUT, 10); // Atılan isteye gelen cevabın zaman aşımını belirler eger cevap belirlenen süre icinde gelmezse oturum kapatılır.

curl_setopt($oturum, CURLOPT_CONNECTTIMEOUT, 10); // Uygulamaya ilk baglanmak icin zaman aşımı belirleme.

curl_setopt($oturum, CURLOPT_SSL_VERIFYPEER, false); // Istek atılan sitenin SSL sertifika dogrulama mekanizması varsa bot icin bu bilgiyi false yapıyoruz.

curl_setopt($oturum, CURLOPT_FOLLOWLOCATION, true); // Atılan isteklerde herhangibir yönlendirme var isle bu kod istek ayılan sayfanın headerını inceler


$gelenveri = curl_exec($oturum); // Atılan isteye gelen degeri ekrana yazdırır.degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar
$sonuc = curl_getinfo($oturum); // oturum ile 

// echo "<pre>";
// print_r(curl_getinfo($oturum));

if ($sonuc["http_code"] != 200) :
    //     echo curl_errno($oturum); hata kodunun numarası
    echo curl_error($oturum); //hata kodunun stringi

endif;



curl_close($oturum);

echo $gelenveri; // Atılan isteye gelen degeri ekrana yazdırır. degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar

// $coz = json_decode($gelenveri, true);
// $coz = json_decode($gelenveri, false); //Nesne olarak erişim
// echo $coz["soyad"];


/*

                         Post İşlemlemi
$oturum = curl_init("http://localhost/php-dersleri/php_Udmey/curlSistem/islemler.php?islem=kayitlekle"); // sadece deneme icin bir olacalde calıştırıyorum.
$elemanlar = array(
    "ad" => "bot",
    "soyad" => "Bag",
    "meslek" => "Automatick",
    "gonder" => "EKLE"
);
// $option = array(
//     CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused",
//     CURLOPT_REFERER => "http://www.google.com",
//     CURLOPT_RETURNTRANSFER => true
//     curl_setopt($oturum, CURLOPT_HEADER, true);
//     curl_setopt($oturum, CURLOPT_TIMEOUT, 10);
// ); 
// curl_setopt_array($oturum,$option)   // Array ile nasıl yazılır. 


curl_setopt($oturum, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused"); // Sayfaya atılan istekte tarayıcı bilgisini gönderiyor 

curl_setopt($oturum, CURLOPT_REFERER, "http://www.google.com"); // Sayfaya atılan istekte kim tarafından (nereden) istek atıldıgını gönderiyor 

curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true); // Atılan isteyin gelen değeri ekrana yazdırılmadan ceşitli işlemler yaptırılır 

curl_setopt($oturum, CURLOPT_HEADER, false); // Gelen isteyin header icerigine bunun ile authentication işlemleri vb. yapılabilir.

curl_setopt($oturum, CURLOPT_TIMEOUT, 10); // Atılan isteye gelen cevabın zaman aşımını belirler eger cevap belirlenen süre icinde gelmezse oturum kapatılır.

curl_setopt($oturum, CURLOPT_CONNECTTIMEOUT, 10); // Uygulamaya ilk baglanmak icin zaman aşımı belirleme.

curl_setopt($oturum, CURLOPT_SSL_VERIFYPEER, false); // Istek atılan sitenin SSL sertifika dogrulama mekanizması varsa bot icin bu bilgiyi false yapıyoruz.

curl_setopt($oturum, CURLOPT_POST, true); // Post işlemi yollamak icin 

curl_setopt($oturum, CURLOPT_POSTFIELDS, $elemanlar); // Post işlemi icin gereken name ve Value Degerleri yollamak icin

curl_setopt($oturum, CURLOPT_FOLLOWLOCATION, true); // Atılan isteklerde herhangibir yönlendirme var isle bu kod istek ayılan sayfanın headerını inceler


$gelenveri = curl_exec($oturum); // Atılan isteye gelen degeri ekrana yazdırır.degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar
$sonuc = curl_getinfo($oturum); // oturum ile 

// echo "<pre>";
// print_r(curl_getinfo($oturum));

if ($sonuc["http_code"] != 200) :
    //     echo curl_errno($oturum); hata kodunun numarası
    echo curl_error($oturum); //hata kodunun stringi

endif;



curl_close($oturum);

echo $gelenveri; // Atılan isteye gelen degeri ekrana yazdırır. degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar

*/



/*
                         Güncelleme işlemi

$oturum = curl_init("http://localhost/php-dersleri/php_Udmey/curlSistem/islemler.php?islem=kayitguncelle"); // sadece deneme icin bir olacalde calıştırıyorum.
$elemanlar = array(
    "ad" => "Hiddenbot",
    "soyad" => "OverBag",
    "meslek" => "AutomatickMakine",
    "uyeid" => 11,
    "gonder" => "GÜNCELLE"
);
// $option = array(
//     CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused",
//     CURLOPT_REFERER => "http://www.google.com",
//     CURLOPT_RETURNTRANSFER => true
//     curl_setopt($oturum, CURLOPT_HEADER, true);
//     curl_setopt($oturum, CURLOPT_TIMEOUT, 10);
// ); 
// curl_setopt_array($oturum,$option)   // Array ile nasıl yazılır. 


curl_setopt($oturum, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused"); // Sayfaya atılan istekte tarayıcı bilgisini gönderiyor 

curl_setopt($oturum, CURLOPT_REFERER, "http://www.google.com"); // Sayfaya atılan istekte kim tarafından (nereden) istek atıldıgını gönderiyor 

curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true); // Atılan isteyin gelen değeri ekrana yazdırılmadan ceşitli işlemler yaptırılır 

curl_setopt($oturum, CURLOPT_HEADER, false); // Gelen isteyin header icerigine bunun ile authentication işlemleri vb. yapılabilir.

curl_setopt($oturum, CURLOPT_TIMEOUT, 10); // Atılan isteye gelen cevabın zaman aşımını belirler eger cevap belirlenen süre icinde gelmezse oturum kapatılır.

curl_setopt($oturum, CURLOPT_CONNECTTIMEOUT, 10); // Uygulamaya ilk baglanmak icin zaman aşımı belirleme.

curl_setopt($oturum, CURLOPT_SSL_VERIFYPEER, false); // Istek atılan sitenin SSL sertifika dogrulama mekanizması varsa bot icin bu bilgiyi false yapıyoruz.

curl_setopt($oturum, CURLOPT_POST, true); // Post işlemi yollamak icin 

curl_setopt($oturum, CURLOPT_POSTFIELDS, $elemanlar); // Post işlemi icin gereken name ve Value Degerleri yollamak icin

curl_setopt($oturum, CURLOPT_FOLLOWLOCATION, true); // Atılan isteklerde herhangibir yönlendirme var isle bu kod istek ayılan sayfanın headerını inceler


$gelenveri = curl_exec($oturum); // Atılan isteye gelen degeri ekrana yazdırır.degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar
$sonuc = curl_getinfo($oturum); // oturum ile 

// echo "<pre>";
// print_r(curl_getinfo($oturum));

if ($sonuc["http_code"] != 200) :
    //     echo curl_errno($oturum); hata kodunun numarası
    echo curl_error($oturum); //hata kodunun stringi

endif;



curl_close($oturum);

echo $gelenveri; // Atılan isteye gelen degeri ekrana yazdırır. degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar
*/