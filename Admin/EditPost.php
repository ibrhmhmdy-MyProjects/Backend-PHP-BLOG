<?php include 'inc/header.php'; ?>
<?php 
$id = $req->GET("id");
$post = $db->Get_Row_ID("posts",$id);

?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="handlers/handleUpdatePost.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $post['title'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Body:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "body"><?= $post['body'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="img">
                </div>
                <div class="col-lg-3">
                    <img src="assets/upload/<?= $post['image'] ?>" class="card-img-top">
                </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Update Post</button></center>
            </form>
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>