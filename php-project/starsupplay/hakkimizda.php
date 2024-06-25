<?php
include 'header.php';

include 'header.php';
// BELİRLİ VERİLERİ SECMEK İCİN
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bigtitle">Hakkımızda Sayfası</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9"><!--Main content-->

            <!--VİDEO -->
            <div class="title-bg">
                <div class="title">Tanıtım Videosu</div>
            </div>

            <?php if (isset($hakkimizdacek['hakkimizda_video'])) : ?>
                <iframe width="700" height="415" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video'] ?>" frameborder="0" allowfullscreen></iframe>
            <?php else : ?>
                <p>Video bulunamadı.</p>
            <?php endif; ?>


            <!--MİSYON VİZYON -->
            <div class="title-bg">
                <div class="title">Vizyon</div>
            </div>
            <blockquote>
                <?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>
            </blockquote>

            <div class="title-bg">
                <div class="title">Misyon</div>
            </div>
            <blockquote>
                <?php echo $hakkimizdacek['hakkimizda_misyon'] ?>
            </blockquote>

            <!--BAŞLIK İCERİK-->
            <div class="title-bg">
                <div class="title"><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></div>
            </div>
            <div class="page-content">
                <p>
                    <?php echo $hakkimizdacek['hakkimizda_icerik'] ?>
                </p>
            </div>



        </div>


        <!-- SİDEBAR BURAYA -->
        <?php include 'sidebar.php'; ?>
        <!-- SİDEBAR BURAYA BİTİŞ -->


    </div>
    <div class="spacer"></div>
</div>

<?php
include 'footer.php';
?>