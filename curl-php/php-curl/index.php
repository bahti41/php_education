<?php

// Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused
// echo $_SERVER["HTTP_USER_AGENT"]; Tarayıcı bilgimi service yazıyor.Bot kullanırken bu şekil bulunuyor.

$oturum = curl_init("http://localhost:3000/contact"); // sadece deneme icin bir olacalde calıştırıyorum.

// $option = array(
//     CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused",
//     CURLOPT_REFERER => "http://www.google.com",
//     CURLOPT_RETURNTRANSFER => true
// ); 
// curl_setopt_array($oturum,$option)   // Array ile nasıl yazılır. 


curl_setopt($oturum, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36Failed to connect to localhost port 3000: Connection refused"); // Sayfaya atılan istekte tarayıcı bilgisini gönderiyor 

curl_setopt($oturum, CURLOPT_REFERER, "http://www.google.com"); // Sayfaya atılan istekte kim tarafından (nereden) istek atıldıgını gönderiyor 

curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true); // Atılan isteyin gelen değeri ekrana yazdırılmadan ceşitli işlemler yaptırılır 


$gelenveri = curl_exec($oturum); // Atılan isteye gelen degeri ekrana yazdırır.degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar
$sonuc = curl_getinfo($oturum); // oturum ile 

// echo "<pre>";
// print_r(curl_getinfo($oturum));
// echo "<pre>";

if ($sonuc["http_code"] != 200) :
    // echo curl_errno($oturum); hata kodunun numarası
    echo curl_error($oturum); // hata kodunun stringi

endif;

echo $gelenveri; // Atılan isteye gelen degeri ekrana yazdırır. degişkene atanması CURLOPT_RETURNTRANSFER true iken velen verilere işlem yapmamızı saglar

curl_close($oturum);
