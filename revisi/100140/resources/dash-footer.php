<br>
<br>
<section class="container-fluid footer_section">
 <center> 
  <div class="row">
    <div class="col-md-12" style="color: black  ;">
      <h6>
        Sistem Informasi Geografis Objek Wisata Kabupaten TTU
      </h6>
    </div>
  </div>
  <p style="color:black;">
    &copy; <?= date("Y"); ?> All Rights Reserved
  </p>
</center>
</section>

<script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>


<script>
  var map = L.map('map').setView([-9.3408,124.4737], 10);

  var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {}).addTo(map);

  <?php 
  if ((mysqli_num_rows($tbl_lokasi) > 0)) {
    while (($row = mysqli_fetch_assoc($tbl_lokasi))) {
      $img = $row['foto_wisata'];
      $nama = $row['nama_lokasi'];
      $alamat = $row['deskripsi_lokasi'];
      $dsc = $row['id_kategori'];
      ?>
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup("<div><h4 style='margin-top: 5px;'><?= $nama ?></h4><img src='../assets/images/wisata/<?= $img ?>' style='width: 100%;' alt=''><br><p style='margin-top: 5px;'><?= $alamat ?></p><p style='margin-top: 5px;'><a href='https://www.google.co.id/maps/dir//<?= $row['latitude'] ?>, <?= $row['longitude'] ?>/' target='blank_'>Lihat Rute</a></p></div>").addTo(map);
    <?php }
  } ?>
</script>

<script src="<?= $baseURL; ?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= $baseURL; ?>assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?= $baseURL; ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= $baseURL; ?>assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="<?= $baseURL; ?>assets/js/off-canvas.js"></script>
<script src="<?= $baseURL; ?>assets/js/hoverable-collapse.js"></script>
<script src="<?= $baseURL; ?>assets/js/template.js"></script>
<script src="<?= $baseURL; ?>assets/js/settings.js"></script>
<script src="<?= $baseURL; ?>assets/js/todolist.js"></script>
<script src="<?= $baseURL; ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?= $baseURL; ?>assets/js/dashboard.js"></script>
<script src="<?= $baseURL; ?>assets/js/Chart.roundedBarCharts.js"></script>
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
<script type="text/javascript">
  function random_all() {
    var data = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var long = 9;
    var mix = '';
    for (var i = 0; i < long; i++) {
      var hasil = Math.floor(Math.random() * data.length);
      mix += data.substring(hasil, hasil + 1);
    }
    document.random_form.password.value = mix;
  }
</script>
<script>
  $(document).ready(function() {
    $('#search-all').on('keyup', function() {
      $.get('search.php?key=' + $('#search-all').val(), function(data) {
        $('#search-page').html(data);
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#dtHorizontalVerticalExample').DataTable({
      "scrollX": true,
      "scrollY": true,
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<script type="text/javascript">
  function generate(el) {
    el = document.getElementById(el);
    el.value = randomPass();
  }

  function randomPass() {
    return Math.random().toString(25).slice(-11);
  }
</script>