<?php include 'inc/header.php';?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="handlers/handleAddPost.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name = "title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Body:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "body"></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile" name="img">
                </div>
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>