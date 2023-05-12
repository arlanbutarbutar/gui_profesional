<?php if (!isset($_SESSION[''])) {
  session_start();
}
require_once("db_connect.php");
require_once("time.php");
require_once("functions.php");
// == Alert ==
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

if (isset($_SESSION['data-user'])) {
  $idUser = valid($_SESSION['data-user']['id']);

  // proccess edit data Users to db
  if (isset($_POST['profile-details'])) {
    if (profileDetails($_POST) > 0) {
      $_SESSION['message-success'] = "Profile details updated successfully";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // query data Users
  $users = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role JOIN users_status ON users.id_active=users_status.id_status WHERE users.id_user!='$idUser' ORDER BY users.id_user DESC");

  // query data Users Role
  $usersRole = mysqli_query($conn, "SELECT * FROM users_role");

  // proccess edit data Users Role to db
  if (isset($_POST['edit-role'])) {
    if (editRole($_POST) > 0) {
      $_SESSION['message-success'] = "Form has been successfully submitted!";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
}
