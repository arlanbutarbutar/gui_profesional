<?php
require_once("../controller/script.php");
if (!empty($_POST['currentpassword'])) {
  $currentpassword = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['currentpassword']))));
  $newpassword = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['newpassword']))));
  $id = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-user']['id']))));

  // check if email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'");
  $row = mysqli_fetch_assoc($result);
  if (password_verify($currentpassword, $row['password'])) {
    $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
    // insert user to database
    mysqli_query($conn, "UPDATE users SET password= '$newpassword' WHERE id_user = '$id'");
    $response = array(
      'status' => true,
      'message' => 'Successfully changed password.',
    );
  } else {
    $response = array(
      'status' => false,
      'message' => 'The password you entered is incorrect.',
    );
  }
  echo json_encode($response);
}
