<?php
include 'baglan.php';

if (isset($_POST['ganelayarkaydet'])) {

    // tablo güncelleme işlem kodları..

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
