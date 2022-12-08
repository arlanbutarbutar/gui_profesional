<?php require_once("../controller/script.php");
if (isset($_SESSION['data-user'])) {
  header("Location: ../route.php");
  exit;
}
$_SESSION['page-name'] = "Signup - GUI Netmedia Framecode";
$_SESSION['page-url'] = "signup";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../resources/layout/auth-header.php"); ?>
</head>

<body class="az-body" style="font-family: 'Quicksand', sans-serif;background: #cbdcf7;">
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
  <div class="az-signup-wrapper">
    <div class="az-column-signup-left">
      <div>
        <img src="../resources/img/netmedia-framecode.png" style="width: 100px" alt="Icon Brand">
        <h1>Netmedia Framecode</h1>
        <p>Netmedia Framecode is a website creation service that was created with the aim of helping UKM (Small and Medium Enterprises) in digitizing. We strive to make changes from conventional to digital systems as a form of increasing the effectiveness and efficiency of UMKM business processes and operations. With the digitization of UMKM, UMKM business actors change their business management from conventional to modern practices.</p>
        <p>We are committed to creating wider business opportunities for UMKM to Go Global with digitalization.</p>
        <span>Salam hangat,</span><br>
        <span>Sahala Z.R Butar Butar</span><br>
        <span>Founder Netmedia Framecode</span><br><br><br>
        <a style="cursor: pointer;" onclick="window.location.href='https://www.netmedia-framecode.com'" class="btn btn-primary shadow" target="_blank">Lihat Layanan</a>
      </div>
    </div>
    <div class="az-column-signup border-0 shadow text-center">
      <h1>GUI</h1>
      <h4 class="mt-n5">Netmedia Framecode</h4>
      <div class="az-signup-header">
        <h2 class="text-primary">Memulai</h2>
        <p>Ini gratis untuk mendaftar dan hanya membutuhkan satu menit.</p>
        <form action="" method="POST" autocomplete="off">
          <div class="form-group">
            <label>Nama Panggilan</label>
            <input type="text" name="username" value="<?php if (isset($_POST['username'])) {
                                                        echo $_POST['username'];
                                                      } ?>" class="form-control border-0 shadow text-center" placeholder="Nama Panggilan" autofocus required>
          </div>
          <div class="form-group">
            <label>e-Mail</label>
            <input type="email" name="email" value="<?php if (isset($_POST['email'])) {
                                                      echo $_POST['email'];
                                                    } ?>" class="form-control border-0 shadow text-center" placeholder="e-Mail" required>
          </div>
          <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" class="form-control border-0 shadow text-center" placeholder="Kata Sandi" minlength="8" required>
          </div>
          <button type="submit" name="daftar" class="btn btn-primary shadow btn-block mt-5">Daftar</button>
        </form>
      </div>
      <div class="az-signup-footer">
        <p>Sudah punya akun? <a class="text-primary" style="cursor: pointer;" onclick="window.location.href='signin'">Masuk sekarang.</a></p>
      </div>
    </div>
  </div>
  <?php require_once("../resources/layout/auth-footer.php"); ?>
</body>

</html>