<?php require_once("controller/script.php");
if (!isset($_SESSION['data-gui'])) {
  header("Location: route.php");
  exit;
}
$_SESSION['page-name'] = "Display";
$_SESSION['page-url'] = "display";
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
      <div class="row">
        <?php
        $ui = mysqli_query($conn, "SELECT * FROM ui WHERE id_user='$idUser'");
        $data = mysqli_fetch_assoc($ui);
        $progress = $data['progress'];
        $data_base = $data['data_base'];
        $framework = $data['framework'];
        $project = $data['project'];
        $nav_tools = $data['nav_tools'];
        if (mysqli_num_rows($ui) > 0) {
        ?>
          <div class="col-md-12">
            <div class="card border-0 shadow">
              <div class="card-header">
                Card Progress Project
              </div>
              <div class="card-body">
                <img src="resources/img/progress-project.jpg" alt="">
                <form action="" method="post" class="mt-3">
                  <?php if ($progress == 1) { ?>
                    <button type="submit" name="tidak-aktif-progress" class="btn btn-primary">Tidak Aktif</button>
                  <?php } else if ($progress == 2) { ?>
                    <button type="submit" name="aktif-progress" class="btn btn-primary">Aktif</button>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-3">
            <div class="card border-0 shadow">
              <div class="card-header">
                Card Databases
              </div>
              <div class="card-body">
                <img src="resources/img/databases.jpg" alt="">
                <form action="" method="post" class="mt-3">
                  <?php if ($data_base == 1) { ?>
                    <button type="submit" name="tidak-aktif-database" class="btn btn-primary">Tidak Aktif</button>
                  <?php } else if ($data_base == 2) { ?>
                    <button type="submit" name="aktif-database" class="btn btn-primary">Aktif</button>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-3">
            <div class="card border-0 shadow">
              <div class="card-header">
                Card Frameworks
              </div>
              <div class="card-body">
                <img src="resources/img/frameworks.jpg" alt="">
                <form action="" method="post" class="mt-3">
                  <?php if ($framework == 1) { ?>
                    <button type="submit" name="tidak-aktif-framework" class="btn btn-primary">Tidak Aktif</button>
                  <?php } else if ($framework == 2) { ?>
                    <button type="submit" name="aktif-framework" class="btn btn-primary">Aktif</button>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-3">
            <div class="card border-0 shadow">
              <div class="card-header">
                Data Table Project
              </div>
              <div class="card-body">
                <img src="resources/img/data-table-project.jpg" alt="">
                <form action="" method="post" class="mt-3">
                  <?php if ($project == 1) { ?>
                    <button type="submit" name="tidak-aktif-project" class="btn btn-primary">Tidak Aktif</button>
                  <?php } else if ($project == 2) { ?>
                    <button type="submit" name="aktif-project" class="btn btn-primary">Aktif</button>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 mt-3">
            <div class="card border-0 shadow">
              <div class="card-header">
                Nav Tools
              </div>
              <div class="card-body">
                <img src="resources/img/nav-tools.jpg" alt="">
                <form action="" method="post" class="mt-3">
                  <?php if ($nav_tools == 1) { ?>
                    <button type="submit" name="tidak-aktif-nav-tools" class="btn btn-primary">Tidak Aktif</button>
                  <?php } else if ($nav_tools == 2) { ?>
                    <button type="submit" name="aktif-nav-tools" class="btn btn-primary">Aktif</button>
                  <?php }?>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div><!-- container -->
  </div><!-- az-content -->
  <?php require_once("resources/layout/footer.php"); ?>
</body>

</html>