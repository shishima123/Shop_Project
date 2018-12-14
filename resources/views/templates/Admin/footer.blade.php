<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/Admin/jquery.min.js') }}"></script>

<script>
  $('#btnAdd').click(function () {
    console.log(this.id)
    $('#btnAdd').toggleClass('btn-primary btn-danger');
    $('#iconBtnAdd').toggleClass('fa-plus fa-minus');
    $('#layoutCreate').toggle(500);
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