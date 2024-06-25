<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';

// GİRİŞ CIKIŞ İŞLEMLERİ
// AUTHOTANTICATION LOGİN
if (isset($_POST['admingiris'])) {

    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:passw and kullanici_yetki=:yetki");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'passw' => $kullanici_password,
        'yetki' => 5
    ));

    $say = $kullanicisor->rowCount();

    if ($say == 1) {
        $_SESSION['kullanici_mail'] = $kullanici_mail;
        header("Location:../production/index.php");
        exit;
    } else {
        header("Location:../production/login.php?durum=no");
        exit;
    }
}


// TABLO SİLME İŞLEMLERİ
// KULLANICI İŞLEMLERİ SİLME
if ($_GET['kullanicisil'] == "ok") {
    $sil = $db->prepare("DELETE from kullanici where kullanici_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['kullanici_id']
    ));
    if ($kontrol) {
        header("Location:../production/kullanici.php?sil=ok");
    } else {
        header("Location:../production/kullanici.php?sil=no");
    }
}


// TABLO GÜNCELLEME İŞLEMLERİ

// GENEL AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['genelayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
        ayar_title=:ayar_title,
        ayar_desc=:ayar_desc,
        ayar_keywords=:ayar_keywords,
        ayar_author=:ayar_author
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_title' => $_POST['ayar_title'],
        'ayar_desc' => $_POST['ayar_desc'],
        'ayar_keywords' => $_POST['ayar_keywords'],
        'ayar_author' => $_POST['ayar_author']
    ));

    if ($update) {
        header("Location:../production/genel-ayar.php?durum=ok");
    } else {
        header("Location:../production/genel-ayar.php?durum=no");
    }
}


// MENÜ AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['menuayarkaydet'])) {

    $menu_id = $POST['menu_id'];

    $menu_seourl = seo($_POST['menu_ad']);

    $ayarkaydet = $db->prepare("UPDATE menu SET
        menu_ad=:menu_ad,
        menu_detay=:menu_detay,
        menu_url=:menu_url,
        menu_sira=:menu_sira,
        menu_seourl=:menu_seourl,
        menu_durum=:menu_durum
        WHERE menu_id={$_POST['menu_id']}");

    $update = $ayarkaydet->execute(array(
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']
    ));

    if ($update) {
        header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
    } else {
        header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
    }
}


// İLETİŞİM AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['iletisimayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
        ayar_tel=:ayar_tel,
        ayar_gsm=:ayar_gsm,
        ayar_faks=:ayar_faks,
        ayar_mail=:ayar_mail,
        ayar_ilce=:ayar_ilce,
        ayar_il=:ayar_il,
        ayar_adres=:ayar_adres,
        ayar_mesai=:ayar_mesai
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_tel' => $_POST['ayar_tel'],
        'ayar_gsm' => $_POST['ayar_gsm'],
        'ayar_faks' => $_POST['ayar_faks'],
        'ayar_mail' => $_POST['ayar_mail'],
        'ayar_ilce' => $_POST['ayar_ilce'],
        'ayar_il' => $_POST['ayar_il'],
        'ayar_adres' => $_POST['ayar_adres'],
        'ayar_mesai' => $_POST['ayar_mesai']
    ));

    if ($update) {
        header("Location:../production/iletisim-ayar.php?durum=ok");
    } else {
        header("Location:../production/iletisim-ayar.php?durum=no");
    }
}


// APİ AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['apiayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
        ayar_maps=:ayar_maps,
        ayar_analystic=:ayar_analystic,
        ayar_zopim=:ayar_zopim
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_maps' => $_POST['ayar_maps'],
        'ayar_analystic' => $_POST['ayar_analystic'],
        'ayar_zopim' => $_POST['ayar_zopim']
    ));

    if ($update) {
        header("Location:../production/api-ayar.php?durum=ok");
    } else {
        header("Location:../production/api-ayar.php?durum=no");
    }
}


// SOSYAL AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['sosyalayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
        ayar_facebook=:ayar_facebook,
        ayar_tiwitter=:ayar_tiwitter,
        ayar_github=:ayar_github,
        ayar_youtube=:ayar_youtube
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_facebook' => $_POST['ayar_facebook'],
        'ayar_tiwitter' => $_POST['ayar_tiwitter'],
        'ayar_github' => $_POST['ayar_github'],
        'ayar_youtube' => $_POST['ayar_youtube']
    ));

    if ($update) {
        header("Location:../production/sosyal-ayar.php?durum=ok");
    } else {
        header("Location:../production/sosyal-ayar.php?durum=no");
    }
}


// SMTP HABERLEŞME AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['mailayarkaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
        ayar_smtphost=:ayar_smtphost,
        ayar_smtppassword=:ayar_smtppassword,
        ayar_smtpport=:ayar_smtpport,
        ayar_smtpuser=:ayar_smtpuser
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_smtphost' => $_POST['ayar_smtphost'],
        'ayar_smtppassword' => $_POST['	ayar_smtppassword'],
        'ayar_smtpport' => $_POST['ayar_smtpport'],
        'ayar_smtpuser' => $_POST['ayar_smtpuser']
    ));

    if ($update) {
        header("Location:../production/mail-ayar.php?durum=ok");
    } else {
        header("Location:../production/mail-ayar.php?durum=no");
    }
}


// HAKKIMIZDA İŞLEMLERİ GÜNCELLEME
if (isset($_POST['hakkimizdakaydet'])) {

    $ayarkaydet = $db->prepare("UPDATE hakkimizda SET
        hakkimizda_baslik=:hakkimizda_baslik,
        hakkimizda_icerik=:hakkimizda_icerik,
        hakkimizda_video=:hakkimizda_video,
        hakkimizda_vizyon=:hakkimizda_vizyon,
        hakkimizda_misyon=:hakkimizda_misyon	
        WHERE hakkimizda_id =0");

    $update = $ayarkaydet->execute(array(
        'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
        'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
        'hakkimizda_video' => $_POST['hakkimizda_video'],
        'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
        'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
    ));

    if ($update) {
        header("Location:../production/hakkimizda.php?durum=ok");
    } else {
        header("Location:../production/hakkimizda.php?durum=no");
    }
}


// KULLANICI İŞLEMLERİ GÜNCELLEME
if (isset($_POST['kullaniciayarkaydet'])) {

    $kullanici_id = $_POST['kullanici_id'];

    $ayarkaydet = $db->prepare("UPDATE kullanici SET
        kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_tc=:kullanici_tc,
        kullanici_durum=:kullanici_durum
        WHERE kullanici_id={$_POST['kullanici_id']}");

    $update = $ayarkaydet->execute(array(
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_tc' => $_POST['kullanici_tc'],
        'kullanici_durum' => $_POST['kullanici_durum']
    ));

    if ($update) {
        header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
    } else {
        header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
    }
}
