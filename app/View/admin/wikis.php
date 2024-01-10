<?php include_once("../app/View/admin/header.php");?>



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
       <?php if ($_SESSION['role'] === 'admin') { ?> <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button><?php } ?>
        <div>
       
        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-0 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="category">

        <?php foreach ($wikis as $wiki) :  ?>
                <tr>
                    <td><img src="<?= $wiki->urlImage  ?>" alt="ok"></td>
                    <td><?= $wiki->title ?></td>
                    <td><?= $wiki->created_at ?></td>
                    <td><?= $wiki->updated_at ?></td>
           
                    <td class="d-flex gap-2">
                   
                    <?php if ($_SESSION['role'] === 'admin') { ?>
                    <form action="?uri=wiki/archiver" method="post" >
                        <input type="hidden" name="id" value="<?= $wiki->wikiID ?>">
                        <button type="submit" name="submit" value="archiverwiki" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"> <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/> </svg>
                        </button>
                    </form>
                    <?php } ?>
                </td>
          </tr>
         

            <?php endforeach; ?>
         
        </tbody>
      </table>
    </div>
  </div>

<!-- add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">ajouter wiki</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form action="?uri=wiki/create" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" required></textarea>
                </div>


                <div class="form-group">
                    <label for="categoryID">Category:</label>
                    <select class="form-control" id="categoryID" name="categoryID">
                        <?php  foreach ($categoreis as $category) : ?>
                            <option value="<?= $category->categoryID ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="tagIDs">Tags:</label>
                  <?php foreach ($tags as $tag) : ?>
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="tag<?= $tag->tagID ?>" name="tagIDs[]" value="<?= $tag->tagID ?>">
                          <label class="form-check-label" for="tag<?= $tag->tagID ?>"><?= $tag->name ?></label>
                      </div>
                  <?php endforeach; ?>
              </div>

                <div class="form-group mb-3">
                    <label for="urlImage"> Image:</label>
                    <input type="file" class="form-control" id="urlImage" name="urlImage">
                </div>



                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" value="addwiki" name="submit" class="btn btn-primary">Ajouter</button>
                </form>   

                  
                </div>
              
            </div>
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
  

        function search() {
               
               let input = document.getElementById("searchInput").value;
               let url = `?uri=wiki/search&search=${encodeURIComponent(input)}`;

               let xml = new XMLHttpRequest();
               xml.onreadystatechange = function () {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("category").innerHTML = xml.responseText;
                   }
               };
               xml.open("GET", url, true);
               xml.send();
         
       }
</script>
</body>
</html>
