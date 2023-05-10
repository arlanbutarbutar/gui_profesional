<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Fasilitas";
$_SESSION['page-url'] = "data-fasilitas";
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
          <div class="accordion" id="accordionExample">

            <!-- Restoran & Rumah Makan -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <div class="d-flex justify-content-between">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Restoran & Rumah Makan
                  </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoran">
                    Tambah Data
                  </button>
                  <div class="modal fade" id="restoran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Restoran & Rumah Makan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="file" class="form-label">
                                <p>Upload Gambar</p>
                              </label>
                              <input name="file" class="form-control" type="file" id="file" required>
                            </div>
                            <div class="mb-3">
                              <label for="nama" class="form-label">
                                <p>Nama</p>
                              </label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Restoran" required>
                            </div>
                            <div class="mb-3">
                              <label for="meja" class="form-label">
                                <p>Jumlah Meja</p>
                              </label>
                              <input type="number" name="meja" class="form-control" id="meja" placeholder="Jumlah Meja" required>
                            </div>
                            <div class="mb-3">
                              <label for="kursi" class="form-label">
                                <p>Jumlah Kursi</p>
                              </label>
                              <input type="number" name="kursi" class="form-control" id="kursi" placeholder="Jumlah Kursi" required>
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">
                                <p>Alamat</p>
                              </label>
                              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah-restoran" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jumlah Meja</th>
                          <th scope="col">Jumlah Kursi</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Tgl Buat</th>
                          <th scope="col">Tgl Ubah</th>
                          <th scope="col" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        if (mysqli_num_rows($restoran) > 0) {
                          while ($row_res = mysqli_fetch_assoc($restoran)) { ?>
                            <tr>
                              <th scope="row"><?= $no ?></th>
                              <td><?= $row_res['nama_restoran'] ?></td>
                              <td><?= $row_res['jumlah_meja'] ?></td>
                              <td><?= $row_res['jumlah_kursi'] ?></td>
                              <td><?= $row_res['alamat'] ?></td>
                              <td>
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row_res['created_at']);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row_res['updated_at']);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah-restoran<?= $row_res['id_restoran'] ?>">
                                  <i class="bi bi-pencil-square"></i> Ubah
                                </button>
                                <div class="modal fade" id="ubah-restoran<?= $row_res['id_restoran'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_res['nama_restoran'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <label for="file" class="form-label">
                                              <p>Upload Gambar</p>
                                            </label>
                                            <input name="file" class="form-control" type="file" id="file" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">
                                              <p>Nama</p>
                                            </label>
                                            <input type="text" name="nama" value="<?= $row_res['nama_restoran'] ?>" class="form-control" id="nama" placeholder="Nama Restoran" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="meja" class="form-label">
                                              <p>Jumlah Meja</p>
                                            </label>
                                            <input type="number" name="meja" value="<?= $row_res['jumlah_meja'] ?>" class="form-control" id="meja" placeholder="Jumlah Meja" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="kursi" class="form-label">
                                              <p>Jumlah Kursi</p>
                                            </label>
                                            <input type="number" name="kursi" value="<?= $row_res['jumlah_kursi'] ?>" class="form-control" id="kursi" placeholder="Jumlah Kursi" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="alamat" class="form-label">
                                              <p>Alamat</p>
                                            </label>
                                            <input type="text" name="alamat" value="<?= $row_res['alamat'] ?>" class="form-control" id="alamat" placeholder="Alamat" required>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-restoran" value="<?= $row_res['id_restoran'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_res['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="ubah-restoran" class="btn btn-warning">Ubah</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-restoran<?= $row_res['id_restoran'] ?>">
                                  <i class="bi bi-trash3"></i> Hapus
                                </button>
                                <div class="modal fade" id="hapus-restoran<?= $row_res['id_restoran'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_res['nama_restoran'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <p>Anda yakin ingin menghapus Restoran ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-restoran" value="<?= $row_res['id_restoran'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_res['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="hapus-restoran" class="btn btn-danger">Hapus</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                        <?php $no++;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Hotel & Penginapan -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <div class="d-flex justify-content-between">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Hotel & Penginapan
                  </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hotel">
                    Tambah Data
                  </button>
                  <div class="modal fade" id="hotel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hotel & Penginapan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="file" class="form-label">
                                <p>Upload Gambar</p>
                              </label>
                              <input name="file" class="form-control" type="file" id="file" required>
                            </div>
                            <div class="mb-3">
                              <label for="nama" class="form-label">
                                <p>Nama</p>
                              </label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Restoran" required>
                            </div>
                            <div class="mb-3">
                              <label for="kamar" class="form-label">
                                <p>Jumlah Kamar</p>
                              </label>
                              <input type="number" name="kamar" class="form-control" id="kamar" placeholder="Jumlah Kamar" required>
                            </div>
                            <div class="mb-3">
                              <label for="tarif" class="form-label">
                                <p>Tarif</p>
                              </label>
                              <input type="text" name="tarif" class="form-control" id="tarif" placeholder="Tarif" required>
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">
                                <p>Alamat</p>
                              </label>
                              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah-hotel" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jumlah Kamar</th>
                          <th scope="col">Jumlah Tarif</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Tgl Buat</th>
                          <th scope="col">Tgl Ubah</th>
                          <th scope="col" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        if (mysqli_num_rows($hotel) > 0) {
                          while ($row_hotel = mysqli_fetch_assoc($hotel)) { ?>
                            <tr>
                              <th scope="row"><?= $no ?></th>
                              <td><?= $row_hotel['nama_hotel'] ?></td>
                              <td><?= $row_hotel['jumlah_kamar'] ?></td>
                              <td><?= $row_hotel['jumlah_tarif'] ?></td>
                              <td><?= $row_hotel['alamat'] ?></td>
                              <td>
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row_hotel['created_at']);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row_hotel['updated_at']);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah-hotel<?= $row_hotel['id_hotel'] ?>">
                                  <i class="bi bi-pencil-square"></i> Ubah
                                </button>
                                <div class="modal fade" id="ubah-hotel<?= $row_hotel['id_hotel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_hotel['nama_hotel'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <label for="file" class="form-label">
                                              <p>Upload Gambar</p>
                                            </label>
                                            <input name="file" class="form-control" type="file" id="file" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">
                                              <p>Nama</p>
                                            </label>
                                            <input type="text" name="nama" value="<?= $row_hotel['nama_hotel'] ?>" class="form-control" id="nama" placeholder="Nama Hotel" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="kamar" class="form-label">
                                              <p>Jumlah Kamar</p>
                                            </label>
                                            <input type="number" name="kamar" value="<?= $row_hotel['jumlah_kamar'] ?>" class="form-control" id="kamar" placeholder="Jumlah Kamar" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="tarif" class="form-label">
                                              <p>Jumlah Tarif</p>
                                            </label>
                                            <input type="text" name="tarif" value="<?= $row_hotel['jumlah_tarif'] ?>" class="form-control" id="tarif" placeholder="Jumlah Tarif" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="alamat" class="form-label">
                                              <p>Alamat</p>
                                            </label>
                                            <input type="text" name="alamat" value="<?= $row_hotel['alamat'] ?>" class="form-control" id="alamat" placeholder="Alamat" required>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-hotel" value="<?= $row_hotel['id_hotel'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_hotel['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="ubah-hotel" class="btn btn-warning">Ubah</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-hotel<?= $row_hotel['id_hotel'] ?>">
                                  <i class="bi bi-trash3"></i> Hapus
                                </button>
                                <div class="modal fade" id="hapus-hotel<?= $row_hotel['id_hotel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_hotel['nama_hotel'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <p>Anda yakin ingin menghapus Hotel atau Penginapan ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-hotel" value="<?= $row_hotel['id_hotel'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_hotel['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="hapus-hotel" class="btn btn-danger">Hapus</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                        <?php $no++;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Layanan Publik Lainnya -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <div class="d-flex justify-content-between">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Layanan Publik Lainnya
                  </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layanan">
                    Tambah Data
                  </button>
                  <div class="modal fade" id="layanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Layanan Publik Lainnya</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="file" class="form-label">
                                <p>Upload Gambar</p>
                              </label>
                              <input name="file" class="form-control" type="file" id="file" required>
                            </div>
                            <div class="mb-3">
                              <label for="nama" class="form-label">
                                <p>Nama</p>
                              </label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Layanan Publik" required>
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">
                                <p>Alamat</p>
                              </label>
                              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah-layanan" class="btn btn-primary">Tambah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Tgl Buat</th>
                          <th scope="col">Tgl Ubah</th>
                          <th scope="col" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        if (mysqli_num_rows($layanan) > 0) {
                          while ($row_layanan = mysqli_fetch_assoc($layanan)) { ?>
                            <tr>
                              <th scope="row"><?= $no ?></th>
                              <td><?= $row_layanan['nama_layanan_publik'] ?></td>
                              <td><?= $row_layanan['alamat'] ?></td>
                              <td>
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row_layanan['created_at']);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row_layanan['updated_at']);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah-layanan<?= $row_layanan['id_layanan'] ?>">
                                  <i class="bi bi-pencil-square"></i> Ubah
                                </button>
                                <div class="modal fade" id="ubah-layanan<?= $row_layanan['id_layanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_layanan['nama_layanan_publik'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <label for="file" class="form-label">
                                              <p>Upload Gambar</p>
                                            </label>
                                            <input name="file" class="form-control" type="file" id="file" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="nama" class="form-label">
                                              <p>Nama</p>
                                            </label>
                                            <input type="text" name="nama" value="<?= $row_layanan['nama_layanan_publik'] ?>" class="form-control" id="nama" placeholder="Nama Layanan Publik" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="alamat" class="form-label">
                                              <p>Alamat</p>
                                            </label>
                                            <input type="text" name="alamat" value="<?= $row_layanan['alamat'] ?>" class="form-control" id="alamat" placeholder="Alamat" required>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-layanan" value="<?= $row_layanan['id_layanan'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_layanan['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="ubah-layanan" class="btn btn-warning">Ubah</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-layanan<?= $row_layanan['id_layanan'] ?>">
                                  <i class="bi bi-trash3"></i> Hapus
                                </button>
                                <div class="modal fade" id="hapus-layanan<?= $row_layanan['id_layanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row_layanan['nama_layanan_publik'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <p>Anda yakin ingin menghapus Layanan Publik ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="id-layanan" value="<?= $row_layanan['id_layanan'] ?>">
                                          <input type="hidden" name="fileOld" value="<?= $row_layanan['img'] ?>">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="hapus-layanan" class="btn btn-danger">Hapus</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
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
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>