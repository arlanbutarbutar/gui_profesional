<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Laporan";
$_SESSION['page-url'] = "data-laporan";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../resources/dash-header.php") ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>

<body>
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
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <h2>Cetak Laporan Wisata</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <canvas id="myChart" style="width:100%;"></canvas>
              <?php
              if (mysqli_num_rows($grafik_kategori) > 0) {
                while ($row_graph = mysqli_fetch_assoc($grafik_kategori)) {
                  $nama_kategori[] = $row_graph['nama_kategori'];

                  $id_kategori = $row_graph['id_kategori'];
                  $check_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata WHERE id_kategori='$id_kategori'");
                  $count[] = mysqli_num_rows($check_wisata);
                }
              }
              ?>
              <script type="text/javascript">
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?= json_encode($nama_kategori); ?>,
                    datasets: [{
                      label: 'Wisata Kabupaten Timor Tengah Utara',
                      data: <?= json_encode($count); ?>,
                      backgroundColor: 'rgba(2, 92, 225)',
                      borderColor: 'rgba(2, 92, 225)',
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero: true
                        }
                      }]
                    }
                  }
                });
              </script>
            </div>
          </div>
          <div class="row flex-grow mt-3">
            <?php if (mysqli_num_rows($cetak_kategori) > 0) {
              while ($row = mysqli_fetch_assoc($cetak_kategori)) { ?>
                <div class="col-lg-3 grid-margin stretch-card">
                  <div class="card bg-primary card-rounded">
                    <div class="card-body pb-3">
                      <h4 class="card-title card-title-dash text-white mb-3"><?= $row['nama_kategori'] ?></h4>
                      <div class="row">
                        <div class="col-sm-8">
                          <p class="text-white mb-1">Jumlah Tempat Wisata</p>
                          <h2 class="text-white">
                            <?php $id_kategori = $row['id_kategori'];
                            $check_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata WHERE id_kategori='$id_kategori'");
                            $count = mysqli_num_rows($check_wisata);
                            echo $count; ?>
                          </h2>
                        </div>
                        <div class="col-sm-4">
                          <form action="cetak-data.php" method="post">
                            <input type="hidden" name="id-kategori" value="<?= $row['id_kategori']; ?>">
                            <button type="submit" name="check-kategori" class="btn btn-primary btn-sm">
                              <i class="mdi mdi-file-excel" style="font-size: 20px;"></i>
                            </button>
                          </form>
                          <form action="" method="post" class="mt-2">
                            <input type="hidden" name="id-kategori" value="<?= $row['id_kategori']; ?>">
                            <button type="submit" name="views-kategori" class="btn btn-success btn-sm">
                              <i class="mdi mdi-table" style="font-size: 20px;"></i>
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>
          </div>
          <?php if (isset($_POST['views-kategori'])) { ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table select-table text-center">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th>Judul</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (mysqli_num_rows($views_kategori) == 0) { ?>
                            <tr>
                              <th colspan="4">Belum ada data.</th>
                            </tr>
                            <?php }
                          $no = 1;
                          if (mysqli_num_rows($views_kategori) > 0) {
                            while ($row = mysqli_fetch_assoc($views_kategori)) { ?>
                              <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $row['nama_kategori'] ?></td>
                            <?php $no++;
                            }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>