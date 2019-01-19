// $(document).ready(function () {
//     //check value input search
//     $("#btnSearch").click(function (e) {
//         if ($('#txtSearch').val() == '') {
//             e.preventDefault();
//             alert('Please enter at least one search criterion');
//         }
//     });


//     var selector = 'ul li';
//     var url = window.location.href;
//     console.log(url)
//     $(selector).each(function () {
//         console.log($(this).find('a').attr('href'));
//         var path = $(this).find('a').attr('href');
//         console.log(path);
//         if (path == url) {
//             $('#home').removeClass('active');
//             $(this).addClass('active');
//             return false;
//         } else {
//             $(this).parents().addClass('active');
//         }
//         // console.log(this);
//     });
// });

jQuery(function ($) {
    $("ul a")
        .click(function (e) {
            var link = $(this);
            console.log(link);
            var item = link.parent("li");
            console.log(item);
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                setTimeout(function () {
                    link.attr("href", href);
                }, 300);
                e.preventDefault();
            }
        })
        .each(function () {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
        });
});