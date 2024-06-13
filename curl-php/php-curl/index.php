<?php
$oturum = curl_init("http://localhost:3000/contact"); // sadece deneme icin bir olacalde calıştırıyorum
curl_exec($oturum);
$sonuc = curl_getinfo($oturum);

// echo "<pre>";
// print_r(curl_getinfo($oturum));
// echo "<pre>";

if ($sonuc["http_code"] != 200) :
    echo curl_errno($oturum);
else :
    echo ($oturum);
endif;

curl_close($oturum);
