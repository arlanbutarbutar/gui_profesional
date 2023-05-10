<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Wisata";
$_SESSION['page-url'] = "data-wisata";
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
          <div class="row flex-row-reverse">
            <div class="col-lg-4">
              <div class="card card-rounded mt-3">
                <div class="card-body text-center">
                  <h4>Tambah Wisata</h4>
                  <form class="mt-3" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="nama_wisata" class="form-label">Nama Wisata</label>
                      <input type="text" name="nama_wisata" class="form-control" id="nama_wisata" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori</label>
                      <select name="kategori" id="kategori" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih kategori</option>
                        <?php foreach ($select_kategori as $row_kategori) : ?>
                          <option value="<?= $row_kategori['id_kategori'] ?>"><?= $row_kategori['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="lokasi" class="form-label">Lokasi</label>
                      <select name="lokasi" id="lokasi" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih lokasi</option>
                        <?php foreach ($select_lokasi as $row_lokasi) : ?>
                          <option value="<?= $row_lokasi['id_lokasi'] ?>"><?= $row_lokasi['nama_lokasi'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Photo Wisata</label>
                      <input name="image" class="form-control" type="file" id="image" required>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="tambah-wisata" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card card-rounded mt-3">
                <div class="card-body">
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama Wisata</th>
                          <th>Deskripsi</th>
                          <th>Kategori</th>
                          <th>Lokasi</th>
                          <th>Tgl Dibuat</th>
                          <th>Tgl Diubah</th>
                          <th colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="search-page">
                        <?php if (mysqli_num_rows($tbl_wisataAll) == 0) { ?>
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