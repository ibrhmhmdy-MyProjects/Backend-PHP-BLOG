<?php include 'inc/header.php'; ?>

<div class="container my-5">
    <div class="row">
    <?php
        $post_id = $req->GET("id");
        $post = $db->ReadRow("posts",$post_id);
        $author_id = $post["user_id"];
        $author_user = $db->ReadRow("users",$author_id);
        $author_name = $author_user['username'];
        ?>
        <div class="col-lg-6">
            <img src="assets/images/<?= $post['image'] ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?= $post['title'] ?></h5>
            <p class="text-muted">Publish: <?= $post['created_at'] ?></p>
            <p class="text-muted">Author: <?= $author_name ?></p>
            <p><?= $post['body'] ?></p>
            <a href="index.php" class="btn btn-primary">Back</a>

            <a href="" class="btn btn-info">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>