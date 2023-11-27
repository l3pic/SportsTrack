<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/sidenav.php';?>
<head>
  <link rel="stylesheet" href="<?= URLROOT; ?>/css/home.css">
</head>
<script>
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      console.log("Latitude: " + latitude + ", Longitude: " + longitude);

      // Hier könntest du die Koordinaten für weitere Verarbeitung verwenden
    });
  } else {
    console.log("Geolocation wird nicht unterstützt.");
  }
</script>
<div class="main">
  <div class="local-weather">
    <div class="lw-row">
      <i class="fa-solid fa-location-dot lw-loc"></i>
      <h1 class="lw-city">Berlin</h1>
    </div>
    <div class="lw-row">
      <img src="https://openweathermap.org/img/wn/10d@2x.png" alt="light rain" class="lw-icon">
      <span class="lw-temp">12°C</span>
    </div>
    <div class="lw-row">
      <span class="lw-desc">Leichter Regen</span>
      <span class="lw-time">18:50</span>
    </div>
  </div>

  <form class="search-city" action="<?= URLROOT; ?>/pages/weather" method="POST">
    <input type="text" name="city" placeholder="Stadt">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
