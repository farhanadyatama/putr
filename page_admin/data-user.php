<?php
session_start();
$session = $_SESSION['user'];

$page = "Data Pengguna";
include './include/heading.php';
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
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="./index.php">Dashboard</a></div>
          <div class="breadcrumb-item"><?= $page ?></div>
        </div>
        </div>
      <div class="card">
        <div class="card-header">
          <a href="./add-user.php" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
          <?php
          // Mengecek apakah terdapat cookie bernama "success"
          if(isset($_COOKIE['success'])) :
            echo" <div class='alert alert-success alert-dismissible show fade'>
              <div class='alert-body'>
                <button class='close' data-dismiss='alert'>
                  <span>&times;</span>
                </button>".
                $_COOKIE['success'].
              "</div>
            </div>";
          elseif(isset($_COOKIE['fail'])) :
            echo" <div class='alert alert-danger alert-dismissible show fade'>
              <div class='alert-body'>
                <button class='close' data-dismiss='alert'>
                  <span>&times;</span>
                </button>".
                $_COOKIE['fail'].
              "</div>
            </div>";
          endif;
          ?>
          <div class="table-responsive">
            <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $result = $pdo->query("SELECT * FROM user");
                foreach ($result as $row) :
              ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td scope="row"><?= $row['name']; ?></td>
                <td scope="row"><?= $row['email']; ?></td>
                <td scope="row">
                  <a href="./detail-user.php?id-login=<?= $row['id_login'] ?>" class="btn btn-icon icon-left btn-success" onclick="return confirm('Ingin melihat detail data pengguna?');"><i class="fas fa-eye"></i> <span class="d-none d-sm-none d-lg-inline-block">Detail</span></a>

                  <a href="./delete-user.php?id-login=<?= $row['id_login'] ?>" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Yakin ingin menghapus data pengguna?');"><i class="fas fa-trash-alt"></i> <span class="d-none d-sm-none d-lg-inline-block">Hapus</span></a>
                  
                  <?php if(in_array($session, ['Admin'])) : ?>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php
    include './include/footer.php';
    ?>

</div>
</div>

<?php
include './include/script.php';
?>