<?php 
require_once '../connection.php';
$name = $_SESSION['name'];
$stmt = $pdo->prepare('SELECT * FROM user WHERE name = "$name"');
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $row) :
    $rows = $row['photo'];
endforeach;

?>
<div class="navbar-bg .bg-info.bg-gradient"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <figure class="avatar mr-2 avatar-sm">
              <?php
              // if($user['photo'] != NULL) :
              //   $photo = $user['photo'];
              // else:
              //   $photo = "avatar-1.png";
              // endif;
              ?>
              <img src="../images/users/avatar-1.png" alt="">
              <i class="avatar-presence online"></i>
            </figure>
            <div class="d-inline-block"><?= $name ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
              <!-- <a href="./profile.php" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="../aksi_logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>