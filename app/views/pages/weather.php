<head>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/weather.css">
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
            <div class="links aria-inactive">
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
            <div class="links">
                <a href="<?= URLROOT; ?>/pages/pollution/<?= $data['city'][0]->lat; ?>/<?= $data['city'][0]->lon; ?>"
                   class="link">
                    <i class="fa-solid fa-smog"></i>
                    <span class="link-text">Luftverschmutzung</span>
                </a>
            </div>
        </div>
        <div class="pollution-container">
            <div class="pollution-card">
                <h2 class="pollution-card-subtitle">Windgrad</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->wind_deg; ?><span
                            class="pollution-card-unit"></span>&deg</span>
                <div class="arrow-container">
                    <span class="direction">N</span>
                    <span class="direction">O</span>
                    <span class="direction">S</span>
                    <span class="direction">W</span>
                    <i class="fa-solid fa-location-arrow arrow" id="wind_direction"></i>
                    <script>
                        var arrow = $('#wind_direction');
                        arrow.css('transform', 'translate(-50%, -50%) rotate(<?= $data['weather']->current->wind_deg - 45;?>deg)');
                    </script>
                </div>

            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title"> Windgeschwindigkeit</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->wind_speed; ?><span
                            class="pollution-card-unit">Km/h</span></span>
            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title">Klare Sicht</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->visibility; ?><span
                            class="pollution-card-unit"> Meter Sichtweite</span></span>
            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title">Atmosphärischer Druck</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->pressure; ?><span
                            class="pollution-card-unit"></span>hPa</span>
            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title">Luftfeuchtigkeit</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->humidity; ?><span
                            class="pollution-card-unit">%</span></span>
            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title">UVI-Index</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->uvi; ?><span
                            class="pollution-card-unit"></span></span>
            </div>
            <div class="pollution-card">
                <h2 class="pollution-card-title">Wolkenaussicht</h2>
                <span class="pollution-card-value"><?= $data['weather']->current->clouds; ?><span
                            class="pollution-card-unit">Wolken in Aussicht</span></span>
            </div>
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


