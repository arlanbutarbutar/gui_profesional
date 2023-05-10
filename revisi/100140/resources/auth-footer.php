<section class="container-fluid footer_section">
 <center> 
  <div class="row">
    <div class="col-md-12" style="color: white;">
      <h6>
        Sistem Informasi Geografis Objek Wisata Kabupaten TTU
      </h6>
      <hr>
    </div>
  </div>
</center>
<p style="color:white;text-shadow: 4px 2px 2px black;">
  &copy; <?= date("Y"); ?> All Rights Reserved
</p>
</section>

<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>

<script>
  var map = L.map('map').setView([-9.3408,124.4737], 10);

  var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {}).addTo(map);

  <?php if (mysqli_num_rows($tbl_lokasi) > 0) {
    while ($row = mysqli_fetch_assoc($tbl_lokasi)) {
      $image = $row['foto_wisata'];
      $nama = $row['nama_lokasi'];
      $deskripsi = $row['deskripsi_lokasi'];
  ?>
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup("<div><img src='assets/images/wisata/<?= $image ?>' style='width: 100%;' alt=''><h4 style='margin-top: 5px;'><?= $nama ?></h4><p style='margin-top: -5px;'><?= $deskripsi ?></p></div>").addTo(map);
  <?php }
  } ?>
</script>
<script src="<?= $baseURL; ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= $baseURL; ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= $baseURL; ?>assets/js/off-canvas.js"></script>
<script src="<?= $baseURL; ?>assets/js/hoverable-collapse.js"></script>
<script src="<?= $baseURL; ?>assets/js/template.js"></script>
<script src="<?= $baseURL; ?>assets/js/settings.js"></script>
<script src="<?= $baseURL; ?>assets/js/todolist.js"></script>
<script src="<?= $baseURL; ?>assets/js/jquery-3.5.1.min.js"></script>
<script>
  const messageSuccess = $('.message-success').data('message-success');
  const messageInfo = $('.message-info').data('message-info');
  const messageWarning = $('.message-warning').data('message-warning');
  const messageDanger = $('.message-danger').data('message-danger');

  if (messageSuccess) {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Terkirim',
      text: messageSuccess,
    })
  }

  if (messageInfo) {
    Swal.fire({
      icon: 'info',
      title: 'For your information',
      text: messageInfo,
    })
  }
  if (messageWarning) {
    Swal.fire({
      icon: 'warning',
      title: 'Peringatan!!',
      text: messageWarning,
    })
  }
  if (messageDanger) {
    Swal.fire({
      icon: 'error',
      title: 'Kesalahan',
      text: messageDanger,
    })
  }
</script>