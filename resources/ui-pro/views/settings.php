<?php
require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Settings";
$_SESSION['page-url'] = "settings";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../resources/dash-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
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
  <!--begin::Root-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->
      <?php require_once("../resources/dash-sidebar.php") ?>
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        <?php require_once("../resources/dash-topbar.php") ?>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Container-->
          <div class="container-xxl" id="kt_content_container">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
              <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                  <!--begin: Pic-->
                  <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                      <img src="<?= $_SESSION['data-user']['picture'] ?>" alt="image" />
                      <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                    </div>
                  </div>
                  <!--end::Pic-->
                  <!--begin::Info-->
                  <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                      <!--begin::User-->
                      <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                          <a href="my-profile" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?= $_SESSION['data-user']['name'] ?></a>
                          <a href="my-profile">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                              </svg>
                            </span>
                            <!--end::Svg Icon-->
                          </a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                          <a href="https://mail.google.com/mail/u/0/#inbox" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                              </svg>
                            </span>
                            <!--end::Svg Icon--><?= $_SESSION['data-user']['email'] ?>
                          </a>
                        </div>
                        <!--end::Info-->
                      </div>
                      <!--end::User-->
                    </div>
                    <!--end::Title-->
                  </div>
                  <!--end::Info-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                  <!--begin::Nav item-->
                  <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="my-profile">Overview</a>
                  </li>
                  <!--end::Nav item-->
                  <!--begin::Nav item-->
                  <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="settings">Settings</a>
                  </li>
                  <!--end::Nav item-->
                </ul>
                <!--begin::Navs-->
              </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
              <!--begin::Card header-->
              <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                  <h3 class="fw-bolder m-0">Profile Details</h3>
                </div>
                <!--end::Card title-->
              </div>
              <!--begin::Card header-->
              <!--begin::Content-->
              <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form class="form" method="POST" enctype="multipart/form-data">
                  <!--begin::Card body-->
                  <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                      <!--begin::Label-->
                      <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                      <!--end::Label-->
                      <!--begin::Col-->
                      <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('https://i.ibb.co/PYwPGXd/user.png')">
                          <!--begin::Preview existing avatar-->
                          <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?= $_SESSION['data-user']['picture'] ?>)"></div>
                          <!--end::Preview existing avatar-->
                          <!--begin::Label-->
                          <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" required />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                          </label>
                          <!--end::Label-->
                          <!--begin::Cancel-->
                          <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                          </span>
                          <!--end::Cancel-->
                          <!--begin::Remove-->
                          <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                          </span>
                          <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                      <!--begin::Label-->
                      <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
                      <!--end::Label-->
                      <!--begin::Col-->
                      <div class="col-lg-8 fv-row">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Name" value="<?= $_SESSION['data-user']['name']?>" required/>
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                      <!--begin::Label-->
                      <label class="col-lg-4 col-form-label required fw-bold fs-6">Company</label>
                      <!--end::Label-->
                      <!--begin::Col-->
                      <div class="col-lg-8 fv-row">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Money Changer Kupang" readonly />
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                      <!--begin::Label-->
                      <label class="col-lg-4 col-form-label fw-bold fs-6">Company Site</label>
                      <!--end::Label-->
                      <!--begin::Col-->
                      <div class="col-lg-8 fv-row">
                        <input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="money-changer-kupang.com" readonly />
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                      <!--begin::Label-->
                      <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Country</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                      </label>
                      <!--end::Label-->
                      <!--begin::Col-->
                      <div class="col-lg-8 fv-row">
                        <select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="form-select form-select-solid form-select-lg fw-bold" aria-readonly="Indonesia">
                          <option value="Indonesia">Indonesia</option>
                        </select>
                      </div>
                      <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                  </div>
                  <!--end::Card body-->
                  <!--begin::Actions-->
                  <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" name="profile-details" class="btn btn-primary">Save Changes</button>
                  </div>
                  <!--end::Actions-->
                </form>
                <!--end::Form-->
              </div>
              <!--end::Content-->
            </div>
            <!--end::Basic info-->
            <!--begin::Sign-in Method-->
            <div class="card mb-5 mb-xl-10">
              <!--begin::Card header-->
              <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                  <h3 class="fw-bolder m-0">Sign-in Method</h3>
                </div>
              </div>
              <!--end::Card header-->
              <!--begin::Content-->
              <div id="kt_account_settings_signin_method" class="collapse show">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                  <!--begin::Email Address-->
                  <div class="d-flex flex-wrap align-items-center">
                    <!--begin::Label-->
                    <div id="kt_signin_email">
                      <div class="fs-6 fw-bolder mb-1">Email Address</div>
                      <div class="fw-bold text-gray-600"><?= $_SESSION['data-user']['email'] ?></div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                      <!--begin::Form-->
                      <form id="kt_signin_change_email" class="form form-new-email" novalidate="novalidate">
                        <div class="row mb-6">
                          <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="fv-row mb-0">
                              <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter New Email Address</label>
                              <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="<?= $_SESSION['data-user']['email']?>" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="fv-row mb-0">
                              <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Confirm Password</label>
                              <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                            </div>
                          </div>
                        </div>
                        <div class="d-flex">
                          <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
                          <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                      </form>
                      <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_email_button" class="ms-auto">
                      <button class="btn btn-light btn-active-light-primary">Change Email</button>
                    </div>
                    <!--end::Action-->
                  </div>
                  <!--end::Email Address-->
                  <!--begin::Separator-->
                  <div class="separator separator-dashed my-6"></div>
                  <!--end::Separator-->
                  <!--begin::Password-->
                  <div class="d-flex flex-wrap align-items-center mb-10">
                    <!--begin::Label-->
                    <div id="kt_signin_password">
                      <div class="fs-6 fw-bolder mb-1">Password</div>
                      <div class="fw-bold text-gray-600">************</div>
                    </div>
                    <!--end::Label-->
                    <!--begin::Edit-->
                    <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                      <!--begin::Form-->
                      <form id="kt_signin_change_password" class="form form-new-password" novalidate="novalidate">
                        <div class="row mb-1">
                          <div class="col-lg-4">
                            <div class="fv-row mb-0">
                              <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                              <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="fv-row mb-0">
                              <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                              <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="fv-row mb-0">
                              <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                              <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                            </div>
                          </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex">
                          <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                          <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                      </form>
                      <!--end::Form-->
                    </div>
                    <!--end::Edit-->
                    <!--begin::Action-->
                    <div id="kt_signin_password_button" class="ms-auto">
                      <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                    </div>
                    <!--end::Action-->
                  </div>
                  <!--end::Password-->
                </div>
                <!--end::Card body-->
              </div>
              <!--end::Content-->
            </div>
            <!--end::Sign-in Method-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Content-->
        <?php require_once("../resources/dash-footer.php") ?>
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Root-->
  <!--begin::Javascript-->
  <?php require_once("../resources/dash-js.php") ?>
  <script src="../assets/js/signin-method.js"></script>
  <!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/jet-html-pro/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 03:58:03 GMT -->

</html>