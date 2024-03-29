<?php include("../app/View/user/header.php");?>

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 hero-text">
                <h1 class="fw-bold">Welcome to WikiPress</h1>
                <p>Your text description goes here.</p>
                <button class="btn btn-dark">Learn More</button>
            </div>
            <div class="col-md-6 mt-4 ">
                <img src="./upload/les-gens-minuscules-lisant-des-livres-de-la-liste-de-la-litterature-de-qualite-2r5fgnb-removebg-preview.png" alt="Hero Image" class="hero-image">
            </div>
        </div>
    </div>
</section>

<section class="category-section">
    <div class="container">
    <h2 class="fw-bold" style="margin-top:100px;">Latest Category</h2>
        
        <div class="row justify-content-between">
        <?php foreach ($categoreis as $categorei) :  ?>

           
            <div class="col-md-2 category-card shadow-sm">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?= $categorei->name ?></h5>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="wiki-section">
    <div class="container">
        <h2 class="fw-bold">Latest Wikis</h2>
        <div class="row">
        <?php foreach ($wikis as $wiki) :  ?>
            <div class="col-md-3 wiki-card shadow-sm">
                <div class="card">
                    <img src="<?= $wiki->urlImage ?>" class="card-img-top" alt="Wiki 1">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki->title ?></h5>
                        <p class="card-text"></p>
                        <a href="?uri=wiki/detailwiki/<?=$wiki->wikiID?>" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
           
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
