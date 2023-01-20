<?php
session_start();
if(!isset($_SESSION["masuk"])) :
  header("Location: ./login.php");
  exit();
endif;

$page = "PUTR";
include 'include/heading.php';

$count_user = "SELECT COUNT(*) AS count FROM user";
$count_reservasi = "SELECT COUNT(*) AS count FROM reservasi";
$count_pembangunan = "SELECT COUNT(*) AS count FROM pembangunan";
$count_information = "SELECT COUNT(*) AS count FROM information";

?>

<div id="app">
  <div class="main-wrapper">
    <?php
    include './include/navbar.php';
    include './include/sidebar.php';
    ?>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1><?= $page ?></h1>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Pengguna</h4>
                </div>
                <div class="card-body">
                  <?php
                  $result = $pdo->query($count_user);
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  echo $row['count'];
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Preservasi</h4>
                </div>
                <div class="card-body">
                  <?php
                  $result = $pdo->query($count_reservasi);
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  echo $row['count'];
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Pembangunan</h4>
                </div>
                <div class="card-body">
                  <?php
                  $result = $pdo->query($count_pembangunan);
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  echo $row['count'];
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Dokumen & Informasi</h4>
                </div>
                <div class="card-body">
                  <?php
                  $result = $pdo->query($count_information);
                  $row = $result->fetch(PDO::FETCH_ASSOC);
                  echo $row['count'];
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <?php
    include './include/footer.php';
    ?>
  </div>
</div>

<?php
include './include/script.php';
?>