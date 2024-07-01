<?php

include 'header.php';

// KULLANICI TABLOSU
$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
    'id' => $_GET['kullanici_id']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanıcı İşlemleri
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


                            <!-- DATE AND TİME    -->

                            <?php
                            $zaman = explode(" ", $kullanicicek['kullanici_zaman']);
                            ?>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="first-name" name="kullanici_zaman" disabled value="<?php echo $zaman[0] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Saati<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="time" id="first-name" name="kullanici_zaman" disabled value="<?php echo $zaman[1] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- DATE AND TİME BİTİŞ    -->

                            <!-- TC    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TC<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- AD SOYAD    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- MEAL   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>" disabled required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- DURUM   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durumu<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="kullanici_durum" id="heard" class="form-control" require>


                                        <option value="1" <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : '';  ?>>Aktif</option>

                                        <option value="0" <?php echo $kullanicicek['kullanici_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                        <!-- <?php

                                                if ($kullanicicek['kullanici_durum'] == 0) { ?> 
                                            <option value="0">Pasif</option>
                                            <option value="1">Aktif</option>
                                        <?php } else { ?>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        <?php }

                                        ?> -->

                                    </select>
                                </div>
                            </div>

                            <!-- DURUM BİTİŞ  -->

                            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;">
                                    <button type="submit" name="kullaniciadminkaydet" class="btn btn-primary">Güncelle</button>

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