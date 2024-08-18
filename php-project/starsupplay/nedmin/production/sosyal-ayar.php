<?php

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
                        <h2>Genel Ayarlar
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


                            <!-- FECABOOK AYAR     -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- TİWİTTER AYAR    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiwitter<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- GİTHUB AYAR   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Github<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_google" value="<?php echo $ayarcek['ayar_google'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- YOUTUBE AYAR   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_youtube" value="<?php echo $ayarcek['ayar_youtube'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>




                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;">
                                    <button type="submit" name="sosyalayarkaydet" class="btn btn-primary">Güncelle</button>

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