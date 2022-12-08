<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="../assets/plugins/global/plugins.bundle.js"></script>
<script src="../assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
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