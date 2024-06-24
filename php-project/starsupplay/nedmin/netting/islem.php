<?php
include 'baglan.php';
// tablo güncelleme işlem kodları..

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

// SOSYAL AYAR İŞLEMLERİ GÜNCELLEME
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
