<head>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/weather.css">
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidenav.php'; ?>
<div class="main">
  <?php if (isset($data['weather'])) : ?>
    <div class="local-weather">
      <div class="lw-row">
        <i class="fa-solid fa-location-dot lw-loc"></i>
        <h1 class="lw-city"><?= $data['city'][0]->name; ?></h1>
        <span class="lw-local">Lokal</span>
      </div>
      <div class="lw-row">
        <img src="https://openweathermap.org/img/wn/<?= $data['weather']->current->weather[0]->icon; ?>@2x.png"
             alt="<?= $data['weather']->current->weather[0]->description; ?>" class="lw-icon">
        <span class="lw-temp"><?= $data['weather']->current->temp; ?>°C</span>
      </div>
      <div class="lw-row">
        <span class="lw-desc"><?= $data['weather']->current->weather[0]->description; ?></span>
        <span class="lw-time"><?= date('H:i', $data['weather']->current->dt); ?></span>
      </div>
    </div>

    <form class="search-city" action="<?= URLROOT; ?>/pages/weather" method="POST">
      <input type="text" name="city" placeholder="Stadt" required>
      <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="links-container">
      <div class="links">
        <a href="<?= URLROOT; ?>/pages/hourforecast/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
           class="link">
          <i class="fa-solid fa-clock"></i>
          <span class="link-text">Stündlich</span>
        </a>
      </div>
      <div class="links">
        <a href="<?= URLROOT; ?>/pages/dayforecast/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
           class="link">
          <i class="fa-solid fa-calendar-days"></i>
          <span class="link-text">Täglich</span>
        </a>
      </div>
      <div class="links">
        <a href="<?= URLROOT; ?>/pages/polution/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
           class="link">
          <i class="fa-solid fa-smog"></i>
          <span class="link-text">Luftverschmutzung</span>
        </a>
      </div>
    </div>

  <?php else : ?>
    <div class="local-weather">
      <div class="lw-row">
        <i class="fa-solid fa-location-dot lw-loc"></i>
        <h1 class="lw-city">--</h1>
        <span class="lw-local">Lokal</span>
      </div>
      <div class="lw-row">
        <img src="https://openweathermap.org/img/wn/10d@2x.png" alt="light rain" class="lw-icon">
        <span class="lw-temp">--°C</span>
      </div>
      <div class="lw-row">
        <span class="lw-desc">--</span>
        <span class="lw-time">--:--</span>
      </div>
    </div>
  <?php endif; ?>
  <form class="search-city" action="<?= URLROOT; ?>/pages/weather" method="POST">
    <input type="text" name="city" placeholder="Stadt">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>