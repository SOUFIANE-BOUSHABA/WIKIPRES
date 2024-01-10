<?php include("../app/View/user/header.php");?>



<div class="container border">
    <div class="row mt-4">
        <div class="col-md-3 border" id="sticky">
            <div>
                <input type="text"  id="searchInput" onkeyup="search()" placeholder="Search">
            </div>

            <!-- Checklist -->
            <div class="filter-section">
                <h5>category</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check1">
                    <label class="form-check-label" for="check1">
                        Filter 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check2">
                    <label class="form-check-label" for="check2">
                        Filter 2
                    </label>
                </div>
                <!-- Add more filters as needed -->
            </div>

            <div class="filter-section">
                <h5>tags</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check1">
                    <label class="form-check-label" for="check1">
                        Filter 1
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check2">
                    <label class="form-check-label" for="check2">
                        Filter 2
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9 border">
       
        <div class="row text-start justify-content-evenly" id="wikisforuser">
        <?php foreach ($wikis as $wiki) :  ?>
            <!-- Wiki Card 1 -->
            <div class="col-md-5 wiki-card shadow-sm "  data-aos="fade-up"
                data-aos-anchor-placement="bottom-bottom">
                <div class="card">
                    <img src="<?=$wiki->urlImage?>" class="card-img-top" alt="Wiki 1">
                    <div class="card-body">
                        <h5 class="card-title"><?=$wiki->title?></h5>
                        <p class="card-text">Description of Wiki 1.</p>
                        <a href="" class="btn btn-dark">Read More</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>


        </div>
    </div>
</div>



<script>
  AOS.init();

  function search() {
               
               let input = document.getElementById("searchInput").value;
               let url = `?uri=wiki/searchtwo&search=${encodeURIComponent(input)}`;

               let xml = new XMLHttpRequest();
               xml.onreadystatechange = function () {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("wikisforuser").innerHTML = xml.responseText;
                   }
               };
               xml.open("GET", url, true);
               xml.send();
         
       }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
