<?php require_once("../controller/script.php");
if (!isset($_SESSION['data-user'])) {
  header("Location: ../auth/signin.php");
  exit();
}
