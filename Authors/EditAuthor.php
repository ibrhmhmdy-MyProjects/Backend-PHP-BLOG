<?php require_once "inc/header.php" ?>
<?php 
$id = $req->GET("id");
$author = $db->Get_Row_ID("users",$id);

?>
<div class="container">
  <div class="row">
    <!-- Section: Design Block -->
    <section class="text-center">
      <div class="card mx-4 mx-md-5 my-5 shadow-5-strong">
        <div class="card-body py-5 px-md-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-5">Edit Info</h2>
              <?php    
                if($Session->hasSession("errors")){
                    $errors = $Session->Get("errors");
                    foreach($errors as $error){
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    $Session->Clear("errors");
                }
              ?>
              <form action="handlers/handleUpdateAuthor.php?id=<?= $id ?>" method="POST">
                <!-- Username input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example1">User Name</label>
                  <input type="text" id="form3Example1" class="form-control" name="username" value="<?= $author['username'] ?>"/>
                </div>
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example2">Email address</label>
                  <input type="text" id="form3Example2" class="form-control" name="email"  value="<?= $author['email'] ?>"/>
                </div>
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Password</label>
                  <input type="password" id="form3Example3" class="form-control" name="password" placeholder="Enter New Password"/>
                </div>
                <div class="data-mdb-input-init form-outline mb-4">
                  <button type="submit" name="submit" data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                    Update
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  </div>
</div>