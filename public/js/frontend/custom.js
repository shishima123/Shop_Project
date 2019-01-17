$(document).ready(function () {
    //check value input search
    $("#btnSearch").click(function (e) {
        if ($('#txtSearch').val() == '') {
            e.preventDefault();
            alert('Please enter at least one search criterion');
        }
    });


    var selector = 'ul li';
    var url = window.location.href;
    console.log(url)
    $(selector).each(function () {
        console.log($(this).find('a').attr('href'));
        var path = $(this).find('a').attr('href');
        if (path == url) {
            $('#home').removeClass('active');
            $(this).addClass('active');
            return false;
        } else {
            // $('#home').addClass('active');
        }
        // console.log(this);
    });

});