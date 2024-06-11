<?php require_once("config.php") ?>
<?php include("./partials/_header.php") ?>
<?php include("./partials/_navbar.php") ?>

<?php
if (!isset($_GET["id"])) {
    header("Location: index.php");
}
$id = $_GET["id"];
$result_kategoriler = mysqli_query($baglanti, "SELECT * from kategori_adi");
$result_kurs = mysqli_query($baglanti, "SELECT * from kurslar WHERE id=" . $id);
$kategoriyler = mysqli_fetch_all($result_kategoriler, MYSQLI_ASSOC);
$kurs = mysqli_fetch_assoc($result_kurs);
mysqli_close($baglanti);
?>

<div class="container my-3">
    <div class="row">
        <div class="col-3">

            <?php include("./partials/_kategoriler.php") ?>

        </div>
        <div class="col-9">
            <?php include("./partials/_kurs.php") ?>

        </div>
    </div>
</div>

<?php include("./partials/_footer.php") ?>