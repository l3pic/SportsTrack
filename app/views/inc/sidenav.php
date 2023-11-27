<div class="sidenav" id="sidenav">
  <div class="sidenav-links">
    <ul>
      <li><a href="<?= URLROOT;?>/"><i class="fa-solid fa-house"></i> Home</a></li>
      <details>
        <summary><i class="fa-solid fa-star"></i> Favoriten</summary>
        <ul>
<!--          hier aus Datenbank einfügen-->
<!--          bsp:-->
          <details class="sidenav-s1">
            <summary><i class="fa-solid fa-location-dot"></i> Berlin</summary>
            <ul>
              <li><a href="<?= URLROOT;?>/pages/weather/50/50"><i class="fa-solid fa-cloud"></i> Wetter</a></li>
              <li><a href="<?= URLROOT;?>/pages/minforecast/50/50"><i class="fa-regular fa-clock"></i> Minütlich</a></li>
              <li><a href="<?= URLROOT;?>/pages/hourforecast/50/50"><i class="fa-solid fa-clock"></i> Stündlich</a></li>
              <li><a href="<?= URLROOT;?>/pages/dayforecast/50/50"><i class="fa-solid fa-calendar-days"></i> Täglich</a></li>
              <li><a href="<?= URLROOT;?>/pages/polution/50/50"><i class="fa-solid fa-smog"></i> Luftverschmutzung</a></li>
            </ul>
          </details>

        </ul>
      </details>
    </ul>
  </div>

  <?php if (isset($_SESSION['user_id'])) : ?>
    <ul class="sidenav-useraction">
      <li><a href="<?= URLROOT;?>/users/logout">Logout</a></li>
    </ul>
  <?php else : ?>
    <ul class="sidenav-useraction">
      <li><a href="<?= URLROOT;?>/users/login">Login</a></li>
      <li><a href="<?= URLROOT;?>/users/register">Register</a></li>
    </ul>
  <?php endif; ?>
</div>