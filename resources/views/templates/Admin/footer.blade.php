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
      $('#btnShowPw').text('Hide Password');
    } else {
      $('#txtPassword').attr('type', 'password');
      $('#btnShowPw').text('Show Password');
    }

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