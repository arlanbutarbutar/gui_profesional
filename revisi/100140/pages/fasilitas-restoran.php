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
                      <h2>RESTORAN DAN RUMAH MAKAN</h2>
                    </div>
                    <hr>
                  </div>
                </div>
                <section class="" style="background-color: #f4f5f7;">
                  <div class="container ">
                    <div class="row">
                      <?php if (mysqli_num_rows($restoranView) > 0) {
                        while ($row_res = mysqli_fetch_assoc($restoranView)) { ?>
                          <div style="float: left;" class="col-md-12">
                            <div class="card mb-3" style="border-radius: .5rem;">
                              <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                  <img src="<?= $row_res['img'] ?>" alt="Profile Restoran" class="img-fluid my-5" style="width: 300px; border-radius:2%;border-top:0 ;border-bottom:0 ;border-left: 3px solid grey; border-right: 3px solid grey;" />
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body p-4">
                                    <h6>Informasi</h6>
                                    <hr class="mt-0 mb-4">
                                    <h6><?= $row_res['nama_restoran']?></h6>
                                    <p>Meja yang tersedia <?= $row_res['jumlah_meja']?></p>
                                    <p>Jumlah Kursi <?= $row_res['jumlah_kursi']?></p>
                                    <p>Alamat : <?= $row_res['alamat']?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </section>
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