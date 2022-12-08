<?php
require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Password Reset";
$_SESSION['page-url'] = "password-reset";

// check method $_GET from url
if (isset($_GET['en']) && isset($_GET['eu'])) {
  $en = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['en']))));
  $eu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['eu']))));
  $result = mysqli_query($conn, "SELECT * FROM users WHERE en_user = '$eu'");
  if (mysqli_num_rows($result) == 0) {
    header("Location: signin");
    exit();
  }
} else {
  header("Location: signin");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once("../resources/auth-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION['message-success'])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-info'])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-warning'])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-danger'])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger'] ?>"></div>
  <?php } ?>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - New password -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="signin">
            <input type="hidden" name="en" value="<?= $en ?>">
            <input type="hidden" name="eu" value="<?= $eu ?>">
            <!--begin::Heading-->
            <div class="text-center mb-10">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">Setup New Password</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                <a href="../base/sign-in.html" class="link-primary fw-bolder">Sign in here</a>
              </div>
              <!--end::Link-->
            </div>
            <!--begin::Heading-->
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
            <!--begin::Input group=-->
            <div class="fv-row mb-10">
              <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
              <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
            </div>
            <!--end::Input group=-->
            <!--begin::Action-->
            <div class="text-center">
              <button type="button" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
            <!--end::Action-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - New password-->
  </div>
  <!--end::Main-->
  <?php require_once("../resources/auth-footer.php") ?>
  <script src="../assets/js/new-password.js"></script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/jet-html-pro/authentication/sign-in/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 03:58:45 GMT -->

</html>