<?php require_once("controller/script.php");
if (!isset($_SESSION['data-user'])) {
  header("Location: route.php");
  exit;
}
$_SESSION['page-name'] = "Docs";
$_SESSION['page-url'] = "php-info";
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

  <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40" style="background: #cbdcf7;">
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
          <span>PHP Info</span>
        </div>
        <h2 class="az-content-title">PHP Info</h2>

        <?php phpinfo(); ?>
      </div><!-- az-content-body -->
    </div><!-- container -->
  </div><!-- az-content -->
  <?php require_once("resources/layout/footer.php"); ?>
</body>

</html>