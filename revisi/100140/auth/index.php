<?php require_once("../controller/script.php");
if (isset($_SESSION['data-user'])) {
  header("Location: ../views/");
  exit();
}
$_SESSION['page-name'] = "Masuk";
$_SESSION['page-url'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/auth-header.php") ?></head>

<body>
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
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
              <h4>Halo! mari kita mulai</h4>
              <h6 class="fw-light">Masuk untuk melanjutkan.</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Kata Sandi" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="masuk" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
              </form>
              <a href="../" class="nav-link mt-3">Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../resources/auth-footer.php") ?>
</body>

</html>