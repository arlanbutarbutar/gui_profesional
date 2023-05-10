<?php require_once("../controller/script.php");?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head><?php require_once("../resources/header.php"); ?></head>
<body>
  <div class="hero_area">
    <?php require_once("../resources/navbar.php"); ?>
  </div>
  <section class="portfolio_section layout_padding mt-5" id="maps">
    <center>
      <div class="container" id="maps">     
        <div class="row">
          <div class="col-md-12">
            <br>
            <center> <h2 style="text-transform: uppercase; font-weight: bold;">PETA LOKASI WISATA</h2> </center>
            <hr>
          </div>
        </div>
        <div id="map" style="width: 100%; height: 600px; border-radius: 2%; border:2px solid; border-color: #e0ebeb;">
        </div>
      </div>
    </center>
  </section>
  <?php require_once("../resources/footer.php"); ?>
</body>
</html>