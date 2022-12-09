<?php require_once("controller/script.php");
if (!isset($_SESSION['data-user'])) {
  header("Location: route.php");
  exit;
}
$_SESSION['page-name'] = "Docs";
$_SESSION['page-url'] = "ringkasan";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body style="font-family: 'Quicksand', sans-serif;">
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
  <?php }
  require_once("resources/layout/navbar.php"); ?>

  <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40" style="background: #cbdcf7;height: 100vh;">
    <div class="container">
      <div class="az-content-left az-content-left-components">
        <div class="component-item">
          <label>Docs</label>
          <?php require_once("resources/layout/nav-docs.php"); ?>
        </div><!-- component-item -->

      </div><!-- az-content-left -->
      <div class="az-content-body pd-lg-l-40 d-flex flex-column">
        <div class="az-content-breadcrumb">
          <span>Docs</span>
          <span>Ringkasan</span>
        </div>
        <h2 class="az-content-title">Ringkasan</h2>
        <h4>Netmedia Framecode</h4>
        <p>Netmedia Framecode adalah layanan pembuatan website yang dibuat dengan tujuan membantu UKM (Usaha Kecil Menengah) dalam melakukan digitalisasi. Kami berupaya melakukan perubahan dari sistem konvensional ke sistem digital sebagai bentuk peningkatan efektivitas dan efisiensi proses dan operasional bisnis UMKM. Dengan digitalisasi UMKM, pelaku usaha UMKM mengubah manajemen usahanya dari praktik konvensional menjadi modern.</p>
        <p>Kami berkomitmen untuk menciptakan peluang bisnis yang lebih luas bagi UMKM untuk Go Global dengan digitalisasi.</p>
        <h4>GUI - Netmedia Framecode</h4>
        <p>Kelola project kamu dengan Dashboard XAMPP yang telah kami desain ulang menjadi lebih kompleks dan didukung dengan aksesibilitas yang dapat mengontrol semua lembar kerja project kamu.</p>
        <p>GUI dari Netmedia Framecode dibuat bertujuan untuk membantu programmer pemula agar dapat membuat sebuah aplikasi basic yang terstruktur dan dapat dengan mudah dipelajari. Mengapa mudah? itu karena kami menggunakan konsep prosedural dengan program pure Native agar pemula dapat memahami setiap baris code yang ada.</p>
      </div><!-- az-content-body -->
    </div><!-- container -->
  </div><!-- az-content -->
  <?php require_once("resources/layout/footer.php"); ?>
</body>

</html>