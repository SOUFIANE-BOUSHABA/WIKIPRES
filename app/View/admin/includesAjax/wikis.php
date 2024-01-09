<?php foreach ($searchResults as $wiki) :  ?>
                <tr>
                    <td><?= $wiki->wikiID  ?></td>
                    <td><?= $wiki->title ?></td>
                    <td><?= $wiki->created_at ?></td>
                    <td><?= $wiki->updated_at ?></td>
           
                    <td class="d-flex gap-2">
                   
                    
                    <form action="?uri=wiki/archiver" method="post" >
                        <input type="hidden" name="id" value="<?= $wiki->wikiID ?>">
                        <button type="submit" name="submit" value="delettag" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16"> <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/> </svg>
                        </button>
                    </form>
                </td>
          </tr>
         

            <?php endforeach; ?>