<?php if (!isset($_SESSION)) {
  session_start();
}
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
  $uri = 'https://';
} else {
  $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
$servername = "localhost";
$database = "gui";
$username = "root";
$password = "";
$conn_check = mysqli_connect($servername, $username, $password, $database);
if (!$conn_check) {
  error_log('Connection error: ' . mysqli_connect_error());
}
if (!isset($_SESSION['data-user'])) {
  header('Location: ' . $uri . '/auth/signin');
  exit();
}
if (isset($_SESSION['data-user'])) {
  header('Location: ' . $uri . '/');
  exit();
}
