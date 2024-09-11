<?php include 'inc/header.php'; ?>
<?php
// View User(Author) Posts
$current_user = $Session->Get("current_login");
$user_id = $current_user['id'];
$username = $current_user['username'];
?>
<div class="container my-5">
    <div class="row">
        <?php 
        $posts = $db->SearchRow("posts");
        foreach($posts as $post){
        ?>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <img src="assets/images/<?= $post['image'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text">Author: <?= $username ?></p>    
                    <p class="card-text"><?= $Str->excerpt($post['body'], 70); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted m-0 p-0"><?= $post['created_at'] ?></small>
                        <a href="ViewPost.php?id=<?= $post['id']; ?>" class="btn btn-primary btn-sm">View Post</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>       
    </div>
</div>

<?php include 'inc/footer.php'; ?>