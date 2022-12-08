<div class="az-footer ht-40 border-0 shadow shadow-lg">
  <div class="container ht-100p pd-t-0-f">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Netmedia Framecode <?= date('Y'); ?></span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Visit <a href="https://www.netmedia-framecode.com" target="_blank">Web Development</a></span>
  </div>
</div>
<script type="module" src="resources/js/ionicons.esm.js"></script>
<script nomodule src="resources/js/ionicons.js"></script>
<script src="resources/lib/jquery/jquery.min.js"></script>
<script src="resources/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="resources/lib/ionicons/ionicons.js"></script>
<script src="resources/lib/jquery.flot/jquery.flot.js"></script>
<script src="resources/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="resources/lib/chart.js/Chart.bundle.min.js"></script>
<script src="resources/lib/peity/jquery.peity.min.js"></script>
<script src="resources/js/azia.js"></script>
<script src="resources/js/chart.flot.sampledata.js"></script>
<script src="resources/js/dashboard.sampledata.js"></script>
<script src="resources/js/jquery.cookie.js" type="text/javascript"></script>
<!-- <script src="resources/datatable/datatables.js"></script> -->
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
<!-- <script>
  $(document).ready(function() {
    $('#datatable').DataTable();
  });
</script> -->
<script>
  (function() {
    function scrollH(e) {
      e.preventDefault();
      e = window.event || e;
      let delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
      document.querySelector('.table-responsive').scrollLeft -= (delta * 40);
    }
    if (document.querySelector('.table-responsive').addEventListener) {
      document.querySelector('.table-responsive').addEventListener('mousewheel', scrollH, false);
      document.querySelector('.table-responsive').addEventListener('DOMMouseScroll', scrollH, false);
    }
  })();
  (function() {
    function scrollData(e) {
      e.preventDefault();
      e = window.event || e;
      let delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
      document.querySelector('.scroll').scrollLeft -= (delta * 40);
    }
    if (document.querySelector('.scroll').addEventListener) {
      document.querySelector('.scroll').addEventListener('mousewheel', scrollData, false);
      document.querySelector('.scroll').addEventListener('DOMMouseScroll', scrollData, false);
    }
  })();
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