<?php



$plakalar = array("41","34","35");
$sehirler = array("kocaeli","istanbul","izmir");

$plakala_bilgieleri = array(
    "41"=>"kocaeli",
    "34"=>"istanbul",
    "35"=>"izmir"
);

echo $plakala_bilgieleri["41"]."<br>";
echo $plakala_bilgieleri["34"]."<br>";
echo $plakala_bilgieleri["35"]."<br>";

$telofon_reheberi =[
    "ali"=> "4444444",
    "veli"=> "5555555",
    "hasan" => "666666"
];

echo $telofon_reheberi["ali"]."<br>";

$urun = [
    "urunAdi" => "Iphone 14",
    "fiyat" => "3000",
    "satıştamı" => true
];

echo $urun ["urunAdi"]." ".$urun["fiyat"]."<br>";

$urunler =[
    [
    "urunAdi" => "Iphone 14",
    "fiyat" => "3000",
    "satıştamı" => true
    ],
    [
    "urunAdi" => "Iphone 15",
    "fiyat" => "4000",
    "satıştamı" => true
    ],
    [
    "urunAdi" => "Iphone 16",
    "fiyat" => "5000",
    "satıştamı" => true
]

    ];

echo $urunler[0]["urunAdi"]."<br>";
echo $urunler[1]["urunAdi"]."<br>";


?>