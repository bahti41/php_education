<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';

// GİRİŞ CIKIŞ İŞLEMLERİ
// ADMİN GİRİŞ 
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


// KULLANICI GİRİŞ
if (isset($_POST['kullanizigiris'])) {

    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:passw and kullanici_durum=:durum ");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 1,
        'passw' => $kullanici_password,
        'durum' => 1
    ));

    $say = $kullanicisor->rowCount();

    if ($say == 1) {
        echo $_SESSION['userkullanicimail'] = $kullanici_mail;
        header("Location:../../");
        exit;
    } else {
        header("Location:../../?durum=basarisizgiris");
        exit;
    }
}


// KULLANCI KAYDET İŞLEMLERİ
if (isset($_POST['kullanicikaydet'])) {

    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_adsoyad = htmlspecialchars($_POST['kullanici_adsoyad']);

    $kullanici_passwordone = htmlspecialchars($_POST['kullanici_passwordone']);
    $kullanici_passwordtwo = htmlspecialchars($_POST['kullanici_passwordtwo']);

    if ($kullanici_passwordone == $kullanici_passwordtwo) {
        if (strlen($kullanici_passwordone >= 6)) {


            // BAŞLANGIC
            $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail");
            $kullanicisor->execute(array(
                'mail' => $kullanici_mail

            ));
            // DÖNEN SATIR SAYISINI BELİRTİLİR
            $say = $kullanicisor->rowCount();

            if ($say == 0) {


                $password = md5($kullanici_passwordone);
                $kullanici_yetki = 1;

                // KULLANICI KAYIT İŞLEMİ..
                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
                    kullanici_adsoyad=:kullanici_adsoyad,
                    kullanici_mail=:kullanici_mail,
                    kullanici_password=:kullanici_password,
                    kullanici_yetki=:kullanici_yetki
                ");
                $insert = $kullanicikaydet->execute(array(
                    'kullanici_adsoyad' => $kullanici_adsoyad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki
                ));
                if ($insert) {
                    echo "kayıt başarılı";
                    header("Location:../../index.php?durum=loginbasarili");
                } else {
                    header("Location:../../register.php?durum=basarisiz");
                }
            } else {
                header("Location:../../register.php?durum=mukerrerkayit");
            }

            // BİTİŞ

        } else {
            header("Location:../../register.php?durum=eksiksifre");
        }
    } else {
        header("Location:../../register.php?durum=farklisifre");
    }
}








// TABLO EKLEME İŞLEMLERİ
// MENÜ İŞLEMLERİ EKLEME
if (isset($_POST['menukaydet'])) {
    $menu_seourl = seo($_POST['menu_ad']);

    $ayarekle = $db->prepare("INSERT INTO menu SET
        menu_ad=:menu_ad,
        menu_detay=:menu_detay,
        menu_url=:menu_url,
        menu_sira=:menu_sira,
        menu_seourl=:menu_seourl,
        menu_durum=:menu_durum");

    $insert = $ayarekle->execute(array(
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']
    ));

    if ($insert) {
        header("Location:../production/menu.php?durum=ok");
        exit;
    } else {
        header("Location:../production/menu.php?durum=no");
        exit;
    }
}



// SLİDER İŞLEMLERİ EKLEME
if (isset($_POST['sliderkaydet'])) {
    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 32000);
    $benzersizsayi3 = rand(20000, 32000);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $kaydet = $db->prepare("INSERT INTO slider SET
    slider_ad=:slider_ad,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_resimyol=:slider_resimyol
");
    $insert = $kaydet->execute(array(
        'slider_ad' => $_POST['slider_ad'],
        'slider_sira' => $_POST['slider_sira'],
        'slider_link' => $_POST['slider_link'],
        'slider_resimyol' => $refimgyol
    ));
    if ($insert) {
        Header("Location:../production/slider-ekle.php?durum=ok");
        exit;
    } else {
        Header("Location:../production/slider-ekle.php?durum=no");
        exit;
    }
}


// KATEGORİ İŞLEMLERİ EKLEME
if (isset($_POST['kategoriekle'])) {

    $kategori_id = $_POST['kategori_id'];
    $kategori_seourl = seo($_POST['kategori_ad']);

    $ayarkaydet = $db->prepare("INSERT INTO kategori SET
        kategori_ad=:kategori_ad,
        kategori_sira=:kategori_sira,
        kategori_seourl=:kategori_seourl,
        kategori_durum=:kategori_durum
       ");

    $insert = $ayarkaydet->execute(array(
        'kategori_ad' => $_POST['kategori_ad'],
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_seourl' => $kategori_seourl,
        'kategori_durum' => $_POST['kategori_durum']

    ));

    if ($insert) {
        header("Location:../production/kategori.php?durum=ok");
        exit;
    } else {
        header("Location:../production/kategori.php?&durum=no");
        exit;
    }
}

// ÜRÜN İŞLEMLERİ EKELME
if (isset($_POST['urunekleme'])) {

    $urun_seourl = seo($_POST['urun_ad']);

    $ayarkaydet = $db->prepare("INSERT INTO urun SET
        kategori_id=:kategori_id,
        urun_ad=:urun_ad,
        urun_detay=:urun_detay,
        urun_fiyat=:urun_fiyat,
        urun_video=:urun_video,
        urun_keyword=:urun_keyword,
        urun_stok=:urun_stok,
        urun_seourl=:urun_seourl,
        urun_durum=:urun_durum
       ");

    $insert = $ayarkaydet->execute(array(
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_seourl' => $urun_seourl,
        'urun_durum' => $_POST['urun_durum']

    ));

    if ($insert) {
        header("Location:../production/urun.php?durum=ok");
        exit;
    } else {
        header("Location:../production/urun.php?&durum=no");
        exit;
    }
}









// TABLO SİLME İŞLEMLERİ
// KULLANICI İŞLEMLERİ SİLME
// if ($_GET['kullanicisil'] == "ok") {
//     $sil = $db->prepare("DELETE from kullanici where kullanici_id=:id");
//     $kontrol = $sil->execute(array(
//         'id' => $_GET['kullanici_id']
//     ));
//     if ($kontrol) {
//         header("Location:../production/kullanici.php?sil=ok");
//     } else {
//         header("Location:../production/kullanici.php?sil=no");
//     }
//     exit;
// }
if (isset($_GET['kullanicisil']) && $_GET['kullanicisil'] == "ok" && isset($_GET['kullanici_id'])) {
    $sil = $db->prepare("DELETE from kullanici where kullanici_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['kullanici_id']
    ));
    if ($kontrol) {
        header("Location:../production/kullanici.php?sil=ok");
        exit;
    } else {
        header("Location:../production/kullanici.php?sil=no");
        exit;
    }
}


// MENÜ İŞLEMLERİ SİLME
// if ($_GET['menusil'] == "ok") {
//     $sil = $db->prepare("DELETE from menu where menu_id=:id");
//     $kontrol = $sil->execute(array(
//         'id' => $_GET['menu_id']
//     ));
//     if ($kontrol) {
//         header("Location:../production/menu.php?sil=ok");
//     } else {
//         header("Location:../production/menu.php?sil=no");
//     }
//     exit;
// }
if (isset($_GET['menusil']) && $_GET['menusil'] == "ok" && isset($_GET['menu_id'])) {
    $sil = $db->prepare("DELETE from menu where menu_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['menu_id']
    ));
    if ($kontrol) {
        header("Location:../production/menu.php?sil=ok");
        exit;
    } else {
        header("Location:../production/menu.php?sil=no");
        exit;
    }
    exit;
}



// SLİDER İŞLEMLERİ SİLME
if (isset($_GET['slidersil']) && $_GET['slidersil'] == "ok" && isset($_GET['slider_id'])) {
    $sil = $db->prepare("DELETE from slider where slider_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['slider_id']
    ));
    if ($kontrol) {
        header("Location:../production/slider.php?sil=ok");
        exit;
    } else {
        header("Location:../production/slider.php?sil=no");
        exit;
    }
}


// KATEGORİ İŞLEMLERİ SİLME
if (isset($_GET['kategorisil']) && $_GET['kategorisil'] == "ok" && isset($_GET['kategori_id'])) {
    $sil = $db->prepare("DELETE from kategori where kategori_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['kategori_id']
    ));
    if ($kontrol) {
        header("Location:../production/kategori.php?sil=ok");
        exit;
    } else {
        header("Location:../production/kategori.php?sil=no");
        exit;
    }
}


// ÜRÜN İŞLEMLERİ SİLME
if (isset($_GET['urunsil']) && $_GET['urunsil'] == "ok" && isset($_GET['urun_id'])) {
    $sil = $db->prepare("DELETE from urun where urun_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['urun_id']
    ));
    if ($kontrol) {
        header("Location:../production/urun.php?sil=ok");
        exit;
    } else {
        header("Location:../production/urun.php?sil=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/genel-ayar.php?durum=no");
        exit;
    }
}


// ÜRÜN AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['urunduzenle'])) {

    $urun_id = $_POST['urun_id'];

    $urun_seourl = seo($_POST['urun_ad']);

    $ayarkaydet = $db->prepare("UPDATE urun SET
        kategori_id=:kategori_id,
        urun_ad=:urun_ad,
        urun_detay=:urun_detay,
        urun_fiyat=:urun_fiyat,
        urun_video=:urun_video,
        urun_keyword=:urun_keyword,
        urun_stok=:urun_stok,
        urun_seourl=:urun_seourl,
        urun_onecikar=:urun_onecikar,
        urun_durum=:urun_durum
       WHERE urun_id={$_POST['urun_id']}");

    $update = $ayarkaydet->execute(array(
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_onecikar' => $_POST['urun_onecikar'],
        'urun_seourl' => $urun_seourl,
        'urun_durum' => $_POST['urun_durum']

    ));

    if ($update) {
        header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");
        exit;
    } else {
        header("Location:../production/urun-duzenle.php?&durum=no&urun_id=$urun_id");
        exit;
    }
}


// KATEGORİ AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['kategoriayarkaydet'])) {

    $kategori_id = $_POST['kategori_id'];
    $kategori_seourl = seo($_POST['kategori_ad']);

    $ayarkaydet = $db->prepare("UPDATE kategori SET
        kategori_ad=:kategori_ad,
        kategori_sira=:kategori_sira,
        kategori_seourl=:kategori_seourl,
        kategori_durum=:kategori_durum
        WHERE kategori_id={$_POST['kategori_id']}");

    $update = $ayarkaydet->execute(array(
        'kategori_ad' => $_POST['kategori_ad'],
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_seourl' => $kategori_seourl,
        'kategori_durum' => $_POST['kategori_durum']

    ));

    if ($update) {
        header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
        exit;
    } else {
        header("Location:../production/kategori-duzenle.php?&durum=no&kategori_id=$kategori_id");
        exit;
    }
}




// SLİDER AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['sliderayarguncelle'])) {

    $slider_id = $_POST['slider_id'];

    $sliderkaydet = $db->prepare("UPDATE slider SET
        slider_ad=:slider_ad,
        slider_sira=:slider_sira,
        slider_link=:slider_link,
        slider_durum=:slider_durum
        WHERE slider_id={$_POST['slider_id']}");

    $update = $sliderkaydet->execute(array(
        'slider_ad' => $_POST['slider_ad'],
        'slider_sira' => $_POST['slider_sira'],
        'slider_link' => $_POST['slider_link'],
        'slider_durum' => $_POST['slider_durum']
    ));

    if ($update) {
        header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
        exit;
    } else {
        header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
        exit;
    }
}




// MENÜ AYAR İŞLEMLERİ GÜNCELLEME
if (isset($_POST['menuayarkaydet'])) {

    $menu_id = $_POST['menu_id'];

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
        exit;
    } else {
        header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/iletisim-ayar.php?durum=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/api-ayar.php?durum=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/sosyal-ayar.php?durum=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/mail-ayar.php?durum=no");
        exit;
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
        exit;
    } else {
        header("Location:../production/hakkimizda.php?durum=no");
        exit;
    }
    exit;
}



// KULLANICI İŞLEMLERİ GÜNCELLEME(ADMİN)
if (isset($_POST['kullaniciadminkaydet'])) {

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
        exit;
    } else {
        header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
        exit;
    }
    exit;
}


// KULLANICI İŞLEMLERİ GÜNCELLEME(KULLANICI)
if (isset($_POST['kullanicihesapkaydet'])) {

    $kullanici_id = $_POST['kullanici_id'];

    $ayarkaydet = $db->prepare("UPDATE kullanici SET
        kullanici_tc=:kullanici_tc,
        kullanici_gsm=:kullanici_gsm,
        kullanici_adres=:kullanici_adres,
        kullanici_il=:kullanici_il,
        kullanici_ilce=:kullanici_ilce
        WHERE kullanici_id={$_POST['kullanici_id']}");

    $update = $ayarkaydet->execute(array(
        'kullanici_tc' => $_POST['kullanici_tc'],
        'kullanici_gsm' => $_POST['kullanici_gsm'],
        'kullanici_adres' => $_POST['kullanici_adres'],
        'kullanici_il' => $_POST['kullanici_il'],
        'kullanici_ilce' => $_POST['kullanici_ilce']
    ));

    if ($update) {
        header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=ok");
        exit;
    } else {
        header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=no");
        exit;
    }
    exit;
}











// RESİM İŞLEMLER GÜNCELLEME 
// LOGO AYAR İŞLEMLERİ GÜNCELLEME(RESİM)
if (isset($_POST['logoduzenle'])) {

    $uploads_dir = '../../dimg';

    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
    @$name = $_FILES['ayar_logo']["name"];

    $benzersizsayi4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

    $duzenle = $db->prepare("UPDATE ayar SET ayar_logo=:logo WHERE ayar_id=0");
    $update = $duzenle->execute(array(
        'logo' => $refimgyol
    ));

    if ($update) {
        $resimsilunlink = $_POST['eski_yol'];
        unlink("../../$resimsilunlink");

        header("Location:../production/genel-ayar.php?durum=ok");
        exit;
    } else {
        header("Location:../production/genel-ayar.php?durum=no");
        exit;
    }
    exit;
}
