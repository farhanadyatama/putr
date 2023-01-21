<?php
session_start();
$session = $_SESSION['user'];

include '../function.php';

$page = "Tambah Data Preservasi";
include './include/heading.php';

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) :
  add_reservasi($_POST);
endif;
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

          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="date-authored">Date</label>
              <input type="date" class="form-control" name="date-authored" id="date-authored" autocomplete="off" max="<?= date('Y-m-d') ?>">
          </div>

            <div class="form-group">
              <label for="text-content">Nama Kegiatan</label>
              <textarea class="form-control" name="nama_kegiatan" id="text-content" placeholder="Nama Kegiatan" style="height: 100px" required></textarea>
            </div>

            <div class="form-group">
              <label for="title">Target</label>
              <input type="text" name="targett" id="title" class="form-control" placeholder="Target" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Kontrak</label>
              <input type="text" name="kontrak" id="title" class="form-control" placeholder="Kontrak" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" id="title" class="form-control" placeholder="Nama Perusahaan" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Konsultan Pengawas</label>
              <input type="text" name="konsultan_pengawas" id="title" class="form-control" placeholder="Konsultan Pengawas" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="date-authored">Tanggal Kontrak</label>
              <input type="date" class="form-control" name="date-authored2" id="date-authored" autocomplete="off" max="<?= date('Y-m-d') ?>">
            </div>

            <div class="form-group">
              <label for="title">Pelaksanaan</label>
              <input type="text" name="pelaksanaan" id="title" class="form-control" placeholder="Pelaksanaan" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Pemberian Kesempatan</label>
              <input type="text" name="pemberian_kesempatan" id="title" class="form-control" placeholder="Pemberian Kesempatan" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="date-authored">Tanggal Akhir Kontrak</label>
              <input type="text" class="form-control" name="date-authored3" id="date-authored" autocomplete="off" placeholder="Tanggal Akhir Kontrak">
            </div>

            <div class="form-group">
              <label for="title">Keuangan (Rp)</label>
              <input type="text" name="keuangan_rp" id="title" class="form-control" placeholder="Keuangan (Rp)" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Keuangan (%)</label>
              <input type="text" name="keuangan_%" id="title" class="form-control" placeholder="Keuangan (%)" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Fisik (Rencana)</label>
              <input type="text" name="fisik_rencana" id="title" class="form-control" placeholder="Fisik (Rencana)" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Fisik (Realisasi)</label>
              <input type="text" name="fisik_realisasi" id="title" class="form-control" placeholder="Fisik (Realisasi)" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="title">Fisik (Deviasi)</label>
              <input type="text" name="fisik_deviasi" id="title" class="form-control" placeholder="Fisik (Deviasi)" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label for="text-content">Keterangan</label>
              <textarea class="form-control" name="keterangan" id="text-content" placeholder="Keterangan" style="height: 100px" required></textarea>
            </div>

            <div class="card-footer text-right">
              <button type="submit" name="submit" class="btn btn-icon icon-left btn-success mr-1"><i class="fas fa-save"></i> Simpan</button>
              <!-- <button type="button" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</button> -->
              <a href="data-reservasi.php" class="btn btn-icon icon-left btn-warning"><i class="fas fa-times"></i> Batal</a>
            </div>
          </form>
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
<script type="text/javascript">
  $(document).on("click", "#select_photo", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
  });

  $('input[type="file"]').change(function(e) {
  var fileName = e.target.files[0].name;
  $("#file").val(fileName);

  var reader = new FileReader();
  reader.onload = function(e) {
      // get loaded data and render thumbnail.
      var img_prev = document.getElementById("preview");
      img_prev.src = e.target.result;
      img_prev.style.height = '150px';
      img_prev.style.width = '150px';
  };
  // read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
  });
</script>