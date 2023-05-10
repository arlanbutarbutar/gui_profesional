<?php if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['data-gui'])) {
  function createUserAdmin($data)
  {
    global $conn;
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['username']))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkEmail) > 0) {
      $_SESSION['message-danger'] = "Maaf, email yang kamu masukan sudah ada.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $id_user = password_hash($email, PASSWORD_DEFAULT);
    $pass = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $check_lenght_pass = strlen($pass);
    if ($check_lenght_pass < 8) {
      $_SESSION['message-danger'] = "Maaf, kata sandi terlalu pendek. (Min: 8)!";
      $_SESSION['time-message'] = time();
      return false;
    }
    $password = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO users(id_user,username,email,password) VALUES('$id_user','$username','$email','$password')");
    mysqli_query($conn, "INSERT INTO ui(id_user,framework) VALUES('$id_user','2')");
    return mysqli_affected_rows($conn);
  }
  function entryUserAdmin($data)
  {
    global $conn;
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $users = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($users) == 0) {
      $_SESSION['message-danger'] = "Maaf, akun email yang anda masukan belum terdaftar.";
      $_SESSION['time-message'] = time();
      return false;
    } else if (mysqli_num_rows($users) > 0) {
      $row = mysqli_fetch_assoc($users);
      if ($row['id_status'] == 2) {
        $_SESSION['message-danger'] = "Maaf, akun anda belum diverifikasi, silakan cek email anda untuk memverifikasi akun anda. Jika tidak ada di inbox, cek di spam anda!";
        $_SESSION['time-message'] = time();
        return false;
      } else if ($row['id_status'] == 1) {
        if (password_verify($password, $row['password'])) {
          $_SESSION['data-gui'] = [
            'id' => $row['id_user'],
            'name' => $row['username'],
            'mail' => $row['email'],
            'date' => $row['created_at']
          ];
          return mysqli_affected_rows($conn);
        } else {
          $_SESSION['message-danger'] = "Maaf, kata sandi yang Anda masukkan tidak cocok.";
          $_SESSION['time-message'] = time();
          return false;
        }
      }
    }
  }
  // function __($data){global $conn;}
}
if (isset($_SESSION['data-gui']) && $_SESSION['data-gui'] != "") {
  function addMenuNavbar($data)
  {
    global $conn, $idUser;
    $name = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['name']))));
    $url = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['url']))));
    mysqli_query($conn, "INSERT INTO menu_navbar(id_user,menu_navbar,url) VALUES('$idUser','$name','$url')");
    return mysqli_affected_rows($conn);
  }
  function hapusMenu($data)
  {
    global $conn;
    $id_menu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-menu']))));
    mysqli_query($conn, "DELETE FROM menu_navbar WHERE id_menu_navbar='$id_menu'");
    return mysqli_affected_rows($conn);
  }
  function createProject($data)
  {
    global $conn, $idUser;
    $name = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['name']))));
    $name_db = str_replace(" ", "_", $name);
    $name_db = strtolower($name_db);
    $checkName = mysqli_query($conn, "SELECT * FROM projects WHERE name='$name'");
    if (mysqli_num_rows($checkName) > 0) {
      $_SESSION['message-danger'] = "Maaf, nama projek anda sudah terpakai.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $pemilik = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pemilik']))));
    $jenis_app = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenis-app']))));
    $language = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['language']))));
    $deskripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['deskripsi']))));
    $route = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['route']))));
    $route = str_replace(" ", "-", $route);
    $route = strtolower($route);
    $route_name = $route;
    $route = "apps/" . $route;
    $checkRoute = mysqli_query($conn, "SELECT * FROM projects WHERE route='$route'");
    if (mysqli_num_rows($checkRoute) > 0) {
      $_SESSION['message-danger'] = "Maaf, link rute aplikasi anda terdapat duplikasi silakan pilih rute yang lain.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $progress = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['progress']))));
    // Adding a new work project folder
    // Checking folder
    if (is_dir($route)) {
      $_SESSION['message-danger'] = "Maaf, route kamu sudah ada silakan buat route untuk folder project kamu yang baru.";
      $_SESSION['time-message'] = time();
      return false;
    }
    if (!mkdir($route, 0777, true)) {
      $_SESSION['message-danger'] = "Maaf, folder project yang kamu buat gagal.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $jenis_console = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenis-console']))));
    if ($jenis_console == 1) {
      // Adding folder
      mkdir($route . '/assets/css', 0777, true);
      mkdir($route . '/assets/datatable', 0777, true);
      mkdir($route . '/assets/images', 0777, true);
      mkdir($route . '/assets/js', 0777, true);
      mkdir($route . '/assets/mdi/css', 0777, true);
      mkdir($route . '/assets/mdi/fonts', 0777, true);
      mkdir($route . '/assets/sweetalert/dist', 0777, true);
      mkdir($route . '/assets/ti-icons/css', 0777, true);
      mkdir($route . '/assets/ti-icons/fonts', 0777, true);
      mkdir($route . '/assets/typicons', 0777, true);
      mkdir($route . '/auth', 0777, true);
      mkdir($route . '/controller', 0777, true);
      mkdir($route . '/resources', 0777, true);
      mkdir($route . '/vendor', 0777, true);
      mkdir($route . '/views', 0777, true);
      require_once("basic-files.php");
      // copy files
      copy('resources/ui-basic/images/user.png', $route . '/assets/images/user.png');
      copy('resources/ui-basic/css/feather.css', $route . '/assets/css/feather.css');
      copy('resources/ui-basic/css/materialdesignicons.min.css', $route . '/assets/css/materialdesignicons.min.css');
      copy('resources/ui-basic/css/themify-icons.css', $route . '/assets/css/themify-icons.css');
      copy('resources/ui-basic/css/typicons.css', $route . '/assets/css/typicons.css');
      copy('resources/ui-basic/css/simple-line-icons.css', $route . '/assets/css/simple-line-icons.css');
      copy('resources/ui-basic/css/vendor.bundle.base.css', $route . '/assets/css/vendor.bundle.base.css');
      copy('resources/ui-basic/css/select.dataTables.min.css', $route . '/assets/css/select.dataTables.min.css');
      copy('resources/ui-basic/css/style-dash.css', $route . '/assets/css/style-dash.css');
      copy('resources/ui-basic/datatable/datatables.css', $route . '/assets/datatable/datatables.css');
      copy('resources/ui-basic/datatable/datatables.js', $route . '/assets/datatable/datatables.js');
      copy('resources/ui-basic/js/vendor.bundle.base.js', $route . '/assets/js/vendor.bundle.base.js');
      copy('resources/ui-basic/js/Chart.min.js', $route . '/assets/js/Chart.min.js');
      copy('resources/ui-basic/js/bootstrap-datepicker.min.js', $route . '/assets/js/bootstrap-datepicker.min.js');
      copy('resources/ui-basic/js/progressbar.min.js', $route . '/assets/js/progressbar.min.js');
      copy('resources/ui-basic/js/off-canvas.js', $route . '/assets/js/off-canvas.js');
      copy('resources/ui-basic/js/hoverable-collapse.js', $route . '/assets/js/hoverable-collapse.js');
      copy('resources/ui-basic/js/template.js', $route . '/assets/js/template.js');
      copy('resources/ui-basic/js/settings.js', $route . '/assets/js/settings.js');
      copy('resources/ui-basic/js/todolist.js', $route . '/assets/js/todolist.js');
      copy('resources/ui-basic/js/jquery.cookie.js', $route . '/assets/js/jquery.cookie.js');
      copy('resources/ui-basic/js/dashboard.js', $route . '/assets/js/dashboard.js');
      copy('resources/ui-basic/js/Chart.roundedBarCharts.js', $route . '/assets/js/Chart.roundedBarCharts.js');
      copy('resources/ui-basic/sweetalert/dist/sweetalert2.all.min.js', $route . '/assets/sweetalert/dist/sweetalert2.all.min.js');
      copy('resources/ui-basic/resources/auth-footer.php', $route . '/resources/auth-footer.php');
      $typicons = array_filter(glob("resources/ui-basic/typicons/*"), "is_file");
      foreach ($typicons as $f) {
        copy($f, $route . '/assets/typicons/' . basename($f));
      }
      copy('resources/ui-basic/ti-icons/css/themify-icons.css', $route . '/assets/ti-icons/css/themify-icons.css');
      $ti_icons = array_filter(glob("resources/ui-basic/ti-icons/fonts/*"), "is_file");
      foreach ($ti_icons as $f) {
        copy($f, $route . '/assets/ti-icons/fonts/' . basename($f));
      }
      $mdi_css = array_filter(glob("resources/ui-basic/mdi/css/*"), "is_file");
      foreach ($mdi_css as $f) {
        copy($f, $route . '/assets/mdi/css/' . basename($f));
      }
      $mdi_fonts = array_filter(glob("resources/ui-basic/mdi/fonts/*"), "is_file");
      foreach ($mdi_fonts as $f) {
        copy($f, $route . '/assets/mdi/fonts/' . basename($f));
      }
      // create databases
      mysqli_query($conn, "CREATE DATABASE $name_db");
      // create tables
      mysqli_query($conn, "CREATE TABLE " . $name_db . ".users (
        id_user int PRIMARY KEY AUTO_INCREMENT,
        id_role int DEFAULT '2',
        username varchar(100),
        email varchar(75),
        password varchar(75),
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP
      );");
      mysqli_query($conn, "INSERT INTO " . $name_db . ".users(id_role, username, email, password) VALUES('1','admin','admin@gmail.com','$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG')");
      mysqli_query($conn, "CREATE TABLE " . $name_db . ".users_role (
        id_role int PRIMARY KEY AUTO_INCREMENT,
        role varchar(35)
      );");
      mysqli_query($conn, "INSERT INTO " . $name_db . ".users_role(role) VALUES('Admin'), ('Owner')");
    } else if ($jenis_console == 2) {
      // Adding folder
      mkdir($route . '/assets', 0777, true);
      mkdir($route . '/auth', 0777, true);
      mkdir($route . '/controller', 0777, true);
      mkdir($route . '/resources', 0777, true);
      mkdir($route . '/vendor', 0777, true);
      mkdir($route . '/views', 0777, true);
      require_once("profesional-files.php");
      // copy files
      copy('resources/ui-pro/404.html', $route . '/404.html');
      copy('resources/ui-pro/406.html', $route . '/406.html');
      copy('resources/ui-pro/auth/composer.json', $route . '/auth/composer.json');
      copy('resources/ui-pro/auth/composer.lock', $route . '/auth/composer.lock');
      copy('resources/ui-pro/auth/config.php', $route . '/auth/config.php');
      copy('resources/ui-pro/auth/index.php', $route . '/auth/index.php');
      copy('resources/ui-pro/auth/new-password-method.php', $route . '/auth/new-password-method.php');
      copy('resources/ui-pro/auth/new-password.php', $route . '/auth/new-password.php');
      copy('resources/ui-pro/auth/password-reset.php', $route . '/auth/password-reset.php');
      copy('resources/ui-pro/auth/redirect.php', $route . '/auth/redirect.php');
      copy('resources/ui-pro/auth/signin-method.php', $route . '/auth/signin-method.php');
      copy('resources/ui-pro/auth/signout.php', $route . '/auth/signout.php');
      copy('resources/ui-pro/controller/compress-image.php', $route . '/controller/compress-image.php');
      copy('resources/ui-pro/controller/functions.php', $route . '/controller/functions.php');
      copy('resources/ui-pro/controller/mail.php', $route . '/controller/mail.php');
      copy('resources/ui-pro/controller/script.php', $route . '/controller/script.php');
      copy('resources/ui-pro/controller/time.php', $route . '/controller/time.php');
      copy('resources/ui-pro/controller/time.php', $route . '/controller/time.php');
      $auth = array_filter(glob("resources/ui-pro/auth/*"), "is_file");
      foreach ($auth as $f) {
        copy($f, $route . '/auth/' . basename($f));
      }
      $resources = array_filter(glob("resources/ui-pro/resources/*"), "is_file");
      foreach ($resources as $f) {
        copy($f, $route . '/resources/' . basename($f));
      }
      $views = array_filter(glob("resources/ui-pro/views/*"), "is_file");
      foreach ($views as $f) {
        copy($f, $route . '/views/' . basename($f));
      }
      // loop and copy folders or files
      $folder = "resources/ui-pro/";
      $page = 10;
      // Jika ingin menampilkan pesan error 'Folder tidak ditemukan ...!'
      // $open = opendir($folder) or die('Folder tidak ditemukan ...!');
      while ($folder = readdir($open)) {
        if ($folder != '.' && $folder != '..') {
          $folders[] = $folder;
        }
      }
      $jumlah_folders = count($folders);
      for ($x = 0; $x < (0 + $page); $x++) {
        if ($x < $jumlah_folders) {
          $dot = preg_quote(".");
          if (!preg_match("/" . $dot . "/i", $folders[$x])) {
            $take_folders = ucwords($folders[$x]);
          }
        }
      }
      // create databases
      mysqli_query($conn, "CREATE DATABASE $name_db");
      // create tables
      mysqli_query($conn, "CREATE TABLE " . $name_db . ".users (
        id_user int PRIMARY KEY AUTO_INCREMENT,
        id_role int DEFAULT '2',
        id_active int DEFAULT '2',
        en_user varchar(100),
        img_user varchar(100) DEFAULT 'https://i.ibb.co/PYwPGXd/user.png',
        username varchar(50),
        email varchar(100),
        password varchar(100),
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP
      );");
      $eu = crc32("admin@gmail.com");
      mysqli_query($conn, "INSERT INTO " . $name_db . ".users(id_role, id_active, en_user, username, email, password) VALUES('1', '1', '" . $eu . "', 'admin','admin@gmail.com','$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG')");
      mysqli_query($conn, "CREATE TABLE " . $name_db . ".users_role (
        id_role int PRIMARY KEY AUTO_INCREMENT,
        role varchar(50)
      );");
      mysqli_query($conn, "INSERT INTO " . $name_db . ".users_role(role) VALUES('Administrator'), ('User')");
      mysqli_query($conn, "CREATE TABLE " . $name_db . ".users_status (
        id_status int PRIMARY KEY AUTO_INCREMENT,
        status varchar(50)
      );");
      mysqli_query($conn, "INSERT INTO " . $name_db . ".users_status(status) VALUES('Active'), ('No Active')");
      mysqli_query($conn_check, "ALTER TABLE " . $name_db . ".users ADD FOREIGN KEY (id_role) REFERENCES " . $name_db . ".users_role(id_role) ON DELETE NO ACTION ON UPDATE NO ACTION;");
      mysqli_query($conn_check, "ALTER TABLE " . $name_db . ".users ADD FOREIGN KEY (id_active) REFERENCES " . $name_db . ".users_status(id_status) ON DELETE NO ACTION ON UPDATE NO ACTION;");
    }
    mysqli_query($conn, "INSERT INTO data_base(id_user,name) VALUES('$idUser','$name_db')");
    mysqli_query($conn, "INSERT INTO projects(id_user,name,pemilik,id_jenis_app,id_language,description,route,progress) VALUES('$idUser','$name','$pemilik','$jenis_app','$language','$deskripsi','$route','$progress')");
    return mysqli_affected_rows($conn);
  }
  function editProject($data)
  {
    global $conn, $time;
    $id_project = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-project']))));
    $name = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['name']))));
    $nameOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nameOld']))));
    if ($name != $nameOld) {
      $checkName = mysqli_query($conn, "SELECT * FROM projects WHERE name='$name'");
      if (mysqli_num_rows($checkName) > 0) {
        $_SESSION['message-danger'] = "Maaf, nama projek anda sudah terpakai.";
        $_SESSION['time-message'] = time();
        return false;
      }
    }
    $pemilik = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['pemilik']))));
    $jenis_app = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenis-app']))));
    $language = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['language']))));
    $github = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['github']))));
    $status = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['status']))));
    $route = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['route']))));
    $route = str_replace(" ", "-", $route);
    $route = strtolower($route);
    $route = "apps/" . $route;
    $routeOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['routeOld']))));
    if ($route != $routeOld) {
      rename($routeOld, $route);
      $checkRoute = mysqli_query($conn, "SELECT * FROM projects WHERE route='$route'");
      if (mysqli_num_rows($checkRoute) > 0) {
        $_SESSION['message-danger'] = "Maaf, link rute aplikasi anda terdapat duplikasi silakan pilih rute yang lain.";
        $_SESSION['time-message'] = time();
        return false;
      }
    }
    $progress = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['progress']))));
    $progressOld = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['progressOld']))));
    if (empty($progress)) {
      $progress = $progressOld;
    }
    $deskripsi = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['deskripsi']))));
    $more = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['more']))));
    $domain = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['domain']))));
    $updated_at = date("Y-m-d " . $time);
    mysqli_query($conn, "UPDATE projects SET name='$name', pemilik='$pemilik', id_jenis_app='$jenis_app', id_language='$language', github='$github', description='$deskripsi', id_status='$status', route='$route', progress='$progress', domain='$domain', more='$more', updated_at='$updated_at' WHERE id_project='$id_project'");
    return mysqli_affected_rows($conn);
  }
  function deleteProject($data)
  {
    global $conn;
    $id_project = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-project']))));
    $checkID = mysqli_query($conn, "SELECT * FROM projects WHERE id_project='$id_project'");
    if (mysqli_num_rows($checkID) == 0) {
      $_SESSION['message-danger'] = "Maaf, sepertinya ada kesalahan dalam pemanggilan data.";
      $_SESSION['time-message'] = time();
      return false;
    }
    $route = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['route']))));
    destroyDir($route);
    $name = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['name']))));
    $name_db = str_replace(" ", "_", $name);
    $name_db = strtolower($name_db);
    mysqli_query($conn, "DELETE FROM data_base WHERE name='$name_db'");
    mysqli_query($conn, "DROP DATABASE $name_db");
    mysqli_query($conn, "DELETE FROM projects WHERE id_project='$id_project'");
    return mysqli_affected_rows($conn);
  }
  function destroyDir($dir, $virtual = false)
  {
    $ds = DIRECTORY_SEPARATOR;
    $dir = $virtual ? realpath($dir) : $dir;
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
    if (is_dir($dir) && $handle = opendir($dir)) {
      while ($file = readdir($handle)) {
        if ($file == '.' || $file == '..') {
          continue;
        } elseif (is_dir($dir . $ds . $file)) {
          destroyDir($dir . $ds . $file);
        } else {
          unlink($dir . $ds . $file);
        }
      }
      closedir($handle);
      rmdir($dir);
      return true;
    } else {
      return false;
    }
  }
  function dbWordpress()
  {
    global $conn, $idUser;
    mysqli_query($conn, "CREATE DATABASE db_wordpress");
    mysqli_query($conn, "INSERT INTO data_base(id_user,name) VALUES('$idUser','db_wordpress')");
    return mysqli_affected_rows($conn);
  }
  function copy_gui_old($data)
  {
    global $conn;
    $stmt = $conn->query("SHOW DATABASES");
    while ($row = $stmt->fetch_assoc()) {
      if ($row['Database'] == 'gui_my_id') {
        $db = $row['Database'];
        $conn_old = mysqli_connect('localhost', 'root', '', $db);
        $t_users = mysqli_query($conn_old, "SELECT * FROM t_users");
        if (mysqli_num_rows($t_users) > 0) {
          while ($row = mysqli_fetch_assoc($t_users)) {
            $id_user = $row['id_user'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $created_at = date_create($row['date']);
            $created_at = date_format($created_at, 'Y-m-d h:i:a');
            mysqli_query($conn, "INSERT INTO users(id_user,id_status,username,email,password,created_at) VALUES('$id_user','1','$username','$email','$password','$created_at')");
          }
        }
        $t_databases = mysqli_query($conn_old, "SELECT * FROM t_databases");
        if (mysqli_num_rows($t_databases) > 0) {
          while ($row = mysqli_fetch_assoc($t_databases)) {
            $id_database = $row['id_database'];
            $checkID = mysqli_query($conn, "SELECT * FROM data_base WHERE id_database='$id_database'");
            if (mysqli_num_rows($checkID) > 0) {
              $id_database = $id_database + 1;
            }
            $id_user = $row['id_user'];
            $name = $row['name'];
            mysqli_query($conn, "INSERT INTO data_base(id_database,id_user,name) VALUES('$id_database','$id_user','$name')");
          }
        }
        $t_projects = mysqli_query($conn_old, "SELECT * FROM t_projects");
        if (mysqli_num_rows($t_projects) > 0) {
          while ($row = mysqli_fetch_assoc($t_projects)) {
            $id_project = $row['id_project'];
            $checkID = mysqli_query($conn, "SELECT * FROM projects WHERE id_project='$id_project'");
            if (mysqli_num_rows($checkID) > 0) {
              $id_project = $id_project + 1;
            }
            $id_user = $row['id_user'];
            $name = $row['name'];
            $route = $row['route'];
            $progress = $row['progress'];
            $domain = $row['domain'];
            $created_at = date_create($row['date']);
            $created_at = date_format($created_at, 'Y-m-d h:i:a');
            mysqli_query($conn, "INSERT INTO projects(id_project,id_user,name,route,progress,domain,created_at) VALUES('$id_project','$id_user','$name','$route','$progress','$domain','$created_at')");
          }
        }
        $t_menu_navbar = mysqli_query($conn_old, "SELECT * FROM t_menu_navbar");
        if (mysqli_num_rows($t_menu_navbar) > 0) {
          while ($row = mysqli_fetch_assoc($t_menu_navbar)) {
            $id_menu_navbar = $row['id_menu_navbar'];
            $checkID = mysqli_query($conn, "SELECT * FROM t_menu_navbar WHERE id_menu_navbar='$id_menu_navbar'");
            if (mysqli_num_rows($checkID) > 0) {
              $id_menu_navbar = $id_menu_navbar + 1;
            }
            $id_user = $row['id_user'];
            $menu_navbar = $row['menu_navbar'];
            $url = $row['url'];
            mysqli_query($conn, "INSERT INTO menu_navbar(id_menu_navbar,id_user,menu_navbar,url) VALUES('$id_menu_navbar','$id_user','$menu_navbar','$url')");
          }
        }
        mysqli_query($conn, "DROP DATABASE $db");
      }
    }
    return mysqli_affected_rows($conn);
  }
  // function __($data){global $conn;}
}
