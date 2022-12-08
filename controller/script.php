<?php error_reporting(~E_NOTICE & ~E_DEPRECATED);
if (!isset($_SESSION[''])) {
  session_start();
}
require_once("db_connect.php");
require_once("time.php");
require_once("functions.php");
if (isset($_SESSION['time-message'])) {
  if ((time() - $_SESSION['time-message']) > 2) {
    if (isset($_SESSION['message-success'])) {
      unset($_SESSION['message-success']);
    }
    if (isset($_SESSION['message-info'])) {
      unset($_SESSION['message-info']);
    }
    if (isset($_SESSION['message-warning'])) {
      unset($_SESSION['message-warning']);
    }
    if (isset($_SESSION['message-danger'])) {
      unset($_SESSION['message-danger']);
    }
    if (isset($_SESSION['message-dark'])) {
      unset($_SESSION['message-dark']);
    }
    unset($_SESSION['time-alert']);
  }
}
if (!isset($_SESSION['data-user'])) {
  if (isset($_POST['masuk'])) {
    if (entryUserAdmin($_POST) > 0) {
      header("Location: ../route.php");
      exit();
    }
  }
  if (isset($_POST['daftar'])) {
    if (createUserAdmin($_POST) > 0) {
      $_SESSION['message-success'] = "Akun kamu telah terdaftar!";
      $_SESSION['time-message'] = time();
      header("Location: signin");
      exit();
    }
  }
}
if (isset($_SESSION['data-user'])) {
  $idUser = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-user']['id']))));
  $nameServer = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-user']['name']))));
  $mailServer = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-user']['mail']))));

  $jenis_app = mysqli_query($conn, "SELECT * FROM jenis_app");
  $lang = mysqli_query($conn, "SELECT * FROM languages");
  $projectView = mysqli_query($conn, "SELECT * FROM projects WHERE id_user='$idUser' AND progress<100 ORDER BY id_project DESC");

  $data1a = 25;
  $result1a = mysqli_query($conn, "SELECT * FROM projects JOIN jenis_app ON projects.id_jenis_app=jenis_app.id_jenis_app JOIN languages ON projects.id_language=languages.id_language JOIN project_status ON projects.id_status=project_status.id_status WHERE projects.id_user='$idUser'");
  $total1a = mysqli_num_rows($result1a);
  $total_page1a = ceil($total1a / $data1a);
  $page1a = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
  $awal_data1a = ($page1a > 1) ? ($page1a * $data1a) - $data1a : 0;
  $projects = mysqli_query($conn, "SELECT * FROM projects JOIN jenis_app ON projects.id_jenis_app=jenis_app.id_jenis_app JOIN languages ON projects.id_language=languages.id_language JOIN project_status ON projects.id_status=project_status.id_status WHERE projects.id_user='$idUser' ORDER BY projects.id_project DESC LIMIT $awal_data1a, $data1a");
  if (isset($_POST['add-project'])) {
    if (createProject($_POST) > 0) {
      $_SESSION['message-success'] = "Data projek berhasil ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-warning'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['edit-project'])) {
    if (editProject($_POST) > 0) {
      $_SESSION['message-success'] = "Data projek berhasil diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-warning'] = "Maaf, anda tidak mengubah data apapun.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['delete-project'])) {
    if (deleteProject($_POST) > 0) {
      $_SESSION['message-success'] = "Data projek berhasil dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-warning'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  $menuNavbar = mysqli_query($conn, "SELECT * FROM menu_navbar WHERE id_user='$idUser' ORDER BY id_menu_navbar DESC");
  if (isset($_POST['add-menu-navbar'])) {
    if (addMenuNavbar($_POST) > 0) {
      $_SESSION['message-success'] = "Data menu berhasil ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-success'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['hapus-menu'])) {
    if (hapusMenu($_POST) > 0) {
      $_SESSION['message-success'] = "Data menu berhasil ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-success'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  $databases = mysqli_query($conn, "SELECT * FROM data_base WHERE id_user='$idUser'");
  if (isset($_POST['code-project'])) {
    $_SESSION['route'] = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['route']))));
    header("Location: views");
    exit();
  }
  if (isset($_POST['db-wordpress'])) {
    if (dbWordpress($_POST) > 0) {
      $_SESSION['message-success'] = "Database wordpress telah dibuat (Default: db_wordpress).";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-warning'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  $db_wordpress = mysqli_query($conn, "SELECT * FROM data_base WHERE name='db_wordpress'");
  $ui = mysqli_query($conn, "SELECT * FROM ui WHERE id_user='$idUser'");
  if (mysqli_num_rows($ui) == 0) {
    $progress = 1;
    $data_base = 1;
    $framework = 1;
    $project = 1;
    $nav_tools = 1;
  } else if (mysqli_num_rows($ui) > 0) {
    while ($data = mysqli_fetch_assoc($ui)) {
      $progress = $data['progress'];
      $data_base = $data['data_base'];
      $framework = $data['framework'];
      $project = $data['project'];
      $nav_tools = $data['nav_tools'];
    }
  }
  if (isset($_POST['copy-gui-old'])) {
    if (copy_gui_old($_POST) > 0) {
      $_SESSION['message-success'] = "Database GUI berhasil di salin ke versi terbaru 27.2.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    } else {
      $_SESSION['message-warning'] = "Maaf, sepertinya ada kesalahan saat menyambungkan ke database.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  $view_db=mysqli_query($conn, "SELECT * FROM data_base WHERE id_user='$idUser' ORDER BY name ASC");
}
if (isset($_SESSION['route'])) {
  $route = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['route']))));
}
