<?php include_once("../app/View/admin/header.php");?>



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
        <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
        <div>
       
        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-0 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="category">

        <?php foreach ($categoreis as $categorei) :  ?>
                <tr>
                    <td><?= $categorei->categoryID  ?></td>
                    <td><?= $categorei->name ?></td>
                    <td><?= $categorei->created_at ?></td>
                    <td><?= $categorei->updated_at ?></td>
           
                    <td class="d-flex gap-2">
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal<?= $categorei->categoryID  ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg></button>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deletModal<?= $categorei->categoryID  ?>" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg></button>
                   
                </td>
          </tr>
                    <!-- Edit Modal -->
            <div class="modal fade" id="editModal<?= $categorei->categoryID  ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">modifier categories</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=category/update" method="post">
                            <input type="hidden" name="id" value="<?=$categorei->categoryID ?>">
                            <label for="cate">name</label> <br>
                            <input id="cate" type="text" name="category" value="<?= $categorei->name ?>" placeholder="enter le nome de categories" class="w-75 mb-4"><br>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="modifierCategorie"  name="submit" class="btn btn-primary">modifier</button>
                        </form>
                        </div>
                       
                    </div>
                </div>
            </div>
                  <!-- delete Modal -->
                  <div class="modal fade" id="deletModal<?= $categorei->categoryID  ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                      
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=category/delete" method="post" >
                        <input type="hidden" name="id" value="<?= $categorei->categoryID?>">
                        <p>vous voulez vraiment <span class="text-danger">suprimmer</span>  cette categore : <?= $categorei->name ?></p>
                        <button type="submit" name="submit" value="deletcategory" onclick="confirmDelete()" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                        </div>
                       
                    </div>
                </div>
            </div>

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
                    <h5 class="modal-title" id="addModalLabel">ajouter categories</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form action="?uri=category/create" method="post">
                    <label for="cate">name</label> <br>
                    <input id="cate" type="text" name="category" placeholder="enter le nom de categories" class="w-75 mb-4"><br>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="addCategorie"  name="submit" class="btn btn-primary">Ajouter</button>
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
  
  function confirmDelete() {
           
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Votre élément a été supprimé avec succès"
                    });
              
        }



        function search() {
               
               let input = document.getElementById("searchInput").value;
               let url = `?uri=category/search&search=${encodeURIComponent(input)}`;

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
