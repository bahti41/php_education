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
                        <h2>Banka Düzenle
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
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                            <!-- banka AD    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Ad<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_ad" placeholder="banka adınızı giriniz!!" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- banka İBAN   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka IBAN<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_iban" placeholder="banka iban giriniz" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- banka HESAB AD   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Hesab Ad Soyad<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="banka_hesapadsoyad" placeholder="banka hesap adınızı giriniz" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- banka DURUM   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">banka Durumu<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="banka_durum" id="heard" class="form-control" required>


                                        <option value="1">Aktif</option>

                                        <option value="0">Pasif</option>

                                    </select>
                                </div>
                            </div>
                            <!-- DURUM BİTİŞ  -->


                            <input type="hidden" name="banka_id" value="<?php echo $bankacek['banka_id'] ?>">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;  padding: 20px">
                                    <button type="submit" name="bankaekle" class="btn btn-primary">KAYDET</button>

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