<?php include("../app/View/user/header.php");?>


<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <div class="text-center">
        <img src="<?=$wikis->urlImage?>" class="w-25" alt="Wiki Image">
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-12">
      <h2><?=$wikis->title?></h2>
      <p>
      <?=$wikis->content?>
      </p>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-12">
      <hr>
      <p class="text-end">Posted by : <span class="text-primary"><?=$wikis->first_name." ".$wikis->first_name?></span> </p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
