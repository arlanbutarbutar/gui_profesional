<?php require_once("../controller/script.php"); ?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head><?php require_once("../resources/header.php"); ?></head>

<body>
  <div class="hero_area">
    <?php require_once("../resources/navbar.php"); ?>
  </div>
  <section class="portfolio_section layout_padding" id="tour" style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br>
          <div class="custom_heading-container">
            <h2>DESTINASI WISATA BUDAYA</h2>
          </div>
          <hr>
        </div>
      </div>
      <div class="row">
        <?php
        include '../controller/db_connect.php';
        $data = mysqli_query($conn,"select * from tbl_wisata where id_kategori = 12");
        if (mysqli_num_rows($data) > 0){
          while($d = mysqli_fetch_array($data)){ ?>
            <a href="#" data-toggle="modal" data-target="#wisata-alam<?= $d['id_kategori']?>">
              <div class="col-md-12">  
                  <h6 style="text-align:justify; font-weight: bold; color: black;"><?= $d['nama_wisata'] ?></h6>
              </div>
              <div class="col-md-4">
                <div class="img-box" style="border-radius: 20px; background-color: transparent;">
                  <img src="../assets/images/galeri/<?= $d['foto_wisata'] ?>" style="border-radius:20px; 
                  width: 350px; height: 225px;" alt="">
                </div>
                <br>
              </div>
            </a>
            <div class="modal fade" id="wisata-alam<?= $d['id_kategori']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body p-3 pt-5 pb-5">
                    <h1><?= $d['nama_wisata'] ?></h1>
                    <img src="../assets/images/wisata/<?= $d['foto_wisata'] ?>" style="width: 100%;" alt="">
                    <br>
                    <p class="text-dark pl-3 pr-3 pt-3 text-justify"><?= $d['deskripsi']?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        } ?>
      </div>
    </div>
  </section>
  <?php require_once("../resources/footer.php"); ?>
</body>
</html>