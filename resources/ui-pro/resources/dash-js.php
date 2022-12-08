<!--begin::Javascript-->
<script>
  var hostUrl = "../assets/index.html";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="../assets/plugins/global/plugins.bundle.js"></script>
<script src="../assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="../assets/js/widgets.bundle.js"></script>
<!--end::Page Custom Javascript-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<!--end::Javascript-->

<script>
  const messageSuccess = $('.message-success').data('message-success');
  const messageInfo = $('.message-info').data('message-info');
  const messageWarning = $('.message-warning').data('message-warning');
  const messageDanger = $('.message-danger').data('message-danger');

  if (messageSuccess) {
    Swal.fire({
      icon: 'success',
      title: 'Successfully Sent',
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
      title: 'Warning!!',
      text: messageWarning,
    })
  }
  if (messageDanger) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: messageDanger,
    })
  }
</script>

<script>
  $(document).ready(function() {
    $('#search-users').on('keyup', function() {
      $.get('search-users.php?key=' + $('#search-users').val(), function(data) {
        $('#data-search').html(data);
      });
    });
  });
</script>