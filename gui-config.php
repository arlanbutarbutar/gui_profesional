<?php error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("controller/functions.php");
$_SESSION['page-name'] = "GUI - Configuration Databases";
$_SESSION['page-to'] = "gui-config";
if (isset($_POST['gui-config'])) {
  $date = date("l, d M Y");
  $conn_check = mysqli_connect('localhost', 'root', '', 'mysql');
  mysqli_query($conn_check, "CREATE DATABASE gui");
  mysqli_query($conn_check, "CREATE TABLE gui.data_base (
      id_database int PRIMARY KEY AUTO_INCREMENT,
      id_user varchar(100),
      name varchar(50)
    );");
  mysqli_query($conn_check, "CREATE TABLE gui.menu_navbar (
      id_menu_navbar int PRIMARY KEY AUTO_INCREMENT,
      id_user varchar(100),
      menu_navbar varchar(100),
      url varchar(225),
      created_at datetime DEFAULT CURRENT_TIMESTAMP,
      updated_at datetime DEFAULT CURRENT_TIMESTAMP
    );");
  mysqli_query($conn_check, "CREATE TABLE gui.jenis_app (
      id_jenis_app int PRIMARY KEY AUTO_INCREMENT,
      jenis_app varchar(50)
    );");
  mysqli_query($conn_check, "INSERT INTO gui.jenis_app(jenis_app) VALUES('Website'),('Desktop'),('Mobile (Android)'),('Mobile (IOS)')");
  mysqli_query($conn_check, "CREATE TABLE gui.languages (
      id_language int PRIMARY KEY AUTO_INCREMENT,
      language varchar(50)
    );");
  mysqli_query($conn_check, "INSERT INTO gui.languages(language) VALUES('PHP'),('JAVA'),('Dart'),('dJango'),('Pyton'),('JavaScript'),('Other')");
  mysqli_query($conn_check, "CREATE TABLE gui.project_status (
      id_status int PRIMARY KEY AUTO_INCREMENT,
      status varchar(50)
    );");
  mysqli_query($conn_check, "INSERT INTO gui.project_status(status) VALUES('Encryption'),('Private'),('No Encryption')");
  mysqli_query($conn_check, "CREATE TABLE gui.projects (
      id_project int PRIMARY KEY AUTO_INCREMENT,
      id_user varchar(100),
      image varchar(50),
      name varchar(100),
      pemilik varchar(100),
      id_jenis_app int DEFAULT '1',
      id_language int DEFAULT '1',
      github varchar(225),
      description text,
      id_status int DEFAULT '3',
      route varchar(50),
      progress int,
      domain varchar(225),
      more text,
      created_at datetime DEFAULT CURRENT_TIMESTAMP,
      updated_at datetime DEFAULT CURRENT_TIMESTAMP
    );");
  mysqli_query($conn_check, "ALTER TABLE gui.projects ADD FOREIGN KEY (id_jenis_app) REFERENCES gui.jenis_app(id_jenis_app) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "ALTER TABLE gui.projects ADD FOREIGN KEY (id_language) REFERENCES gui.languages(id_language) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "ALTER TABLE gui.projects ADD FOREIGN KEY (id_status) REFERENCES gui.project_status(id_status) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "CREATE TABLE gui.users (
      id_user varchar(100) PRIMARY KEY,
      id_status int DEFAULT '1',
      id_guide int DEFAULT '1',
      username varchar(100),
      email varchar(75),
      password varchar(75),
      created_at datetime DEFAULT CURRENT_TIMESTAMP,
      updated_at datetime DEFAULT CURRENT_TIMESTAMP
    );");
  mysqli_query($conn_check, "ALTER TABLE gui.projects ADD FOREIGN KEY (id_user) REFERENCES gui.users(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "ALTER TABLE gui.menu_navbar ADD FOREIGN KEY (id_user) REFERENCES gui.users(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "ALTER TABLE gui.data_base ADD FOREIGN KEY (id_user) REFERENCES gui.users(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "INSERT INTO gui.users(id_user, username, email, password) VALUES('$2y$10$vWgHQ0nZVP2u/Q2Z7fvg2OWYQNFdfYfBX106t4V1n2ht98bflHiPS','admin','admin@gui.my.id','$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG')");
  mysqli_query($conn_check, "CREATE TABLE gui.ui (
      id_ui int PRIMARY KEY AUTO_INCREMENT,
      id_user varchar(100),
      progress int DEFAULT '1',
      data_base int DEFAULT '1',
      framework int DEFAULT '1',
      project int DEFAULT '1',
      nav_tools int DEFAULT '1'
    );");
  mysqli_query($conn_check, "ALTER TABLE gui.ui ADD FOREIGN KEY (id_user) REFERENCES gui.users(id_user) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "INSERT INTO gui.ui(id_user) VALUES('$2y$10$vWgHQ0nZVP2u/Q2Z7fvg2OWYQNFdfYfBX106t4V1n2ht98bflHiPS')");
  mysqli_query($conn_check, "CREATE TABLE gui.users_status (
      id_status int PRIMARY KEY AUTO_INCREMENT,
      status varchar(35)
    );");
  mysqli_query($conn_check, "ALTER TABLE gui.users ADD FOREIGN KEY (id_status) REFERENCES gui.users_status(id_status) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "INSERT INTO gui.users_status(id_status, status) VALUES('1','Aktif'), ('2','Tidak Aktif')");
  mysqli_query($conn_check, "CREATE TABLE gui.users_guide (
      id_guide int PRIMARY KEY AUTO_INCREMENT,
      guide varchar(35)
    );");
  mysqli_query($conn_check, "ALTER TABLE gui.users ADD FOREIGN KEY (id_guide) REFERENCES gui.users_guide(id_guide) ON DELETE NO ACTION ON UPDATE NO ACTION;");
  mysqli_query($conn_check, "INSERT INTO gui.users_guide(id_guide, guide) VALUES('1','Tidak Aktif'), ('2','Aktif')");
  $_SESSION['message-success'] = "Konfigurasi telah selesai, silahkan daftarkan akunmu dan mulai project baru kamu!";
  $_SESSION['time-message'] = time();
  header("Location: auth/signin");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("resources/layout/header.php"); ?>
</head>

<body class="az-body" style="font-family: 'Quicksand', sans-serif;background: #cbdcf7;">
  <div class="az-signin-wrapper">
    <div class="az-card-signin border-0 shadow text-center" style="height: 350px;">
      <h1 class="font-weight-bold"><img src="resources/img/GUI.png" style="width: 75px;" alt=""> GUI Config</h1>
      <h4 class="mt-n3">Netmedia Framecode</h4>
      <div class="az-signin-header">
        <h3 style="color: #2078e5;">Selamat datang kembali!</h3>
        <p>Silakan mulai untuk membuat konfigurasi database GUI otomatis di phpMyAdmin kamu!</p>
        <form action="" method="POST">
          <button type="submit" name="gui-config" class="btn btn-primary btn-lg shadow btn-block">Mulai</button>
        </form>
      </div>
    </div>
  </div>
  <?php require_once("resources/layout/footer.php"); ?>
</body>

</html>