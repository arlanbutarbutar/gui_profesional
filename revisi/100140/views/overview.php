<?php require_once("../controller/script.php"); ?>

<div class="tab-content tab-content-basic">
  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
    <div class="row flex-row-reverse">
      <div class="col-lg-4 d-flex flex-column">
        <div>
          <div class="row flex-grow">

            <!-- data category -->
            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
              <div class="card card-rounded">
                <div class="card-body card-rounded">
                  <h4 class="card-title  card-title-dash">Kategori</h4>
                  <?php if (mysqli_num_rows($tbl_kategori) == 0) { ?>
                    <p>Belum ada data kategori</p>
                  <?php } else if (mysqli_num_rows($tbl_kategori) > 0) {
                    while ($row = mysqli_fetch_assoc($tbl_kategori)) { ?>
                      <div class="list align-items-center border-bottom py-2">
                        <div class="wrapper w-100">
                          <p class="mb-2 font-weight-medium">
                            <?= $row['nama_kategori'] ?>
                          </p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="align-items-start">
                              <small class="mb-0 text-small text-muted">
                                <?php $date_kategori = date_create($row['updated_at']);
                                echo date_format($date_kategori, "l, d M Y h:i a"); ?>
                              </small>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }
                  } ?>
                  <div class="list align-items-center pt-3">
                    <div class="wrapper w-100">
                      <p class="mb-0">
                        <a style="cursor: pointer;" onclick="window.location.href='data-kategori'" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex flex-column">
        <div class="row flex-grow">

          <!-- data maps -->
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title card-title-dash">Lokasi</h4>
                    <p class="card-subtitle card-subtitle-dash">Anda memiliki <?= $count_lokasi ?> lokasi wisata</p>
                  </div>
                  <div>
                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="window.location.href='data-lokasi'"><i class="mdi mdi-map-marker-plus"></i>Tambah Lokasi</button>
                  </div>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                  <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Tgl Dibuat</th>
                        <th>Tgl Diubah</th>
                        <th colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (mysqli_num_rows($tbl_lokasi) == 0) { ?>
                        <tr>
                          <td class="text-center" colspan="9">
                            <p>Belum ada data lokasi</p>
                          </td>
                        </tr>
                      <?php } else if (mysqli_num_rows($tbl_lokasi) > 0) {
                        while ($row = mysqli_fetch_assoc($tbl_lokasi)) { ?>
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
                              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubah-lokasi<?= $row['id_lokasi'] ?>">
                                <i class="mdi mdi-table-edit"></i>
                              </button>
                              <div class="modal fade" id="ubah-lokasi<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-lokasi<?= $row['id_lokasi'] ?>">
                                <i class="mdi mdi-delete"></i>
                              </button>
                              <div class="modal fade" id="hapus-lokasi<?= $row['id_lokasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <!-- data  -->
          <div class="col-12 grid-margin stretch-card">
            <div class="card card-rounded">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                  <div>
                    <h4 class="card-title card-title-dash">Wisata</h4>
                    <p class="card-subtitle card-subtitle-dash">Anda memiliki <?= $count_wisata ?> lokasi wisata</p>
                  </div>
                  <div>
                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button" onclick="window.location.href='data-wisata'"><i class="mdi mdi-map-marker-radius"></i>Tambah Wisata</button>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card mt-3 card-rounded">
                   <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <div class="card-body">
                      <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Tgl Dibuat</th>
                            <th>Tgl Diubah</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (mysqli_num_rows($tbl_wisata) == 0) { ?>
                            <tr>
                              <td colspan="8">Belum ada data wisata</td>
                            </tr>
                          <?php } else if (mysqli_num_rows($tbl_wisata) > 0) {
                            while ($row = mysqli_fetch_assoc($tbl_wisata)) { ?>
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
                                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubah-wisata<?= $row['id_wisata'] ?>">
                                    <i class="mdi mdi-table-edit"></i>
                                  </button>
                                  <div class="modal fade" id="ubah-wisata<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                          <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_wisata'] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                          <div class="modal-body">
                                            <div class="mb-3">
                                              <label for="judul" class="form-label">Judul</label>
                                              <input type="text" name="judul" value="<?= $row['nama_wisata'] ?>" class="form-control" id="judul" placeholder="" required>
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
                                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-wisata<?= $row['id_wisata'] ?>">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
                                  <div class="modal fade" id="hapus-wisata<?= $row['id_wisata'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div>
      </div>
    </div>
  </div>
</div>