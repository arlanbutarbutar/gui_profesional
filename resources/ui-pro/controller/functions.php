<?php if (!isset($_SESSION)) {
  session_start();
}
function valid($value)
{
  global $conn;
  $valid = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $value))));
  return $valid;
}
if (isset($_SESSION['data-user'])) {

  function imgBB($image, $name = null)
  {
    $api_key = ''; // API imgBB https://imgbb.com
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $api_key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $file_name = ($name) ? $name . '.' . $extension : $image['name'];
    $data = array('image' => base64_encode(file_get_contents($image['tmp_name'])), 'name' => $file_name);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      return 'Error:' . curl_error($ch);
    } else {
      return json_decode($result, true);
    }
    curl_close($ch);
  }

  function profileDetails($data)
  {
    global $conn, $idUser;
    $name = valid($data['name']);
    if (!empty($_FILES['avatar'])) {
      $namaFile = $_FILES["avatar"]["name"];
      $encrypt = crc32($namaFile);
      $return = imgBB($_FILES['avatar'], $encrypt);
      $img = $return['data']['display_url'];
    } else {
      $img = 'https://i.ibb.co/PYwPGXd/user.png';
    }
    $sql = "UPDATE users SET username = '$name', img_user = '$img' WHERE id_user = '$idUser'";
    mysqli_query($conn, $sql);
    $_SESSION['data-user']['name'] = $name;
    $_SESSION['data-user']['picture'] = $img;
    return mysqli_affected_rows($conn);
  }

  function editRole($data)
  {
    global $conn;
    $id_user = valid($data['id-user']);
    $id_role = valid($_POST['user-role']);
    mysqli_query($conn, "UPDATE users SET id_role='$id_role' WHERE id_user='$id_user'");
    return mysqli_affected_rows($conn);
  }
}
