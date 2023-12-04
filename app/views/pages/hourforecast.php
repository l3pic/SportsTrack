<head>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/weather.css">
</head>
<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require_once APPROOT . '/views/inc/sidenav.php'; ?>
<div class="main">
<?php if (isset($data['weather'])) : ?>
  <script>console.log(<?= json_encode($data['weather']); ?>)</script>

  <div class="local-weather">
    <div class="lw-row">
      <i class="fa-solid fa-location-dot lw-loc"></i>
      <h1 class="lw-city"><?= $data['city'][0]->name; ?></h1>
      <?php if (isLoggedIn()) : ?>
        <?php $isFav = false; ?>
        <?php if (!empty($data['favoriten'])) : ?>
          <?php foreach ($data['favoriten'] as $favorit) : ?>
            <?php if ($favorit->name == $data['city'][0]->name) : ?>
              <i class="fa-solid fa-heart fav-toggle" onclick="removeFavorite('<?= $favorit->id ?>');"></i>
              <?php $isFav = true; ?>
              <?php break; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!$isFav) : ?>
          <i class="fa-regular fa-heart fav-toggle" onclick="addFavorite(<?= $data['city'][0]->lat; ?>, <?= $data['city'][0]->lon; ?>, '<?= $data['city'][0]->name; ?>');"></i>
        <?php endif; ?>
      <?php else : ?>
        <i class="fa-regular fa-heart fav-toggle" onclick="window.location.href='<?= URLROOT; ?>/users/login'"></i>
      <?php endif; ?>
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

  <form class="search-city" action="<?= URLROOT; ?>/pages/hourforecast" method="POST">
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
    <div class="links aria-inactive">
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
      <a href="<?= URLROOT; ?>/pages/pollution/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
         class="link">
        <i class="fa-solid fa-smog"></i>
        <span class="link-text">Luftverschmutzung</span>
      </a>
    </div>
  </div>

  <div class="hf-container">
    <?php $currentdate = 0 ?>
    <?php foreach ($data['weather']->hourly as $hour) : ?>
      <?php if ($currentdate != date('d', $hour->dt)) : ?>
        <?php $currentdate = date('d', $hour->dt); ?>
        <div class="hf-date"><?= date('d.m.Y', $hour->dt); ?></div>
      <?php endif; ?>
      <div class="hf-row">
        <span class="hf-time"><?= date('H:i', $hour->dt); ?></span>
        <img src="https://openweathermap.org/img/wn/<?= $hour->weather[0]->icon; ?>@2x.png"
             alt="<?= $hour->weather[0]->description; ?>" class="hf-icon">
        <span class="hf-temp"><?= $hour->temp; ?>°C</span>
        <span class="hf-desc"><?= $hour->weather[0]->description; ?></span>
      </div>
    <?php endforeach; ?>
  </div>
<?php else : ?>
  <!--error-->
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
<?php endif; ?>
</div>