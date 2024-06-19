<?php
//        JSON KODLAR/
//                          Tek Boyutlu


// $dizi = array(
//     "meyve1" => "elma",
//     "meyve2" => "armut",
//     "meyve3" => "üzüm",
// );


// $json_veri = json_encode($dizi); // json_encode parametre icerisindeli dizinin key ve value degerlerini veriyor
// echo $json_veri;




// $veriler = json_decode($json_veri, false); // json_decode parametre icerisindeki dizilerin secili elemanını alır. true ise dizi haline ceviriyor eger false ile obje (nesne) haline ceviriyor
// echo $veriler["meyve1"];  true işlemi (diziye cevrilmiş hali)

// echo $veriler->meyve1;  // false işlemi (nesneye cevrilmiş hali)



//--------------------------------------------------------------------------------------------------------------



//                           Cok Boyutlu
// $dizi = array(
//     "meyve1" => "elma",
//     "meyve2" => "armut",
//     "meyve3" => "üzüm",
//     "sebze" => array(
//         "yeşil1" => "maydanoz",
//         "turuncu" => "havuc",
//         "mor" => "patlıcan",
//         "icecek" => array(
//             "siyah" => "kola",
//             "sari" => "fanta"
//         )
//     )
// );


// $json_veri = json_encode($dizi);
// echo $json_veri;


// $veriler = json_decode($json_veri, false);

// echo $veriler["sebze"]["icecek"]["sari"];

// echo $veriler->sebze->icecek->siyah;



//                    Dosya formatında klasöre cıkartma
// $dizi = array(
//     "meyve1" => "elma",
//     "meyve2" => "armut",
//     "meyve3" => "uzum",
//     "sebze" => array(
//         "yesil1" => "maydanoz",
//         "turuncu" => "havuc",
//         "mor" => "patlican",
//     )
// );

// $json_veri = json_encode($dizi);


// $dosya = fopen("verim.json", "w");
// $oldumu = fwrite($dosya, $json_veri);
// fclose($dosya);
// echo $oldumu ? "oluştu" : "Oluşmadi";



//                    Dosya formatından veri alma

// $jsonum = file_get_contents("verim.json");
// $veriler = json_decode($jsonum, true);
// foreach ($veriler as $anakey => $value) :
//     if (is_array($value)) :
//         foreach ($value as $key => $deger) :
//             echo $key . "=" . $deger . "<br>";
//         endforeach;
//     else :
//         echo $anakey . "=" . $value . "<br>";
//     endif;
// endforeach;

//            stdClass nesne olarak kullanılıyor            
$nesne = new stdClass();
$nesne->meyve1 = "elma";
$nesne->meyve2 = "erik";
$nesne->meyve3 = "karpuz";

$json_veri = json_encode($nesne);
echo $json_veri;
