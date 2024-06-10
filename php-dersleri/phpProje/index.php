<?php
$kategoriyler = ["Programlama", "Web Geliştirme", "Mobil Uygulama", "Officce Uygulamalar"];
$kurslar = [
    [
        "id" => 1,
        "baslik" => "Angular Kursu",
        "acıklame" => "Güzel Bir kurs",
        "resim" => "angular.jpg",
        "onay" => true
    ],
    [
        "id" => 2,
        "baslik" => "Bootstrap Kursu",
        "acıklame" => "Güzel Bir kurs",
        "resim" => "bootstrap5.png",
        "onay" => true
    ],
    [
        "id" => 3,
        "baslik" => "Csharp Kursu",
        "acıklame" => "Güzel Bir kurs",
        "resim" => "ccsharp.png",
        "onay" => true
    ],
    [
        "id" => 3,
        "baslik" => "Web Gelistirme Kursu",
        "acıklame" => "Güzel Bir kurs",
        "resim" => "kompleweb.jpg",
        "onay" => false
    ],
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">CouerseApp</a>
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Kurslar</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <div class="list-group">
                        <?php for ($i = 0; $i < count($kategoriyler); $i++) : ?>

                            <a href="#" class="list-group-item list-group-item-action">
                                <?php echo $kategoriyler[$i]; ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <?php foreach ($kurslar as $kurs) : ?>
                    <?php if ($kurs["onay"]) : ?>
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="image/<?php echo $kurs["resim"]; ?>" alt="" class="img-fluid rounded-start">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $kurs["baslik"]; ?></h5>
                                        <p><?php echo $kurs["acıklame"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>