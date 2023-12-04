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

        <form class="search-city" action="<?= URLROOT; ?>/pages/dayforecast" method="POST">
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
            <div class="links aria-inactive">
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

        <div class="df-container">
            <?php foreach ($data['weather']->daily as $day) : ?>
                <div class="df-row">
                    <div>
                        <span class="df-time"><?= $day->dt; ?></span>
                        <img src="https://openweathermap.org/img/wn/<?= $day->weather[0]->icon; ?>@2x.png"
                             alt="<?= $day->weather[0]->description; ?>" class="df-icon">
                        <span class="df-desc"><?= $day->weather[0]->description; ?></span>
                        <span class="df-temp"><?= $day->temp->min; ?>°C</span>
                        <span class="df-desc">Min.</span>
                        <span class="df-temp"><?= $day->temp->max; ?>°C</span>
                        <span class="df-desc">Max.</span>
                    </div>
                    <div>
                        <span class="df-temp"><?= $day->temp->morn; ?>°C</span>
                        <span class="df-desc">Morgens</span>
                        <span class="df-temp"><?= $day->temp->day; ?>°C</span>
                        <span class="df-desc">Tag</span>
                        <span class="df-temp"><?= $day->temp->eve; ?>°C</span>
                        <span class="df-desc">Nachmittag</span>
                        <span class="df-temp"><?= $day->temp->night; ?>°C</span>
                        <span class="df-desc">Nacht</span>
                    </div>
                </div>
            <?php endforeach; ?>
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
</div>