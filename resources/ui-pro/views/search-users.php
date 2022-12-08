<?php require_once('../controller/script.php');
if ($_SESSION['page-url'] == "users") {
  if (isset($_GET['key']) && $_GET['key'] != "") {
    $key = addslashes(trim($_GET['key']));
    $query = "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role JOIN users_status ON users.id_active=users_status.id_status WHERE users.id_user!='$idUser' AND users.username LIKE '%$key%' ORDER BY users.id_user DESC";
    $users = mysqli_query($conn, $query);
  }
  if (mysqli_num_rows($users) == 0) { ?>
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
                      <input type="hidden" name="id-user" value="<?= $row['id_user'] ?>">
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
      </tr>
<?php }
  }
} ?>