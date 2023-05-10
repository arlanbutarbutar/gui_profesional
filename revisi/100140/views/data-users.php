<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Data Users";
$_SESSION['page-url'] = "data-users";
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
                  <h4>Tambah Pengguna</h4>
                  <form class="mt-3" action="" method="post" name="random_form">
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="username" placeholder="" required>
                    </div>
                    <div class="mb-4">
                      <label for="kata-sandi" class="form-label">Kata Sandi</label>
                      <input type="text" name="password" value="" class="form-control" id="kata-sandi" placeholder="" required>
                      <input type="button" value="Generate Password" class="btn btn-dark btn-sm mt-2" onclick="random_all();">
                    </div>
                    <div class="mb-3">
                      <button type="submit" name="tambah-pengguna" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card card-rounded mt-3">
                <div class="card-body">
                  <div class="table-responsive  mt-1">
                    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th class="th-sm">Username</th>
                          <th class="th-sm">Tgl Dibuat</th>
                          <th class="th-sm">Tgl Diubah</th>
                          <th class="th-sm" colspan="2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody id="search-page">
                        <?php if (mysqli_num_rows($tbl_admin) == 0) { ?>
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