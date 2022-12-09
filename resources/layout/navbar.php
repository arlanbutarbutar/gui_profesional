<div class="az-header shadow">
  <div class="container">
    <div class="az-header-left">
      <a style="cursor: pointer;" onclick="window.location.href='./'"><img src="resources/img/GUI.png" alt="Icon Brand" style="width: 60px"></a>
      <a style="cursor: pointer;" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
    </div>
    <div class="az-header-menu">
      <div class="az-header-menu-header">
        <a style="cursor: pointer;" onclick="window.location.href='./'"><img src="resources/img/GUI.png" alt="Icon Brand" style="width: 60px"></a>
        <a style="cursor: pointer;" class="close">&times;</a>
      </div>
      <ul class="nav">
        <li class="nav-item <?php if ($_SESSION['page-name'] == "Console") {
                              echo "active show";
                            } ?>">
          <a style="cursor: pointer;" onclick="window.location.href='./'" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Console</a>
        </li>
        <li class="nav-item <?php if ($_SESSION['page-name'] == "Docs") {
                              echo "active show";
                            } ?>">
          <a style="cursor: pointer;" class="nav-link with-sub"><i class="typcn typcn-document"></i> Docs</a>
          <nav class="az-menu-sub">
            <a style="cursor: pointer;" onclick="window.location.href='pengantar'" class="nav-link">Pengantar</a>
            <a style="cursor: pointer;" onclick="window.location.href='ringkasan'" href="ringkasan" class="nav-link">Ringkasan</a>
            <a style="cursor: pointer;" onclick="window.location.href='php-info'" class="nav-link">PHP Info</a>
          </nav>
        </li>
        <li class="nav-item <?php if ($_SESSION['page-name'] == "Display") {
                              echo "active show";
                            } ?>">
          <a style="cursor: pointer;" onclick="window.location.href='display'" class="nav-link"><i class="typcn typcn-th-large-outline"></i> Display</a>
        </li>
        <li class="nav-item <?php if ($_SESSION['page-name'] == "phpMyAdmin") {
                              echo "active show";
                            } ?>">
          <a style="cursor: pointer;" onclick="window.open('/phpmyadmin/', 'blank')" class="nav-link"><i class="typcn typcn-puzzle-outline"></i> phpMyAdmin</a>
        </li>
      </ul>
    </div>
    <div class="az-header-right">
      <div class="dropdown az-header-notification">
        <a href="" class="az-header-search-link"><i class="fas fa-search" style="font-size: 18px;"></i></a>
        <div class="dropdown-menu shadow">
          <div class="az-dropdown-header mg-b-20 d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <h6 class="az-notification-title">Cari Projek</h6>
          <p class="az-notification-text">Cari dengan kata kunci <strong>Nama Projek</strong></p>
          <div class="az-notification-list">
            <form action="" method="post">
              <div class="mb-3">
                <input type="text" name="search-all" class="form-control border-0 shadow" id="search-all" placeholder="Cari Nama Projek">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="dropdown az-profile-menu">
        <a style="cursor: pointer;" class="az-img-user"><img src="resources/img/user.png" alt="Icon Profile"> </a>
        <div class="dropdown-menu shadow border-0">
          <div class="az-header-profile">
            <div class="az-img-user">
              <img src="resources/img/user.png" alt="Icon Profile">
            </div>
            <h6><?= $nameServer ?></h6>
            <span><?= $mailServer ?></span>
          </div>
          <a style="cursor: pointer;" onclick="window.location.href='auth/signout'" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Keluar</a>
        </div>
      </div>
    </div>
  </div>
</div>