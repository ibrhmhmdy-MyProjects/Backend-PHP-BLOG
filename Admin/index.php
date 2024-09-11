<?php require_once "inc/header.php"; ?>

<?php
$user_id = $Session->Get("current_login")['id'];
$values[] = $user_id; 
$posts = $db->Get_Rows_Where("posts", "user_id =?",$values);
?>

<div class="container my-5">
    <caption>
        <button type="button" class="btn btn-sm btn-primary">
            New Post
        </button>
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
            foreach($posts as $post){
            ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="assets/images/<?= $post['image'] ?>"
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
                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                Edit
                            </button>
                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                Delete
                            </button>
                            <?php if($post['status'] == 0){?>
                            <button type="button" class="btn btn-link btn-sm btn-rounded">
                                Publish
                            </button>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include 'inc/footer.php'; ?>