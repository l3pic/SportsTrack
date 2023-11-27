<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/sidenav.php';?>
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
  <div class="main-container grid-2-4">
    <div class="kategorien-container"></div>
    <div class="favorit-container"></div>
    <div class="favorit-container"></div>
    <div class="favorit-container"></div>
    <div class="favorit-container"></div>
    <div class="favorit-container"></div>
    <div class="favorit-container"></div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>
