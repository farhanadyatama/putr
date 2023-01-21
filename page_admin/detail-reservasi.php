<?php
session_start();
$session = $_SESSION['user'];

include '../function.php';

$page = "Detail Data Preservasi";
include './include/heading.php';

// check whether edit_preservasi button has clicked
if (isset($_POST['edit_preservasi'])) :
  $id = $_GET["id-reservasi"];
  $tanggal = filter_input(INPUT_POST, 'date-authored', FILTER_SANITIZE_STRING);
  $nama_kegiatan = filter_input(INPUT_POST, 'nama_kegiatan', FILTER_SANITIZE_STRING);
  $targett = filter_input(INPUT_POST, 'targett', FILTER_SANITIZE_STRING);
  $kontrak = filter_input(INPUT_POST, 'kontrak', FILTER_SANITIZE_STRING);
  $nama_perusahaan = filter_input(INPUT_POST, 'nama_perusahaan', FILTER_SANITIZE_STRING);
  $konsultan_pengawas = filter_input(INPUT_POST, 'konsultan_pengawas', FILTER_SANITIZE_STRING);
  $tanggal_kontra = filter_input(INPUT_POST, 'date-authored2', FILTER_SANITIZE_STRING);
  $pelaksanaan = filter_input(INPUT_POST, 'pelaksanaan', FILTER_SANITIZE_STRING);
  $pemberian_kesempatan = filter_input(INPUT_POST, 'pemberian_kesempatan', FILTER_SANITIZE_STRING);
  $tanggal_akhir_kontrak = filter_input(INPUT_POST, 'date-authored3', FILTER_SANITIZE_STRING);
  $tanggal_kontra = filter_input(INPUT_POST, 'date-authored2', FILTER_SANITIZE_STRING);
  $keuangan_rp = filter_input(INPUT_POST, 'keuangan_rp', FILTER_SANITIZE_STRING);
  $keuangan_persen = filter_input(INPUT_POST, 'keuangan_%', FILTER_SANITIZE_STRING);
  $fisik_rencana = filter_input(INPUT_POST, 'fisik_rencana', FILTER_SANITIZE_STRING);
  $fisik_realisasi = filter_input(INPUT_POST, 'fisik_realisasi', FILTER_SANITIZE_STRING);
  $fisik_deviasi = filter_input(INPUT_POST, 'fisik_deviasi', FILTER_SANITIZE_STRING);
  $keterangan = filter_input(INPUT_POST, 'keterangan', FILTER_SANITIZE_STRING);


  if(!empty($tanggal)) :
    $stmt = $pdo->prepare('UPDATE reservasi SET tanggal = :tanggal, nama_kegiatan = :nama_kegiatan,
      targett = :targett, kontrak = :kontrak, nama_perusahaan = :nama_perusahaan, konsultan_pengawas = :konsultan_pengawas, tanggal_kontra = :tanggal_kontra, pelaksanaan = :pelaksanaan, pemberian_kesempatan = :pemberian_kesempatan, tanggal_akhir_kontra = :tanggal_akhir_kontra, keuangan_rp = :keuangan_rp, keuangan_persen = :keuangan_persen, fisik_rencana = :fisik_rencana, fisik_realisasi = :fisik_realisasi, fisik_deviasi = :fisik_deviasi, keterangan = :keterangan WHERE id_reservasi = :id');
    $params = [
      ':id' => $id,
      ':tanggal' => $tanggal,
      ':nama_kegiatan' => $nama_kegiatan,
      ':targett' => $targett,
      ':kontrak' => $kontrak,
      ':nama_perusahaan' => $nama_perusahaan,
      ':konsultan_pengawas' => $konsultan_pengawas,
      ':tanggal_kontra' => $tanggal_kontra,
      ':pelaksanaan' => $pelaksanaan,
      ':pemberian_kesempatan' => $pemberian_kesempatan,
      ':tanggal_akhir_kontra' => $tanggal_akhir_kontrak,
      ':keuangan_rp' => $keuangan_rp,
      ':keuangan_persen' => $keuangan_persen,
      ':fisik_rencana' => $fisik_rencana,
      ':fisik_realisasi' => $fisik_realisasi,
      ':fisik_deviasi' => $fisik_deviasi,
      ':keterangan' => $keterangan
    ];
  else :
    $stmt = $pdo->prepare('UPDATE reservasi SET tanggal = :tanggal, nama_kegiatan = :nama_kegiatan,
    targett = :targett, kontrak = :kontrak, nama_perusahaan = :nama_perusahaan, konsultan_pengawas = :konsultan_pengawas, tanggal_kontra = :tanggal_kontra, pelaksanaan = :pelaksanaan, pemberian_kesempatan = :pemberian_kesempatan, tanggal_akhir_kontra = :tanggal_akhir_kontra, keuangan_rp = :keuangan_rp, keuangan_persen = :keuangan_persen, fisik_rencana = :fisik_rencana, fisik_realisasi = :fisik_realisasi, fisik_deviasi = :fisik_deviasi, keterangan = :keterangan WHERE id_reservasi = :id');
    $params = [
      ':id' => $id,
      ':tanggal' => $tanggal,
      ':nama_kegiatan' => $nama_kegiatan,
      ':targett' => $targett,
      ':kontrak' => $kontrak,
      ':nama_perusahaan' => $nama_perusahaan,
      ':konsultan_pengawas' => $konsultan_pengawas,
      ':tanggal_kontra' => $tanggal_kontra,
      ':pelaksanaan' => $pelaksanaan,
      ':pemberian_kesempatan' => $pemberian_kesempatan,
      ':tanggal_akhir_kontra' => $tanggal_akhir_kontrak,
      ':keuangan_rp' => $keuangan_rp,
      ':keuangan_persen' => $keuangan_persen,
      ':fisik_rencana' => $fisik_rencana,
      ':fisik_realisasi' => $fisik_realisasi,
      ':fisik_deviasi' => $fisik_deviasi,
      ':keterangan' => $keterangan
    ];
  endif;

  if($stmt->execute($params)) :
    $successMSG = "Data berita berhasil diubah.";
    setcookie("user_success", $successMSG, time()+5);
    header("Location: ".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
  else :
    $errMSG = "Data berita gagal diubah.";
    setcookie("user_fail", $errMSG, time()+5);
    header("Location: ".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
  endif;
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
          <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
          <div class="breadcrumb-item"><?= $page ?></div>
        </div>
        </div>
        <div class="row">
          <?php
            $id = $_GET['id-reservasi'];
            $stmt = $pdo->prepare('SELECT * FROM reservasi WHERE id_reservasi=:id');
            $stmt->execute([':id'=>$id]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <!-- <div class="col-12 col-sm-4 col-md-5">
            <div class="card">
              <div class="card-header">
                <h4>Foto Berita</h4>
              </div>
              <div class="card-body text-center">
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
                <?php
                if($row['photo_news'] != NULL) :
                  $photo = "news/".$row['photo_news'];
                else:
                  $photo = "p-150.png";
                endif;
                ?>
                <img style="width:100%" src="../images/<?= $photo ?>" alt="...">
              </div>
              <div class="card-footer text-center bg-whitesmoke">
                <a href="#" class="btn btn-icon icon-left btn-info" data-toggle="modal" data-target="#photoModal<?= $id ?>"><i class="fas fa-image"></i> <span>Ubah Foto</span></a>
              </div>
            </div>
          </div> -->
          <div class="col-12 col-sm-8 col-md-7">
            <div class="card">
              <div class="card-header">
                <h4>Data Preservasi</h4>
              </div>
              <div class="card-body">
                <?php
                  // Mengecek apakah terdapat cookie bernama "user_success"
                  if(isset($_COOKIE['user_success'])) :
                    echo" <div class='alert alert-success alert-dismissible show fade'>
                      <div class='alert-body'>
                        <button class='close' data-dismiss='alert'>
                          <span>&times;</span>
                        </button>".
                        $_COOKIE['user_success'].
                      "</div>
                    </div>";
                  elseif(isset($_COOKIE['user_fail'])) :
                    echo" <div class='alert alert-danger alert-dismissible show fade'>
                      <div class='alert-body'>
                        <button class='close' data-dismiss='alert'>
                          <span>&times;</span>
                        </button>".
                        $_COOKIE['user_fail'].
                      "</div>
                    </div>";
                  endif;
                ?>
                <div><p><b>Tanggal :</b><br/>
                  <?php
                    if(!empty($row['tanggal'])) :
                      $date = $row['tanggal'];
                      $text = 'text-success';
                    else :
                      $date = 'Belum diisi';
                      $text = 'text-danger';
                    endif;
                  ?>
                  <span class="<?=$text?>"><?=$date?><span>
                </p></div>
                <div><p><b>Nama Kegiatan :</b><br/>
                  <?= $row['nama_kegiatan'] ?>
                </p></div>
                <div><p><b>Target :</b><br/>
                  <?= $row['targett'] ?> Km
                </p></div>
                <div><p><b>Kontrak :</b><br/>
                  <?= $row['kontrak'] ?>
                </p></div>
                <div><p><b>Nama Perusahaan :</b><br/>
                  <?= $row['nama_perusahaan'] ?>
                </p></div>
                <div><p><b>Konsultan Pengawas :</b><br/>
                  <?= $row['konsultan_pengawas'] ?>
                </p></div>
                <div><p><b>Tanggal Kontra :</b><br/>
                  <?php
                    if(!empty($row['tanggal_kontra'])) :
                      $date = $row['tanggal_kontra'];
                      $text = 'text-success';
                    else :
                      $date = 'Belum diisi';
                      $text = 'text-danger';
                    endif;
                  ?>
                  <span class="<?=$text?>"><?=$date?><span>
                </p></div>
                <div><p><b>Pelaksanaan :</b><br/>
                  <?= $row['pelaksanaan'] ?>
                </p></div>
                <div><p><b>Pemberian Kesempatan :</b><br/>
                  <?= $row['pemberian_kesempatan'] ?>
                </p></div>
                <div><p><b>Tanggal Akhir Kontra :</b><br/>
                  <?= $row['tanggal_akhir_kontra'] ?>
                </p></div>
                <div><p><b>Keuangan (Rp) :</b><br/>
                  <?= $row['keuangan_rp'] ?>
                </p></div>
                <div><p><b>Keuangan (%) :</b><br/>
                  <?= $row['keuangan_persen'] ?>
                </p></div>
                <div><p><b>Fisik (Rencana) :</b><br/>
                  <?= $row['fisik_rencana'] ?>
                </p></div>
                <div><p><b>Fisik (Realisasi) :</b><br/>
                  <?= $row['fisik_realisasi'] ?>
                </p></div>
                <div><p><b>Fisik (Deviasi) :</b><br/>
                  <?= $row['fisik_deviasi'] ?>
                </p></div>
                <div><p><b>Keterangan :</b><br/>
                  <?= $row['keterangan'] ?>
                </p></div>
              </div>
              <div class="card-footer text-center bg-whitesmoke">
                <a href="#" class="btn btn-icon icon-left btn-success" data-toggle="modal" data-target="#newsModal<?= $id ?>"><i class="fas fa-image"></i> <span>Ubah Data</span></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Change Data Reservasi Modal Dialog -->
      <div class="modal fade" role="dialog" id="newsModal<?= $id ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Data Preservasi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="">
              <div class="modal-body">
                <?php
                  $id = $_GET['id-reservasi'];
                  $stmt = $pdo->prepare('SELECT * FROM reservasi WHERE id_reservasi=:id');
                  $stmt->execute([':id'=>$id]);

                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <input type="hidden" id="id_reservasi" name="id_reservasi" value="<?= $id ?>">

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
              </div>

              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" name="edit_preservasi" id="edit_preservasi" class="btn btn-icon icon-left btn-success"><i class="fas fa-save"></i> <span>Simpan Perubahan</span></button>
                <button type="button" class="btn btn-icon icon-left btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> <span>Tutup</span></button>
              </div>

            </form>
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