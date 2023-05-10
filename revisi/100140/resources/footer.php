<section class="container-fluid footer_section">
    <div class="row">
      <div class="col-lg-4" style="color: white;">
        <p style="color:white; text-shadow: 4px 2px 2px black;"><i class="fa fa-map-marker" aria-hidden="true" style="color:white;"></i>&nbsp; Jl.Basuki Rachmat - Kefamenanu</p> 
        <p style="color:white;"><i class="fa fa-phone" aria-hidden="true" style="color:white; text-shadow: 4px 2px 2px black;"></i>&nbsp; (0388) 31027 / (0388) 31692 &nbsp; &nbsp; &nbsp; &nbsp; </p>
      </div>
      <div class="col-lg-4"style="color: white;">
         <p style="color:white; text-shadow: 4px 2px 2px black;"><i class="fa fa-envelope" aria-hidden="true" style="color:white;"></i>&nbsp; kominfotik@ttukab.go.id</p>
        <p style="color:white;text-shadow: 4px 2px 2px black;">
          &copy; <?= date("Y"); ?> All Rights Reserved
        </p>
      </div>
      <div class="col-lg-4"style="color: white;">
        <p style="color:white;text-shadow: 4px 2px 2px black;">
          <?= date("D , M  Y"); ?><br>
          <?= date("H : i : s"); ?>
        </p>
      </div>
    </div>
    <br>
</section>

<script type="text/javascript" src="<?= $baseURL ?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script>
  var map = L.map('map').setView([-9.3408,124.4737], 10);

  var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {}).addTo(map);

  <?php 
  if ((mysqli_num_rows($tbl_lokasi_wisata) > 0)) {
    while (($row = mysqli_fetch_assoc($tbl_lokasi_wisata))) {
      $img = $row['foto_wisata'];
      $nama = $row['nama_lokasi'];
      $dsc = $row['deskripsi_lokasi'];
      ?>
      var pointer = L.icon({
        iconUrl: '../assets/images/marker/Lmarker1.png',
        iconSize:[28,40],
        iconAnchor: [12, 41],
        popupAnchor: [0, -41]
      });

      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>],{icon: pointer}).bindPopup("<div><h4 style='margin-top: 5px;'><?= $nama ?></h4><img src='../assets/images/wisata/<?= $img ?>' style='width: 100%;' alt=''><br><p style='margin-top: 5px;'><?= $dsc ?></p><p style='margin-top: 5px;'><a href='https://www.google.co.id/maps/dir//<?= $row['latitude'] ?>, <?= $row['longitude'] ?>/' target='blank_'>Lihat Rute</a></p></div>").addTo(map);
    <?php }
  } ?>
  <?php 

  // Marker Fasilitas
  if ((mysqli_num_rows($tbl_lokasi_fasilitas) > 0)) {
    while (($row = mysqli_fetch_assoc($tbl_lokasi_fasilitas))) {
      $img = $row['foto_wisata'];
      $nama = $row['nama_lokasi'];
      $dsc = $row['deskripsi_lokasi'];
      $lat = $row['latitude'];
      $lon = $row['longitude'];
      ?>
      var mark = L.icon({
        iconUrl: '../assets/images/marker/Lmarker3.png',
        iconSize:[28,40],
        iconAnchor: [12, 41],
        popupAnchor: [0, -41]
      });
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>],{icon: mark}).bindPopup("<div><h4 style='margin-top: 5px;'><?= $nama ?></h4><img src='../assets/images/wisata/<?= $img ?>' style='width: 100%;' alt=''><p style='margin-top: 5px;'><br><a target='blank_' href=' https://www.google.com/maps/dir/Lokasi/$lat,$lon'>Lihat Rute</a></p></div>").addTo(map);
    <?php }
  } ?>
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