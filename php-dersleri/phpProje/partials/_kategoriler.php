            <div class="list-group">
                <div class="list-group">
                    <?php for ($i = 0; $i < count($kategoriyler); $i++) : ?>

                        <a href="#" class="list-group-item list-group-item-action">
                            <?php echo $kategoriyler[$i]["kategori_name"]; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>