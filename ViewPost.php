<?php include 'inc/header.php'; ?>

<div class="container my-5">
    <div class="row">
    <?php
        $post_id = $req->GET("id");
        $post = $db->Get_Row_ID("posts",$post_id);
        $author_id = $post["user_id"];
        $author_name = $db->Get_Col_ID("username","users",$author_id);
        ?>
            <img src="assets/images/<?= $post['image'] ?>" class="card-img-top" height="500" width="300">
            <h5 ><?= $post['title'] ?></h5>
            <p class="text-muted">Publish: <?= $post['created_at'] ?></p>
            <a href="AuthorPosts.php?author=<?= $author_id ?>" class="text-muted">Author: <?= $author_name ?></a>
            <p><?= $post['body'] ?></p>
            <div class="d-flex justify-content-center align-items-center my-3">
                <a href="index.php" class="btn btn-primary mx-5 px-5">Back</a>
                <a href="" class="btn btn-info mx-5 px-5">Edit</a>
                <a href="" class="btn btn-danger mx-5 px-5">Delete</a>
            </div>
  
    </div>
</div>



<?php include 'inc/footer.php'; ?>