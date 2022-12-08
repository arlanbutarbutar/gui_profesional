<?php require_once("controller/script.php");
if (!isset($_SESSION['data-user'])) {
  header("Location: route.php");
  exit;
}
$_SESSION['page-name'] = "Export Excel";
$_SESSION['page-url'] = "export-excel";
$projects = mysqli_query($conn, "SELECT * FROM projects JOIN jenis_app ON projects.id_jenis_app=jenis_app.id_jenis_app JOIN languages ON projects.id_language=languages.id_language JOIN project_status ON projects.id_status=project_status.id_status WHERE projects.id_user='$idUser' ORDER BY projects.id_project DESC");
$date = date("d M Y");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Project " . $_SESSION['data-user']['name'] . " (" . $date . ").xls");
?>

<center>
  <h3>Data Project <?= $_SESSION['data-user']['name'] ?></h3>
</center>
<table border="1">
  <thead>
    <tr>
      <th>Nama Projek</th>
      <th>Nama Klien</th>
      <th>Jenis App</th>
      <th>Bahasa Pemrograman</th>
      <th>Github</th>
      <th>Deskripsi</th>
      <th>Rute</th>
      <th>Domain</th>
      <th>Progres</th>
      <th>Lainnya</th>
      <th>Tgl Buat</th>
      <th>Tgl Ubah</th>
    </tr>
  </thead>
  <tbody>

    <?php if (mysqli_num_rows($projects) == 0) { ?>
      <tr class="bg-transparent">
        <th class="font-weight-bold" colspan="14">belum ada data!</th>
      </tr>
      <?php } else if (mysqli_num_rows($projects) > 0) {
      while ($row = mysqli_fetch_assoc($projects)) { ?>
        <tr class="bg-transparent">
          <td><?= $row['name'] ?></td>
          <td><?= $row['pemilik'] ?></td>
          <td><?= $row['jenis_app'] ?></td>
          <td><?= $row['language'] ?></td>
          <td><?= $row['github'] ?> (<?= $row['status'] ?>)</td>
          <td><?= $row['description'] ?></td>
          <td><?= $row['route'] ?></td>
          <td><a href="https://<?= $row['domain'] ?>" target="_blank"><?= $row['domain'] ?></a></td>
          <td>
            <?php if ($row['progress'] == 0) {
              echo "Baru";
            } else if ($row['progress'] == 15) {
              echo "Perancangan DBMS";
            } else if ($row['progress'] == 35) {
              echo "Implementasi DB";
            } else if ($row['progress'] == 50) {
              echo "Perancangan App";
            } else if ($row['progress'] == 75) {
              echo "Pengujian App";
            } else if ($row['progress'] == 95) {
              echo "Pengajuan App";
            } else if ($row['progress'] == 98) {
              echo "Revisi App";
            } else if ($row['progress'] == 100) {
              echo "Selesai";
            } ?>
          </td>
          <td class="text-center"><?= $row['more'] ?></td>
          <td><?php $tgl_buat = date_create($row['created_at']);
              echo date_format($tgl_buat, 'l, d M Y'); ?></td>
          <td><?php $tgl_ubah = date_create($row['updated_at']);
              echo date_format($tgl_ubah, 'l, d M Y'); ?></td>
        </tr>
    <?php }
    } ?>
  </tbody>
</table>