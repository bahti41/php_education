        <div class="card mb-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="image/<?php echo $kurs["resim"]; ?>" alt="" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="kurslar-detail.php?id=<?php echo $kurs["id"]; ?>">
                                <?php echo $kurs["baslık"]; ?>
                            </a>
                        </h5>
                        <p>
                            <?php echo $kurs["acıklma"]; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>