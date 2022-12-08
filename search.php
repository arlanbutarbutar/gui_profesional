<?php require_once('controller/script.php');
if ($_SESSION['page-url'] == "./") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $keys = explode(" ", $key);
    $quer = "";
    foreach ($keys as $no => $data) {
      $data = strtolower($data);
      $quer .= "projects.name LIKE '%$data%'";
      if ($no + 1 < count($keys)) {
        $quer .= " OR ";
      }
    }
    $query = "SELECT * FROM projects JOIN jenis_app ON projects.id_jenis_app=jenis_app.id_jenis_app JOIN languages ON projects.id_language=languages.id_language JOIN project_status ON projects.id_status=project_status.id_status WHERE projects.id_user='$idUser' AND $quer ORDER BY projects.id_project DESC LIMIT 100";
    $projects = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($projects) == 0) { ?>
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
        <td class="text-center"></td>
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
                                        } ?> wd-25p" role="progressbar" aria-valuenow="<?= $row['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </td>
        <td class="text-center"></td>
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
                          <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control text-center border-0 shadow" placeholder="Nama projek" style="border-radius: 10px;" required>
                        </div>
                        <div class="form-group">
                          <label for="route">Rute</label>
                          <input type="text" name="route" value="<?= $row['route'] ?>" class="form-control text-center border-0 shadow mb-2" placeholder="Rute" style="border-radius: 10px;" required>
                          <span>Rute yang tersedia seperti berikut => <small class="text-success">'apps/dir_projek/'</small></span>
                        </div>
                        <div class="form-group">
                          <label for="progress">Progress</label>
                          <select name="progress" id="progress" class="form-control text-center border-0 shadow">
                            <option value="">Pilih Progress</option>
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
                          <input type="text" name="domain" value="<?= $row['domain'] ?>" class="form-control text-center border-0 shadow" placeholder="Domain">
                        </div>
                      </div>
                      <div class="modal-footer border-top-0 justify-content-center">
                        <input type="hidden" name="id-project" value="<?= $row['id_project'] ?>">
                        <input type="hidden" name="nameOld" value="<?= $row['name'] ?>">
                        <input type="hidden" name="routeOld" value="<?= $row['route'] ?>">
                        <input type="hidden" name="domainOld" value="<?= $row['domain'] ?>">
                        <input type="hidden" name="progressOld" value="<?= $row['progress'] ?>">
                        <button type="button" class="btn btn-white btn-sm shadow" style="border-radius: 10px;" data-dismiss="modal">Batal</button>
                        <button type="submit" name="edit-project" class="btn btn-warning btn-sm shadow" style="border-radius: 10px;"><i class="fas fa-pen text-dark"></i> Ubah</button>
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
          <a style="cursor: pointer;" onclick="window.open('<?= $row['route'] ?>', '_blank')" class="btn btn-success btn-sm shadow ml-2" target="_blank"><i class="fas fa-eye"></i> View</a>
        </td>
      </tr>
<?php }
  }
} ?>