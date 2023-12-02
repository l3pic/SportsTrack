<head>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/user.css">
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidenav.php'; ?>


<div class="main" style="justify-content: center"">
<div class="user-action">
    <div class="titel">
        <h2>Anmelden</h2>
    </div>
    <form action="<?php echo URLROOT; ?>/users/login" method="post">
        <div class="ua-row">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email"
                   class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
        </div>
        <div class="ua-row">
            <label for="password" class="mt-4">Password: <sup>*</sup></label>
            <input type="password" name="password"
                   class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
        </div>
        <div class="row mt-4">
            <input type="submit" value="Anmelden" class="btn btn-success btn-block">
        </div>
    </form>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
