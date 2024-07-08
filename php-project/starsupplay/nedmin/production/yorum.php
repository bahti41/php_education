<?php

include 'header.php';

//BELİRTİLEN VERİLER CEKİLDİ
$yorumsor = $db->prepare("SELECT * FROM yorum order by yorum_onay ASC");
$yorumsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Listeleme <small>

                <?php
                if (isset($_GET['durum'])) {
                  if ($_GET['durum'] == "ok") { ?>

                    <b style="color:green;">İşlem Başarılı...</b>

                  <?php } elseif ($_GET['durum'] == "no") { ?>

                    <b style="color:red;">İşlem Başarısız...</b>

                <?php }
                }
                ?>


              </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="yorum-ekle.php"><button class="btn btn-info btn-xs">YENİ EKLE</button></a>
            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Yorum "</th>
                  <th>Kullanıcı</th>
                  <th>Ürün</th>
                  <th>Durum</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php
                $say = 0;
                while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>

                  <tr>

                    <td width="20">
                      <center><?php echo $say ?></center>
                    </td>
                    <td>
                      <center><?php echo htmlspecialchars($yorumcek['yorum_detay']) ?></center>
                    </td>
                    <td>
                      <center><?php

                              $kullanici_id = $yorumcek['kullanici_id'];

                              // KULLANICI TABLOSU
                              $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                              $kullanicisor->execute(array(
                                'id' => $kullanici_id
                              ));
                              $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

                              echo $kullanicicek['kullanici_adsoyad'];

                              ?></center>
                    </td>
                    <td>
                      <center><?php

                              $urun_id = $yorumcek['urun_id'];
                              // Ürün TABLOSU
                              $urunsor = $db->prepare("SELECT * from urun where urun_id=:id");
                              $urunsor->execute(array(
                                'id' => $urun_id
                              ));
                              $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

                              echo $uruncek['urun_ad'];


                              ?></center>
                    </td>
                    <td>
                      <center>
                        <?php
                        if ($yorumcek['yorum_onay'] == 0) { ?>
                          <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorum_onay=1&yorum_ona=ok">
                            <button class="btn btn-success btn-xs">Onayla</button>
                          </a>
                        <?php } elseif ($yorumcek['yorum_onay'] == 1) { ?>
                          <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorum_onay=0&yorum_ona=ok">
                            <button class="btn btn-warning btn-xs">Kaldır</button>
                          </a>
                        <?php } ?>

                      </center>
                    </td>


                    <td width="20">
                      <center><a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yorumsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center>
                    </td>
                  </tr>

                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>