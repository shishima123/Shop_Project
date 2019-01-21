$(document).ready(function () {
    //check value input search
    $("#btnSearch").click(function (e) {
        if ($('#txtSearch').val() == '') {
            e.preventDefault();
            alert('Please enter at least one search criterion');
        }
    });

    /* Hide flash message*/
    $('#alertMessage').delay(5000).slideUp(1000);

    //add class active in navbar
    $(".dropdown a").each(function () {
        var link = $(this);
        if (link.attr('href') === location.href) {
            $('#home').removeClass('active');
            link.parents("li").addClass("active");
            return false;
        } else {
            $('#home').addClass('active');
        }
    });

    //check comment rating
    $('#commentRating').click(function (e) {
        console.log($("input[name='rating']").is(":checked"));
        if ($('#txtComment').val() == '' || $("input[name='rating']").is(":checked") == false) {
            e.preventDefault();
            alert('Please enter your comment or select star rating');
        }
    });

    $('.store-pagination li a').click(function (e) {
        e.preventDefault();
        var objClick = $(this);
        objUrl = objClick.attr('href');
        $.ajax({
                url: objUrl,
                type: 'GET',
            })
            .done(function (data) {
                //clear div #areaProduct
                $('#areaProduct').empty();

                //Render and apend data to #areaProduct
                renderProduct(data);

                //animation scroll
                $('html, body').animate({
                    scrollTop: $('#areaProduct').offset().top
                }, 'slow');

                //remove class active
                $('.page-item').removeClass('active');

                //add class active
                if (objClick.parent().hasClass('first')) {
                    objClick.parent().next().addClass('active')
                } else if (objClick.parent().hasClass('last')) {
                    objClick.parent().prev().addClass('active')
                } else {
                    objClick.parents('li').not('.first,.last').addClass('active');
                }
            }).fail(function () {
                alert('Sorry. Some things wrong when load data. Please try again.');
            })
    });

    function renderProduct(data) {
        var product = data.data;
        var baseUrl = window.location.origin;

        for (x in product) {
            var strHtml = '';
            strHtml += '<!-- product -->';
            strHtml += '<div class="col-md-4 col-xs-6">';
            strHtml += '<div class="product">'
            strHtml += '<a href="' + baseUrl + '/shop_project/public/product/' + product[x].id + '">';
            strHtml += '<div class="product-img">'
            strHtml += '<img src = "' + baseUrl + '/shop_project/public' + product[x].picture + '" alt = "' + product[x].name + '">';
            strHtml += '<div class="product-label">'
            if (product[x].sale) {
                strHtml += '<span class="sale">-' + product[x].sale + '%</span>'
            }
            if (product[x].new) {
                strHtml += '&nbsp;<span class="new">NEW</span>'
            }
            strHtml += '</div>'
            strHtml += '</div>'
            strHtml += '</a>'
            strHtml += '<div class="product-body">'
            strHtml += '<p class="product-category">' + product[x].category.name + '</p>'
            strHtml += '<h3 class="product-name"><a href="' + baseUrl + '/shop_project/public/product/' + product[x].id + '">' + product[x].name + '</a></h3>'
            strHtml += '<h4 class="product-price">' + (product[x].price - product[x].price * product[x].sale / 100) + '$ </h4>'
            if (product[x].sale) {
                strHtml += '<del class="product-old-price">' + product[x].price + '$</del>'
            } else {
                strHtml += '<br />'
            }
            strHtml += '<div class="product-rating">'
            for (i = 0; i < product[x].rating; i++) {
                if (i == 0) {
                    strHtml += '<i class="fa fa-star"></i>'
                } else {
                    strHtml += '&nbsp;<i class="fa fa-star"></i>'
                }
            }
            strHtml += '</div>'
            strHtml += '<div class="product-btns">'
            strHtml += '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">addto wishlist</span></button>'
            strHtml += '&nbsp;<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">addto compare</span></button>'
            strHtml += '&nbsp;<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quickview</span></button>'
            strHtml += '</div>'
            strHtml += '</div>'
            strHtml += '<div class="add-to-cart">'
            strHtml += '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>'
            strHtml += '</div>'
            strHtml += '</div>'
            strHtml += '</div>'
            strHtml += '<!-- /product -->'
            $(strHtml).appendTo('#areaProduct');
        }
    }

    if ($('#cart').length) {
        url = window.location.origin + '/shop_project/public/get-cart-info';
        console.log(url);
        $.ajax({
                url: url,
                type: 'GET',
            })
            .done(function (data) {
                $('#totalProduct').text('Your Cart(' + data.products_count + ')')
                console.log(data.products_count);
                // var strHtml = '';
                // strHtml += '<div class="cart-list">'
                // for (x in data) {
                //     strHtml += '<div class="product-widget">'
                //     strHtml += '<div class="product-img">'
                //     strHtml += '<img src="" alt="">'
                //     strHtml += '</div>'
                //     strHtml += '<div class="product-body">'
                //     strHtml += '<h3 class="product-name"><a href="#">product name goes here</a></h3>'
                //     strHtml += '<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>'
                //     strHtml += '</div>'
                //     strHtml += '<button class="delete"><i class="fa fa-close"></i></button>'
                //     strHtml += '</div>'
                // }
                // strHtml += '</div>'
                // strHtml += '<div class="cart-summary">'
                // strHtml += '<small>3 Item(s) selected</small>'
                // strHtml += '<h5>SUBTOTAL: $2940.00</h5>'
                // strHtml += '</div>'
                // $(strHtml).appendTo('#cartDetail');
            }).fail(function () {
                alert('Sorry. Some things wrong when load data. Please try again.');
            });
    }
});