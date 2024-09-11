<?php require_once "inc/header.php" ?>

<div class="container">
  <div class="row">
    <section class="text-center">
      <div class="card mx-4 mx-md-5 my-5 shadow-5-strong">
        <div class="card-body py-5 px-md-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-5">Author Login</h2>
              <?php    
                if($Session->hasSession("errors")){
                    $errors = $Session->Get("errors");
                    foreach($errors as $error){
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    $Session->Clear("errors");
                }
              ?>
              <form action="handlers/handleLogin.php" method="POST">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" name="email" id="form3Example3" class="form-control" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" name="password" id="form3Example4" class="form-control" />
                </div>
                <!-- Signup button -->
                <div class="row">
                  <div class="col-md-6">
                    Not have Your Account <a href="../Register.php">Signup</a>
                  </div>
                  <div class="col-md-6">
                    <!-- Login button -->
                    <button type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                      Login
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>