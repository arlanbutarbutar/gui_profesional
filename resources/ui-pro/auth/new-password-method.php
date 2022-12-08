<?php require_once("../controller/script.php");
if (!empty($_POST['password'])) {
  $en = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['en']))));
  $eu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['eu']))));
  $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['password']))));

  // check account
  $result = mysqli_query($conn, "SELECT * FROM users WHERE en_user = '$eu'");
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if(password_verify($row['email'], $en)){
      $password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($conn, "UPDATE users SET id_active = '1', password = '$password' WHERE en_user = '$eu'");
      $response = array('status' => true);
    } else {
      $response = array('status' => false);
    }
  }
  echo json_encode($response);
}