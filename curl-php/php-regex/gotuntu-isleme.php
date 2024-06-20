<?php
$kaynak = file_get_contents("http://localhost/php-dersleri/php_Udmey/php-arayuz-ceklem/");

$desen = '@<h5>(.*?)</h5>@';

preg_match_all($desen, $kaynak, $sonuc);

echo "<pre>";
print_r($sonuc[1]);
echo "</pre>";
