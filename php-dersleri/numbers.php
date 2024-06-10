<?php

$sayı1 = 10;
$sayı2 = 20;

echo "sonuc:".($sayı1 +  $sayı2)."<br>";
echo "sonuc:".($sayı1 -  $sayı2)."<br>";
echo "sonuc:".($sayı1 *  $sayı2)."<br>";
echo "sonuc:".($sayı1 /  $sayı2)."<br>";

echo is_int($sayı1)."<br>";
echo var_dump(is_int($sayı1))."<br>";
echo var_dump(is_float($sayı1))."<br>";
echo var_dump(is_numeric("10"))."<br>";

echo ceil(4.3)."<br>"; //aşa yvarlama
echo ceil(4.7)."<br>"; //aşa yvarlama
echo floor(4.7)."<br>"; //yukatı yvarlama
echo floor(4.7)."<br>"; //yukatı yvarlama
echo round(6.7)."<br>"; //yakına yvarlama

echo sqrt(25)."<br>"; // kareKök Alımı
echo abs(-25)."<br>"; // mutlak deger
?>