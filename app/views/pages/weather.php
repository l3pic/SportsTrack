<head>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/home.css">
</head>
<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/sidenav.php'; ?>
<?php if (isset($data['weather'])) : ?>
  <script>console.log(<?= json_encode($data['weather']); ?>)</script>
  <script>console.log(<?= json_encode($data['city']); ?>)</script>
  <div class="main">
    <div class="local-weather">
      <div class="lw-row">
        <i class="fa-solid fa-location-dot lw-loc"></i>
        <h1 class="lw-city"><?= $data['city'][0]->name; ?></h1>
      </div>
      <div class="lw-row">
        <img src="https://openweathermap.org/img/wn/<?= $data['weather']->current->weather[0]->icon; ?>@2x.png" alt="<?= $data['weather']->current->weather[0]->description; ?>" class="lw-icon">
        <span class="lw-temp"><?= $data['weather']->current->temp; ?>°C</span>
      </div>
      <div class="lw-row">
        <span class="lw-desc"><?= $data['weather']->current->weather[0]->description; ?></span>
        <span class="lw-time"><?= date('H:i', $data['weather']->current->dt); ?></span>
      </div>
    </div>
  </div>
<?php else : ?>
<!--error-->
<?php endif; ?>


