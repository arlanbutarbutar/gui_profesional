<?php require_once("../controller/script.php"); ?>

<div class="tab-content tab-content-basic">
  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
    <div class="row flex-row-reverse">
      <div class="col-md-12">
        <div class="card card-rounded">
          <div class="card-body">
            <div id="map" style="width: 100%; height: 500px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var map = L.map('map').setView([-9.3408,124.4737], 10);
  var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

  <?php if (mysqli_num_rows($select_locationMaps) > 0) {
    while ($row = mysqli_fetch_assoc($select_locationMaps)) {
      $img = $row['foto_wisata'];
      $nama = $row['nama_lokasi'];
      $deskripsi = $row['deskripsi_lokasi'];
  ?>
      L.marker([<?= $row['latitude'] ?>, <?= $row['longitude'] ?>]).bindPopup("<div><img src='../assets/images/wisata/<?= $img ?>' style='width: 100%;' alt=''><h4 style='margin-top: 5px;'><?= $nama ?></h4><p style='margin-top: -5px;'><?= $deskripsi ?></p></div>").addTo(map);
  <?php }
  } ?>
</script>