<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="<?= URLROOT; ?>/img/favicon.svg" type="image/svg+xml">
  <title><?= SITENAME; ?></title>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/header.css">
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/sidenav.css">
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/main.css">
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/aos.css">
  <script src="<?= URLROOT; ?>/js/aos.js"></script>
  <script>const locationIsset = <?= checkSessionVar('location'); ?></script>
  <script src="<?= URLROOT; ?>/js/main.js" defer></script>
  <script src="<?= URLROOT; ?>/js/jquery-3.7.0.min.js"></script>
  <script src="https://kit.fontawesome.com/d2f6aa7ce4.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="header">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" style="fill:#ffffff" class="sidenav-toggle" onclick="togglesidenav(this);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
    <div class="header-tl">
      <span class="header-title" onclick="window.location = '<?= URLROOT; ?>/'"><?= SITENAME; ?> <i class="fa-solid fa-wind"></i></span>
    </div>
  </div>