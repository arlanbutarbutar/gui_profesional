<?php require_once("../controller/script.php");
if (isset($_SESSION['data-gui'])) {
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: ../route.php");
  exit;
}
