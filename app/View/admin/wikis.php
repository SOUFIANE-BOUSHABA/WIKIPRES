<?php include_once("../app/View/admin/header.php");?>



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
       <?php if ($_SESSION['role'] === 'author') { ?> <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button><?php } ?>
        <div>
       
        <input type="text" id="searchInput" onkeyup="searchadminwiki()" placeholder="rechercher">
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
        <?php if ($_SESSION['role'] === 'admin') { ?>
        <?php foreach ($wikis as $wiki) :  ?>
                <tr>
                    <td><img src="<?= $wiki->urlImage  ?>" alt="ok"></td>
                    <td><?= $wiki->title ?></td>
                    <td><?= $wiki->created_at ?></td>
                    <td><?= $wiki->updated_at ?></td>
           
                    <td class="d-flex gap-2">
                   
                  
                    <form action="?uri=wiki/archiver" method="post" >
                        <input type="hidden" name="id" value="<?= $wiki->wikiID ?>">
                        <button type="submit" name="submit" value="archiverwiki" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"> <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/> </svg>
                        </button>
                    </form>
                
                    
                </td>
          </tr>
         

            <?php endforeach; ?>
            <?php } ?>

            <?php if ($_SESSION['role'] === 'author') { ?>
                
            <?php if(!empty($wikisforuser)){
                foreach ($wikisforuser as $wiki) :  ?>
                    <tr>
                        <td><img src="<?= $wiki->urlImage  ?>" alt="ok"></td>
                        <td><?= $wiki->title ?></td>
                        <td><?= $wiki->created_at ?></td>
                        <td><?= $wiki->updated_at ?></td>
            
                        <td class="d-flex gap-2">
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal<?= $wiki->wikiID  ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg></button>
                         <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deletModal<?= $wiki->wikiID  ?>" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg></button>
                       
                        </td>
            </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?=  $wiki->wikiID   ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">modifier wiki</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=wiki/create" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=  $wiki->wikiID ?>">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" value="<?= $wiki->title ?>" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea class="form-control" id="content" name="content" required><?= $wiki->content ?></textarea>
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
                  <!-- delete Modal -->
                  <div class="modal fade" id="deletModal<?=  $wiki->wikiID   ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                      
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="?uri=wiki/deleteWiki" method="post" >
                        <input type="hidden" name="id" value="<?=  $wiki->wikiID ?>">
                        <p>vous voulez vraiment <span class="text-danger">suprimmer</span>  cette categore : <?=  $wiki->title ?></p>
                        <button type="submit" name="submit" value="deletewiki" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                        </div>
                       
                    </div>
                </div>
            </div>
            

                <?php endforeach; }  ?>
                <?php } ?>
         
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
<script src="./assets/js/admin.js"> </script>
</body>
</html>
