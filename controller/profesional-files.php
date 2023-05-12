<?php
$petik = "'";
// file /.htaccess
$file1 = ".htaccess";
$file1 = fopen($route . '/' . $file1, "w");
fwrite($file1, '<IfModule mod_security.c>
  SecRuleEngine Off 
  SecFilterInheritance Off 
  SecFilterEngine Off
  SecFilterScanPOST Off
</IfModule>
<IfModule mod_rewrite.c>
  RewriteEngine on 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME}.php -f 
  RewriteRule ^(.*)$ $1.php
</IfModule>
<IfModule mod_rewrite.c>
  RewriteEngine on 
  RewriteCond %{REQUEST_FILENAME} !-d 
  RewriteCond %{REQUEST_FILENAME}.html -f 
  RewriteRule ^(.*)$ $1.html
</IfModule>
ErrorDocument 404 http://127.0.0.1:1010/apps/' . $route_name . '/
IndexIgnore *.gif *.zip *.txt *.png *.php *.mp4
');
fclose($file1);

// file /index.php
$file2 = "index.php";
$file2 = fopen($route . '/' . $file2, "w");
fwrite($file2, '<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>' . $name . '</title>

    <style type="text/css">
      ::selection {
        background-color: #e13300;
        color: white;
      }
      ::-moz-selection {
        background-color: #e13300;
        color: white;
      }

      body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4f5155;
      }

      a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
      }

      h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #d0d0d0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
      }

      code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #d0d0d0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
      }

      #body {
        margin: 0 15px 0 15px;
      }

      p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #d0d0d0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
      }

      #container {
        margin: 10px;
        border: 1px solid #d0d0d0;
        box-shadow: 0 0 8px #d0d0d0;
      }
    </style>
  </head>
  <body>
    <div id="container">
      <h1>Project ' . $name . '</h1>

      <div id="body">
        <p>
          Halaman yang Anda lihat dibuat secara dinamis oleh Netmedia Framecode.
        </p>
        <p>
          Tampilan <strong>UI (User Interface)</strong> dan <strong>Console</strong> dapat anda ubah dengan melihat berbagai macam template dari vendor Netmedia Framecode
        </p>
        <code><i class="bi bi-list"></i>
          <a href="https://www.free-css.com/free-css-templates" target="_blank" style="text-decoration: none;">Template UI</a>
        </code>
        <code><i class="bi bi-list"></i>
          <a href="https://freshdesignweb.com/free-admin-templates/" target="_blank" style="text-decoration: none;">Template Console</a>
        </code>
        <p>
          Pada Versi Profesional ada beberapa komponen yang harus di lengkapi dengan mengikuti langkah berikut:
        </p>
        <code>
          <h4>assets/</h4>
          <ol>
            <li>Masuk pada folder <strong>htdocs/resources/ui-pro/assets/</strong>.</li>
            <li>Jika sudah, copy semua file dan folder yang ada.</li>
            <li>Masukan ke dalam folder projek yang sudah dibuat di <strong>htdocs/apps/' . $route_name . '/assets/</strong>.</li>
          </ol>
          <h4>auth/vendor/</h4>
          <ol>
            <li>Masuk pada folder <strong>htdocs/resources/ui-pro/auth/</strong>.</li>
            <li>Jika sudah, copy folder vendor saja.</li>
            <li>Masukan ke dalam folder projek yang sudah dibuat di <strong>htdocs/apps/' . $route_name . '/auth/</strong>.</li>
          </ol>
          <h4>selesai.</h4>
        </code>
        <p>
          Jika anda ingin melanjutkan ke <strong>Console</strong> bisa klik link dibawah ini:
        </p>
        <code><i class="bi bi-list"></i>
          <a href="auth/signin" style="text-decoration: none;">auth/signin</a>
        </code>
      </div>
    </div>
  </body>
</html>
');
fclose($file2);

// file /robots.txt
$file3 = "robots.txt";
$file3 = fopen($route . '/' . $file3, "w");
fwrite($file3, '# start of file
user-agent: *
disallow: /assets/
disallow: /auth/
disallow: /controller/
disallow: /resources/
disallow: /vendor/
disallow: /views/
disallow: /.htaccess
disallow: /404.html
disallow: /406.html
disallow: /error_log
allow: /index.php
allow: /
');
fclose($file3);

// file /error_log
$file4 = "error_log";
$file4 = fopen($route . '/' . $file4, "w");
fwrite($file4, '
');
fclose($file4);

// =============================================================

// file /auth/password-reset-method.php
$file5 = "password-reset-method.php";
$file5 = fopen($route . '/auth/' . $file5, "w");
fwrite($file5, '<?php require_once("../controller/script.php");
if (!empty($_POST["email"])) {
  $email = valid($_POST["email"]);
  $account_check = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
  if (mysqli_num_rows($account_check) > 0) {
    $account = mysqli_fetch_assoc($account_check);

    // send massage verification to email
    $eu = crc32($email);
    $en_user = password_hash($email, PASSWORD_DEFAULT);
    require_once("../controller/mail.php");
    $to       = $email;
    $subject  = "Password Reset - ' . $name . '";
    $message  = "<!doctype html>
        <html>
            <head>
                <meta name=' . $petik . 'viewport' . $petik . ' content=' . $petik . 'width=device-width' . $petik . '>
                <meta http-equiv=' . $petik . 'Content-Type' . $petik . ' content=' . $petik . 'text/html; charset=UTF-8' . $petik . '>
                <title>Password Reset - ' . $name . '</title>
                <style>
                    @media only screen and (max-width: 620px) {
                        table[class=' . $petik . 'body' . $petik . '] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important;}
                        table[class=' . $petik . 'body' . $petik . '] p,
                        table[class=' . $petik . 'body' . $petik . '] ul,
                        table[class=' . $petik . 'body' . $petik . '] ol,
                        table[class=' . $petik . 'body' . $petik . '] td,
                        table[class=' . $petik . 'body' . $petik . '] span,
                        table[class=' . $petik . 'body' . $petik . '] a {
                            font-size: 16px !important;}
                        table[class=' . $petik . 'body' . $petik . '] .wrapper,
                        table[class=' . $petik . 'body' . $petik . '] .article {
                            padding: 10px !important;}
                        table[class=' . $petik . 'body' . $petik . '] .content {
                            padding: 0 !important;}
                        table[class=' . $petik . 'body' . $petik . '] .container {
                            padding: 0 !important;
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important;}
                        table[class=' . $petik . 'body' . $petik . '] .btn table {
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .btn a {
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important;}}
                    @media all {
                        .ExternalClass {
                            width: 100%;}
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;}
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important;
                        .btn-primary table td:hover {
                            background-color: #d5075d !important;}
                        .btn-primary a:hover {
                            background-color: #000 !important;
                            border-color: #000 !important;
                            color: #fff !important;}}
                </style>
            </head>
            <body class style=' . $petik . 'background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' . $petik . '>
                <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'body' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . ' bgcolor=' . $petik . '#e1e3e5' . $petik . '>
                <tr>
                    <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                    <td class=' . $petik . 'container' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' . $petik . ' width=' . $petik . '580' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                    <div class=' . $petik . 'header' . $petik . ' style=' . $petik . 'padding: 20px 0;' . $petik . '>
                        <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                        <tr>
                            <td class=' . $petik . 'align-center' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                            <p style=' . $petik . 'font-family: sans-serif; font-weight: normal; margin: 0; margin-bottom: 15px; text-decoration: none; color: #11202f; font-size: 20px;' . $petik . '>' . $name . '</p>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <div class=' . $petik . 'content' . $petik . ' style=' . $petik . 'box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;' . $petik . '>
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role=' . $petik . 'presentation' . $petik . ' class=' . $petik . 'main' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
            
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class=' . $petik . 'wrapper' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                            <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                <tr>
                                <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                    <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>Hi " . $account[' . $petik . 'username' . $petik . '] . ",</p>
                                    <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>If you are sure you want to change your password, you can click the Change Password button below.</p>
                                    <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'btn btn-primary' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                    <tbody>
                                        <tr>
                                        <td align=' . $petik . 'left' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                            <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;' . $petik . '>
                                            <tbody>
                                                <tr>
                                                <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' bgcolor=' . $petik . '#ffffff' . $petik . ' align=' . $petik . 'center' . $petik . '> <a href=' . $petik . 'http://$_SERVER[HTTP_HOST]/apps/' . $route_name . '/auth/new-password?en=" . $en_user . "&eu=" . $eu . "' . $petik . ' target=' . $petik . '_blank' . $petik . ' style=' . $petik . 'background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;' . $petik . '>Change Password</a> </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <small>Warning! This is an automated message so you cannot reply to this message.</small>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
            
                        <!-- START FOOTER -->
                        <div class=' . $petik . 'footer' . $petik . ' style=' . $petik . 'clear: both; margin-top: 10px; text-align: center; width: 100%;' . $petik . '>
                        <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                            <tr>
                            <td class=' . $petik . 'content-block powered-by' . $petik . ' style=' . $petik . 'font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                                Powered by <a href=' . $petik . 'https://www.netmedia-framecode.com' . $petik . ' style=' . $petik . 'color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;' . $petik . '>Netmedia Framecode</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->
            
                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                    </td>
                    <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                </tr>
                </table>
            </body>
        </html>";
    smtp_mail($to, $subject, $message, ' . $petik . '' . $petik . ', ' . $petik . '' . $petik . ', 0, 0, true);
    mysqli_query($conn, "UPDATE users SET id_active=' . $petik . '2' . $petik . ' WHERE email=' . $petik . '$email' . $petik . '");
    $response = array(' . $petik . 'status' . $petik . ' => true);
  } else {
    $response = array(' . $petik . 'status' . $petik . ' => false);
  }
  echo json_encode($response);
}
');
fclose($file5);

// file /auth/signin.php
$file6 = "signin.php";
$file6 = fopen($route . '/auth/' . $file6, "w");
fwrite($file6, '<?php
require_once("../controller/script.php");
require_once("redirect.php");
$redirectURI = "http://$_SERVER[HTTP_HOST]/apps/' . $route_name . '/auth/signin.php"; // jika ingin deploy ke server wajib diubah ke DNS
require_once("config.php");
$_SESSION["page-name"] = "Sign In";
$_SESSION["page-url"] = "signin";

if (isset($_GET["code"])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
  $client->setAccessToken($token);
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $name = $google_info->name;
  $email = $google_info->email;
  $picture = $google_info->picture;
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
  if (mysqli_num_rows($result) == 0) {
    $_SESSION["message-danger"] = "Sorry, your account is not registered yet";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
  } else if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["data-user"] = [
      "id" => $row["id_user"],
      "role" => $row["id_role"],
      "name" => $row["username"],
      "email" => $row["email"],
      "picture" => $row["img_user"],
    ];
    header("Location: ../views/");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once("../resources/auth-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form class="form form-signin w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../views/" action="#">
            <!--begin::Heading-->
            <div class="text-center mb-10">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">Sign In to ' . $name . '</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-400 fw-bold fs-4">
                New Here?
                <a href="signup" class="link-primary fw-bolder">Create an Account</a>
              </div>
              <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Label-->
              <label class="form-label fs-6 fw-bolder text-dark">Email</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Wrapper-->
              <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="password-reset" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                <!--end::Link-->
              </div>
              <!--end::Wrapper-->
              <!--begin::Input-->
              <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
              <!--begin::Submit button-->
              <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Continue</span>
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
              <!--end::Submit button-->
              <!--begin::Separator-->
              <div class="text-center text-muted text-uppercase fw-bolder mb-5">
                or
              </div>
              <!--end::Separator-->
              <!--begin::Google link-->
              <a href="<?= $client->createAuthUrl(); ?>" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="../assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
              <!--end::Google link-->
              <!--begin::Back Home link-->
              <a href="../" class="btn btn-light btn-sm">Back to home</a>
              <!--end::Back Home link-->
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->
  </div>
  <!--end::Main-->
  <?php require_once("../resources/auth-footer.php") ?>
  <!--begin::Page Custom Javascript(used by this page)-->
  <script src="../assets/js/signin.js"></script>
  <!--end::Page Custom Javascript-->
</body>
<!--end::Body-->
</html>
');
fclose($file6);

// file /auth/signup-method.php
$file7 = "signup-method.php";
$file7 = fopen($route . '/auth/' . $file7, "w");
fwrite($file7, '<?php
require_once("../controller/script.php");
if (!empty($_POST["email"])) {
  $username = valid($_POST["username"]);
  $email = valid($_POST["email"]);
  $password = valid($_POST["password"]);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // check if email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
  if (mysqli_num_rows($result) == 0) {
    // send massage verification to email
    $eu = crc32($email);
    $en_user = password_hash($email, PASSWORD_DEFAULT);
    require_once("../controller/mail.php");
    $to       = $email;
    $subject  = "Account Verification - ' . $name . '";
    $message  = "<!doctype html>
        <html>
            <head>
                <meta name=' . $petik . 'viewport' . $petik . ' content=' . $petik . 'width=device-width' . $petik . '>
                <meta http-equiv=' . $petik . 'Content-Type' . $petik . ' content=' . $petik . 'text/html; charset=UTF-8' . $petik . '>
                <title>Account Verification</title>
                <style>
                    @media only screen and (max-width: 620px) {
                        table[class=' . $petik . 'body' . $petik . '] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important;}
                        table[class=' . $petik . 'body' . $petik . '] p,
                        table[class=' . $petik . 'body' . $petik . '] ul,
                        table[class=' . $petik . 'body' . $petik . '] ol,
                        table[class=' . $petik . 'body' . $petik . '] td,
                        table[class=' . $petik . 'body' . $petik . '] span,
                        table[class=' . $petik . 'body' . $petik . '] a {
                            font-size: 16px !important;}
                        table[class=' . $petik . 'body' . $petik . '] .wrapper,
                        table[class=' . $petik . 'body' . $petik . '] .article {
                            padding: 10px !important;}
                        table[class=' . $petik . 'body' . $petik . '] .content {
                            padding: 0 !important;}
                        table[class=' . $petik . 'body' . $petik . '] .container {
                            padding: 0 !important;
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important;}
                        table[class=' . $petik . 'body' . $petik . '] .btn table {
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .btn a {
                            width: 100% !important;}
                        table[class=' . $petik . 'body' . $petik . '] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important;}}
                    @media all {
                        .ExternalClass {
                            width: 100%;}
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%;}
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important;
                        .btn-primary table td:hover {
                            background-color: #d5075d !important;}
                        .btn-primary a:hover {
                            background-color: #000 !important;
                            border-color: #000 !important;
                            color: #fff !important;}}
                </style>
            </head>
            <body class style=' . $petik . 'background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' . $petik . '>
                <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'body' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . ' bgcolor=' . $petik . '#e1e3e5' . $petik . '>
                <tr>
                    <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                    <td class=' . $petik . 'container' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' . $petik . ' width=' . $petik . '580' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                    <div class=' . $petik . 'header' . $petik . ' style=' . $petik . 'padding: 20px 0;' . $petik . '>
                        <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                        <tr>
                            <td class=' . $petik . 'align-center' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                            <p style=' . $petik . 'font-family: sans-serif; font-weight: normal; margin: 0; margin-bottom: 15px; text-decoration: none; color: #11202f; font-size: 20px;' . $petik . '>' . $name . '</p>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <div class=' . $petik . 'content' . $petik . ' style=' . $petik . 'box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;' . $petik . '>
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role=' . $petik . 'presentation' . $petik . ' class=' . $petik . 'main' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
            
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class=' . $petik . 'wrapper' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                            <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                <tr>
                                <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                    <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>Hi " . $username . ",</p>
                                    <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>Congratulations your account has been registered, just one more step you can already use your account. Please verify now by clicking on the link below.</p>
                                    <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'btn btn-primary' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                    <tbody>
                                        <tr>
                                        <td align=' . $petik . 'left' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                            <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;' . $petik . '>
                                            <tbody>
                                                <tr>
                                                <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' bgcolor=' . $petik . '#ffffff' . $petik . ' align=' . $petik . 'center' . $petik . '> <a href=' . $petik . 'http://$_SERVER[HTTP_HOST]/apps/' . $route_name . '/auth/verification?en=" . $en_user . "&eu=" . $eu . "' . $petik . ' target=' . $petik . '_blank' . $petik . ' style=' . $petik . 'background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;' . $petik . '>Verify Now</a> </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>Thank you for registering at the ' . $name . '.</p>
                                    <small>Warning! This is an automated message so you cannot reply to this message.</small>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
            
                        <!-- START FOOTER -->
                        <div class=' . $petik . 'footer' . $petik . ' style=' . $petik . 'clear: both; margin-top: 10px; text-align: center; width: 100%;' . $petik . '>
                        <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                            <tr>
                            <td class=' . $petik . 'content-block powered-by' . $petik . ' style=' . $petik . 'font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                                Powered by <a href=' . $petik . 'https://www.netmedia-framecode.com' . $petik . ' style=' . $petik . 'color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;' . $petik . '>Netmedia Framecode</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->
            
                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                    </td>
                    <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                </tr>
                </table>
            </body>
        </html>";
    smtp_mail($to, $subject, $message, "", "", 0, 0, true);

    // insert user to database
    mysqli_query($conn, "INSERT INTO users (en_user, username, email, password) VALUES (' . $petik . '$eu' . $petik . ', ' . $petik . '$username' . $petik . ', ' . $petik . '$email' . $petik . ', ' . $petik . '$password' . $petik . ')");
    $_SESSION["usersRegistered"] = [
      "email" => $email,
    ];
    $response = array("status" => true);
  } else if (mysqli_num_rows($result) > 0) {
    $response = array("status" => false);
  }
  echo json_encode($response);
}
');
fclose($file7);

// file /auth/signup.php
$file8 = "signup.php";
$file8 = fopen($route . '/auth/' . $file8, "w");
fwrite($file8, '<?php
require_once("../controller/script.php");
require_once("redirect.php");
$redirectURI = "http://$_SERVER[HTTP_HOST]/apps/' . $route_name . '/auth/signin.php"; // jika ingin deploy ke server wajib diubah ke DNS
require_once("config.php");
$_SESSION["page-name"] = "Sign Up";
$_SESSION["page-url"] = "signup";

if (isset($_GET["code"])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
  $client->setAccessToken($token);
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $name = $google_info->name;
  $email = $google_info->email;
  $picture = $google_info->picture;
  $eu = crc32($email);

  // check if email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
  if (mysqli_num_rows($result) > 0) {
    $_SESSION["message-danger"] = "Sorry, the email is already registered";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
    return false;
  }

  // insert user to database
  mysqli_query($conn, "INSERT INTO users (en_user, id_active, username, email, img_user) VALUES (' . $petik . '$eu' . $petik . ', ' . $petik . '1' . $petik . ', ' . $petik . '$name' . $petik . ', ' . $petik . '$email' . $petik . ', ' . $petik . '$picture' . $petik . ')");

  // redirect to home page
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . ' AND username=' . $petik . '$name' . $petik . '");
  if (mysqli_num_rows($result) == 0) {
    $_SESSION["message-danger"] = "Maaf, akun anda belum terdaftar";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
  } else if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["data-user"] = [
      "id" => $row["id_user"],
      "role" => $row["id_role"],
      "name" => $row["username"],
      "email" => $row["email"],
      "picture" => $row["img_user"],
    ];
    header("Location: ../views/");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once("../resources/auth-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form class="form form-signup w-100" method="POST" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="verification">
            <!--begin::Heading-->
            <div class="mb-10 text-center">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">Create an Account</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-400 fw-bold fs-4">Already have an account?
                <a href="signin" class="link-primary fw-bolder">Sign in here</a>
              </div>
              <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Action-->
            <a href="<?= $client->createAuthUrl(); ?>" class="btn btn-light-primary fw-bolder w-100 mb-10">
              <img alt="Logo" src="../assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign up with Google</a>
            <!--end::Action-->
            <!--begin::Separator-->
            <div class="d-flex align-items-center mb-10">
              <div class="border-bottom border-gray-300 mw-50 w-100"></div>
              <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
              <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            </div>
            <!--end::Separator-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
              <label class="form-label fw-bolder text-dark fs-6">Userame</label>
              <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="username" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <label class="form-label fw-bolder text-dark fs-6">Email</label>
              <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row" data-kt-password-meter="true">
              <!--begin::Wrapper-->
              <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                  <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                  <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                  </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
              </div>
              <!--end::Wrapper-->
              <!--begin::Hint-->
              <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
              <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
              <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
              <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-up-->
  </div>
  <!--end::Main-->
  <?php require_once("../resources/auth-footer.php") ?>
  <script src="../assets/js/signup.js"></script>
</body>
<!--end::Body-->
</html>
');
fclose($file8);

// file /auth/verification.php
$file9 = "verification.php";
$file9 = fopen($route . '/auth/' . $file9, "w");
fwrite($file9, '<?php
require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Account Verification";
$_SESSION["page-url"] = "verification";

if(isset($_GET["en"])){
  $en=valid($_GET["en"]);
  $eu=valid($_GET["eu"]);
  $result = mysqli_query($conn, "SELECT * FROM users WHERE en_user=' . $petik . '$eu' . $petik . '");
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($row["email"], $en)){
      mysqli_query($conn, "UPDATE users SET id_active=' . $petik . '1' . $petik . ' WHERE en_user=' . $petik . '$eu' . $petik . '");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once("../resources/auth-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Signup Verify Email -->
    <div class="d-flex flex-column flex-column-fluid">
      <!--begin::Content-->
      <div class="d-flex flex-row-fluid flex-column flex-column-fluid text-center p-10 py-lg-20">
        <?php if (!isset($_GET["eu"])) { ?>
          <!--begin::Logo-->
          <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Verify Your Email</h1>
          <!--end::Logo-->
          <!--begin::Message-->
          <div class="fs-3 fw-bold text-muted mb-10">We have sent an email to
            <a href="https://mail.google.com/mail/u/0/#inbox" class="link-primary fw-bolder"><?php if (isset($_SESSION["usersRegistered"])) {
                                                          echo $_SESSION["usersRegistered"]["email"];
                                                        } ?></a>
            <br />pelase follow a link to verify your email.
          </div>
          <!--end::Message-->
          <!--begin::Action-->
          <div class="text-center mb-10">
            <a href="signin" class="btn btn-lg btn-primary fw-bolder">Skip for now</a>
          </div>
          <!--end::Action-->
        <?php } else { ?>
          <!--begin::Logo-->
          <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Your Email Verified</h1>
          <!--end::Logo-->
          <!--begin::Message-->
          <div class="fs-3 fw-bold text-muted mb-10">
            Your email has been verified and you can use your account at ' . $name . '
          </div>
          <!--end::Message-->
          <!--begin::Action-->
          <div class="text-center mb-10">
            <a href="signin" class="btn btn-lg btn-primary fw-bolder">Sign In</a>
          </div>
          <!--end::Action-->
        <?php } ?>
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Signup Verify Email-->
  </div>
  <!--end::Main-->
  <?php require_once("../resources/auth-footer.php") ?>
</body>
<!--end::Body-->

</html>
');
fclose($file9);

// =============================================================

// file /controller/db_connect.php
$file10 = "db_connect.php";
$file10 = fopen($route . '/controller/' . $file10, "w");
fwrite($file10, '<?php 
$conn=mysqli_connect("localhost","root","","' . $name_db . '");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}  
');
fclose($file10);

// =============================================================

// file /resources/auth-header.php
$file11 = "auth-header.php";
$file11 = fopen($route . '/resources/' . $file11, "w");
fwrite($file11, '<noscript>
<meta http-equiv="refresh" content="0;url=../406" />
</noscript>
<title><?php if(isset($_SESSION["page-name"])){if($_SESSION["page-name"]!=""){echo $_SESSION["page-name"]." - ";}}?>' . $name . '</title>
<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="" />
<meta property="og:title" content="' . $name . '" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="' . $name . '" />
<link rel="canonical" href="" />
<link rel="shortcut icon" href="" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
');
fclose($file11);

// file /resources/dash-header.php
$file12 = "dash-header.php";
$file12 = fopen($route . '/resources/' . $file12, "w");
fwrite($file12, '<title><?php if(isset($_SESSION["page-name"])){if($_SESSION["page-name"]!=""){echo $_SESSION["page-name"]." - ";}}?>' . $name . '</title>
<meta charset="utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="" />
<meta property="og:title" content="' . $name . '" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="' . $name . '" />
<link rel="canonical" href="" />
<link rel="shortcut icon" href="" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
');
fclose($file12);

// file /resources/dash-topbar.php
$file13 = "dash-topbar.php";
$file13 = fopen($route . '/resources/' . $file13, "w");
fwrite($file13, '<div id="kt_header" class="header shadow" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: ' . $petik . '200px' . $petik . ', lg: ' . $petik . '300px' . $petik . '}">
<!--begin::Container-->
<div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
  <!--begin::Page title-->
  <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: ' . $petik . '#kt_content_container' . $petik . ', lg: ' . $petik . '#kt_header_container' . $petik . '}">
    <!--begin::Heading-->
    <h1 class="text-dark fw-bolder my-1 fs-2"><?php if ($_SESSION["page-name"] == "") {
                                                echo "Welcome to ' . $name . '";
                                              } else {
                                                echo $_SESSION["page-name"] . " - ' . $name . '";
                                              } ?>
      <small class="text-muted fs-6 fw-normal ms-1"></small>
    </h1>
    <!--end::Heading-->
  </div>
  <!--end::Page title=-->
  <!--begin::Wrapper-->
  <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
    <!--begin::Aside mobile toggle-->
    <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
      <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
      <span class="svg-icon svg-icon-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
          <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Aside mobile toggle-->
  </div>
  <!--end::Wrapper-->
  <!--begin::Toolbar wrapper-->
  <div class="d-flex align-items-center flex-shrink-0">
    <!--begin::User-->
    <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
      <!--begin::Menu wrapper-->
      <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default:' . $petik . 'click' . $petik . ', lg: ' . $petik . 'hover' . $petik . '}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <img src="<?= $_SESSION["data-user"]["picture"] ?>" alt="user" />
      </div>
      <!--begin::User account menu-->
      <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
          <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px me-5">
              <img alt="Logo" src="<?= $_SESSION["data-user"]["picture"] ?>" />
            </div>
            <!--end::Avatar-->
            <!--begin::Username-->
            <div class="d-flex flex-column">
              <div class="fw-bolder d-flex align-items-center fs-5"><?= $_SESSION["data-user"]["name"] ?></div>
              <a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?= $_SESSION["data-user"]["email"] ?></a>
            </div>
            <!--end::Username-->
          </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
          <a href="my-profile" class="menu-link px-5">My Profile</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5 my-1">
          <a href="settings" class="menu-link px-5">Account Settings</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
          <a style="cursor: pointer;" onclick="window.location.href=' . $petik . '../auth/signout.php' . $petik . ';" class="menu-link px-5">Sign Out</a>
        </div>
        <!--end::Menu item-->
      </div>
      <!--end::User account menu-->
      <!--end::Menu wrapper-->
    </div>
    <!--end::User -->
  </div>
  <!--end::Toolbar wrapper-->
</div>
<!--end::Container-->
</div>
');
fclose($file13);

// =============================================================

// file /views/method-new-email.php
$file14 = "method-new-email.php";
$file14 = fopen($route . '/views/' . $file14, "w");
fwrite($file14, '<?php
require_once("../controller/script.php");
if (!empty($_POST["emailaddress"])) {
  $email = valid($_POST["emailaddress"]);
  $confirmemailpassword = valid($_POST["confirmemailpassword"]);
  $id = valid($_SESSION["data-user"]["id"]);

  // check if email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email=' . $petik . '$email' . $petik . '");
  if (mysqli_num_rows($result) == 0) {
    $resultUser = mysqli_query($conn, "SELECT * FROM users WHERE id_user=' . $petik . '$id' . $petik . '");
    $row = mysqli_fetch_assoc($resultUser);
    // check if password is correct
    if (password_verify($confirmemailpassword, $row["password"])) {
      // send massage verification to email
      $eu = crc32($email);
      $en_user = password_hash($email, PASSWORD_DEFAULT);
      require_once("../controller/mail.php");
      $to       = $email;
      $subject  = "Verify new email account - ' . $name . '";
      $message  = "<!doctype html>
          <html>
              <head>
                  <meta name=' . $petik . 'viewport' . $petik . ' content=' . $petik . 'width=device-width' . $petik . '>
                  <meta http-equiv=' . $petik . 'Content-Type' . $petik . ' content=' . $petik . 'text/html; charset=UTF-8' . $petik . '>
                  <title>Verify new email account - ' . $name . '</title>
                  <style>
                      @media only screen and (max-width: 620px) {
                          table[class=' . $petik . 'body' . $petik . '] h1 {
                              font-size: 28px !important;
                              margin-bottom: 10px !important;}
                          table[class=' . $petik . 'body' . $petik . '] p,
                          table[class=' . $petik . 'body' . $petik . '] ul,
                          table[class=' . $petik . 'body' . $petik . '] ol,
                          table[class=' . $petik . 'body' . $petik . '] td,
                          table[class=' . $petik . 'body' . $petik . '] span,
                          table[class=' . $petik . 'body' . $petik . '] a {
                              font-size: 16px !important;}
                          table[class=' . $petik . 'body' . $petik . '] .wrapper,
                          table[class=' . $petik . 'body' . $petik . '] .article {
                              padding: 10px !important;}
                          table[class=' . $petik . 'body' . $petik . '] .content {
                              padding: 0 !important;}
                          table[class=' . $petik . 'body' . $petik . '] .container {
                              padding: 0 !important;
                              width: 100% !important;}
                          table[class=' . $petik . 'body' . $petik . '] .main {
                              border-left-width: 0 !important;
                              border-radius: 0 !important;
                              border-right-width: 0 !important;}
                          table[class=' . $petik . 'body' . $petik . '] .btn table {
                              width: 100% !important;}
                          table[class=' . $petik . 'body' . $petik . '] .btn a {
                              width: 100% !important;}
                          table[class=' . $petik . 'body' . $petik . '] .img-responsive {
                              height: auto !important;
                              max-width: 100% !important;
                              width: auto !important;}}
                      @media all {
                          .ExternalClass {
                              width: 100%;}
                          .ExternalClass,
                          .ExternalClass p,
                          .ExternalClass span,
                          .ExternalClass font,
                          .ExternalClass td,
                          .ExternalClass div {
                              line-height: 100%;}
                          .apple-link a {
                              color: inherit !important;
                              font-family: inherit !important;
                              font-size: inherit !important;
                              font-weight: inherit !important;
                              line-height: inherit !important;
                              text-decoration: none !important;
                          .btn-primary table td:hover {
                              background-color: #d5075d !important;}
                          .btn-primary a:hover {
                              background-color: #000 !important;
                              border-color: #000 !important;
                              color: #fff !important;}}
                  </style>
              </head>
              <body class style=' . $petik . 'background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;' . $petik . '>
                  <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'body' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . ' bgcolor=' . $petik . '#e1e3e5' . $petik . '>
                  <tr>
                      <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                      <td class=' . $petik . 'container' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' . $petik . ' width=' . $petik . '580' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                      <div class=' . $petik . 'header' . $petik . ' style=' . $petik . 'padding: 20px 0;' . $petik . '>
                          <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                          <tr>
                              <td class=' . $petik . 'align-center' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                              <p style=' . $petik . 'font-family: sans-serif; font-weight: normal; margin: 0; margin-bottom: 15px; text-decoration: none; color: #11202f; font-size: 20px;' . $petik . '>' . $name . '</p>
                              </td>
                          </tr>
                          </table>
                      </div>
                      <div class=' . $petik . 'content' . $petik . ' style=' . $petik . 'box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;' . $petik . '>
              
                          <!-- START CENTERED WHITE CONTAINER -->
                          <table role=' . $petik . 'presentation' . $petik . ' class=' . $petik . 'main' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
              
                          <!-- START MAIN CONTENT AREA -->
                          <tr>
                              <td class=' . $petik . 'wrapper' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                              <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                  <tr>
                                  <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                      <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>Hi " . $row[' . $petik . 'username' . $petik . '] . ",</p>
                                      <p style=' . $petik . 'font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;' . $petik . '>You have now changed your old account to a new one. Please verify to ensure that you changed your account by clicking the Verify button.</p>
                                      <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' class=' . $petik . 'btn btn-primary' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                                      <tbody>
                                          <tr>
                                          <td align=' . $petik . 'left' . $petik . ' style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' . $petik . ' valign=' . $petik . 'top' . $petik . '>
                                              <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;' . $petik . '>
                                              <tbody>
                                                  <tr>
                                                  <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' bgcolor=' . $petik . '#ffffff' . $petik . ' align=' . $petik . 'center' . $petik . '> <a href=' . $petik . 'http://$_SERVER[HTTP_HOST]/apps/' . $name . '/auth/verification?en=" . $en_user . "&eu=" . $eu . "' . $petik . ' target=' . $petik . '_blank' . $petik . ' style=' . $petik . 'background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;' . $petik . '>Verify Now</a> </td>
                                                  </tr>
                                              </tbody>
                                              </table>
                                          </td>
                                          </tr>
                                      </tbody>
                                      </table>
                                      <small>Warning! This is an automated message so you cannot reply to this message.</small>
                                  </td>
                                  </tr>
                              </table>
                              </td>
                          </tr>
              
                          <!-- END MAIN CONTENT AREA -->
                          </table>
              
                          <!-- START FOOTER -->
                          <div class=' . $petik . 'footer' . $petik . ' style=' . $petik . 'clear: both; margin-top: 10px; text-align: center; width: 100%;' . $petik . '>
                          <table role=' . $petik . 'presentation' . $petik . ' border=' . $petik . '0' . $petik . ' cellpadding=' . $petik . '0' . $petik . ' cellspacing=' . $petik . '0' . $petik . ' style=' . $petik . 'border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' . $petik . ' width=' . $petik . '100%' . $petik . '>
                              <tr>
                              <td class=' . $petik . 'content-block powered-by' . $petik . ' style=' . $petik . 'font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' . $petik . ' valign=' . $petik . 'top' . $petik . ' align=' . $petik . 'center' . $petik . '>
                                  Powered by <a href=' . $petik . 'https://www.netmedia-framecode.com' . $petik . ' style=' . $petik . 'color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;' . $petik . '>Netmedia Framecode</a>.
                              </td>
                              </tr>
                          </table>
                          </div>
                          <!-- END FOOTER -->
              
                      <!-- END CENTERED WHITE CONTAINER -->
                      </div>
                      </td>
                      <td style=' . $petik . 'font-family: sans-serif; font-size: 14px; vertical-align: top;' . $petik . ' valign=' . $petik . 'top' . $petik . '>&nbsp;</td>
                  </tr>
                  </table>
              </body>
          </html>";
      smtp_mail($to, $subject, $message, "", "", 0, 0, true);

      // insert user to database
      mysqli_query($conn, "UPDATE users SET en_user= ' . $petik . '$eu' . $petik . ', id_active = ' . $petik . '2' . $petik . ', email = ' . $petik . '$email' . $petik . ' WHERE id_user = ' . $petik . '$id' . $petik . '");
      $_SESSION = [];
      session_unset();
      session_destroy();
      $_SESSION["usersRegistered"] = [
        "email" => $email,
      ];
      $response = array(
        "status" => true,
        "message" => "Successfully registered, please verify your email",
      );
    } else {
      $response = array(
        "status" => false,
        "message" => "The password you entered is incorrect.",
      );
    }
  } else if (mysqli_num_rows($result) > 0) {
    $response = array(
      "status" => false,
      "message" => "The email you entered is the same as the old email.",
    );
  }
  echo json_encode($response);
}
');
fclose($file14);
