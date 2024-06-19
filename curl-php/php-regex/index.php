<?php

//                    REGEX DESENLERİ -- DÜZENLİ İFADELER
$desen = "/araba/i";
$metin = "Cok güzel ArAbalar var. Hangi araba";

if (preg_match_all($desen, $metin, $sonuc)) :

    echo "<pre>";
    print_r($sonuc);
    echo "</pre>";
else :
    echo "Kelime yok";
endif;
