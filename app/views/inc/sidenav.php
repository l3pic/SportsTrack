<div class="sidenav" id="sidenav">
  <div class="sidenav-links">
    <details>
      <summary>Sportarten</summary>
      <ul>
        <li><a href="<?= URLROOT;?>/sport/soccer">Fußball</a></li>
        <li><a href="<?= URLROOT;?>/sport/football">Amarican Football</a></li>
        <li><a href="<?= URLROOT;?>/sport/baseball">Baseball</a></li>
        <li><a href="<?= URLROOT;?>/sport/golf">Golf</a></li>
        <li><a href="<?= URLROOT;?>/sport/basketball">Basketball</a></li>
      </ul>
    </details>
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