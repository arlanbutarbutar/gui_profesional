<?php if (!isset($_SESSION[''])) {
  session_start();
}
require_once("db_connect.php");
require_once("functions.php");
if (isset($_SESSION['time-message'])) {
  if ((time() - $_SESSION['time-message']) > 2) {
    if (isset($_SESSION['message-success'])) {
      unset($_SESSION['message-success']);
    }
    if (isset($_SESSION['message-info'])) {
      unset($_SESSION['message-info']);
    }
    if (isset($_SESSION['message-warning'])) {
      unset($_SESSION['message-warning']);
    }
    if (isset($_SESSION['message-danger'])) {
      unset($_SESSION['message-danger']);
    }
    if (isset($_SESSION['message-dark'])) {
      unset($_SESSION['message-dark']);
    }
    unset($_SESSION['time-alert']);
  }
}

$baseURL = "http://localhost/100140/";

if (isset($_POST['masuk'])) {
  if (masuk($_POST) > 0) {
    header("Location: ../auth/index");
    exit();
  }
}

$restoranView = mysqli_query($conn, "SELECT * FROM tbl_restoran ORDER BY id_restoran DESC");
$hotelView = mysqli_query($conn, "SELECT * FROM tbl_hotel ORDER BY id_hotel DESC");
$layananView = mysqli_query($conn, "SELECT * FROM tbl_layanan_publik ORDER BY id_layanan DESC");

if (!isset($_SESSION['data-user'])) {
  $tbl_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata");
  $tbl_galeri = mysqli_query($conn, "SELECT * FROM tbl_galeri");
  $tbl_lokasi = mysqli_query($conn, "SELECT * FROM tbl_lokasi JOIN tbl_wisata ON tbl_lokasi.id_lokasi=tbl_wisata.id_lokasi");

  $tbl_lokasi_wisata = mysqli_query($conn, "SELECT * FROM tbl_lokasi JOIN tbl_wisata ON tbl_lokasi.id_lokasi=tbl_wisata.id_lokasi WHERE id_kategori <= 14");
  $tbl_lokasi_fasilitas = mysqli_query($conn, "SELECT * FROM tbl_lokasi JOIN tbl_wisata ON tbl_lokasi.id_lokasi=tbl_wisata.id_lokasi WHERE id_kategori = 45");

  $tbl_wisataAll = mysqli_query($conn, "SELECT * FROM tbl_wisata JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi ORDER BY tbl_wisata.id_wisata DESC");
}

if (isset($_SESSION['data-user'])) {
  $idUser = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-user']['id']))));
  // $tbl_pengunjung = mysqli_query($conn, "SELECT * FROM tbl_pengunjung ORDER BY id_pengunjung DESC LIMIT 1");
  $tbl_kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC LIMIT 5");
  $tbl_lokasi = mysqli_query($conn, "SELECT * FROM tbl_lokasi ORDER BY id_lokasi DESC LIMIT 50");
  $tbl_lokasiAll = mysqli_query($conn, "SELECT * FROM tbl_lokasi ORDER BY id_lokasi DESC");

  $tbl_lokasi_wisata = mysqli_query($conn, "SELECT * FROM tbl_lokasi ORDER BY id_lokasi DESC LIMIT 50");
  $tbl_lokasi_fasilitas = mysqli_query($conn, "SELECT * FROM tbl_lokasi ORDER BY id_lokasi DESC LIMIT 50");

  $count_lokasi = mysqli_query($conn, "SELECT * FROM tbl_lokasi");
  $count_lokasi = mysqli_num_rows($count_lokasi);
  $count_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata");
  $count_wisata = mysqli_num_rows($count_wisata);

  // add location
  if (isset($_POST['tambah-lokasi'])) {
    if (addLocation($_POST) > 0) {
      $_SESSION['message-success'] = "Lokasi telah ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // edit location
  if (isset($_POST['ubah-lokasi'])) {
    if (editLocation($_POST) > 0) {
      $_SESSION['message-success'] = "Lokasi dari " . $_POST['namaOld'] . " telah diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // delete location
  if (isset($_POST['hapus-lokasi'])) {
    if (deleteLocation($_POST) > 0) {
      $_SESSION['message-success'] = "Lokasi dari " . $_POST['namaOld'] . " telah dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  $tbl_kategoriAll = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");

  // add category
  if (isset($_POST['tambah-kategori'])) {
    if (addCategory($_POST) > 0) {
      $_SESSION['message-success'] = "Kategori telah ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // edit category
  if (isset($_POST['ubah-kategori'])) {
    if (editCategory($_POST) > 0) {
      $_SESSION['message-success'] = "Kategori " . $_POST['namaOld'] . " telah diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // delete category
  if (isset($_POST['hapus-kategori'])) {
    if (deleteCategory($_POST) > 0) {
      $_SESSION['message-success'] = "Kategori " . $_POST['namaOld'] . " telah dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  $tbl_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata 
    JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori 
    JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi 
    ORDER BY tbl_wisata.id_wisata DESC LIMIT 25
  ");
  $tbl_wisataAll = mysqli_query($conn, "SELECT * FROM tbl_wisata 
    JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori 
    JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi 
    ORDER BY tbl_wisata.id_wisata DESC
  ");
  $select_kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori");
  $select_lokasi = mysqli_query($conn, "SELECT * FROM tbl_lokasi");

  // add tour
  if (isset($_POST['tambah-wisata'])) {
    if (addTour($_POST) > 0) {
      $_SESSION['message-success'] = "Wisata telah ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // edit wisata
  if (isset($_POST['ubah-wisata'])) {
    if (editTour($_POST) > 0) {
      $_SESSION['message-success'] = "Wisata " . $_POST['namaOld'] . " telah diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // delete wisata
  if (isset($_POST['hapus-wisata'])) {
    if (deleteTour($_POST) > 0) {
      $_SESSION['message-success'] = "Wisata " . $_POST['namaOld'] . " telah dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  $select_locationMaps = mysqli_query($conn, "SELECT * FROM tbl_lokasi JOIN tbl_wisata ON tbl_lokasi.id_lokasi=tbl_wisata.id_lokasi");
  $select_wisata = mysqli_query($conn, "SELECT * FROM tbl_wisata");
  $tbl_galeri = mysqli_query($conn, "SELECT * FROM tbl_galeri JOIN tbl_wisata ON tbl_galeri.id_wisata=tbl_wisata.id_wisata ORDER BY tbl_galeri.id_galeri DESC");

  // add galery
  if (isset($_POST['tambah-galeri'])) {
    if (addGalery($_POST) > 0) {
      $_SESSION['message-success'] = "Galeri baru telah ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // edit galery
  if (isset($_POST['ubah-galeri'])) {
    if (editGalery($_POST) > 0) {
      $_SESSION['message-success'] = "Galeri " . $_POST['namaOld'] . " telah diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // delete galery
  if (isset($_POST['hapus-galeri'])) {
    if (deleteGalery($_POST) > 0) {
      $_SESSION['message-success'] = "Galeri " . $_POST['namaOld'] . " telah dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  $tbl_admin = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id_admin!='$idUser' ORDER BY id_admin DESC");

  // add users
  if (isset($_POST['tambah-pengguna'])) {
    if (addUsers($_POST) > 0) {
      $_SESSION['message-success'] = "Pengguna baru telah ditambahkan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // edit users
  if (isset($_POST['ubah-pengguna'])) {
    if (editUsers($_POST) > 0) {
      $_SESSION['message-success'] = "Pengguna " . $_POST['namaOld'] . " telah diubah.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // delete users
  if (isset($_POST['hapus-pengguna'])) {
    if (deleteUsers($_POST) > 0) {
      $_SESSION['message-success'] = "Pengguna " . $_POST['namaOld'] . " telah dihapus.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }

  // cetak laproan per kategori
  $cetak_kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY tbl_kategori.id_kategori DESC
  ");

  // laproan per kategori
  $grafik_kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori ORDER BY tbl_kategori.id_kategori DESC");

  // view kategori
  if (isset($_POST['views-kategori'])) {
    $id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['id-kategori']))));
    $views_kategori = mysqli_query($conn, "SELECT * FROM tbl_wisata 
      JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori 
      JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi 
      WHERE tbl_wisata.id_kategori=$id_kategori 
      ORDER BY tbl_wisata.id_wisata DESC
    ");
  }

  $restoran = mysqli_query($conn, "SELECT * FROM tbl_restoran ORDER BY id_restoran DESC");
  if (isset($_POST['tambah-restoran'])) {
    if (addRestoran($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menambahkan restoran baru.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['ubah-restoran'])) {
    if (editRestoran($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil mengubah data restoran.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['hapus-restoran'])) {
    if (deleteRestoran($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menghapus data restoran.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  
  $hotel = mysqli_query($conn, "SELECT * FROM tbl_hotel ORDER BY id_hotel DESC");
  if (isset($_POST['tambah-hotel'])) {
    if (addHotel($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menambahkan hotel baru.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['ubah-hotel'])) {
    if (editHotel($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil mengubah data hotel.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['hapus-hotel'])) {
    if (deleteHotel($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menghapus data hotel.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  
  $layanan = mysqli_query($conn, "SELECT * FROM tbl_layanan_publik ORDER BY id_layanan DESC");
  if (isset($_POST['tambah-layanan'])) {
    if (addLayanan($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menambahkan layanan baru.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['ubah-layanan'])) {
    if (editLayanan($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil mengubah data layanan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
  if (isset($_POST['hapus-layanan'])) {
    if (deleteLayanan($_POST) > 0) {
      $_SESSION['message-success'] = "Berhasil menghapus data layanan.";
      $_SESSION['time-message'] = time();
      header("Location: " . $_SESSION['page-url']);
      exit();
    }
  }
}
