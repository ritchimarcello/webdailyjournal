<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webdailyjurnal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

     <!--Menu navigation-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">webdailyjurnal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#JadwalKuliah">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>

                        <!--log out-->
                        <li class="nav-item" >
                        <a href="login.php" class="nav-link">Login</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!--Section Hero-->
    <section id="hero" class="text-center py-5 bg-dark-subtle">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold text-dark">Create Memories, Save Memories, Everyday</h1>
                    <p class="lead text-dark fst-italic">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali
                    </p>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
                <div class="col-md-4">
                    <img src="kucing.jpg" alt="Gambar Placeholder" class="img-fluid mt-4">
                </div>
            </div>
        </div>
    </section>

    <!--Section Article-->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!--Profil-->
    <section id="profil" class="container my-5">
        <h2 class="text-center mb-5">Profil Mahasiswa</h2>
        <div class="row justify-content-center">
            <!-- Foto Profil -->
            <section class="col-md-4 d-flex justify-content-center mb-3 mb-md-0">
                <img src="foto myself.jpeg" alt="Foto Profil" class="rounded-circle img-fluid">
            </section>

            <!-- Data Diri -->
            <section class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Ritchi Marcello Stefen</h5>
                        <p class="text-center mb-4">Mahasiswa Teknik Informatika</p>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">NIM</th>
                                    <td>: A11.2023.15186</td>
                                </tr>
                                <tr>
                                    <th scope="row">Program Studi</th>
                                    <td>: Teknik Informatika</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>: marcellostefen@gmail.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">Telepon</th>
                                    <td>: +62 812 295 911 93</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:  Jl. Hulu No. 138, Semarang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Jadwal Kuliah -->
    <section id="JadwalKuliah" class="container my-5">
        <H3 class="text-center fw-bold mb-5">Jadwal Kuliah & Kegiatan Mahasiswa</H3>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100 bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Senin</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">09:00 - 10:30</h6>
                        <p class="text-dark text-center">
                            Basis Data</p>
                        <p class="text-dark text-center">Ruang H.3.4</p>
                        <h6 class="text-dark text-center">13:00 - 15:00</h6>
                        <p class="text-dark text-center">Dasar Pemrograman</p>
                        <p class="text-dark text-center">Ruang H.3.1</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100 bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Selasa</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">08:00 - 09:30</h6>
                        <p class="text-dark text-center">
                            Pemrograman Berbasis Web</p>
                        <p class="text-dark text-center">Ruang D.2.A</p>
                        <h6 class="text-dark text-center">14:00 - 16:00</h6>
                        <p class="text-dark text-center">Basis Data</p>
                        <p class="text-dark text-center">Ruang D.3.M</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100 bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Rabu</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">10:00 - 12:00</h6>
                        <p class="text-dark text-center">
                            Pemrograman Berbasis Objecj</p>
                        <p class="text-dark text-center">Ruang D.2.A</p>
                        <h6 class="text-dark text-center">13:30 - 15:00</h6>
                        <p class="text-dark text-center">Pemrograman Sisi Server</p>
                        <p class="text-dark text-center">Ruang D.2.A</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col">
                <div class="card h-100 bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kamis</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">08:00 - 10:00</h6>
                        <p class="text-dark text-center">
                            Pengantar Teknologi Informasi</p>
                        <p class="text-dark text-center">Ruang D.3.N</p>
                        <h6 class="text-dark text-center">11:00 - 13:00</h6>
                        <p class="text-dark text-center">Rapat Koordinasi DOSCOM</p>
                        <p class="text-dark text-center">Ruang Rapat G.1</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col">
                <div class="card h-100 bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Jumat</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">09:00 - 11:00</h6>
                        <p class="text-dark text-center">
                            Data mining</p>
                        <p class="text-dark text-center">Ruang G.2.3</p>
                        <h6 class="text-dark text-center">13:00 - 15:00</h6>
                        <p class="text-dark text-center">Information Retrieval</p>
                        <p class="text-dark text-center">Ruang G.2.4</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col">
                <div class="card h-100 bg-dark-subtle text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sabtu</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <h6 class="text-dark text-center">08:00 - 10:00</h6>
                        <p class="text-dark text-center">
                            Bimbingan Karier</p>
                        <p class="text-dark text-center">Online</p>
                        <h6 class="text-dark text-center">10:30 - 12:00</h6>
                        <p class="text-dark text-center">Bimbingan Skripsi</p>
                        <p class="text-dark text-center">Online</p>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col">
                <div class="card h-100 bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title text-center">Minggu</h5>

                    </div>
                    <div class="card-footer bg-light">
                        <p class="text-dark text-center">Tidak ada jadwal</p>
                        <h6>08:00 - 10:00</h6>
                        <p>Online</p>
                        <h6>10:30 - 12:00</h6>
                        <p>Bimbingan Skripsi</p>
                        <p>Online</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="text-center p-5 bg-dark">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3 text-white">Gallery</h1>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);
        $isActive = true; // Untuk menentukan slide pertama aktif
        while ($row = $hasil->fetch_assoc()) {
        ?>
          <div class="carousel-item <?php if ($isActive) { echo 'active'; $isActive = false; } ?>">
          <div class="d-flex justify-content-center">
          <img src="img/<?= $row["gambar"] ?>" class="img-fluid" style="max-height: 400px;" alt="Gambar Gallery">
        </div>
            <div class="carousel-caption d-none d-md-block">
              <h5><?= $row["judul"] ?></h5>
              <p><?= $row["tanggal"] ?></p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <!-- Kontrol navigasi carousel -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>



    <!--Footer-->
    <footer class="text-center p-5">
        <h4><a href="https://www.instagram.com/marcellostefen?igsh=MXZteDViaDc0N2FrZg==" class="text-dark mx-2"><i
                    class="bi bi-instagram"></i></a>
            <a href="#" class="text-dark"><i class="bi bi-twitter-x"></i></a>
            <a href=" " class="text-dark mx-2"><i class="bi bi-whatsapp"></i></a>
        </h4>
        <p>Ritchi Marcello Stefen &copy 2024</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

        <script type="text/javascript">
            window.setTimeout("tampilkanWaktu()", 1000);

            function tampilkanWaktu() {
                var waktu = new Date();
                var bulan = waktu.getMonth() + 1;

                setTimeout("tampilkanWaktu()", 1000);
                document.getElementById("tanggal").innerHTML =
                waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
                document.getElementById("jam").innerHTML =
                waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.
                getSeconds();
            }
        </script>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
