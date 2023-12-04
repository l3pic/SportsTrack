a<head>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/weather.css">
</head>
<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/sidenav.php'; ?>
<?php if (isset($data['weather'])) : ?>
  <script>console.log(<?= json_encode($data['weather']); ?>)</script>
  <script>console.log(<?= json_encode($data['city']); ?>)</script>
  <script>console.log(<?= json_encode($data['pollution']); ?>)</script>
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

    <form class="search-city" action="<?= URLROOT; ?>/pages/weather" method="POST">
      <input type="text" name="city" placeholder="Stadt" required>
      <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="links-container">
      <div class="links">
        <a href="<?= URLROOT; ?>/pages/weather/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
           class="link">
          <i class="fa-solid fa-calendar-day"></i>
          <span class="link-text">Heute</span>
        </a>
      </div>
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
      <div class="links aria-inactive">
        <a href="<?= URLROOT; ?>/pages/pollution/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
           class="link">
          <i class="fa-solid fa-smog"></i>
          <span class="link-text">Luftverschmutzung</span>
        </a>
      </div>
    </div>
    <div class="pollution-container">
      <div class="pollution-card">
        <h2 class="pollution-card-subtitle">Kohlenmonoxid - CO</h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->co; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Ammoniak - NH<sub>3</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->nh3; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Stickstoffmonoxid - NO</h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->no; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Stickstoffdioxid - NO<sub>2</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->no2; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Ozon - O<sub>3</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->o3; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Feinstaub - PM<sub>2,5</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->pm2_5; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Feinstaub - PM<sub>10</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->pm10; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
      <div class="pollution-card">
        <h2 class="pollution-card-title">Schwefeldioxid - SO<sub>2</sub></h2>
        <span class="pollution-card-value"><?= $data['pollution']->list[0]->components->so2; ?><span class="pollution-card-unit">µg/m³</span></span>
      </div>
    </div>

<?php else : ?>
    <div class="main">
        <form class="search-city" action="<?= URLROOT; ?>/pages/weather" method="POST">
            <input type="text" name="city" placeholder="Stadt" required>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="pollution-card-error">
            <h2 class="pollution-card-title-error">Error</h2>
            <span class="pollution-card-title-error">
                Diese Stadt existiert nicht!
            </span>
        </div>
    </div>
<!--error-->
<?php endif; ?>


