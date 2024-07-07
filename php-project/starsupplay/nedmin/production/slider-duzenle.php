<?php
ob_start();
session_start();

include 'header.php';

if (!isset($_GET['slider_id']) || empty($_GET['slider_id'])) {
    // Eğer slider_id yoksa veya boşsa, hata mesajı verin veya yönlendirin
    echo "Slider ID belirtilmedi.";
    exit;
}


// Slider TABLOSU

$slidersor = $db->prepare("SELECT * from slider where slider_id=:id");
$slidersor->execute(array(
    'id' => $_GET['slider_id']
));

$slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);


if (!$slidercek) {
    // Eğer $slidercek boş ise (false dönerse), hata mesajı verin veya yönlendirin
    echo "Slider bulunamadı.";
    exit;
}

?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Slider Düzenle
                            <small>

                                <?php

                                if (isset($_GET['durum'])) {
                                    if ($_GET['durum'] == "ok") { ?>
                                        <b style="color:green">İşlem Başarılı...</b>
                                    <?php } elseif ($_GET['durum'] == "no") { ?>
                                        <b style="color:red">İşlem Başarısız...</b>
                                <?php }
                                }
                                ?>
                            </small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <!-- YÜKLÜ RESİM    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img width="300" src="../../<?php echo $slidercek['slider_resimyol']; ?>">
                                </div>
                            </div>

                            <!-- RESİM YÜKLE    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name" name="slider_resimyol" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <!-- SLİDER AD    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="slider_ad" value="<?php echo $slidercek['slider_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- SLİDER URL    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="slider_link" value="<?php echo $slidercek['slider_link'] ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- SLİDER SIRA   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="slider_sira" value="<?php echo $slidercek['slider_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- SLİDER DURUM   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durumu<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="slider_durum" id="heard" class="form-control" required>


                                        <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : '';  ?>>Aktif</option>

                                        <option value="0" <?php echo $slidercek['slider_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>



                                    </select>
                                </div>
                            </div>
                            <!-- DURUM BİTİŞ  -->


                            <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id'] ?>">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;  padding: 20px">
                                    <button type="submit" name="sliderayarguncelle" class="btn btn-primary">Güncelle</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include 'footer.php';

?>

<!--CKEDİTOR 4 İCİN -->
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=flash',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/conncetor.php?command=QuickUpload&type=Flash',
        forcePasteAsPlainText: true
    });
</script>