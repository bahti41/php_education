<?php


// 1- Aritmatik
// 2- Atama
// 3- Karsilastırma
// 4- Mantıksal

$a = 10;
$b = 5;
// 1- Aritmatik

// echo $a + $b."<br>";
// echo $a - $b."<br>";
// echo $a * $b."<br>";
// echo $a / $b."<br>";
// echo $a ** $b."<br>";
// echo $a % $b."<br>";
// echo $a ++ ."<br>";
// echo $a ."<br>";
// echo ++$a ."<br>";

// 2- Atama
// $a = $a + $b;
// $a += $b;
// $a -= $b;
// $a *= $b;

// echo $a;

// 3- Karsilastırma
// $sonuc = $a == $b;
// $sonuc = $a != $b;
// $sonuc = $a > $b;
// $sonuc = $a >= $b;
// $sonuc = $a < $b;
// $sonuc = $a <= $b;
// echo var_dump( $sonuc);

// 4- Mantıksal
$yas = 20;
$mezuniyet = "lise";

$sonuc = ($yas >= 18 and ($mezuniyet =="lise"or $mezuniyet=="üniversite"));

echo var_dump($sonuc);

?>