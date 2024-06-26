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
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- FOTOGRAF YÜKLEME     -->
                        <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fist-name">Yüklü Logo<br><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <?php if (strlen($ayarcek['ayar_logo']) > 0) { ?>
                                        <img src="../../<?php echo $ayarcek['ayar_logo']; ?>">
                                    <?php } else { ?>
                                        <img src="../../dimg/log-yok.png">
                                    <?php } ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="first-name" name="ayar_logo" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                            <div align="right" class="col-md-6 col-sm-6 colxs-12 col-md-offset-3">
                                <button type="submit" name="logoduzenle" class="btn btn-primary ">Güncelle</button>
                            </div>
                    </div>
                    </form>

                    <hr />

                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                        <!-- SİTE BAŞLIGI     -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_title" value="<?php echo $ayarcek['ayar_title'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <!-- SİTE ACIKLAMASI     -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Acıklaması<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_desc" value="<?php echo $ayarcek['ayar_desc'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <!-- SİTE KEYWORDS     -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Anahtar Kelime<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <!-- SİTE AUTHOTENTİCATİON     -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazar<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_author" value="<?php echo $ayarcek['ayar_author'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>




                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;">
                                <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncelle</button>

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