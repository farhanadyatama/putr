<?php
include './include/header.php';
require 'connection.php';
global $pdo;
?>

<main id="main">
        <!-- ======= Informasi Section ======= -->
        <section id="informasi" class="informasi">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Informasi Lainnya</h2>
              <p>Informasi-informasi dan Dokumen-dokumen</p>
              <table style="width: 100%" class="content-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Dokumen atau Informasi</th>
                    <th>Download</th>
                  </tr>
                </thead>
                <?php $i = 1;
                $result = $pdo->query("SELECT * FROM
                information"); 
                foreach ($result as $row) :?>
                <tbody>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['nama_dokumen_file'] ?></td>
                    <th><button class="download" onclick="location.href='dokumen/file/<?php echo $row["file"]; ?>'">Download</button></th>
                  </tr>
                </tbody>
                <?php endforeach ?>
              </table>
            </div>
    
          </div>
        </section>
        <!-- End informasi Section -->
    </main>

<?php
include './include/footer.php';
?>