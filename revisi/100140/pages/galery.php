<?php require_once("../controller/script.php"); ?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">

<head><?php require_once("../resources/header.php"); ?></head>

<body>
  <div class="hero_area">
    <?php require_once("../resources/navbar.php"); ?>
    <section class="portfolio_section layout_padding mt-5" id="galery" >
      <div class="container">
       <div class="row">
        <div class="col-md-12">
          <br>
          <div class="custom_heading-container">
            <h2>GALERI</h2>
          </div>
          <hr>
        </div>
      </div>
      <div class="row">
        <?php if (mysqli_num_rows($tbl_galeri) > 0) {
          while ($row = mysqli_fetch_assoc($tbl_galeri)) { ?>
            <div class="col-md-4">
              <div class="img-box" style="border-radius: 20px; background-color: blue;">
                <img src="../assets/images/galeri/<?= $row['foto_galeri'] ?>" style="border-radius:20px; 
                width: 375px; height: 250px;" alt="">
              </div>
            </div>
          <?php }
        } ?>
      </div>
    </div>
  </div>
</div>
</section>
</div>
<?php require_once("../resources/footer.php"); ?>
</body>
</html>