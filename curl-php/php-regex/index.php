<?php

//                    REGEX DESENLERİ -- DÜZENLİ İFADELER

// $desen = "/araba/i"; Kücük büyük harf arar
// $metin = "Cok güzel ArAbalar var. Hangi araba";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;


// $desen = "/[0-9]+/"; // Rakamsal bir deger arar + işareti ise dizideki degerleri yan yana getirir
// $metin = "Mehmet 60 taşında";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;


// $desen = "/[*-]/"; // sembol bir deger arar
// $metin = "ahlakaki terbiye geregi * etmek ve - yasaktır";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;



// MUTLAK EŞLEŞME  \b kelimenin başını ve sonunu işaret eder
// $desen = "/\bBilgisayar\b/"; // sembol bir deger arar tama yazılan textleri getirir
// $metin = "Bilgisayar dogru kullanıldıgında iyiydir.Bilgisayarci olamak istermisin";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;


//      COKLU SORGULAMA
// $desen = "/(karpuz|kavun)/"; //  veya operatörü 
// $metin = "karpuz güzeldir meyvedir ama kavunda hic fena degildir";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc[1]);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;



//        PREG_REPLACE

// $kufurler = array(
//     '/küfür1/',
//     '/küfür2/',
//     '/küfür3/'
// );

// $degişecekler = array(
//     '.......1',
//     '.......2',
//     '.......3'
// );

// $metin = "BU dünaya küfür1 gezegenler küfür2 hayat küfür3 yaşanmalı";

// echo preg_replace($kufurler, $degişecekler, $metin);


// $kufurler = array(
//     '/küfür1/',
//     '/küfür2/',
//     '/küfür3/'
// );

// // $degişecekler = array(
// //     '******'
// // );

// $metin = "BU dünaya küfür1 gezegenler küfür2 hayat küfür3 yaşanmalı";

// echo preg_replace($kufurler, '******', $metin);

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc[1]);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;


//         KAREKTER BULMA
// $desen = "/[^pdi]+/"; // metin degerlerde secilen degeri cıkarır
// $metin = "karpuz güzeldir meyvedir ama kavunda hic fena degildir";

// if (preg_match_all($desen, $metin, $sonuc)) :

//     echo "<pre>";
//     print_r($sonuc);
//     echo "</pre>";
// else :
//     echo "Kelime yok";
// endif;
