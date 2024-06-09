<?php


// for , while, forEach

// for ($i=1; $i < 100; $i += 2) { 
//     if($i % 3 == 0){
// echo $i."<br>";
//     }

// }


// $isimler = ["ali","ahmet","ayşe","canan"];

// for ($i=0; $i < count($isimler); $i++) { 
//     echo $isimler[$i]."<br>";
// }

$urunler = [
    ["iphone 14", 4000],
    ["iphone 15", 5000],
    ["iphone 16", 6000]
];

// for ($i=0; $i < count($urunler); $i++) { 
//     echo $urunler[$i][0]." ".$urunler[$i][0]."<br>";
// }

foreach ($urunler as $urun) {
    echo $urun[0]." ".$urun[1]."<br>";
}

?>