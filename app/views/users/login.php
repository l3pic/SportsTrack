<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/sidenav.php';?>



  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <?php flash('register_success'); ?>
      <h2>Login</h2>
      <p>Please fill in your credentials to login</p>
      <form action="<?php echo URLROOT; ?>/users/login" method="post">
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email"
                 class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '';?>"
                 value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="form-group">
          <label for="password" class="mt-4">Password: <sup>*</sup></label>
          <input type="password" name="password"
                 class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : '';?>"
                 value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
        </div>
        <div class="row mt-4">
          <div class="col d-grid">
            <input type="submit" value="Login" class="btn btn-success btn-block">
          </div>
          <div class="col d-grid">
            <a href="<?php echo URLROOT?>/users/register" class="btn btn-light btn-block">No account? Register</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>
