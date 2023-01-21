<?php

require 'connection.php';

function registrasi($data) {
  global $conn;

  $name = strtolower(stripslashes($data["name2"]));
  $email = $_POST["email"];
  $password = mysqli_real_escape_string($conn, $data["password2"]);

  // cek name 
 $result = mysqli_query($conn, "SELECT name FROM user WHERE name = '$name'");
 if(mysqli_fetch_assoc($result)) {
   echo "<script>alert('nama pengguna sudah terdaftar')</script>";
   return false;
 }

 // password
//  $hasil = mysqli_query($conn, "SELECT password FROM user WHERE password = '$password'");
//  if(mysqli_fetch_assoc($hasil) <= 8) {
//    echo "<script>alert('Kata sandi harus 8 karakter atau lebih.')</script>";
//    return false;
//  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan userbaru ke db
  mysqli_query($conn, "INSERT INTO user VALUES('', '$name', '$email', '$password', '')");

  return mysqli_affected_rows($conn);
}

function add_user($data) {
  global $pdo;

  $name = htmlspecialchars($data["name"]);
  $email = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["password"]);
  $re_password = htmlspecialchars($data["re-password"]);
  
  // get upload image info
  $imgName = $_FILES['photo']['name'];
  /* $tmpDir should define first in file /etc/php/7.4/apache2/php.ini
   * in line upload_tmp_dir = /var/www/tmp_upload
   * and tmp_upload folder should created and change the permission
   * even the user owner
   */
  $tmpDir = $_FILES['photo']['tmp_name'];
  $imgSize = $_FILES['photo']['size'];

  // execute if input type file is not empty
  if($imgName) :
    // prepare image for uploading
    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    $allowedExt = ['png', 'jpg'];
    $uploadDir = '../images/users/';
    $imgUploadName = $name.'_pic_'.time().".".$imgExt; // Sample output : user_pic_1647141687.jpg

    // execute if allowed file extension is match
    if(in_array($imgExt, $allowedExt)) :
      // execute if file size less than 1MB
      if($imgSize < 1044070) :
        move_uploaded_file($tmpDir, $uploadDir.$imgUploadName);
      else :
        $errMSG = "Ukuran file lebih dari 1MB.";
        setcookie("fail", $errMSG, time()+5);
        header("Location: ".$_SERVER['PHP_SELF']);
      endif;
    else :
      $errMSG = "Hanya file JPG dan PNG yang bisa diunggah.";
      setcookie("fail", $errMSG, time()+5);
      /* $_SERVER['PHP_SELF'] will goes to the wrong place
       * if htaccess url manipulation is in play the value
       */
      header("Location: ".$_SERVER['PHP_SELF']);
    endif;
  else :
    $imgUploadName = NULL;
  endif;

  if(!isset($errMSG)) :
    // execute if username is not empty
    if($name) :
      // fetch username from database
      $stmt = $pdo->prepare('SELECT name FROM user');
      $stmt->execute();
      $result = $stmt->fetchAll();

      $rows = [];
      foreach ($result as $row) :
        $rows[] = $row['name'];
      endforeach;

      if(!in_array($name, $rows)) :
        if(strlen($password) >= 8) :
          if($password == $re_password) :
            // Encrypt password with password_hash()
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO
              user (name, email, password, photo)
              VALUES (:name, :email, :password, :photo)');
            $params = [
              ':name' => $name,
              ':email' => $email,
              ':password' => $password,
              ':photo' => $imgUploadName
            ];

            if($stmt->execute($params)) : 
              $successMSG = "Data pengguna berhasil ditambahkan!";
              setcookie("success", $successMSG, time()+5);
              header("Location: ./data-user.php");
            else :
              $errMSG = "Data pengguna gagal ditambahkan!";
              setcookie("fail", $errMSG, time()+5);
              header("Location: ./data-user.php");
            endif;
          else :
            $errMSG = "Konfirmasi kata sandi tidak sama!";
            setcookie("fail", $errMSG, time()+5);
            header("Location: ./add-user.php");
          endif;
        else :
          $errMSG = "Kata sandi harus 8 karakter atau lebih.";
          setcookie("fail", $errMSG, time()+5);
          header("Location: ./add-user.php");
        endif;
      else :
        $errMSG = "Nama pengguna sudah digunakan.";
        setcookie("fail", $errMSG, time()+5);
        header("Location: ./add-user.php");
      endif;
    endif;
  endif;

  return $stmt->rowCount();
}

function add_reservasi($data) {
  global $pdo;

  $tanggal = htmlspecialchars($data["date-authored"]);
  $nama_kegiatan = htmlspecialchars($data["nama_kegiatan"]);
  $targett = htmlspecialchars($data["targett"]);
  $kontrak = htmlspecialchars($data["kontrak"]);
  $nama_perusahan = htmlspecialchars($data["nama_perusahaan"]);
  $konsultan_pengawas = htmlspecialchars($data["konsultan_pengawas"]);
  $tanggal_kontra = htmlspecialchars($data["date-authored2"]);
  $pelaksanaan = htmlspecialchars($data["pelaksanaan"]);
  $pemberian_kesempatan = htmlspecialchars($data["pemberian_kesempatan"]);
  $tanggal_akhir_kontrak = htmlspecialchars($data["date-authored3"]);
  $keuangan_rp = htmlspecialchars($data["keuangan_rp"]);
  $keuangan_persen = htmlspecialchars($data["keuangan_%"]);
  $fisik_rencana = htmlspecialchars($data["fisik_rencana"]);
  $fisik_realisasi = htmlspecialchars($data["fisik_realisasi"]);
  $fisik_deviasi = htmlspecialchars($data["fisik_deviasi"]);
  $keterangan = htmlspecialchars($data["keterangan"]);

  if(!isset($errMSG)) :
    // execute if title is not empty
    if($tanggal) :
      // fetch title from database
      $stmt = $pdo->prepare('SELECT * FROM reservasi');
      $stmt->execute();
      $result = $stmt->fetchAll();

      $rows = [];
      foreach ($result as $row) :
        $rows[] = $row['tanggal'];
      endforeach;

      if(!in_array($tanggal, $rows)) :
        if(!empty($tanggal)) :
          $stmt = $pdo->prepare('INSERT INTO
            reservasi (tanggal, nama_kegiatan, targett, kontrak, nama_perusahaan, konsultan_pengawas, tanggal_kontra, pelaksanaan, pemberian_kesempatan, tanggal_akhir_kontra, keuangan_rp, keuangan_persen, fisik_rencana, fisik_realisasi, fisik_deviasi, keterangan)
            VALUES (:tanggal, :nama_kegiatan, :targett, :kontrak, :nama_perusahaan, :konsultan_pengawas, :tanggal_kontra, :pelaksanaan, :pemberian_kesempatan, :tanggal_akhir_kontra, :keuangan_rp, :keuangan_persen, :fisik_rencana, :fisik_realisasi, :fisik_deviasi, :keterangan)');
          $params = [
            ':tanggal' => $tanggal,
            ':nama_kegiatan' => $nama_kegiatan,
            ':targett' => $targett,
            ':kontrak' => $kontrak,
            ':nama_perusahaan' => $nama_perusahan,
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
          $stmt = $pdo->prepare('INSERT INTO
          reservasi (tanggal, nama_kegiatan, targett, kontrak, nama_perusahaan, konsultan_pengawas, tanggal_kontra, pelaksanaan, pemberian_kesempatan, tanggal_akhir_kontra, keuangan_rp, keuangan_persen, fisik_rencana, fisik_realisasi, fisik_deviasi, keterangan)
          VALUES (:tanggal, :nama_kegiatan, :targett, :kontrak, :nama_perusahaan, :konsultan_pengawas, :tanggal_kontra, :pelaksanaan, :pemberian_kesempatan, :tanggal_akhir_kontra, :keuangan_rp, :keuangan_persen, :fisik_rencana, :fisik_realisasi, :fisik_deviasi, :keterangan)');
          $params = [
            ':tanggal' => $tanggal,
            ':nama_kegiatan' => $nama_kegiatan,
            ':targett' => $targett,
            ':kontrak' => $kontrak,
            ':nama_perusahaan' => $nama_perusahan,
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
          $successMSG = "Data pengguna berhasil ditambahkan!";
          setcookie("success", $successMSG, time()+5);
          header("Location: ./data-reservasi.php");
        else :
          $errMSG = "Data pengguna gagal ditambahkan!";
          setcookie("fail", $errMSG, time()+5);
          header("Location: ./data-reservasi.php");
        endif;
      else :
        // $errMSG = "Judul berita sudah ada.";
        // setcookie("fail", $errMSG, time()+5);
        header("Location: ./data-reservasi.php");
      endif;
    endif;
  endif;

  return $stmt->rowCount();
}

function add_pembangunan($data) {
  global $pdo;

  $tanggal2 = htmlspecialchars($data["date-authored"]);
  $nama_kegiatan2 = htmlspecialchars($data["nama_kegiatan"]);
  $targett2 = htmlspecialchars($data["targett"]);
  $kontrak2 = htmlspecialchars($data["kontrak"]);
  $nama_perusahan2 = htmlspecialchars($data["nama_perusahaan"]);
  $konsultan_pengawas2 = htmlspecialchars($data["konsultan_pengawas"]);
  $tanggal_kontra2 = htmlspecialchars($data["date-authored2"]);
  $pelaksanaan2 = htmlspecialchars($data["pelaksanaan"]);
  $pemberian_kesempatan2 = htmlspecialchars($data["pemberian_kesempatan"]);
  $tanggal_akhir_kontrak2 = htmlspecialchars($data["date-authored3"]);
  $keuangan_rp2 = htmlspecialchars($data["keuangan_rp"]);
  $keuangan_persen2 = htmlspecialchars($data["keuangan_%"]);
  $fisik_rencana2 = htmlspecialchars($data["fisik_rencana"]);
  $fisik_realisasi2 = htmlspecialchars($data["fisik_realisasi"]);
  $fisik_deviasi2 = htmlspecialchars($data["fisik_deviasi"]);
  $keterangan2 = htmlspecialchars($data["keterangan"]);

  if(!isset($errMSG)) :
    // execute if title is not empty
    if($tanggal2) :
      // fetch title from database
      $stmt = $pdo->prepare('SELECT * FROM pembangunan');
      $stmt->execute();
      $result = $stmt->fetchAll();

      $rows = [];
      foreach ($result as $row) :
        $rows[] = $row['tanggal2'];
      endforeach;

      if(!in_array($tanggal2, $rows)) :
        if(!empty($tanggal2)) :
          $stmt = $pdo->prepare('INSERT INTO
            pembangunan (tanggal2, nama_kegiatan2, targett2, kontrak2, nama_perusahaan2, konsultan_pengawas2, tanggal_kontra2, pelaksanaan2, pemberian_kesempatan2, tanggal_akhir_kontra2, keuangan_rp2, keuangan_persen2, fisik_rencana2, fisik_realisasi2, fisik_deviasi2, keterangan2)
            VALUES (:tanggal2, :nama_kegiatan2, :targett2, :kontrak2, :nama_perusahaan2, :konsultan_pengawas2, :tanggal_kontra2, :pelaksanaan2, :pemberian_kesempatan2, :tanggal_akhir_kontra2, :keuangan_rp2, :keuangan_persen2, :fisik_rencana2, :fisik_realisasi2, :fisik_deviasi2, :keterangan2)');
          $params = [
            ':tanggal2' => $tanggal2,
            ':nama_kegiatan2' => $nama_kegiatan2,
            ':targett2' => $targett2,
            ':kontrak2' => $kontrak2,
            ':nama_perusahaan2' => $nama_perusahan2,
            ':konsultan_pengawas2' => $konsultan_pengawas2,
            ':tanggal_kontra2' => $tanggal_kontra2,
            ':pelaksanaan2' => $pelaksanaan2,
            ':pemberian_kesempatan2' => $pemberian_kesempatan2,
            ':tanggal_akhir_kontra2' => $tanggal_akhir_kontrak2,
            ':keuangan_rp2' => $keuangan_rp2,
            ':keuangan_persen2' => $keuangan_persen2,
            ':fisik_rencana2' => $fisik_rencana2,
            ':fisik_realisasi2' => $fisik_realisasi2,
            ':fisik_deviasi2' => $fisik_deviasi2,
            ':keterangan2' => $keterangan2
          ];
        else :
          $stmt = $pdo->prepare('INSERT INTO
            pembangunan (tanggal2, nama_kegiatan2, targett2, kontrak2, nama_perusahaan2, konsultan_pengawas2, tanggal_kontra2, pelaksanaan2, pemberian_kesempatan2, tanggal_akhir_kontra2, keuangan_rp2, keuangan_persen2, fisik_rencana2, fisik_realisasi2, fisik_deviasi2, keterangan2)
            VALUES (:tanggal2, :nama_kegiatan2, :targett2, :kontrak2, :nama_perusahaan2, :konsultan_pengawas2, :tanggal_kontra2, :pelaksanaan2, :pemberian_kesempatan2, :tanggal_akhir_kontra2, :keuangan_rp2, :keuangan_persen2, :fisik_rencana2, :fisik_realisasi2, :fisik_deviasi2, :keterangan2)');
          $params = [
            ':tanggal2' => $tanggal2,
            ':nama_kegiatan2' => $nama_kegiatan2,
            ':targett2' => $targett2,
            ':kontrak2' => $kontrak2,
            ':nama_perusahaan2' => $nama_perusahan2,
            ':konsultan_pengawas2' => $konsultan_pengawas2,
            ':tanggal_kontra2' => $tanggal_kontra2,
            ':pelaksanaan2' => $pelaksanaan2,
            ':pemberian_kesempatan2' => $pemberian_kesempatan2,
            ':tanggal_akhir_kontra2' => $tanggal_akhir_kontrak2,
            ':keuangan_rp2' => $keuangan_rp2,
            ':keuangan_persen2' => $keuangan_persen2,
            ':fisik_rencana2' => $fisik_rencana2,
            ':fisik_realisasi2' => $fisik_realisasi2,
            ':fisik_deviasi2' => $fisik_deviasi2,
            ':keterangan2' => $keterangan2
          ];
        endif;

        if($stmt->execute($params)) : 
          $successMSG = "Data pengguna berhasil ditambahkan!";
          setcookie("success", $successMSG, time()+5);
          header("Location: ./data-pembangunan.php");
        else :
          $errMSG = "Data pengguna gagal ditambahkan!";
          setcookie("fail", $errMSG, time()+5);
          header("Location: ./data-pembangunan.php");
        endif;
      else :
        // $errMSG = "Judul berita sudah ada.";
        // setcookie("fail", $errMSG, time()+5);
        header("Location: ./data-pembangunan.php");
      endif;
    endif;
  endif;

  return $stmt->rowCount();
}

function add_informasi($data) {
  global $pdo;

  $nama_dokumen_file = htmlspecialchars($data["nama_informasi"]);
  
  $direktori = "../dokumen/file/";
  $lampiran = $_FILES['filesName']['name'];
  move_uploaded_file($_FILES['filesName']['tmp_name'], $direktori . $lampiran);

  if(!isset($errMSG)) :
    // execute if title is not empty
    if($nama_dokumen_file) :
          $stmt = $pdo->prepare('INSERT INTO
            information (nama_dokumen_file, file)
            VALUES (:nama_dokumen_file, :file)');
          $params = [
            ':nama_dokumen_file' => $nama_dokumen_file,
            ':file' => $lampiran
          ];

        if($stmt->execute($params)) : 
          $successMSG = "Data informasi berhasil ditambahkan!";
          setcookie("success", $successMSG, time()+5);
          header("Location: ./data-informasi.php");
        else :
          $errMSG = "Data pengguna gagal ditambahkan!";
          setcookie("fail", $errMSG, time()+5);
          header("Location: ./data-informasi.php");
        endif;
      // else :
      //   $errMSG = "Judul berita sudah ada.";
      //   setcookie("fail", $errMSG, time()+5);
        header("Location: ./data-informasi.php");
      // endif;
    endif;
  endif;

  return $stmt->rowCount();
}

function delete_user($data) {
    global $pdo;

    $id = htmlspecialchars($data["id-login"]);

    $stmt = $pdo->prepare('DELETE FROM user WHERE id_login = :id');
    $stmt->execute([':id' => $id]);    

    return $stmt->rowCount();
}

function delete_reservasi($data) {
  global $pdo;

  $id = htmlspecialchars($data["id-reservasi"]);

  $stmt = $pdo->prepare('DELETE FROM reservasi WHERE id_reservasi = :id');
  $stmt->execute([':id' => $id]);

  return $stmt->rowCount();
}

function delete_pembangunan($data) {
  global $pdo;

  $id = htmlspecialchars($data["id-pembangunan"]);

  $stmt = $pdo->prepare('DELETE FROM pembangunan WHERE id_pembangunan = :id');
  $stmt->execute([':id' => $id]);

  return $stmt->rowCount();
}

function delete_informasi($data) {
  global $pdo;

  $id = htmlspecialchars($data["id-information"]);

  $stmt = $pdo->prepare('DELETE FROM information WHERE id_information = :id');
  $stmt->execute([':id' => $id]);

  return $stmt->rowCount();
}
?>