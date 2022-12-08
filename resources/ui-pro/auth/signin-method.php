<?php require_once("../controller/script.php");
if (!empty($_POST['email'])) {
  $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['email']))));
  $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['password']))));
  $account_check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($account_check) > 0) {
    $row = mysqli_fetch_assoc($account_check);
    if ($row['id_active'] == 1) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['data-user'] = [
          'id' => $row['id_user'],
          'role' => $row['id_role'],
          'name' => $row['username'],
          'email' => $row['email'],
          'picture' => $row['img_user'],
        ];
        header('Location: ../views/');
      } else {
        $_SESSION['message-danger'] = "Sorry, your password is wrong.";
        $_SESSION['time-message'] = time();
        header('Location: ' . $_SESSION['page-url']);
        return false;
      }
    } else if ($row['id_active'] == 2) {
      $_SESSION['message-danger'] = "Sorry, your account has not been activated.";
      $_SESSION['time-message'] = time();
      header('Location: ' . $_SESSION['page-url']);
      return false;
    }
  } else {
    $_SESSION['message-danger'] = "Sorry, your account is not registered yet.";
    $_SESSION['time-message'] = time();
    header('Location: ' . $_SESSION['page-url']);
    return false;
  }
}
