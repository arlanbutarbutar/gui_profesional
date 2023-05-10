<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Kategori";
$_SESSION['page-url'] = "data-kategori";
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
              <div class="card mt-3 card-rounded">
                <div class="card-body text-center">
                  <h4>Tambah Kategori</h4>
                  <form class="mt-3" action="" method="POST">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="" required>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="tambah-kategori" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mt-3 card-rounded">
                <div class="card-body">
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="text-dark">Nama</th>
                          <th class="text-dark">Tgl Dibuat</th>
                          <th class="text-dark">Tgl Diubah</th>
                          <th class="text-dark" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="search-page">
                        <?php if (mysqli_num_rows($tbl_kategoriAll) == 0) { ?>
                          <tr>
                            <td class="text-dark" colspan="6">Belum ada data kategori</td>
                          </tr>
                        <?php } else if (mysqli_num_rows($tbl_kategoriAll) > 0) {
                          while ($row = mysqli_fetch_assoc($tbl_kategoriAll)) { ?>
                            <tr>
                              <td class="text-dark"><?= $row['nama_kategori'] ?></td>
                              <td class="text-dark">
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row['created_at']);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td class="text-dark">
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row['updated_at']);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td class="text-dark">
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
                              <td class="text-dark">
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
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../resources/dash-footer.php") ?>
</body>
</html>