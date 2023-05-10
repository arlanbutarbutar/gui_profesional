<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Cetak Data";
$_SESSION['page-url'] = "cetak-data";

$id_kategori = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['id-kategori']))));
$wisata_cetak = mysqli_query($conn, "SELECT * FROM tbl_wisata 
  JOIN tbl_kategori ON tbl_wisata.id_kategori=tbl_kategori.id_kategori 
  JOIN tbl_lokasi ON tbl_wisata.id_lokasi=tbl_lokasi.id_lokasi 
  WHERE tbl_wisata.id_kategori=$id_kategori 
  ORDER BY tbl_wisata.id_wisata DESC
");
$name_kategori = mysqli_query($conn, "SELECT * FROM tbl_kategori WHERE id_kategori='$id_kategori'");
$row = mysqli_fetch_assoc($name_kategori);
header("Content-Type:   application/vnd-ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment; filename=" . $row['nama_kategori'] . ".xls"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
?>

<center>
  <h3>Data <?= $row['nama_kategori'] ?> Pariwisata Kabupaten TTU</h3>
</center>
<table border="1">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th>Nama</th>
    </tr>
  </thead>
  <tbody>
    <?php if (mysqli_num_rows($wisata_cetak) == 0) { ?>
      <tr>
        <th colspan="4">Belum ada data.</th>
      </tr>
      <?php }
    $no = 1;
    if (mysqli_num_rows($wisata_cetak) > 0) {
      while ($row = mysqli_fetch_assoc($wisata_cetak)) { ?>
        <tr>
          <th scope="row"><?= $no; ?></th>
          <td><?= $row['nama_wisata'] ?></td>
      <?php $no++;
      }
    } ?>
  </tbody>
</table>