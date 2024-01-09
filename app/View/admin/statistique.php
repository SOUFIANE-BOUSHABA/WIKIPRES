<?php include("../app/View/admin/header.php");?>

<main>
 <div class="d-flex justify-content-between gap-3 mb-4">
  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Number of Users</h5>
    <p class="card-text"><?php echo $userCount[0]->userCount;?></p>
  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Number of Categories</h5>
    <p class="card-text"><?php echo $categoryCount[0]->categoryCount; ?></p>
  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Number of Tags</h5>
    <p class="card-text"><?php echo $tagCount[0]->tagCount; ?></p>
  </div>

  <div class="card w-25 shadow-sm">
    <h5 class="card-title">Number of Wikis</h5>
    <p class="card-text"><?php echo $wikiCount[0]->wikiCount;?></p>
  </div>
 </div>

 <div id="chartContainer" class="card">
    <h5 class="card-title">Charts</h5>
    <div class="card-body">
    <canvas id="wikiChart" width="700" height="100"></canvas>

    </div>
  </div>
</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
  function toggleAside() {
    var aside = document.getElementById("myAside");
    var righttt = document.getElementById("right");
    var rightttBtn = document.getElementById("rightBtn");
    var leftBtn = document.getElementById("leftBtn");
    var links = document.querySelectorAll(".link");

    if (aside.style.width === "5%") {
      aside.style.width = "17%";
      righttt.style.width="83%";
      leftBtn.style.display="block";
      rightttBtn.style.display="none";
      links.forEach(function (link) {
            link.style.display = "block";
        });
    
    } else {
      aside.style.width = "5%";
      righttt.style.width="95%";
      leftBtn.style.display="none";
      rightttBtn.style.display="block";
   
        links.forEach(function (link) {
            link.style.display = "none";
        });
    }
  }
 

</script>


</body>
</html>
