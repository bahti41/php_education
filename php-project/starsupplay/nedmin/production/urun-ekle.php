<?php
ob_start();
session_start();

include 'header.php';


?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ürün Düzenle
                            <small>
                                <?php if (isset($_GET['durum'])) {
                                    if ($_GET['durum'] == "ok") { ?>
                                        <b style="color:green">İşlem Başarılı...</b>
                                    <?php } elseif ($_GET['durum'] == "no") { ?>
                                        <b style="color:red">İşlem Başarısız...</b>
                                <?php }
                                } ?>
                            </small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <!-- Ürün AD -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="urun_ad" placeholder="ürün adını giriniz.." required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün FİYAT -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="urun_fiyat" placeholder="ürün fiyat giriniz.." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün VİDEO -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Video<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="urun_video" placeholder="ürün vieo giriniz.." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün KEYWORD -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="urun_keyword" placeholder="ürün keyword giriniz.." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün STOK -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="urun_stok" placeholder="ürün stock giriniz" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- Ürün DURUM -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durumu<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="urun_durum" id="heard" class="form-control" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- KATEGORİ SECİMİ -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <?php

                                    $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_ust=:kategori_ust ORDER BY kategori_sira");
                                    $kategorisor->execute(array(
                                        'kategori_ust' => 0
                                    ));
                                    ?>
                                    <select class="select2_multiple form-control" required name="kategori_id">
                                        <?php
                                        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                            $kategori_id = $kategoricek['kategori_id'];
                                        ?>
                                            <option value="<?php echo $kategoricek['kategori_id']; ?>">
                                                <?php echo $kategoricek['kategori_ad']; ?>
                                            </option>
                                            <?php
                                            $altkategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_ust=:kategori_id ORDER BY kategori_sira");
                                            $altkategorisor->execute(array(
                                                'kategori_id' => $kategori_id
                                            ));
                                            while ($altkategoricek = $altkategorisor->fetch(PDO::FETCH_ASSOC)) {
                                                $altkategori_id = $altkategoricek['kategori_id'];
                                            ?>
                                                <option value="<?php echo $altkategoricek['kategori_id']; ?>">
                                                    <?php echo $altkategoricek['kategori_ad']; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Ürün İÇERİK -->
                            <div class="form-group py-3">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1" name="urun_detay"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right; padding: 20px">
                                    <button type="submit" name="urunekleme" class="btn btn-primary">Kaydet</button>
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

<!-- CKEDITOR 4 İÇİN -->




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