$("button.add-to-cart").on("click", function () {
    $(this).addClass("loading");
    $.ajax({
        url: BASE_URL + "shop/add-to-cart",
        type: "GET",
        data: {
            id: $(this).data("id")
        },
        success: function () {
            location.reload();
        }
    });
});

$(".update-cart").on("click", function () {
    $.ajax({
        url: BASE_URL + "shop/update-cart",
        type: "GET",
        data: {
            id: $(this).val(),
            op: $(this).text()
        },
        success: function () {
            location.reload();
        }
    });
});

$(".search-products").on("input", function () {
    const query = $(this)
        .val()
        .trim();

    if (query.length) {
        $.ajax({
            url: BASE_URL + "shop/search",
            type: "GET",
            dataType: "json",
            data: {
                query
            },
            beforeSend: function () {
                $(".fluid.search.big").addClass("loading");
            },
            success: function (data) {
                $(".fluid.search.big").removeClass("loading");

                let results = [];

                $.each(data, function () {
                    results.push(this.title);
                });

                $(".search-products")
                    .autocomplete({
                        source: results,
                        select: function (e, {
                            item: prd
                        }) {
                            let res = data.filter(
                                item => item.title == prd.value
                            );
                            const {
                                category_url,
                                url
                            } = res[0];
                            const link =
                                BASE_URL + `shop/${category_url}/${url}`;
                            window.location = link;
                        }
                    })
                    .data("autocomplete")._renderItem = function (ul, item) {
                        return $("<li></li>")
                            .data("item.autocomplete", item)
                            .append(
                                "<a class='myclass' customattribute='" +
                                item.customattribute +
                                "'>" +
                                item.label +
                                "</a>"
                            )
                            .appendTo(ul);
                    };
            }
        });
    }
});

$("#slider-welcome .owl-carousel").owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    rtl: true,
    loop: true,
    dots: true,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: false
});

$("#slider-clients .owl-carousel").owlCarousel({
    nav: true,
    rtl: true,
    loop: true,
    dots: true,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: false
});

$("#product-page-img").imagezoomsl({
    zoomrange: [3, 3]
});

$('#sort-products').on('change', function (e) {
    window.location = $(this).val();
    $(this).attr('selected', 'selected');
});

let openSearch = false;
function toggleSearch(){

    if(!openSearch){
        $('div.item.search').removeClass('only-desktop');
        $('.toolbar .logo').hide();
        $('.toolbar .hamburger').hide();
        $('.toolbar .item.shopping-cart').hide();
        $('.search-mobile i.icon').removeClass('search').addClass('times');
        openSearch = true;
    } else {
        $('div.item.search').addClass('only-desktop');
        $('.toolbar .logo').show();
        $('.toolbar .hamburger').show();
        $('.toolbar .item.shopping-cart').show();
        $('.search-mobile i.icon').addClass('search').removeClass('times');
        openSearch = false;
    }

}

$('.search-mobile').on('click', toggleSearch);

$('#filter-products-mobile-btn').on('click', filterSidebarCategories);

let openFilterProd = false;
function filterSidebarCategories(){

    if(!openFilterProd) {
        $('.sidebar-categories').css('right', '0');
        $('.overlay').fadeIn(500);
        disableScroll();
    } else {
        $('.sidebar-categories').css('right', '-100%');
        $('.overlay').fadeOut(500);
        enableScroll();
    }

    openFilterProd = !openFilterProd;
}




