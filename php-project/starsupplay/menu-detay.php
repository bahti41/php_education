<?php
include 'header.php';
// BELİRLİ VERİLERİ SECMEK İCİN
$menusor = $db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$menusor->execute(array(
    'sef' => $_GET['sef']
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->

            <!--VİDEO -->
            <div class="title-bg">
                <div class="title"><?php echo $menucek['menu_ad'] ?></div>
            </div>



            <div class="page-content">
                <p>
                    <?php echo $menucek['menu_detay'] ?>
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