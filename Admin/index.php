<?php require_once "inc/header.php"; ?>

<?php
$user_id = $Session->Get("current_login")['id'];
$values[] = $user_id; 
$posts = $db->Get_Rows_Where("posts", "user_id =?",$values);
?>

<div class="container my-5">
    <caption>
        <a href="AddPost.php" type="button" class="btn btn-sm btn-primary">
            New Post
        </a>
    </caption>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Status</th>
                <th>Publish Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!$posts){?>
                <tr>
                    <td colspan="5">
                        <div class="text-center w-100">No Posts Now</div>
                    </td>
                </tr>
                <?php }else{
            foreach($posts as $post){
            ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="assets/upload/<?= $post['image'] ?>"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1"><?= $post['title'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <p class="fw-bold mb-1"><?= $Str->excerpt($post['body'], 50) ?></p>
                        </div>
                    </td>
                    <td>
                        <?php if($post['status'] == 1){?>
                            <span class="badge bg-success">Publishing</span>
                        <?php }else{ ?>
                            <span class="badge bg-secondary">In Progress...</span>
                        <?php } ?>
                    </td>
                    <td>
                        <p class="fw-normal mb-1"><?= $post['created_at'] ?></p>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="EditPost.php?id=<?= $post['id'] ?>" type="button" class="btn btn-link btn-sm btn-rounded">
                                Edit
                            </a>
                            <a href="handlers/handleDeletePost.php?id=<?= $post['id'] ?>" type="button" class="btn btn-link btn-sm btn-rounded">
                                Delete
                            </a>
                            <?php if($post['status'] == 0){?>
                            <a href="handlers/handlePublishPost.php?id=<?= $post['id'] ?>" type="button" class="btn btn-link btn-sm btn-rounded">
                                Publish
                            </a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include 'inc/footer.php'; ?>