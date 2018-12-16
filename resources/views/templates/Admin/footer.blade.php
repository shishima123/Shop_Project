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

  $('#alertMessage').delay(3000).slideUp(1000);

  $('#tabProfile').click(function(){
$('#changeImage').slideUp(400);
  });

  $('#tabEdit').click(function(){
$('#changeImage').slideDown(400);
  });
</script>
{{-- Neu su dung ajax thi xai --}}
{{-- <script>
  $('a').click(function () {
    // e.preventDefault();
    $('a').removeClass('active');
    $(this).addClass('active');
  })
</script> --}}
</body>

</html>