<?php require_once("../controller/script.php");?>
<!DOCTYPE html>
<html html style="scroll-behavior: smooth;" class="hydrated">
<head>
  <?php require_once("../resources/header.php"); ?>
</head>
<body>
  <div class="hero_area">
    <?php require_once("../resources/navbar.php"); ?>
    <section class=" slider_section position-relative" style="margin-top: 100px;">
      <div class="slider_bg-container"></div>
      <div class="slider-container">
        <div class="detail-box">
          <h1 style="font-size: 42px;">
          </h1>
          <div style="color:white;text-shadow: 4px 2px 2px black;">
            <h3> SELAMAT DATANG DI SIG OBJEK WISATA KABUPATEN TIMOR TENGAH UTARA</h3>
          </div>
          <div style="color:white;text-shadow: 2px 2px 2px black;">
            <p style="text-align: justify;"> 
              Kabupaten Timor Tengah Utara adalah sebuah kabupaten yang terletak di provinsi Nusa Tenggara Timur, Indonesia. Ibu kota kabupaten berada di Kota Kefamenanu.
              Kabupaten Timor Tengah Utara memiliki beberapa objek wisata yang menjadi daya tarik bagi para wisatawan. Objek wisata di Kabupaten Timor Tengah Utara meliputi Wisata Alam, Wisata Buatan dan Wisata Budaya.
            </p>
          </div>
        </div>
        <div class="img-box">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <!-- sini -->
                <img src="../assets/images/biinmafottu.jpeg" style=" display:line ; margin:auto"alt="image" height="500";>
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