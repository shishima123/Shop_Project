<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/Admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/Admin/popper.min.js') }}"></script>
<script src="{{ asset('js/Admin/bootstrap.min.js') }}"></script>

<script>
  /* Show/Hide layout create */
  $('#btnAdd').click(function () {
    $('#btnAdd').toggleClass('btn-primary btn-danger');
    $('#iconBtnAdd').toggleClass('fa-plus fa-minus');
    $('#layoutCreate').toggle(500);
  });

  /* Reset value input form */
  $('#btnReset').click(function () {
    $('input').val('');
  });

  /* Show/Hide password */
  $('#btnShowPw').click(function (e) {
    e.preventDefault();
    var chkAttr = $('#txtPassword').attr('type');
    if (chkAttr === 'password') {
      $('#txtPassword').attr('type', 'text');
      $('#txtPasswordConfirm').attr('type', 'text');
      $('#btnShowPw').text('Hide Password');
    } else {
      $('#txtPassword').attr('type', 'password');
      $('#txtPasswordConfirm').attr('type', 'password');
      $('#btnShowPw').text('Show Password');
    }
  });

  /* Hide flash message*/
  $('#alertMessage').delay(5000).slideUp(1000);

  /* Show/Hide button choose image in admin/user/eidt*/
  $('#tabProfile').click(function () {
    $('#changeImage').slideUp(400);
  });
  $('#tabEdit').click(function () {
    $('#changeImage').slideDown(400);
  });
  $('#chkbSaleOff').change(function() {
    $('#txtSaleOff').prop('disabled', !this.checked);
});

     CKEDITOR.replace('txtContent');
   CKEDITOR.replace('txtDescription');

</script>
</body>

</html>