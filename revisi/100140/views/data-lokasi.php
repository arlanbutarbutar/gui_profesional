<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Lokasi";
$_SESSION['page-url'] = "data-lokasi";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

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
            <div class="col-lg-8 mt-3">
              <div class="card card-rounded">
                <div class="card-body">
                  <div id="map" style="width: 100%; height: 500px;"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-3">
              <div>
                <div class="card card-rounded">
                  <div class="card-body text-center">
                    <h4>Tambah Lokasi</h4>
                    <form class="mt-3" action="" method="POST">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="" required>
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" placeholder="" required>
                      </div>
                      <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="" required>
                      </div>
                      <div class="mb-3">
                        <button type="submit" name="tambah-lokasi" class="btn btn-primary">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-rounded mt-3">
                <div class="card-body">
                  <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                      <h4 class="card-title card-title-dash">Lokasi Wisata</h4>
                      <p class="card-subtitle card-subtitle-dash">Anda memiliki <?= $count_lokasi ?> lokasi wisata</p>
                    </div>
                  </div>
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama Wisata</th>
                          <th>Deskripsi</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Tgl Dibuat</th>
                          <th>Tgl Diubah</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody id="search-page">
                        <?php if (mysqli_num_rows($tbl_lokasiAll) == 0) { ?>
                          <tr>
                            <td class="text-center" colspan="9">
                              <p>Belum ada data lokasi</p>
                            </td>
                          </tr>
                          <?php } else if (mysqli_num_rows($tbl_lokasiAll) > 0) {
                          while ($row = mysqli_fetch_assoc($tbl_lokasiAll)) { ?>
                            <tr>
                              <td>
                                <h6><?= $row['nama_lokasi'] ?></h6>
                              </td>
                              <td>
                                <button type="button" class="btn btn-link border-0" data-bs-toggle="modal" data-bs-target="#deskripsi-lokasi<?= $row['id_lokasi'] ?>">
                                  <i class="mdi mdi-eye"></i>
                                </button>
                                <div class="modal fade" id="deskripsi-lokasi<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_lokasi'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <textarea class="border-0 bg-transparent" style="width: 100%;" cols="30" rows="10" readonly><?= $row['deskripsi_lokasi'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p><?= $row['latitude'] ?></p>
                              </td>
                              <td>
                                <p><?= $row['longitude'] ?></p>
                              </td>
                              <td>
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row['created_at']);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row['updated_at']);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_lokasi'] ?>">
                                  <i class="mdi mdi-table-edit"></i>
                                </button>
                                <div class="modal fade" id="ubah<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_lokasi'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="POST">
                                        <input type="hidden" name="id-lokasi" value="<?= $row['id_lokasi'] ?>">
                                        <div class="modal-body row">
                                          <div class="col-lg-8">
                                            <div id="map<?= $row['id_lokasi'] ?>" style="width: 100%; height: 500px;"></div>
                                          </div>
                                          <div class="col-lg-4">
                                            <div class="mb-3">
                                              <label for="nama" class="form-label">Nama</label>
                                              <input type="hidden" name="namaOld" value="<?= $row['nama_lokasi'] ?>">
                                              <input type="text" name="nama" class="form-control" id="nama" placeholder="" value="<?= $row['nama_lokasi'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="deskripsi" class="form-label">Deskripsi</label>
                                              <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10" required><?= $row['deskripsi_lokasi'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                              <label for="latitude" class="form-label">Latitude</label>
                                              <input type="text" name="latitude" class="form-control" id="latitude" placeholder="" value="<?= $row['latitude'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="longitude" class="form-label">Longitude</label>
                                              <input type="text" name="longitude" class="form-control" id="longitude" placeholder="" value="<?= $row['longitude'] ?>" required>
                                            </div>

                                            <script>
                                              var map = L.map('map<?= $row['id_lokasi'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 10);

                                              var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

                                              // get coordinat location
                                              var latInput = document.querySelector("[name=latitude]");
                                              var lngInput = document.querySelector("[name=longitude]");
                                              var curLocation = [<?= $row['latitude'] ?>, <?= $row['longitude'] ?>];
                                              map.attributionControl.setPrefix(false);
                                              var marker = new L.marker(curLocation, {
                                                draggable: 'true',
                                              });
                                              marker.on('dragend', function(event) {
                                                var position = marker.getLatLng();
                                                marker.setLatLng(position, {
                                                  draggable: 'true',
                                                }).bindPopup(position).update();
                                                $("#latitude").val(position.lat);
                                                $("#longitude").val(position.lng);
                                              });
                                              map.addLayer(marker);

                                              map.on("click", function(e) {
                                                var lat = e.latlng.lat;
                                                var lng = e.latlng.lng;
                                                if (!marker) {
                                                  marker = L.marker(e.latlng).addTo(map);
                                                } else {
                                                  marker.setLatLng(e.latlng);
                                                }
                                                latInput.value = lat;
                                                lngInput.value = lng;
                                              });
                                            </script>

                                          </div>
                                        </div>
                                        <div class="modal-footer justify-content-center border-top-0">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <button type="submit" name="ubah-lokasi" class="btn btn-warning">Ubah</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_lokasi'] ?>">
                                  <i class="mdi mdi-delete"></i>
                                </button>
                                <div class="modal fade" id="hapus<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_lokasi'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Anda yakin ingin menghapus lokasi ini?
                                      </div>
                                      <div class="modal-footer justify-content-center border-top-0">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="" method="POST">
                                          <input type="hidden" name="id-lokasi" value="<?= $row['id_lokasi'] ?>">
                                          <input type="hidden" name="namaOld" value="<?= $row['nama_lokasi'] ?>">
                                          <button type="submit" name="hapus-lokasi" class="btn btn-danger">Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
        <script>
          var map = L.map('map').setView([-9.3408,124.4737], 10);

          var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

          // get coordinat location
          var latInput = document.querySelector("[name=latitude]");
          var lngInput = document.querySelector("[name=longitude]");
          var curLocation = [-9.3408,124.4737];
          map.attributionControl.setPrefix(false);
          var marker = new L.marker(curLocation, {
            draggable: 'true',
          });
          marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
              draggable: 'true',
            }).bindPopup(position).update();
            $("#latitude").val(position.lat);
            $("#longitude").val(position.lng);
          });
          map.addLayer(marker);

          map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker) {
              marker = L.marker(e.latlng).addTo(map);
            } else {
              marker.setLatLng(e.latlng);
            }
            latInput.value = lat;
            lngInput.value = lng;
          });
        </script>
</body>

</html>