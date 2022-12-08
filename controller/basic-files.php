<?php
$petik = "'";
// file /.htaccess
$file1 = ".htaccess";
$file1 = fopen($route . '/' . $file1, "w");
fwrite($file1, '
<IfModule mod_security.c>
  SecRuleEngine Off 
  SecFilterInheritance Off 
  SecFilterEngine Off
  SecFilterScanPOST Off
</IfModule>
<IfModule mod_rewrite.c>
  RewriteEngine on 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME}.php -f 
  RewriteRule ^(.*)$ $1.php
</IfModule>
<IfModule mod_rewrite.c>
  RewriteEngine on 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME}.html -f 
  RewriteRule ^(.*)$ $1.html
</IfModule>
ErrorDocument 404 http://127.0.0.1:1010/apps/' . $route_name . '/
IndexIgnore *.gif *.zip *.txt *.png *.php *.mp4
');
fclose($file1);

// file /index
$file2 = "index.php";
$file2 = fopen($route . '/' . $file2, "w");
fwrite($file2, '
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>' . $name . '</title>

    <style type="text/css">
      ::selection {
        background-color: #e13300;
        color: white;
      }
      ::-moz-selection {
        background-color: #e13300;
        color: white;
      }

      body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4f5155;
      }

      a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
      }

      h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #d0d0d0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
      }

      code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #d0d0d0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
      }

      #body {
        margin: 0 15px 0 15px;
      }

      p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #d0d0d0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
      }

      #container {
        margin: 10px;
        border: 1px solid #d0d0d0;
        box-shadow: 0 0 8px #d0d0d0;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <h1>Project ' . $name . '</h1>

      <div id="body">
        <p>
          Halaman yang Anda lihat dibuat secara dinamis oleh Netmedia Framecode.
        </p>
        <p>
          Tampilan <strong>UI (User Interface)</strong> dan <strong>Console</strong> dapat anda ubah dengan melihat berbagai macam template dari vendor Netmedia Framecode
        </p>
        <code><i class="bi bi-list"></i>
          <a href="https://www.free-css.com/free-css-templates" target="_blank" style="text-decoration: none;">Template UI</a>
        </code>
        <code><i class="bi bi-list"></i>
          <a href="https://freshdesignweb.com/free-admin-templates/" target="_blank" style="text-decoration: none;">Template Console</a>
        </code>
        <p>
          Jika anda ingin melanjutkan ke <strong>Console</strong> bisa klik link dibawah ini:
        </p>
        <code><i class="bi bi-list"></i>
          <a href="auth/" style="text-decoration: none;">auth/</a>
        </code>
      </div>
    </div>
  </body>
</html>
');
fclose($file2);

// =============================================================

// file /auth/index.php
$file3 = "index.php";
$file3 = fopen($route . '/auth/' . $file3, "w");
fwrite($file3, '
<?php require_once("../controller/script.php");
if (isset($_SESSION["data-user"])) {
  header("Location: ../views/");
  exit();
}
$_SESSION["page-name"] = "Masuk";
$_SESSION["page-url"] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/auth-header.php") ?></head>

<body>
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5 shadow">
              <img src="../assets/images/logo.png" style="width: 120px;margin-bottom: 10px;" alt="Logo ' . $name . '">
              <h2>' . $name . '</h2>
              <h6 class="fw-light">Masuk untuk melanjutkan.</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group mt-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control text-center" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="pasword">Password</label>
                  <input type="password" name="password" id="password" class="form-control text-center" placeholder="Kata Sandi" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="masuk" class="btn rounded-0 text-white" style="background-color: rgb(3, 164, 237);">Masuk</button>
                </div>
              </form>
              <p class="d-flex flex-nowrap justify-content-center mt-3">Kembali ke <a href="../" class="text-decoration-none" style="margin-left: 5px;">Beranda</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../resources/auth-footer.php") ?>
</body>

</html>
');
fclose($file3);

// file /auth/signout.php
$file4 = "signout.php";
$file4 = fopen($route . '/auth/' . $file4, "w");
fwrite($file4, '
<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/script.php");
if (isset($_SESSION["data-user"])) {
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: ./");
  exit();
}
');
fclose($file4);

// =============================================================

// file /controller/db_connect.php
$file5 = "db_connect.php";
$file5 = fopen($route . '/controller/' . $file5, "w");
fwrite($file5, '
<?php 
$conn=mysqli_connect("localhost","root","","' . $name_db . '");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
');
fclose($file5);

// file /controller/functions.php
$file6 = "functions.php";
$file6 = fopen($route . '/controller/' . $file6, "w");
fwrite($file6, '
<?php
if (!isset($_SESSION["data-user"])) {
  function masuk($data)
  {
    global $conn;
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));

    // check account
    $checkAccount = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
    if (mysqli_num_rows($checkAccount) == 0) {
      $_SESSION["message-danger"] = "Maaf, akun yang anda masukan belum terdaftar.";
      $_SESSION["time-message"] = time();
      return false;
    } else if (mysqli_num_rows($checkAccount) > 0) {
      $row = mysqli_fetch_assoc($checkAccount);
      if (password_verify($password, $row["password"])) {
        $_SESSION["data-user"] = [
          "id" => $row["id_user"],
          "role" => $row["id_role"],
          "email" => $row["email"],
          "username" => $row["username"],
        ];
      } else {
        $_SESSION["message-danger"] = "Maaf, kata sandi yang anda masukan salah.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }
  }
}
if (isset($_SESSION["data-user"])) {
  function edit_profile($data)
  {
    global $conn, $idUser;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE users SET username=' . $petik . '$username' . $petik . ', password=' . $petik . '$password' . $petik . ' WHERE id_user=' . $petik . '$idUser' . $petik . '");
    return mysqli_affected_rows($conn);
  }
  function add_user($data)
  {
    global $conn;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
    if (mysqli_num_rows($checkEmail) > 0) {
      $_SESSION["message-danger"] = "Maaf, email yang anda masukan sudah terdaftar.";
      $_SESSION["time-message"] = time();
      return false;
    }
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["password"]))));
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES(' . $petik . '$username' . $petik . ',' . $petik . '$email' . $petik . ',' . $petik . '$password' . $petik . ')");
    return mysqli_affected_rows($conn);
  }
  function edit_user($data)
  {
    global $conn, $time;
    $id_user = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["id-user"]))));
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["username"]))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["email"]))));
    $emailOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["emailOld"]))));
    if ($email != $emailOld) {
      $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
      if (mysqli_num_rows($checkEmail) > 0) {
        $_SESSION["message-danger"] = "Maaf, email yang anda masukan sudah terdaftar.";
        $_SESSION["time-message"] = time();
        return false;
      }
    }
    $updated_at = date("Y-m-d " . $time);
    mysqli_query($conn, "UPDATE users SET username=' . $petik . '$username' . $petik . ', email=' . $petik . '$email' . $petik . ', updated_at=' . $petik . '$updated_at' . $petik . ' WHERE id_user=' . $petik . '$id_user' . $petik . '");
    return mysqli_affected_rows($conn);
  }
  function delete_user($data)
  {
    global $conn;
    $id_user = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data["id-user"]))));
    mysqli_query($conn, "DELETE FROM users WHERE id_user=' . $petik . '$id_user' . $petik . '");
    return mysqli_affected_rows($conn);
  }
}
');
fclose($file6);

// file /controller/index.html
$file7 = "index.html";
$file7 = fopen($route . '/controller/' . $file7, "w");
fwrite($file7, '
<html>
<head><title>403 Forbidden</title></head>
<body>
<center><h1>403 Forbidden</h1></center>
<hr><center>nginx/1.18.0 (Ubuntu)</center>
</body>
</html>
');
fclose($file7);

// file /controller/script.php
$file8 = "script.php";
$file8 = fopen($route . '/controller/' . $file8, "w");
fwrite($file8, '
<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
if (!isset($_SESSION[""])) {
  session_start();
}
require_once("db_connect.php");
require_once("time.php");
require_once("functions.php");
if (isset($_SESSION["time-message"])) {
  if ((time() - $_SESSION["time-message"]) > 2) {
    if (isset($_SESSION["message-success"])) {
      unset($_SESSION["message-success"]);
    }
    if (isset($_SESSION["message-info"])) {
      unset($_SESSION["message-info"]);
    }
    if (isset($_SESSION["message-warning"])) {
      unset($_SESSION["message-warning"]);
    }
    if (isset($_SESSION["message-danger"])) {
      unset($_SESSION["message-danger"]);
    }
    if (isset($_SESSION["message-dark"])) {
      unset($_SESSION["message-dark"]);
    }
    unset($_SESSION["time-alert"]);
  }
}

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/' . $route_name . '/";

if (!isset($_SESSION["data-user"])) {
  if (isset($_POST["masuk"])) {
    if (masuk($_POST) > 0) {
      header("Location: ../views/");
      exit();
    }
  }
}

if (isset($_SESSION["data-user"])) {
  $idUser = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION["data-user"]["id"]))));
  
  $profile = mysqli_query($conn, "SELECT * FROM users WHERE id_user=' . $petik . '$idUser' . $petik . '");
  if (isset($_POST["ubah-profile"])) {
    if (edit_profile($_POST) > 0) {
      $_SESSION["message-success"] = "Profil akun anda berhasil di ubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }

  $users = mysqli_query($conn, "SELECT * FROM users WHERE id_user!=' . $petik . '$idUser' . $petik . ' ORDER BY id_user DESC");
  if (isset($_POST["tambah-user"])) {
    if (add_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["username"] . " berhasil ditambahkan.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["ubah-user"])) {
    if (edit_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["usernameOld"] . " berhasil diubah.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
  if (isset($_POST["hapus-user"])) {
    if (delete_user($_POST) > 0) {
      $_SESSION["message-success"] = "Pengguna " . $_POST["username"] . " berhasil dihapus.";
      $_SESSION["time-message"] = time();
      header("Location: " . $_SESSION["page-url"]);
      exit();
    }
  }
}
');
fclose($file8);

// file /controller/time.php
$file9 = "time.php";
$file9 = fopen($route . '/controller/' . $file9, "w");
fwrite($file9, '
<?php
date_default_timezone_set("Asia/Jakarta");
$h = date("H");
$H_value = $h+1;
$time = date($H_value.":i:s");
?>
');
fclose($file9);

// =============================================================

// file /resources/auth-header.php
$file10 = "auth-header.php";
$file10 = fopen($route . '/resources/' . $file10, "w");
fwrite($file10, '
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $_SESSION["page-name"] ?> - ' . $name . '</title>
<link rel="stylesheet" href="../assets/css/feather.css">
<link rel="stylesheet" href="../assets/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../assets/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="../assets/typicons/typicons.css">
<link rel="stylesheet" href="../assets/css/simple-line-icons.css">
<link rel="stylesheet" href="../assets/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../assets/css/style-dash.css">
<link rel="shortcut icon" href="../assets/images/logo.png" />
<script src="../assets/sweetalert/dist/sweetalert2.all.min.js"></script>
');
fclose($file10);

// file /resources/dash-footer.php
$file11 = "dash-footer.php";
$file11 = fopen($route . '/resources/' . $file11, "w");
fwrite($file11, '
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"></span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <?= date("Y") ?> <a style="cursor: pointer;" onclick="window.open(' . $petik . 'https://netmedia-framecode.com' . $petik . ', ' . $petik . '_blank' . $petik . ')">Netmedia Framecode</a> . All rights reserved. Powered By ' . $pemilik . '</span>
  </div>
</footer>
</div>
</div>
</div>
<script src="../assets/js/vendor.bundle.base.js"></script>
<script src="../assets/js/Chart.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/progressbar.min.js"></script>
<script src="../assets/js/off-canvas.js"></script>
<script src="../assets/js/hoverable-collapse.js"></script>
<script src="../assets/js/template.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/todolist.js"></script>
<script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/Chart.roundedBarCharts.js"></script>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/datatable/datatables.js"></script>
<script>
  const messageSuccess = $(".message-success").data("message-success");
  const messageInfo = $(".message-info").data("message-info");
  const messageWarning = $(".message-warning").data("message-warning");
  const messageDanger = $(".message-danger").data("message-danger");

  if (messageSuccess) {
    Swal.fire({
      icon: "success",
      title: "Berhasil Terkirim",
      text: messageSuccess,
    })
  }

  if (messageInfo) {
    Swal.fire({
      icon: "info",
      title: "For your information",
      text: messageInfo,
    })
  }
  if (messageWarning) {
    Swal.fire({
      icon: "warning",
      title: "Peringatan!!",
      text: messageWarning,
    })
  }
  if (messageDanger) {
    Swal.fire({
      icon: "error",
      title: "Kesalahan",
      text: messageDanger,
    })
  }
</script>
<script>
  $(document).ready(function() {
    $("#datatable").DataTable();
  });
</script>
<script>
  (function() {
    function scrollH(e) {
      e.preventDefault();
      e = window.event || e;
      let delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
      document.querySelector(".table-responsive").scrollLeft -= (delta * 40);
    }
    if (document.querySelector(".table-responsive").addEventListener) {
      document.querySelector(".table-responsive").addEventListener("mousewheel", scrollH, false);
      document.querySelector(".table-responsive").addEventListener("DOMMouseScroll", scrollH, false);
    }
  })();
</script>
');
fclose($file11);

// file /resources/dash-header.php
$file12 = "dash-header.php";
$file12 = fopen($route . '/resources/' . $file12, "w");
fwrite($file12, '
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?= $_SESSION["page-name"] ?> - ' . $name . '</title>
<link rel="stylesheet" href="../assets/css/feather.css">
<link rel="stylesheet" href="../assets/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../assets/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="../assets/typicons/typicons.css">
<link rel="stylesheet" href="../assets/css/simple-line-icons.css">
<link rel="stylesheet" href="../assets/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../assets/css/select.dataTables.min.css">
<link rel="stylesheet" href="../assets/css/style-dash.css">
<link rel="stylesheet" href="../assets/datatable/datatables.css">
<script src="../assets/sweetalert/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="../assets/node_modules/bootstrap-icons/font/bootstrap-icons.css">
<link rel="shortcut icon" href="../assets/images/..." />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<style>
  html{
    scroll-behavior: smooth;
  }
  .kategori-wisata {
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
  }

  ::-webkit-scrollbar {
    height: 10px;
    /* height of horizontal scrollbar ← You"re missing this */
    width: 10px;
    /* width of vertical scrollbar */
    border: 1px solid #d5d5d5;
  }

  ::-webkit-scrollbar-track {
    border-radius: 0;
    background: #eeeeee;
  }

  ::-webkit-scrollbar-thumb {
    border-radius: 0;
    background: rgb(3, 164, 237);
  }
  .btn-primary{
    background-color: rgb(3, 164, 237);
    border-radius: 0;
  }
  .btn-primary:hover{
    background-color: #0365FF;
  }
</style>
');
fclose($file12);

// file /resources/dash-sidebar.php
$file13 = "dash-sidebar.php";
$file13 = fopen($route . '/resources/' . $file13, "w");
fwrite($file13, '
<nav class="sidebar sidebar-offcanvas shadow" style="background-color: rgb(3, 164, 237);" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href=' . $petik . './' . $petik . '">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">Kelola Pengguna</li>
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href=' . $petik . 'users' . $petik . '">
        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item nav-category"></li>
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href=' . $petik . '../auth/signout' . $petik . '">
        <i class="mdi mdi-logout-variant menu-icon"></i>
        <span class="menu-title">Keluar</span>
      </a>
    </li>
  </ul>
</nav>
');
fclose($file13);

// file /resources/dash-topbar.php
$file14 = "dash-topbar.php";
$file14 = fopen($route . '/resources/' . $file14, "w");
fwrite($file14, '
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" style="background-color: rgb(3, 164, 237);">
    <div class="me-3">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
        <span class="icon-menu text-white"></span>
      </button>
    </div>
    <div>
      <a class="navbar-brand brand-logo d-flex" href="./">
        <style>@media screen and (max-width: 400px){.img-brand{display: none;}}</style>
        <img src="../assets/images/..." alt="Logo Brand" class="img-brand" style="width: 60px;height: 60px;">
      </a>
      <a class="nav-link navbar-brand brand-logo-mini" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="img-xs rounded-circle" src="../assets/images/user.png" style="width: 40px;height: 40px;" alt="Profile image" />
      </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown p-4" style="width: 200px;" aria-labelledby="UserDropdown">
        <div class="dropdown-header text-center">
          <img class="img-md rounded-circle" src="../assets/images/user.png" style="width: 50px;" alt="Profile image">
          <p class="mb-1 mt-3 font-weight-semibold"><?= $_SESSION["data-user"]["username"] ?><br><?= $_SESSION["data-user"]["email"] ?></p>
        </div>
        <a style="cursor: pointer;" onclick="window.location.href=' . $petik . 'profil' . $petik . '" class="dropdown-item pb-3">
          <i class="bi bi-person me-2"></i> Profil Saya</a>
        <a style="cursor: pointer;" onclick="window.location.href=' . $petik . '../auth/signout' . $petik . '" class="dropdown-item border-bottom-0">
          <i class="bi bi-box-arrow-right me-2"></i> Keluar</a>
      </div>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-top shadow">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text">Selamat datang, <span class="text-black fw-bold"><?= $_SESSION["data-user"]["username"] ?></span></h1>
        <p class="">
          <i class="mdi mdi-subdirectory-arrow-right"></i>
          <a href="./" class="text-decoration-none text-dark">Dashboard</a>
          <?php if ($_SESSION["page-url"] == "lokasi?gereja=" . $_GET["gereja"]) { ?>
            / <a href="gereja" class="text-decoration-none text-dark">Gereja</a>
          <?php }
          if ($_SESSION["page-name"] != "Dashboard") {
            echo " / " . $_SESSION["page-name"];
          } ?>
        </p>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="../assets/images/user.png" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown p-0" style="width: 220px;" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="../assets/images/user.png" style="width: 50px;" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold"><?= $_SESSION["data-user"]["username"] ?><br><?= $_SESSION["data-user"]["email"] ?></p>
          </div>
          <a style="cursor: pointer;" onclick="window.location.href=' . $petik . 'profil' . $petik . '" class="dropdown-item p-3">
            <i class="bi bi-person text-primary me-2"></i> Profil Saya</a>
          <a style="cursor: pointer;" onclick="window.location.href=' . $petik . '../auth/signout' . $petik . '" class="dropdown-item border-bottom-0 p-3">
            <i class="bi bi-box-arrow-right text-primary me-2"></i> Keluar</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
');
fclose($file14);

// file /resources/index.html
$file15 = "index.html";
$file15 = fopen($route . '/resources/' . $file15, "w");
fwrite($file15, '
<html>
<head><title>403 Forbidden</title></head>
<body>
<center><h1>403 Forbidden</h1></center>
<hr><center>nginx/1.18.0 (Ubuntu)</center>
</body>
</html>
');
fclose($file15);

// =============================================================

// file /views/blank.php
$file16 = "blank.php";
$file16 = fopen($route . '/views/' . $file16, "w");
fwrite($file16, '
<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "";
$_SESSION["page-url"] = "";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

<body>
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <!-- <a class="nav-link action active ps-0" id="overview" data-bs-toggle="tab" role="tab" style="cursor: pointer;" aria-controls="overview" aria-selected="true">Ringkasan</a> -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link action border-0" id="maps" data-bs-toggle="tab" style="cursor: pointer;" role="tab" aria-selected="false">Maps</a> -->
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <!-- <a href="report" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a> -->
                    </div>
                  </div>
                </div>
                <div class="data-main"></div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>
');
fclose($file16);

// file /views/index.php
$file17 = "index.php";
$file17 = fopen($route . '/views/' . $file17, "w");
fwrite($file17, '
<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Dashboard";
$_SESSION["page-url"] = "./";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

<body>
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link action active ps-0" id="overview" data-bs-toggle="tab" role="tab" style="cursor: pointer;" aria-controls="overview" aria-selected="true">Ringkasan</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <!-- <a href="report" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a> -->
                    </div>
                  </div>
                </div>
                <div class="data-main"></div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
        <script>
          $(document).ready(function() {
            $(".action").click(function() {
              var menu = $(this).attr("id");
              if (menu == "overview") {
                $(".data-main").load("overview.php");
              }
              if (menu == "maps") {
                $(".data-main").load("maps.php");
              }
            });
            $(".data-main").load("overview.php");
          });
        </script>
</body>

</html>
');
fclose($file17);

// file /views/redirect.php
$file18 = "redirect.php";
$file18 = fopen($route . '/views/' . $file18, "w");
fwrite($file18, '
<?php if (!isset($_SESSION["data-user"])) {
  header("Location: ../auth/");
  exit();
}
');
fclose($file18);

// file /views/users.php
$file19 = "users.php";
$file19 = fopen($route . '/views/' . $file19, "w");
fwrite($file19, '
<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Kelola Pengguna";
$_SESSION["page-url"] = "users";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

<body style="font-family: '.$petik.'Montserrat'.$petik.', sans-serif;">
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <h3><?= $_SESSION["page-name"] ?></h3>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-primary text-white me-0 btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#tambah-pengguna">Tambah</a>
                    </div>
                  </div>
                </div>
                <div class="card rounded-0 mt-3">
                  <div class="card-body table-responsive">
                    <table class="table table-striped table-hover table-borderless table-sm display" id="datatable">
                      <thead>
                        <tr>
                          <th scope="col" class="text-center">#</th>
                          <th scope="col" class="text-center">Nama</th>
                          <th scope="col" class="text-center">Email</th>
                          <th scope="col" class="text-center">Tgl Buat</th>
                          <th scope="col" class="text-center">Tgl Ubah</th>
                          <th scope="col" class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (mysqli_num_rows($users) > 0) {
                          $no = 1;
                          while ($row = mysqli_fetch_assoc($users)) { ?>
                            <tr>
                              <th scope="row"><?= $no; ?></th>
                              <td><?= $row["username"] ?></td>
                              <td><?= $row["email"] ?></td>
                              <td>
                                <div class="badge badge-opacity-success">
                                  <?php $dateCreate = date_create($row["created_at"]);
                                  echo date_format($dateCreate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td>
                                <div class="badge badge-opacity-warning">
                                  <?php $dateUpdate = date_create($row["updated_at"]);
                                  echo date_format($dateUpdate, "l, d M Y h:i a"); ?>
                                </div>
                              </td>
                              <td class="d-flex justify-content-center">
                                <div class="col">
                                  <button type="button" class="btn btn-warning btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#ubah<?= $row["id_user"] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>
                                  <div class="modal fade" id="ubah<?= $row["id_user"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0 shadow">
                                          <h5 class="modal-title" id="exampleModalLabel">Ubah data <?= $row["username"] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="POST">
                                          <div class="modal-body text-center">
                                            <div class="mb-3">
                                              <label for="username" class="form-label">Nama <small class="text-danger">*</small></label>
                                              <input type="text" name="username" value="<?= $row["username"] ?>" class="form-control text-center" id="username" minlength="3" placeholder="Nama" required>
                                            </div>
                                            <div class="mb-3">
                                              <label for="email" class="form-label">Email <small class="text-danger">*</small></label>
                                              <input type="email" name="email" value="<?= $row["email"] ?>" class="form-control text-center" id="email" placeholder="Email" required>
                                            </div>
                                          </div>
                                          <div class="modal-footer justify-content-center border-top-0">
                                            <input type="hidden" name="id-user" value="<?= $row["id_user"] ?>">
                                            <input type="hidden" name="usernameOld" value="<?= $row["username"] ?>">
                                            <input type="hidden" name="emailOld" value="<?= $row["email"] ?>">
                                            <button type="button" class="btn btn-secondary btn-sm rounded-0 border-0" style="height: 30px;" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="ubah-user" class="btn btn-warning btn-sm rounded-0 border-0" style="height: 30px;">Ubah</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col">
                                  <button type="button" class="btn btn-danger btn-sm text-white rounded-0 border-0" style="height: 30px;" data-bs-toggle="modal" data-bs-target="#hapus<?= $row["id_user"] ?>">
                                    <i class="bi bi-trash3"></i>
                                  </button>
                                  <div class="modal fade" id="hapus<?= $row["id_user"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header border-bottom-0 shadow">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus data <?= $row["username"] ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                          Anda yakin ingin menghapus <?= $row["username"] ?> ini?
                                        </div>
                                        <div class="modal-footer justify-content-center border-top-0">
                                          <button type="button" class="btn btn-secondary btn-sm rounded-0 border-0" style="height: 30px;" data-bs-dismiss="modal">Batal</button>
                                          <form action="" method="POST">
                                            <input type="hidden" name="id-user" value="<?= $row["id_user"] ?>">
                                            <input type="hidden" name="username" value="<?= $row["username"] ?>">
                                            <button type="submit" name="hapus-user" class="btn btn-danger btn-sm rounded-0 text-white border-0" style="height: 30px;">Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                        <?php $no++;
                          }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="tambah-pengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-bottom-0 shadow">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post" name="random_form">
                <div class="modal-body text-center">
                  <div class="mb-3">
                    <label for="username" class="form-label">Nama <small class="text-danger">*</small></label>
                    <input type="text" name="username" class="form-control text-center" id="username" minlength="3" placeholder="Nama" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email <small class="text-danger">*</small></label>
                    <input type="email" name="email" class="form-control text-center" id="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password <small class="text-danger">*</small></label>
                    <input type="text" name="password" class="form-control text-center" id="kata-sandi" minlength="8" placeholder="Password" required>
                    <input type="button" value="Generate Password" class="btn btn-link btn-sm text-decoration-none" onclick="random_all();">
                  </div>
                </div>
                <div class="modal-footer border-top-0 justify-content-center">
                  <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="tambah-user" class="btn btn-primary btn-sm rounded-0">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
        <script type="text/javascript">
          function random_all() {
            var campur = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var panjang = 9;
            var random_all = "";
            for (var i = 0; i < panjang; i++) {
              var hasil = Math.floor(Math.random() * campur.length);
              random_all += campur.substring(hasil, hasil + 1);
            }
            document.random_form.password.value = random_all;
          }
        </script>
</body>

</html>
');
fclose($file19);

// file /views/profil.php
$file20 = "profil.php";
$file20 = fopen($route . '/views/' . $file20, "w");
fwrite($file20, '
<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Kelola Akun Saya";
$_SESSION["page-url"] = "profil";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>

<body>
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <div class="container-scroller">
    <?php require_once("../resources/dash-topbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php require_once("../resources/dash-sidebar.php") ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <?php if (mysqli_num_rows($profile) > 0) {
            while ($row = mysqli_fetch_assoc($profile)) { ?>
              <div class="row flex-row-reverse">
                <div class="col-lg-4">
                  <div class="card rounded-0">
                    <div class="card-body text-center">
                      <h2>Ubah Profil</h2>
                      <form action="" method="POST">
                        <div class="mb-3">
                          <label for="username" class="form-label">Nama</label>
                          <input type="text" name="username" value="<?= $row["username"] ?>" class="form-control" id="username" placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Kata Sandi</label>
                          <input type="password" name="password" value="" class="form-control" id="password" placeholder="Kata Sandi" required>
                        </div>
                        <button type="submit" name="ubah-profile" class="btn btn-primary">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card rounded-0">
                    <div class="card-body">
                      <h2>Profil Akun</h2>
                      <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                          <tbody>
                            <tr>
                              <th scope="row">Nama</th>
                              <td>:</td>
                              <td class="w-75"><?= $row["username"] ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Email</th>
                              <td>:</td>
                              <td class="w-75"><?= $row["email"] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>
        <?php require_once("../resources/dash-footer.php") ?>
</body>

</html>
');
fclose($file20);

// file /views/overview.php
$file21 = "overview.php";
$file21 = fopen($route . '/views/' . $file21, "w");
fwrite($file21, '
<?php require_once("../controller/script.php"); ?>

<div class="row">
</div>

<script src="../assets/datatable/datatables.js"></script>
<script>
  $(document).ready(function() {
    $("#datatable").DataTable();
  });
</script>
<script>
  (function() {
    function scrollH(e) {
      e.preventDefault();
      e = window.event || e;
      let delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
      document.querySelector(".table-responsive").scrollLeft -= (delta * 40);
    }
    if (document.querySelector(".table-responsive").addEventListener) {
      document.querySelector(".table-responsive").addEventListener("mousewheel", scrollH, false);
      document.querySelector(".table-responsive").addEventListener("DOMMouseScroll", scrollH, false);
    }
  })();
</script>
');
fclose($file21);

// =============================================================