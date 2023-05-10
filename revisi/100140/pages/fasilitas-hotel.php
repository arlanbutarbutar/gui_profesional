<?php require_once("../controller/script.php"); ?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head>
  <?php require_once("../resources/header.php"); ?>
</head>

<body>
  <div class="hero_area">
    <?php require_once("../resources/navbar.php"); ?>
    <section class="portfolio_section layout_padding mt-5" id="galery">
      <div class="container">
        <div class="layout_padding2-top">
          <div class="row">
            <div class="col-md-12">
              <div class="detail-box">
                <div class="row">
                  <div class="col-md-12">
                    <div class="custom_heading-container">
                      <h2>HOTEL DAN PENGINAPAN</h2>
                    </div>
                    <hr>
                  </div>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                  <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr class="tableizer-firstrow">
                        <th>NO</th>
                        <th>Nama Hotel</th>
                        <th>Jumlah Kamar</th>
                        <th>Jumlah Tarif (Terendah & Tertinggi)</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      if (mysqli_num_rows($hotelView) > 0) {
                        while ($row = mysqli_fetch_assoc($hotelView)) { ?>
                          <tr>
                            <td><?= $no ?></td>
                            <td>
                              <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#image-hotel<?= $row['id_hotel'] ?>">
                                  <img src="<?= $row['img'] ?>" class="rounded-circle" style="width: 50px;height: 50px;cursor: pointer;" alt="Profile Hotel">
                                </button>
                                <div class="modal fade" id="image-hotel<?= $row['id_hotel'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $row['nama_hotel'] ?></h5>
                                        <button type="button" class="btn btn-link text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                                      </div>
                                      <div class="modal-body">
                                        <img src="<?= $row['img'] ?>" style="width: 100%;" alt="Profile Hotel">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <h6 class="ml-3"><?= $row['nama_hotel'] ?></h6>
                              </div>
                            </td>
                            <td><?= $row['jumlah_kamar'] ?></td>
                            <td><?= $row['jumlah_tarif'] ?></td>
                            <td><?= $row['alamat'] ?></td>
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
    </section>
  </div>
  <?php require_once("../resources/footer.php"); ?>
</body>

</html>