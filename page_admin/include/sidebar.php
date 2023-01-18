      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">PUTR</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">PUTR</a>
          </div>
          <ul class="sidebar-menu">
            
              <li class="menu-header">Menu Utama</li>
              <li <?php if($page == "Halaman Utama") echo "class='active'"; ?>><a class="nav-link" href="index.php"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
              <!-- <li <?php if($page == "Profil") echo "class='active'"; ?>><a class="nav-link" href="profile.php"><i class="fas fa-user"></i> <span>Profil</span></a></li> -->
         

              <li class="menu-header">Data Master</li>
              <li <?php if($page == "Data Pengguna") echo "class='active'"; ?>><a class="nav-link" href="data-user.php"><i class="fas fa-users"></i> <span>User</span></a></li>
              <li <?php if($page == "Data Preservasi") echo "class='active'"; ?>><a class="nav-link" href="data-reservasi.php"><i class="fas fa-archive"></i> <span>Preservasi</span></a></li>
              <li <?php if($page == "Data Pembangunan") echo "class='active'"; ?>><a class="nav-link" href="data-pembangunan.php"><i class="fas fa-archive"></i> <span>Pembangunan</span></a></li>
              <li <?php if($page == "Dokumen & Informasi") echo "class='active'"; ?>><a class="nav-link" href="data-informasi.php"><i class="fas fa-archive"></i> <span>Dokumen & Informasi</span></a></li>
            
          </ul>
        </aside>
      </div>
