<?php include 'inc/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <?php
        $post_id = $req->GET("id");
        $post = $db->Get_Row_ID("posts",$post_id);
        $author_id = $post["user_id"];
        $author_name = $db->Get_Col_ID("username","users",$author_id);
        ?>
        <img src="Authors/assets/upload/<?= $post['image'] ?>" class="card-img-top" height="500" width="300">
        <h5 ><?= $post['title'] ?></h5>
        <p class="text-muted">Publish: <?= $post['created_at'] ?></p>
        <p class="card-text">Author: <a href="AuthorAllPosts.php?author_id=<?= $post['user_id'] ?>&author_name=<?= $author_name ?>" class="btn-link btn-sm"><?= $author_name ?></a> </p>    
        <p><?= $post['body'] ?></p>
        <div class="d-flex justify-content-center align-items-center my-3">
            <a href="index.php" class="btn btn-primary mx-5 px-5">Back</a>
            <?php if($Session->hasSession("current_login")['id'] == $post['user_id']){?>
            <a href="Authors/EditPost.php?id=<?= $post_id ?>" class="btn btn-info mx-5 px-5">Edit</a>
            <a href="Authors/handlers/handleDeletePost.php?id=<?= $post_id ?>" class="btn btn-danger mx-5 px-5">Delete</a>
            <?php } ?>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>