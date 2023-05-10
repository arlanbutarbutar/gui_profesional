<?php require_once("controller/script.php");
if (!isset($_SESSION['data-gui'])) {
  header("Location: route.php");
  exit;
}
$_SESSION['page-name'] = "Console";
$_SESSION['page-url'] = "./";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body style="font-family: 'Quicksand', sans-serif;">
  <?php if (isset($_SESSION['message-success'])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-info'])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-warning'])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-danger'])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger'] ?>"></div>
  <?php }
  require_once("resources/layout/navbar.php"); ?>

  <div class="az-content az-content-dashboard" style="background: #cbdcf7;">
    <div class="container flex-column">
      <div class="az-content-body">

        <div class="az-dashboard-one-title">
          <div>
            <h2 class="az-dashboard-title">Hi, welcome back <?= $nameServer ?>!</h2>
            <p class="az-dashboard-text">Konsol analisis projek pengembangan website Anda.</p>
          </div>
          <div class="az-content-header-right">
            <div class="media">
              <div class="media-body">
                <label>Start Date</label>
                <h6><?php $dateRegis = $_SESSION['data-gui']['date'];
                    $dateRegis = date_create($dateRegis);
                    echo date_format($dateRegis, "M d, Y") ?></h6>
              </div>
            </div>
            <div class="media">
              <div class="media-body">
                <label>End Date</label>
                <h6><?= date("M d, Y") ?></h6>
              </div>
            </div>
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#add-project"><i class="fas fa-plus"></i> Add Project</button>
            <div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content border-0 shadow">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="POST">
                    <div class="modal-body text-center">
                      <div class="form-group">
                        <label for="name">Nama projek</label>
                        <input type="text" name="name" id="name" value="<?php if (isset($_POST['name'])) {
                                                                          echo $_POST['name'];
                                                                        } ?>" class="form-control text-center border-0 shadow mb-2" placeholder="Nama projek" required>
                        <span><span class="badge badge-info">Perhatian!!</span> Nama database akan menyesuaikan dengan Nama Project yang kamu masukan!</span>
                      </div>
                      <div class="form-group">
                        <label for="pemilik">Nama klien</label>
                        <input type="text" name="pemilik" id="pemilik" value="<?php if (isset($_POST['pemilik'])) {
                                                                                echo $_POST['pemilik'];
                                                                              } ?>" class="form-control text-center border-0 shadow mb-2" placeholder="Nama klien" required>
                      </div>
                      <div class="form-group">
                        <label for="jenis-app">Jenis App</label>
                        <select name="jenis-app" class="form-control border-0 shadow select2-no-search select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true" required>
                          <option label="Pilih Jenis App" value=""></option>
                          <?php foreach ($jenis_app as $row_ja) : ?>
                            <option value="<?= $row_ja['id_jenis_app'] ?>"><?= $row_ja['jenis_app'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="language">Bahasa</label>
                        <select name="language" class="form-control border-0 shadow select2-no-search select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true" required>
                          <option label="Pilih Bahasa" value=""></option>
                          <?php foreach ($lang as $row_ja) : ?>
                            <option value="<?= $row_ja['id_language'] ?>"><?= $row_ja['language'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="route">Rute Directory</label>
                        <div class="row">
                          <div class="col-lg-2">
                            <input value="apps/" class="form-control text-center border-0 mb-2 pr-0" style="background-color: #fff;" readonly>
                          </div>
                          <div class="col-lg-10">
                            <input type="text" name="route" id="route" value="<?php if (isset($_POST['route'])) {
                                                                                echo $_POST['route'];
                                                                              } ?>" class="form-control text-center border-0 shadow mb-2" placeholder="Rute" required>
                          </div>
                        </div>
                        <span>Rute yang tersedia seperti berikut => <small class="text-success">'apps/directory-project/'</small></span>
                      </div>
                      <div class="form-group">
                        <label for="progress">Progress</label>
                        <select name="progress" id="progress" class="form-control text-center border-0 shadow">
                          <option value="0">Baru</option>
                          <option value="5">Cek App</option>
                          <option value="15">Perancangan DB</option>
                          <option value="35">Implementasi DB</option>
                          <option value="50">Perancangan App</option>
                          <option value="75">Pengujian App</option>
                          <option value="95">Pengajuan App</option>
                          <option value="98">Revisi App</option>
                          <option value="100">Selesai</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jenis-console">Console</label>
                        <select name="jenis-console" id="jenis-console" class="form-control text-center border-0 shadow" required>
                          <option value="">Pilih Jenis Concole</option>
                          <option value="1">Basic</option>
                          <option value="2">Profesional</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="form-control border-0 shadow" placeholder="Deskripsi"><?php if (isset($_POST['deskripsi'])) {
                                                                                                                            echo $_POST['deskripsi'];
                                                                                                                          } ?></textarea>
                      </div>
                    </div>
                    <div class="modal-footer border-top-0 justify-content-center">
                      <button type="button" class="btn btn-white btn-sm shadow" data-dismiss="modal">Batal</button>
                      <button type="submit" name="add-project" class="btn btn-primary btn-sm shadow">Develop</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if ($nav_tools == 1) { ?>
          <div class="az-dashboard-nav">
            <nav class="nav flex-nowrap table-responsive" style="max-width: 750px; overflow-x: auto;">
              <a class="nav-link" href="" data-toggle="modal" data-target="#add-menu"><i class="fas fa-plus"></i></a>
              <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content border-0 shadow">
                    <div class="modal-header border-bottom-0">
                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="POST">
                      <div class="modal-body text-center">
                        <div class="form-group">
                          <label for="name">Nama Menu</label>
                          <input type="text" name="name" id="name" value="<?php if (isset($_POST['name'])) {
                                                                            echo $_POST['name'];
                                                                          } ?>" class="form-control text-center border-0 shadow" placeholder="Nama Menu" required>
                        </div>
                        <div class="form-group">
                          <label for="url">URL</label>
                          <input type="text" name="url" id="url" value="<?php if (isset($_POST['url'])) {
                                                                          echo $_POST['url'];
                                                                        } ?>" class="form-control text-center border-0 shadow" placeholder="URL" required>
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <button type="button" class="btn btn-white btn-sm shadow" data-dismiss="modal">Batal</button>
                        <button type="submit" name="add-menu-navbar" class="btn btn-primary btn-sm shadow">Add Menu</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php if (mysqli_num_rows($menuNavbar) > 0) {
                while ($row = mysqli_fetch_assoc($menuNavbar)) { ?>
                  <a class="btn btn-outline-primary border-0" style="border-top-left-radius: 10px;border-top-right-radius: 20px;border-bottom-left-radius: 20px;white-space: nowrap;" href="<?= $row['url'] ?>" target="_blank"><?= $row['menu_navbar'] ?></a>
                  <span class="text-danger ml-n2 mr-2" style="font-size: 12px;cursor: pointer;" data-toggle="modal" data-target="#hapus-menu<?= $row['id_menu_navbar'] ?>"><i class="fas fa-trash"></i></span>
                  <div class="modal fade" id="hapus-menu<?= $row['id_menu_navbar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content border-0 shadow">
                        <div class="modal-header border-bottom-0">
                          <h5 class="modal-title" id="exampleModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="POST">
                          <div class="modal-body text-center">
                            Yakin ingin hapus <?= $row['menu_navbar'] ?>?
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <input type="hidden" name="id-menu" value="<?= $row['id_menu_navbar'] ?>">
                            <button type="button" class="btn btn-white btn-sm shadow" data-dismiss="modal">Batal</button>
                            <button type="submit" name="hapus-menu" class="btn btn-danger btn-sm shadow">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <?php }
              } ?>
            </nav>

            <nav class="nav">
              <a class="nav-link text-primary" href="export-excel"><i class="far fa-file-pdf"></i> Export to Excel</a>
              <a class="nav-link text-primary" href="mailto:support@gui.my.id?subject=Butuh%20Dukungan%20Bantuan%20Developer%20GUI%20-%20Netmedia%20Framecode" target="_blank"><i class="far fa-envelope"></i>Send to Email</a>
              <a class="nav-link text-primary" href="#"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>
        <?php } ?>

        <div class="row">

          <div class="col-lg-4">

            <?php if ($progress == 1) { ?>
              <div class="card border-0 shadow" style="background-color: #e5eefb;">
                <div class="card-header">
                  <h6 class="card-title">Progress Projects</h6>
                  <p class="card-text">Laporan Progres Projek yang sedang dikerjakan.</p>
                </div>
                <div class="card-body">
                  <?php if (mysqli_num_rows($projectView) == 0) { ?>
                    <div class="az-list-item">
                      <div>
                        <h6>belum ada data!</h6>
                      </div>
                    </div>
                    <?php } else if (mysqli_num_rows($projectView) > 0) {
                    while ($rowPV = mysqli_fetch_assoc($projectView)) { ?>
                      <div class="az-list-item">
                        <div>
                          <h6><?= $rowPV['name'] ?></h6>
                          <a style="cursor: pointer;" onclick="window.open('<?= $rowPV['route'] ?>', '_blank')" class="text-link"><small><?= $rowPV['route'] ?></small></a>
                        </div>
                        <div class="col-4">
                          <span class="text-danger"><?= $rowPV['progress'] ?>%</span>
                          <div class="progress">
                            <div class="progress-bar <?php if ($rowPV['progress'] <= 50) {
                                                        echo "bg-danger";
                                                      } else if ($rowPV['progress'] <= 98) {
                                                        echo "bg-warning";
                                                      } else if ($rowPV['progress'] == 100) {
                                                        echo "bg-success";
                                                      } ?> wd-<?= $rowPV['progress'] ?>p" role="progressbar" aria-valuenow="<?= $rowPV['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                  <?php }
                  } ?>
                </div>
              </div>
            <?php }
            if ($data_base == 1) { ?>
              <div class="card border-0 shadow mt-3" style="background-color: #e5eefb;">
                <div class="card-header">
                  <h6 class="card-title">All Live Databases</h6>
                  <p class="card-text">Menampilkan semua database yang ada di phpMyAdmin.</p>
                </div>
                <div class="card-body">
                  <?php if ($stmt = $conn->query("SHOW DATABASES")) {
                    echo "Records: " . $stmt->num_rows . "<br>";
                    while ($row = $stmt->fetch_assoc()) {
                      echo "<a href='/phpmyadmin/index.php?route=/database/structure&server=1&db=" . $row['Database'] . "' target='_blank'><i class='fas fa-database mr-2 text-success'></i></a>" . $row['Database'] . "<br>";
                    }
                  } else {
                    echo $conn->error;
                  } ?>
                </div>
              </div>
            <?php } ?>

          </div>

          <div class="col-lg-8">

            <?php if ($stmt = $conn->query("SHOW DATABASES")) {
              while ($row = $stmt->fetch_assoc()) {
                if ($row['Database'] == 'gui_my_id') { ?>
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <div class="card border-0 shadow" style="background-color: #e5eefb;">
                        <div class="card-header">
                          <h3>GUI <small class="tx-danger" style="font-size: 14px;"><i class="icon ion-md-arrow-down"></i> 27.1</small></h3>
                        </div>
                        <div class="card-body">
                          <p>Halo <?= $_SESSION['data-gui']['name'] ?>, kami mendeteksi GUI versi lama di server local kamu, jika <?= $_SESSION['data-gui']['name'] ?> mau menyalin projek dari GUI yang lama bisa kok. Tekan tombol salin di bawah ini yah...</p>
                          <p>Perhatian!! untuk database dan folder atau repository Project tidak dapat disalin dan hanya data yang telah tersimpan di database GUI saja yang dapat disalin.</p>
                          <form action="" method="post">
                            <button type="submit" name="copy-gui-old" class="btn btn-primary"><i class="fas fa-file-import"></i> Salin sekarang</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            <?php }
              }
            } ?>

            <?php if ($framework == 1) { ?>
              <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                  <a href="http://127.0.0.1:8000" class="text-decoration-none" target="_blank">
                    <div class="card card-body border-0 shadow text-dark text-center" style="background-color: #e5eefb;">
                      <img src="resources/img/laravel.png" alt="Logo Framework" style="width: 85px" class="m-auto">
                      <h3>Laravel</h3>
                      <div class="d-flex justify-content-center flex-nowrap">
                        <a href="https://laravel.com/docs/8.x/readme" target="_blank" class="btn btn-primary btn-sm shadow">Doc 8.x</a>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 mb-3">
                  <a href="http://127.0.0.1:8080" class="text-decoration-none" target="_blank">
                    <div class="card card-body border-0 shadow text-dark text-center" style="background-color: #e5eefb;">
                      <img src="resources/img/codeigniter.png" alt="Logo Framework" style="width: 75px" class="m-auto">
                      <h3>CodeIgniter</h3>
                      <div class="d-flex justify-content-center flex-nowrap">
                        <a href="https://codeigniter.com/userguide3/" target="_blank" class="btn btn-primary btn-sm shadow">User Guide</a>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 mb-3">
                  <a href="http://127.0.0.1:1010/wordpress/" class="text-decoration-none" target="_blank">
                    <div class="card card-body border-0 shadow text-dark text-center" style="background-color: #e5eefb;">
                      <img src="resources/img/wordpress.png" alt="Logo Framework" style="width: 75px" class="m-auto">
                      <h3>WordPress</h3>
                      <?php $stmt_wordpress = mysqli_query($conn, "SELECT name FROM data_base WHERE name='db_wordpress'");
                      if (mysqli_num_rows($stmt_wordpress) == 0) { ?>
                        <form action="" method="POST">
                          <button type="submit" name="db-wordpress" class="btn btn-primary btn-sm shadow">Create</button>
                        </form>
                      <?php } else if (mysqli_num_rows($stmt_wordpress) > 0) { ?>
                        <div class="d-flex justify-content-center flex-nowrap">
                          <a href="https://developer.wordpress.com/docs/" target="_blank" class="btn btn-primary btn-sm shadow">Documentation</a>
                        </div>
                      <?php } ?>
                    </div>
                  </a>
                </div>
                <div class="col-lg-4 mb-3">
                  <a href="http://127.0.0.1:8000/" class="text-decoration-none" target="_blank">
                    <div class="card card-body border-0 shadow text-dark text-center" style="background-color: #e5eefb;">
                      <img src="https://i.ibb.co/9wnJFvy/800px-Python-logo-notext-svg.png" alt="Logo Framework" style="width: 75px" class="m-auto">
                      <h3>Python</h3>
                      <div class="d-flex justify-content-center flex-nowrap">
                        <a href="https://docs.python.org/3/" target="_blank" class="btn btn-primary btn-sm shadow">Documentation</a>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php }
            if ($project == 1) { ?>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card border-0 shadow" style="background-color: #e5eefb;">
                    <div class="card-header">
                      <h6 class="card-title">All Project</h6>
                      <p class="az-content-text mg-b-20">Semua projek yang kamu kerjakan ada disini, kelola dan kembangkan kreatifitas dan inovasi terbaru kamu :)</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive scroll">
                        <table class="table table-striped table-hover table-sm text-center">
                          <thead>
                            <tr>
                              <th class="font-weight-bold text-dark text-center">Nama Projek</th>
                              <th class="font-weight-bold text-dark text-center">Nama Klien</th>
                              <th class="font-weight-bold text-dark text-center">Jenis App</th>
                              <th class="font-weight-bold text-dark text-center">Bahasa Pemrograman</th>
                              <th class="font-weight-bold text-dark text-center">Github</th>
                              <th class="font-weight-bold text-dark text-center">Deskripsi</th>
                              <th class="font-weight-bold text-dark text-center">Rute</th>
                              <th class="font-weight-bold text-dark text-center">Domain</th>
                              <th class="font-weight-bold text-dark text-center">Progres</th>
                              <th class="font-weight-bold text-dark text-center">Lainnya</th>
                              <th class="font-weight-bold text-dark text-center">Tgl Buat</th>
                              <th class="font-weight-bold text-dark text-center">Tgl Ubah</th>
                              <th class="font-weight-bold text-dark text-center">Aksi</th>
                              <th class="font-weight-bold text-dark text-center">Akses</th>
                            </tr>
                          </thead>
                          <tbody id="search-page">
                            <?php if (mysqli_num_rows($projects) == 0) { ?>
                              <tr class="bg-transparent">
                                <th class="font-weight-bold" colspan="14">belum ada data!</th>
                              </tr>
                              <?php } else if (mysqli_num_rows($projects) > 0) {
                              while ($row = mysqli_fetch_assoc($projects)) { ?>
                                <tr class="bg-transparent">
                                  <td>
                                    <div class="d-flex">
                                      <img src="<?= $row['image'] ?>" style="width: 50px;" class="" alt="">
                                      <strong class="m-auto"><?= $row['name'] ?></strong>
                                    </div>
                                  </td>
                                  <td class="text-center"><?= $row['pemilik'] ?></td>
                                  <td class="text-center"><?= $row['jenis_app'] ?></td>
                                  <td class="text-center"><?= $row['language'] ?></td>
                                  <td class="text-center">
                                    <p><?= $row['github'] ?></p>
                                    <small><?= $row['status'] ?></small>
                                  </td>
                                  <td class="text-center">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#des<?= $row['id_project'] ?>">
                                      <i class="fas fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="des<?= $row['id_project'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header border-bottom-0 shadow">
                                            <h5 class="modal-title" id="exampleModalLabel">Deskripsi <?= $row['name'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <textarea class="form-control border-0 bg-transparent" cols="30" rows="10" readonly><?= $row['description'] ?></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="text-center"><?= $row['route'] ?></td>
                                  <td class="text-center"><a href="http://<?= $row['domain'] ?>" target="_blank"><?= $row['domain'] ?></a></td>
                                  <td class="text-center">
                                    <div class="az-traffic-detail-item">
                                      <div>
                                        <span>
                                          <?php if ($row['progress'] == 0) {
                                            echo "Baru";
                                          } else if ($row['progress'] == 15) {
                                            echo "Perancangan DBMS";
                                          } else if ($row['progress'] == 35) {
                                            echo "Implementasi DB";
                                          } else if ($row['progress'] == 50) {
                                            echo "Perancangan App";
                                          } else if ($row['progress'] == 75) {
                                            echo "Pengujian App";
                                          } else if ($row['progress'] == 95) {
                                            echo "Pengajuan App";
                                          } else if ($row['progress'] == 98) {
                                            echo "Revisi App";
                                          } else if ($row['progress'] == 100) {
                                            echo "Selesai";
                                          } ?>
                                        </span>
                                        <span><?= $row['progress'] ?>%</span>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar <?php if ($row['progress'] <= 50) {
                                                                    echo "bg-danger";
                                                                  } else if ($row['progress'] <= 98) {
                                                                    echo "bg-warning";
                                                                  } else if ($row['progress'] == 100) {
                                                                    echo "bg-success";
                                                                  } ?> wd-<?= $row['progress'] ?>p" role="progressbar" aria-valuenow="<?= $row['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="text-center">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#more<?= $row['id_project'] ?>">
                                      <i class="fas fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="more<?= $row['id_project'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header border-bottom-0 shadow">
                                            <h5 class="modal-title" id="exampleModalLabel">Lainnya dari <?= $row['name'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <textarea class="form-control border-0 bg-transparent" cols="30" rows="10" readonly><?= $row['more'] ?></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td><?php $tgl_buat = date_create($row['created_at']);
                                      echo date_format($tgl_buat, 'l, d M Y'); ?></td>
                                  <td><?php $tgl_ubah = date_create($row['updated_at']);
                                      echo date_format($tgl_ubah, 'l, d M Y'); ?></td>
                                  <td>
                                    <div class="d-flex">
                                      <div class="col">
                                        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#edit-project<?= $row['id_project'] ?>"> <i class="fas fa-pen text-warning"></i> </button>
                                        <div class="modal fade" id="edit-project<?= $row['id_project'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content bg-white border-0 shadow">
                                              <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body text-center">
                                                  <div class="form-group">
                                                    <label for="name">Nama projek</label>
                                                    <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control text-center border-0 shadow" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="pemilik">Nama klien</label>
                                                    <input type="text" name="pemilik" id="pemilik" value="<?= $row['pemilik'] ?>" class="form-control text-center border-0 shadow mb-2" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="jenis-app">Jenis App</label>
                                                    <select name="jenis-app" class="form-control border-0 shadow select2-no-search select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true" required>
                                                      <option label="Pilih Jenis App" value=""></option>
                                                      <?php foreach ($jenis_app as $row_ja) : ?>
                                                        <option value="<?= $row_ja['id_jenis_app'] ?>"><?= $row_ja['jenis_app'] ?></option>
                                                      <?php endforeach; ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="language">Bahasa</label>
                                                    <select name="language" class="form-control border-0 shadow select2-no-search select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true" required>
                                                      <option label="Pilih Bahasa" value=""></option>
                                                      <?php foreach ($lang as $row_ja) : ?>
                                                        <option value="<?= $row_ja['id_language'] ?>"><?= $row_ja['language'] ?></option>
                                                      <?php endforeach; ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="github">Github</label>
                                                    <input type="text" name="github" id="github" value="<?= $row['github'] ?>" class="form-control text-center border-0 shadow mb-2">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control text-center border-0 shadow" required>
                                                      <option value="3">No Encryption</option>
                                                      <option value="1">Encryption</option>
                                                      <option value="2">Private</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="route">Rute Directory</label>
                                                    <div class="row">
                                                      <div class="col-lg-2">
                                                        <input value="apps/" class="form-control text-center border-0 mb-2 pr-0" style="background-color: #fff;" readonly>
                                                      </div>
                                                      <div class="col-lg-10">
                                                        <input type="text" name="route" id="route" value="<?= str_replace("apps/", "", $row['route']) ?>" class="form-control text-center border-0 shadow mb-2" required>
                                                      </div>
                                                    </div>
                                                    <span>Rute yang tersedia seperti berikut => <small class="text-success">'apps/directory-project/'</small></span>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="progress">Progress</label>
                                                    <select name="progress" id="progress" class="form-control text-center border-0 shadow">
                                                      <option value="0">Baru</option>
                                                      <option value="5">Cek App</option>
                                                      <option value="15">Perancangan DB</option>
                                                      <option value="35">Implementasi DB</option>
                                                      <option value="50">Perancangan App</option>
                                                      <option value="75">Pengujian App</option>
                                                      <option value="95">Pengajuan App</option>
                                                      <option value="98">Revisi App</option>
                                                      <option value="100">Selesai</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="domain">Domain</label>
                                                    <input type="text" name="domain" id="domain" value="<?= $row['domain'] ?>" class="form-control text-center border-0 shadow mb-2">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea name="deskripsi" rows="3" class="form-control border-0 shadow"><?= $row['description'] ?></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="more">Lainnya</label>
                                                    <textarea name="more" rows="3" class="form-control border-0 shadow"><?= $row['more'] ?></textarea>
                                                  </div>
                                                </div>
                                                <div class="modal-footer border-top-0 justify-content-center">
                                                  <input type="hidden" name="id-project" value="<?= $row['id_project'] ?>">
                                                  <input type="hidden" name="nameOld" value="<?= $row['name'] ?>">
                                                  <input type="hidden" name="routeOld" value="<?= $row['route'] ?>">
                                                  <input type="hidden" name="progressOld" value="<?= $row['progress'] ?>">
                                                  <button type="button" class="btn btn-white btn-sm shadow" data-dismiss="modal">Batal</button>
                                                  <button type="submit" name="edit-project" class="btn btn-warning btn-sm shadow"><i class="fas fa-pen text-dark"></i> Ubah</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col">
                                        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#delete-project<?= $row['id_project'] ?>"> <i class="fas fa-trash text-danger"></i> </button>
                                        <div class="modal fade" id="delete-project<?= $row['id_project'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content bg-white border-0 shadow">
                                              <div class="modal-header border-bottom-0">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <form action="" method="POST">
                                                <div class="modal-body text-center">
                                                  Yakin ingin menghapus data projek <?= $row['name'] ?>? <br><br> <small><span class="badge badge-warning">Peringatan!!</span> jika kamu ingin menghapus project maka kamu juga <br> harus menghapus database secara manual <br>apabila kamu pernah merubah nama database.</small>
                                                </div>
                                                <div class="modal-footer border-top-0 justify-content-center">
                                                  <input type="hidden" name="id-project" value="<?= $row['id_project'] ?>">
                                                  <input type="hidden" name="route" value="<?= $row['route'] ?>">
                                                  <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                                  <button type="button" class="btn btn-white btn-sm shadow" data-dismiss="modal">Batal</button>
                                                  <button type="submit" name="delete-project" class="btn btn-danger btn-sm shadow"><i class="fas fa-trash"></i> Hapus</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <a style="cursor: pointer;" onclick="window.open('<?= $row['route'] ?>', '_blank')" class="btn btn-success btn-sm shadow ml-2"><i class="fas fa-eye"></i> View</a>
                                  </td>
                                </tr>
                            <?php }
                            } ?>
                          </tbody>
                        </table>
                        <?php if ($total1a > $data1a) { ?>
                          <div class="d-flex mt-4 flex-wrap">
                            <p class="text-muted">Showing 1 to <?= $data1a ?> of <?= $total1a ?> entries</p>
                            <nav class="ml-auto">
                              <ul class="pagination separated pagination-info">
                                <?php if (isset($page1a)) {
                                  if (isset($total_page1a)) {
                                    if ($page1a > 1) : ?>
                                      <li class="page-item">
                                        <a href="<?= $_SESSION['page-to'] ?>?page=<?= $page1a - 1; ?>/" class="btn btn-primary btn-sm"><i class="fas fa-chevron-left mt-1"></i></a>
                                      </li>
                                      <?php endif;
                                    for ($i = 1; $i <= $total_page1a; $i++) : if ($i <= 4) : if ($i == $page1a) : ?>
                                          <li class="page-item active">
                                            <a href="<?= $_SESSION['page-to'] ?>?page=<?= $i; ?>/" class="btn btn-primary btn-sm"><?= $i; ?></a>
                                          </li>
                                        <?php else : ?>
                                          <li class="page-item">
                                            <a href="<?= $_SESSION['page-to'] ?>?page=<?= $i; ?>/" class="btn btn-outline-primary btn-sm"><?= $i ?></a>
                                          </li>
                                      <?php endif;
                                      endif;
                                    endfor;
                                    if ($total_page1a >= 4) : ?>
                                      <li class="page-item">
                                        <a href="<?= $_SESSION['page-to'] ?>?page=<?php if ($page1a > 4) {
                                                                                    echo $page1a;
                                                                                  } else if ($page1a <= 4) {
                                                                                    echo '5';
                                                                                  } ?>/" class="btn btn-<?php if ($page1a <= 4) {
                                                                                                          echo 'outline-';
                                                                                                        } ?>primary btn-sm"><?php if ($page1a > 4) {
                                                                                                                              echo $page1a;
                                                                                                                            } else if ($page1a <= 4) {
                                                                                                                              echo '5';
                                                                                                                            } ?></a>
                                      </li>
                                    <?php endif;
                                    if ($page1a < $total_page1a && $total_page1a >= 4) : ?>
                                      <li class="page-item">
                                        <a href="<?= $_SESSION['page-to'] ?>?page=<?= $page1a + 1; ?>/" class="btn btn-primary btn-sm"><i class="fas fa-chevron-right mt-1"></i></a>
                                      </li>
                                <?php endif;
                                  }
                                } ?>
                              </ul>
                            </nav>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("resources/layout/footer.php"); ?>
</body>

</html>