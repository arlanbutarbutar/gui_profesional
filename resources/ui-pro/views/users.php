<?php
require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Users";
$_SESSION['page-url'] = "users";
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

            <!--begin::Card-->
            <div class="card">
              <!--begin::Card header-->
              <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                  <!--begin::Search-->
                  <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                      </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" name="search-users" id="search-users" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                  </div>
                  <!--end::Search-->
                </div>
                <!--begin::Card title-->
              </div>
              <!--end::Card header-->
              <!--begin::Card body-->
              <div class="card-body py-4" style="overflow-x: auto;">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5 text-center" id="kt_table_users">
                  <!--begin::Table head-->
                  <thead>
                    <!--begin::Table row-->
                    <tr class="text-muted fw-bolder fs-7 text-uppercase gs-0">
                      <th class="min-w-125px">User</th>
                      <th class="min-w-125px">Role</th>
                      <th class="min-w-125px">Status</th>
                      <th class="min-w-125px">Joined Date</th>
                      <th class="min-w-125px">Updated Date</th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="text-gray-600 fw-bold" id="data-search">
                    <!--begin::Table row-->
                    <?php if (mysqli_num_rows($users) == 0) { ?>
                      <tr>
                        <td colspan="5">No data yet.</td>
                      </tr>
                      <?php } else if (mysqli_num_rows($users) > 0) {
                      while ($row = mysqli_fetch_assoc($users)) { ?>
                        <tr>
                          <!--begin::User=-->
                          <td class="d-flex align-items-center justify-content-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                              <div class="symbol-label">
                                <img src="<?= $row['img_user'] ?>" alt="<?= $row['username'] ?>" class="w-100" />
                              </div>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User details-->
                            <div class="d-flex flex-column">
                              <p href="view.html" class="text-gray-800 text-hover-primary mb-1"><?= $row['username'] ?></p>
                              <span><?= $row['email'] ?></span>
                            </div>
                            <!--begin::User details-->
                          </td>
                          <!--end::User=-->
                          <!--begin::Role=-->
                          <td>
                            <!--begin::Add user-->
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#edit_role<?= $row['id_user'] ?>">
                              <?= $row['role'] ?>
                            </button>

                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="edit_role<?= $row['id_user'] ?>" tabindex="-1" aria-hidden="true">
                              <!--begin::Modal dialog-->
                              <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                  <!--begin::Modal header-->
                                  <div class="modal-header" id="kt_modal_edit_role_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Edit Role</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                      <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                      <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                          <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                        </svg>
                                      </span>
                                      <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                  </div>
                                  <!--end::Modal header-->
                                  <!--begin::Modal body-->
                                  <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form method="POST" class="form form-edit-role" action="#">
                                      <!--begin::Scroll-->
                                      <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_role_header" data-kt-scroll-wrappers="#kt_modal_edit_role_scroll" data-kt-scroll-offset="300px">
                                        <!--begin::Input group-->
                                        <div class="mb-7">
                                          <!--begin::Label-->
                                          <label class="required fw-bold fs-6 mb-5">Role</label>
                                          <!--end::Label-->
                                          <!--begin::Roles-->
                                          <?php foreach ($usersRole as $row_usersRole) : ?>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                              <!--begin::Radio-->
                                              <div class="form-check form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input me-3" name="user-role" type="radio" value="<?= $row_usersRole['id_role'] ?>" checked='checked' />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                  <div class="fw-bolder text-gray-800"><?= $row_usersRole['role'] ?></div>
                                                </label>
                                                <!--end::Label-->
                                              </div>
                                              <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class='separator separator-dashed my-5'></div>
                                          <?php endforeach; ?>
                                          <!--end::Roles-->
                                        </div>
                                        <!--end::Input group-->
                                      </div>
                                      <!--end::Scroll-->
                                      <!--begin::Actions-->
                                      <div class="text-center pt-15">
                                        <input type="hidden" name="id-user" value="<?= $row['id_user']?>">
                                        <button type="reset" class="btn btn-light me-3" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        <button type="submit" name="edit-role" class="btn btn-primary">
                                          <span class="indicator-label">Submit</span>
                                        </button>
                                      </div>
                                      <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                  </div>
                                  <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                              </div>
                              <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
                            
                          </td>
                          <!--end::Role=-->
                          <!--begin::status=-->
                          <td><?= $row['status'] ?></td>
                          <!--end::status=-->
                          <!--begin::Joined Date=-->
                          <td><?php $dateJoin = date_create($row['created_at']);
                              $dateJoin = date_format($dateJoin, "l, d M Y");
                              echo $dateJoin; ?></td>
                          <!--end::Joined Date=-->
                          <!--begin::Updated Date=-->
                          <td><?php $dateUpdate = date_create($row['updated_at']);
                              $dateUpdate = date_format($dateUpdate, "l, d M Y");
                              echo $dateUpdate; ?></td>
                          <!--end::Updated Date=-->
                        </tr>
                    <?php }
                    } ?>
                    <!--end::Table row-->
                  </tbody>
                  <!--end::Table body-->
                </table>
                <!--end::Table-->
              </div>
              <!--end::Card body-->
            </div>
            <!--end::Card-->

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
  <!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/jet-html-pro/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Aug 2022 03:58:03 GMT -->

</html>