<?php

include 'header.php';
// BELİRLİ VERİLERİ SECMEK İCİN
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>



<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hakkımızda Ayarlar
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
                        <br />
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                            <!-- HAKKIMIZDA BAŞLIGI     -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlığı<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- HAKKIMIZDA VİDEO    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- HAKKIMIZDA VİZYON   -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <!-- HAKKIMIZDA MİSYON    -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- HAKKIMIZDA İCERİK     -->
                            <!-- CKEDİTOR (HAKKIMIZDA) -->
                            <div class="form-group py-3">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik'] ?></textarea>
                                </div>
                            </div>
                            <!-- CKEDİTOR BİTİŞ (HAKKIMIZDA) -->




                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 " style="text-align: right; padding: 20px">
                                    <button type="submit" name="hakkimizdakaydet" class="btn btn-primary">Güncelle</button>

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

<!--CKEDİTOR 5 İCİN -->
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor1'), {
            ckfinder: {
                uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                options: {
                    resourceType: 'Images'
                }
            },
            toolbar: [
                'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo'
            ]
        })
        .then(editor => {
            editor.ui.view.editable.element.style.height = '500px';
        })
        .catch(error => {
            console.error(error);
        });
</script> -->

<!--CKEDİTOR 5 İCİN COK TOOLSLU-->
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editor1'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'tableColumn', 'tableRow', 'mergeTableCells', '|',
                    'undo', 'redo', '|',
                    'imageUpload', 'imageInsert'
                ]
            },
            image: {
                toolbar: [
                    'imageTextAlternative', 'toggleImageCaption', 'imageStyle:inline', 'imageStyle:block', 'imageStyle:side'
                ],
                insert: {
                    integrations: ['insertImageViaUrl']
                }
            },
            simpleUpload: {
                uploadUrl: 'path/to/your/upload/script'
            }
        })
        .then(editor => {
            editor.ui.view.editable.element.style.height = '500px';
        })
        .catch(error => {
            console.error(error);
        });
</script> -->