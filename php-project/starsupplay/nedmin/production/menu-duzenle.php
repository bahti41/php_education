<?php

include 'header.php';

// MENÜ TABLOSU
$menusor = $db->prepare("SELECT * FROM menu where menu_id=:id");
$menusor->execute(array(
    'id' => $_GET['menu_id']
));

$menucek = $menusor->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menü Düzenle
                            <small>

                                <?php

                                if (isset($_GET['durum'])) { ?>
                                    <?php if ($_GET['durum'] == "ok") { ?>
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
                        <br />
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <!-- MENÜ AD    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_ad" value="<?php echo $menucek['menu_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- MENÜ URL    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_url" value="<?php echo $menucek['menu_url'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- MENÜ SIRA   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="menu_sira" value="<?php echo $menucek['menu_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- MENÜ DURUM   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durumu<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="menu_durum" id="heard" class="form-control" require>


                                        <option value="1" <?php echo $kullanicicek['menu_durum'] == '1' ? 'selected=""' : '';  ?>>Aktif</option>

                                        <option value="0" <?php echo $kullanicicek['menu_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                        <!-- <?php

                                                if ($kullanicicek['menu_durum'] == 0) { ?> 
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

                            <!-- MENÜ İCERİK     -->
                            <!-- CKEDİTOR (MENÜ) -->
                            <div class="from-group py-3">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1" name="menu_detay"><?php echo $menucek['menu_detay'] ?></textarea>
                                </div>
                            </div>
                            <!-- CKEDİTOR BİTİŞ (MENÜ) -->

                            <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id'] ?>">

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: right;  padding: 20px">
                                    <button type="submit" name="menuayarkaydet" class="btn btn-primary">Güncelle</button>

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