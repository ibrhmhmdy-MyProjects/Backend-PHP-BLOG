<?php include 'inc/header.php'; ?>
<?php 
    if($Session->hasSession("current_login")){
        $current_user = $Session->Get("current_login");
        $user_id = $current_user['id'];
        $username = $current_user['username'];
    }
?>
<div class="container my-5">
    <div class="row">
        <?php
        $posts = $db->Get_Rows_Where("posts","status = ?",[1]);
        if(!$posts){?>
        <div class="col-12 mb-3">
            <div class="alert alert-primary text-center w-100">No Posts Now</div>
        </div>
        <?php }else{
        foreach($posts as $post){
        ?>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <img src="Authors/assets/upload/<?= $post['image'] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <?php $author_name = $db->Get_Col_ID("username","users",$post['user_id']); ?>
                    <p class="card-text">Author: <a href="AuthorAllPosts.php?author_id=<?= $post['user_id'] ?>&author_name=<?= $author_name ?>" class="btn-link btn-sm"><?= $author_name ?></a> </p>    
                    <p class="card-text"><?= $Str->excerpt($post['body'], 70); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted m-0 p-0"><?= $post['created_at'] ?></small>
                        <a href="ViewPost.php?id=<?= $post['id']; ?>" class="btn btn-primary btn-sm">View Post</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>       
    <?php } ?>       
    </div>
</div>

<?php include 'inc/footer.php'; ?>

<!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem nostrum aspernatur iure quasi, dolores odio harum. Amet alias nulla commodi perferendis repellendus sed, ad quia blanditiis ducimus? Iste, quae provident! -->