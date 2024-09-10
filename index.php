<?php include 'inc/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <?php 
        $posts = $db->ReadAll("posts");
        foreach($posts as $post){
        ?>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <img src="assets/images/<?= $post['image'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= $Str->excerpt($post['body'], 70); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted"><?= $post['created_at'] ?></p>
                        <a href="show.php?id=<?= $post['id']; ?>" class="btn btn-primary">Show</a>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>       
    </div>
</div>

<?php include 'inc/footer.php'; ?>