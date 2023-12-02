<head>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/user.css">
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidenav.php'; ?> // Einbinden der sidenav

<div class="main" style="justify-content: center">
    <div class="user-action">
        <div class="titel">
            <h2>Account erstellen!</h2>
            <p>Bitte fülle alle Felder aus um dich anzumelden!</p>
        </div>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="ua-row">
                <label for="name">Name: <sup>*</sup></label>
                <input type="text" name="name"
                       class="eingabe <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
            </div>
            <div class="ua-row">
                <label for="password" class="mt-4">Passwort: <sup>*</sup></label>
                <input type="password" name="password"
                       class="eingabe <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
            </div>
            <div class="ua-row">
                <label for="confirm_password" class="mt-4">Passwort erneut eingeben: <sup>*</sup></label>
                <input type="password" name="confirm_password"
                       class="eingabe <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $data['confirm_password']; ?>">
                <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
            </div>

            <div class="row mt-4">
                <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light btn-block">Du hast
                    einen Account? Klick hier!</a>
                <input type="submit" value="Register" class="btn btn-success btn-block">

            </div>
        </form>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>