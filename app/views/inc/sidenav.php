<div class="sidenav" id="sidenav">
  <div class="sidenav-links">
    <ul>
      <li><a href="<?= URLROOT;?>/"><i class="fa-solid fa-house"></i> Home</a></li>
      <details>
        <summary><i class="fa-solid fa-star"></i> Favoriten</summary>
        <ul id="snfavorites">
          <?php if (isLoggedIn()) : ?>
            <?php if (!empty($data['favoriten'])) : ?>
              <?php foreach ($data['favoriten'] as $favorit) : ?>
                <li><a href="<?= URLROOT;?>/pages/weather/<?= $favorit->lat; ?>/<?= $favorit->lon; ?>" class="favorite-link-sn"><i class="fa-solid fa-cloud"></i> <?= $favorit->name ?></a></li>
              <?php endforeach; ?>
            <?php else : ?>
              <li><a href="#">Keine Favoriten</a></li>
            <?php endif; ?>
          <?php else : ?>
            <li><a href="<?= URLROOT;?>/users/login">Nicht angemeldet!</a></li>
          <?php endif; ?>
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