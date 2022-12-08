<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
  <!--begin::Primary-->
  <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 py-5 px-3" id="kt_aside_nav">
      <!--begin::Aside Primary Menu Wrapper-->
      <div class="w-100 hover-scroll-overlay-y d-flex" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_nav, #kt_aside_menu_wrapper" data-kt-scroll-offset="5px">
        <!--begin::Primary menu-->
        <div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5" data-kt-menu="true">

          <div class="menu-item here show py-2">
            <span class="menu-link menu-center">
              <a class="menu-link active" href="./">
                <span class="menu-icon me-0">
                  <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                  <span class="svg-icon svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                      <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                      <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                      <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
              </a>
            </span>
          </div>

          <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
            <span class="menu-link menu-center">
              <span class="menu-icon me-0">
                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                <span class="svg-icon svg-icon-2x">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor" />
                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor" />
                  </svg>
                </span>
                <!--end::Svg Icon-->
              </span>
            </span>
            <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
              <div class="menu-item">
                <div class="menu-content">
                  <span class="menu-section fs-5 fw-bolder ps-1 py-1">Account</span>
                </div>
              </div>
              <div class="menu-item">
                <a class="menu-link" href="my-profile">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">My Profile</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" href="settings">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Account Settings</span>
                </a>
              </div>
            </div>
          </div>

          <?php if ($_SESSION['data-user']['role'] == 1) { ?>
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
              <span class="menu-link menu-center">
                <span class="menu-icon me-0">
                  <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                  <span class="svg-icon svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                      <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
              </span>
              <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                <div class="menu-item">
                  <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">User Management</span>
                  </div>
                </div>
                <div class="menu-item">
                  <a class="menu-link" href="users">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Users</span>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <!--end::Primary menu-->
      </div>
      <!--ebd::Aside Primary Menu Wrapper-->
    </div>
    <!--end::Nav-->
  </div>
  <!--end::Primary-->
  <!--begin::Action-->
  <!--end::Action-->
</div>