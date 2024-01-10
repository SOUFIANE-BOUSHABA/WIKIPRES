<?php foreach ($searchResults as $wiki) :  ?>
            <!-- Wiki Card 1 -->
            <div class="col-md-5 wiki-card shadow-sm "  data-aos="fade-up"
                data-aos-anchor-placement="bottom-bottom">
                <div class="card">
                    <img src="<?=$wiki->urlImage?>" class="card-img-top" alt="Wiki 1">
                    <div class="card-body">
                        <h5 class="card-title"><?=$wiki->title?></h5>
                        <p class="card-text">Description of Wiki 1.</p>
                        <a href="#" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>