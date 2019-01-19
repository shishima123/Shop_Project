$(document).ready(function () {
    //check value input search
    $("#btnSearch").click(function (e) {
        if ($('#txtSearch').val() == '') {
            e.preventDefault();
            alert('Please enter at least one search criterion');
        }
    });

    //add class active in navbar
    $(".dropdown a").each(function () {
        var link = $(this);
        if (link.attr('href') === location.href) {
            $('#home').removeClass('active');
            link.addClass("dropdown-select").parents("li").addClass("active");
            return false;
        } else {
            $('#home').addClass('active');

        }
    });
});