<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Galeri";
$_SESSION['page-url'] = "data-galeri";
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
              <div class="card card-rounded">
                <div class="card-body text-center">
                  <h4>Tambah Galeri</h4>
                  <form class="mt-3" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="wisata" class="form-label">Wisata</label>
                      <select name="wisata" id="wisata" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih wisata</option>
                        <?php foreach ($select_wisata as $row_wisata) : ?>
                          <option value="<?= $row_wisata['id_wisata'] ?>"><?= $row_wisata['nama_wisata'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Photo</label>
                      <input name="image-galeri" class="form-control" type="file" id="image" required>
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="tambah-galeri" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card card-rounded">
                <div class="card-body">
                  <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">Nama Wisata</th>
                          <th class="th-sm">Deskripsi</th>
                          <th class="th-sm">Photo</th>
                          <th class="th-sm">Tgl Dibuat</th>
                          <th class="th-sm">Tgl Diubah</th>
                          <th class="th-sm" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="search-page">
                        <?php if (mysqli_num_rows($tbl_galeri) == 0) { ?>
                          <tr>
                            <td colspan="7">Belum ada data galeri</td>
                          </tr>
                        <?php } else if (mysqli_num_rows($tbl_galeri) > 0) {
                          while ($row = mysqli_fetch_assoc($tbl_galeri)) { ?>
                            <tr>
                              <td>
                                <div class="d-flex">
                                  <!-- <img src="../assets/images/wisata/<?= $row['foto_wisata'] ?>" alt=""> -->
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