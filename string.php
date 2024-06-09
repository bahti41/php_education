<?php 
    $urunAdi ="Iphlone 14";
    $urunFiyat = 90000;
    $kdvOrani = 0.18;

    $urunFiyat = $urunFiyat +($urunFiyat *$kdvOrani);// urunFiyat deyeri değişti. 


    $sonuc = "{$urunAdi} isimli ürün fiyatı {$urunFiyat} TL.";

    echo $sonuc."<br>";
    echo $sonuc[0]."<br>";
    echo $sonuc[11]."<br>";


    // STRİNG fonksionları
    echo strlen($sonuc)."<br>"; // Hard Sayıları
    echo str_word_count($sonuc)."<br>"; //Kelime sayıları
    echo strtolower($sonuc)."<br>"; // Kücültme fonc
    echo strtolower($sonuc)."<br>"; // büyütme fonc
?>