<?php

include 'header.php';

//BELİRTİLEN VERİLER CEKİLDİ
$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>

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
              <a href="urun-ekle.php"><button class="btn btn-info btn-xs">YENİ EKLE</button></a>
            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ürün Ad"</th>
                  <th>Ürün Stok</th>
                  <th>Ürün Fiyat</th>
                  <th>Resim İşlemleri</th>
                  <th>Öne Çıkar</th>
                  <th>Ürün Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php
                $say = 0;
                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++ ?>

                  <tr>

                    <td width="20">
                      <center><?php echo $say ?></center>
                    </td>
                    <td>
                      <center><?php echo htmlspecialchars($uruncek['urun_ad']) ?></center>
                    </td>
                    <td>
                      <center><?php echo htmlspecialchars($uruncek['urun_stok']) ?></center>
                    </td>
                    <td>
                      <center><?php echo htmlspecialchars($uruncek['urun_fiyat']) ?></center>
                    </td>
                    <td>
                      <center><a href="urun-galeri.php?urun_id=<?php echo htmlspecialchars($uruncek['urun_id']) ?>"><button class="btn btn-success btn-xs">Resim İşlemleri</button></a></center>
                    </td>
                    <td>
                      <center>
                        <?php
                        if ($uruncek['urun_onecikar'] == 0) { ?>
                          <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urun_onecikar=1&urun_ona=ok">
                            <button class="btn btn-success btn-xs">Öne Çıkar</button>
                          </a>
                        <?php } elseif ($uruncek['urun_onecikar'] == 1) { ?>
                          <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urun_onecikar=0&urun_ona=ok">
                            <button class="btn btn-warning btn-xs">Kaldır</button>
                          </a>
                        <?php } ?>

                      </center>
                    </td>
                    <td width="20">
                      <center>
                        <?php
                        if ($uruncek['urun_durum'] == 1) { ?>
                          <button class="btn btn-success btn-xs">Aktif</button>
                        <?php } else { ?>
                          <button class="btn btn-danger btn-xs">Pasif</button>
                        <?php } ?>
                      </center>
                    </td>


                    <td width="20">
                      <center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center>
                    </td>


                    <td width="20">
                      <center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center>
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