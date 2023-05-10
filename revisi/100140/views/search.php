<?php require_once('../controller/script.php');
if ($_SESSION['page-url'] == "users") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "username LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM tbl_admin WHERE id_admin!='$idUser' AND $quer ORDER BY id_admin DESC LIMIT 100";
    $tbl_admin = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($tbl_admin) == 0) { ?>
    <tr>
      <td colspan="5">Belum ada data galeri</td>
    </tr>
    <?php } else if (mysqli_num_rows($tbl_admin) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_admin)) { ?>
      <tr>
        <td><?= $row['username'] ?></td>
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
          <button type="button" class="btn btn-warning btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#ubah<?= $row['id_admin'] ?>" aria-expanded="false" aria-controls="ubah<?= $row['id_admin'] ?>">
            <i class="mdi mdi-table-edit"></i>
          </button>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_admin'] ?>">
            <i class="mdi mdi-delete"></i>
          </button>
          <div class="modal fade" id="hapus<?= $row['id_admin'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['username'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin menghapus pengguna ini?
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="" method="POST">
                    <input type="hidden" name="id-admin" value="<?= $row['id_admin'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['username'] ?>">
                    <button type="submit" name="hapus-pengguna" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr style="border-top: hidden;">
        <td colspan="5">
          <form action="" method="post">
            <div class="collapse" id="ubah<?= $row['id_admin'] ?>">
              <div class="card card-body card-rounded">
                <div class="row g-3">
                  <div class="col-sm-5">
                    <input type="text" name="username" value="<?= $row['username'] ?>" class="form-control" id="username" placeholder="Username" required>
                  </div>
                  <div class="col-sm-5">
                    <?php $idAdmin = $row['id_admin'] ?>
                    <input type="text" name="password" id="password<?= $idAdmin; ?>" class="form-control" placeholder="Kata Sandi" required>
                    <button type="button" class="btn btn-dark btn-sm mt-2" onclick="generate('password<?= $idAdmin; ?>')">Generate password</button>
                    <script type="text/javascript">
                      function generate(el) {
                        el = document.getElementById(el);
                        el.value = randomPass();
                      }

                      function randomPass() {
                        return Math.random().toString(25).slice(-11);
                      }
                    </script>
                  </div>
                  <div class="col-sm-2">
                    <input type="hidden" name="id-admin" value="<?= $row['id_admin'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['username'] ?>">
                    <button type="submit" name="ubah-pengguna" class="btn btn-warning">Ubah</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </td>
      </tr>
    <?php }
  }
}
if ($_SESSION['page-url'] == "galery") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "tbl_wisata.nama_wisata LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM tbl_galeri JOIN tbl_wisata ON tbl_galeri.id_wisata=tbl_wisata.id_wisata WHERE $quer ORDER BY tbl_galeri.id_galeri DESC LIMIT 100";
    $tbl_galeri = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($tbl_galeri) == 0) { ?>
    <tr>
      <td colspan="7">Belum ada data galeri</td>
    </tr>
    <?php } else if (mysqli_num_rows($tbl_galeri) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_galeri)) { ?>
      <tr>
        <td>
          <div class="d-flex">
            <img src="../assets/images/wisata/<?= $row['foto_wisata'] ?>" alt="">
            <div class="my-auto">
              <h6><?= $row['nama_wisata'] ?></h6>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-link border-0" data-bs-toggle="modal" data-bs-target="#deskripsi-galeri<?= $row['id_wisata'] ?>">
            <i class="mdi mdi-eye"></i>
          </button>
          <div class="modal fade" id="deskripsi-galeri<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <textarea class="border-0 bg-transparent" style="width: 100%;" cols="30" rows="10" readonly><?= $row['deskripsi_galeri'] ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
          <img src="../assets/images/galeri/<?= $row['foto_galeri'] ?>" data-bs-toggle="modal" data-bs-target="#image<?= $row['id_galeri'] ?>" style="cursor: pointer;" alt="">
          <div class="modal fade" id="image<?= $row['id_galeri'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="../assets/images/galeri/<?= $row['foto_galeri'] ?>" style="width: 100%;height: 100%;" alt="">
                </div>
              </div>
            </div>
          </div>
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
          <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_galeri'] ?>">
            <i class="mdi mdi-table-edit"></i>
          </button>
          <div class="modal fade" id="ubah<?= $row['id_galeri'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="wisata" class="form-label">Wisata</label>
                      <select name="wisata" id="wisata" class="form-select" aria-label="Default select example" required>
                        <option value="<?= $row['id_wisata'] ?>"><?= $row['nama_wisata'] ?></option>
                        <?php $id_wisata = $row['id_wisata'];
                        $wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata WHERE id_wisata!='$id_wisata'");
                        foreach ($wisata as $rowsata) : ?>
                          <option value="<?= $rowsata['id_wisata'] ?>"><?= $rowsata['nama_wisata'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10" required><?= $row['deskripsi_galeri'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Photo</label>
                      <input name="image-galeri" class="form-control" type="file" id="image">
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="hidden" name="id-galeri" value="<?= $row['id_galeri'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['nama_wisata'] ?>">
                    <input type="hidden" name="imageOld" value="<?= $row['foto_galeri'] ?>">
                    <button type="submit" name="ubah-galeri" class="btn btn-warning">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_galeri'] ?>">
            <i class="mdi mdi-delete"></i>
          </button>
          <div class="modal fade" id="hapus<?= $row['id_galeri'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin menghapus galeri ini?
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="" method="POST">
                    <input type="hidden" name="id-galeri" value="<?= $row['id_galeri'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['nama_wisata'] ?>">
                    <input type="hidden" name="image" value="<?= $row['foto_galeri'] ?>">
                    <button type="submit" name="hapus-galeri" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php }
  }
}
if ($_SESSION['page-url'] == "category") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "nama_kategori LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM tbl_kategori WHERE $quer ORDER BY id_kategori DESC LIMIT 100";
    $tbl_kategoriAll = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($tbl_kategoriAll) == 0) { ?>
    <tr>
      <td colspan="6">Belum ada data kategori</td>
    </tr>
    <?php } else if (mysqli_num_rows($tbl_kategoriAll) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_kategoriAll)) { ?>
      <tr>
        <td><?= $row['nama_kategori'] ?></td>
        <td><?= $row['deskripsi_kategori'] ?></td>
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
          <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_kategori'] ?>">
            <i class="mdi mdi-table-edit"></i>
          </button>
          <div class="modal fade" id="ubah<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_kategori'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                  <input type="hidden" name="id-kategori" value="<?= $row['id_kategori'] ?>">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="hidden" name="namaOld" value="<?= $row['nama_kategori'] ?>">
                      <input type="text" name="nama" value="<?= $row['nama_kategori'] ?>" class="form-control" id="nama" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10" required><?= $row['deskripsi_kategori'] ?></textarea>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="ubah-kategori" class="btn btn-warning">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_kategori'] ?>">
            <i class="mdi mdi-delete"></i>
          </button>
          <div class="modal fade" id="hapus<?= $row['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_kategori'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin menghapus kategori ini?
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="" method="POST">
                    <input type="hidden" name="id-kategori" value="<?= $row['id_kategori'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['nama_kategori'] ?>">
                    <button type="submit" name="hapus-kategori" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php }
  }
}
if ($_SESSION['page-url'] == "location") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "nama_lokasi LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM tbl_lokasi WHERE $quer ORDER BY id_lokasi DESC LIMIT 100";
    $tbl_lokasiAll = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($tbl_lokasiAll) == 0) { ?>
    <tr>
      <td class="text-center" colspan="9">
        <p>Belum ada data lokasi</p>
      </td>
    </tr>
    <?php } else if (mysqli_num_rows($tbl_lokasiAll) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_lokasiAll)) { ?>
      <tr>
        <td>
          <div class="d-flex">
            <img src="../assets/images/lokasi/<?= $row['image'] ?>" alt="">
            <div class="my-auto">
              <h6><?= $row['nama_lokasi'] ?></h6>
            </div>
          </div>
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
                <form action="" method="POST" enctype="multipart/form-data">
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
                        <label for="image" class="form-label">Photo</label>
                        <input type="hidden" name="imageOld" value="<?= $row['image'] ?>">
                        <input name="image" class="form-control" type="file" id="image">
                      </div>
                      <hr>
                      <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="latitude" placeholder="" value="<?= $row['latitude'] ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="" value="<?= $row['longitude'] ?>" required>
                      </div>

                      <script>
                        var map = L.map('map<?= $row['id_lokasi'] ?>').setView([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>], 14);

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
                    <input type="hidden" name="image" value="<?= $row['image'] ?>">
                    <button type="submit" name="hapus-lokasi" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    <?php }
  }
}
if ($_SESSION['page-url'] == "tour") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "tbl_wisata.nama_wisata LIKE '%$data%' OR tbl_kategori.nama_kategori LIKE '%$data%' OR tbl_lokasi.nama_lokasi LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM tbl_wisata JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi WHERE $quer ORDER BY tbl_wisata.id_wisata DESC LIMIT 100";
    $tbl_wisataAll = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($tbl_wisataAll) == 0) { ?>
    <tr>
      <td colspan="8">Belum ada data wisata</td>
    </tr>
    <?php } else if (mysqli_num_rows($tbl_wisataAll) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_wisataAll)) { ?>
      <tr>
        <td>
          <div class="d-flex">
            <img src="../assets/images/wisata/<?= $row['foto_wisata'] ?>" alt="">
            <div class="my-auto">
              <h6><?= $row['nama_wisata'] ?></h6>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-link border-0" data-bs-toggle="modal" data-bs-target="#deskripsi-wisata<?= $row['id_wisata'] ?>">
            <i class="mdi mdi-eye"></i>
          </button>
          <div class="modal fade" id="deskripsi-wisata<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <textarea class="border-0 bg-transparent" style="width: 100%;" cols="30" rows="10" readonly><?= $row['deskripsi'] ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td><?= $row['nama_kategori'] ?></td>
        <td><?= $row['nama_lokasi'] ?></td>
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
          <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_wisata'] ?>">
            <i class="mdi mdi-table-edit"></i>
          </button>
          <div class="modal fade" id="ubah<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="nama_wisata" class="form-label">Nama Wisata</label>
                      <input type="text" name="nama_wisata" value="<?= $row['nama_wisata'] ?>" class="form-control" id="nama_wisata" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <input type="text" name="deskripsi" value="<?= $row['deskripsi'] ?>" class="form-control" id="deskripsi" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori</label>
                      <select name="kategori" id="kategori" class="form-select" aria-label="Default select example" required>
                        <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                        <?php $id_kategori = $row['id_kategori'];
                        $select_kategoriElse = mysqli_query($conn, "SELECT * FROM tbl_kategori WHERE id_kategori!='$id_kategori'");
                        foreach ($select_kategoriElse as $row_kategoriElse) : ?>
                          <option value="<?= $row_kategoriElse['id_kategori'] ?>"><?= $row_kategoriElse['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="lokasi" class="form-label">Lokasi</label>
                      <select name="lokasi" id="lokasi" class="form-select" aria-label="Default select example" required>
                        <option value="<?= $row['id_lokasi'] ?>"><?= $row['nama_lokasi'] ?></option>
                        <?php $id_lokasi = $row['id_lokasi'];
                        $select_lokasiElse = mysqli_query($conn, "SELECT * FROM tbl_lokasi WHERE id_lokasi!='$id_lokasi'");
                        foreach ($select_lokasiElse as $row_lokasiElse) : ?>
                          <option value="<?= $row_lokasiElse['id_lokasi'] ?>"><?= $row_lokasiElse['nama_lokasi'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Photo Wisata</label>
                      <input name="image" class="form-control" type="file" id="image" required>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center border-top-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="hidden" name="id-wisata" value="<?= $row['id_wisata'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['nama_wisata'] ?>">
                    <input type="hidden" name="imageOld" value="<?= $row['foto_wisata'] ?>">
                    <button type="submit" name="ubah-wisata" class="btn btn-warning">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_wisata'] ?>">
            <i class="mdi mdi-delete"></i>
          </button>
          <div class="modal fade" id="hapus<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-bottom-0">
                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Anda yakin ingin menghapus wisata ini?
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="" method="POST">
                    <input type="hidden" name="id-wisata" value="<?= $row['id_wisata'] ?>">
                    <input type="hidden" name="namaOld" value="<?= $row['nama_wisata'] ?>">
                    <input type="hidden" name="image" value="<?= $row['foto_wisata'] ?>">
                    <button type="submit" name="hapus-wisata" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
<?php }
  }
} ?>