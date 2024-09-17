<?php include 'inc/header.php'; 
  $authors = $db->Get_All_Table("users");
  $countAuthors = $db->CountRows("users");
  ?>
<div class="my-5">
  <div class="container">
      <span class="my-3 fw-bold">All Authors(<?= $countAuthors ?>)</span>
      <div class="list-group">
        <?php foreach($authors as $author){ ?>

          <div class="col-lg-4">
            <?php $countPosts = $db->CountRowsWhere("posts","user_id=?",$author['id']); ?>
            <a href="AuthorAllPosts.php?author_id=<?= $author['id'] ?>&author_name=<?= $author['username'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" aria-current="true">
            <span><?= $author['username'] ?></span>
            <span class="badge bg-primary rounded-pill"><?=$countPosts?></span>
          </a>
          </div>
        <?php } ?>
      </div>

  </div>
</div>