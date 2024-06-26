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


                            <!-- SMTPHOST AYAR    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SMTP-host <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_smtphost" value="<?php echo $ayarcek['ayar_smtphost'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- SMTP USER    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SMTP Kullanıcı<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_smtpuser" value="<?php echo $ayarcek['ayar_smtpuser'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- SMTP PAROLA   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SMTP Parola<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="first-name" name="ayar_smtppassword" value="<?php echo $ayarcek['ayar_smtppassword'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- SMTP PORT     -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SMTP Port<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ayar_smtpport" value="<?php echo $ayarcek['ayar_smtpport'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;">
                                    <button type="submit" name="mailayarkaydet" class="btn btn-primary">Güncelle</button>

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