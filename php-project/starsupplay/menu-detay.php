<?php
include 'header.php';
// BELİRLİ VERİLERİ SECMEK İCİN
$menusor = $db->prepare("SELECT * FROM menu where menu_sef=:sef");
$menusor->execute(array(
    'sef' => $_GET['sef']
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bigtitle">Menu Sayfası</div>
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

            <?php if (isset($menucek['menu_video'])) : ?>
                <iframe width="700" height="415" src="https://www.youtube.com/embed/<?php echo $menucek['menu_video'] ?>" frameborder="0" allowfullscreen></iframe>
            <?php else : ?>
                <p>Video bulunamadı.</p>
            <?php endif; ?>


            <!--MİSYON VİZYON -->
            <div class="title-bg">
                <div class="title">Vizyon</div>
            </div>
            <blockquote>
                <?php echo $menucek['menu_vizyon'] ?>
            </blockquote>

            <div class="title-bg">
                <div class="title">Misyon</div>
            </div>
            <blockquote>
                <?php echo $menucek['menu_misyon'] ?>
            </blockquote>

            <!--BAŞLIK İCERİK-->
            <div class="title-bg">
                <div class="title"><?php echo $menucek['menu_baslik'] ?></div>
            </div>
            <div class="page-content">
                <p>
                    <?php echo $menucek['menu_icerik'] ?>
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