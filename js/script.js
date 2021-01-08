document.addEventListener("DOMContentLoaded", ready);

function ready() {
    let sliderVideo = null;


    let videos = $(".video_source");
    videos.each(function (e) {
        $(this).attr("src", $(this).data("way"));
    })

    function initSlider() {
        var swiperOne = new Swiper('.top-section .tabs-img-wrap', {
            breakpoints: {
                500: {
                    direction: 'vertical',
                    spaceBetween: 15,
                    slidesPerGroup: 1,
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.top-section .arrows .prev',
                        prevEl: '.top-section .arrows .next',
                    }
                },
                300: {
                    direction: 'horizontal',
                    spaceBetween: 7,
                    slidesPerGroup: 1,
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.top-section .arrows .prev',
                        prevEl: '.top-section .arrows .next',
                    }
                }
            }
        });


        var swiperOne = new Swiper('.sec-form .slider', {
            breakpoints: {
                500: {
                    direction: 'vertical',
                    spaceBetween: 15,
                    slidesPerGroup: 1,
                    // loop: true,
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.sec-form .arrows .prev',
                        prevEl: '.sec-form .arrows .next',
                    }
                },
                300: {
                    direction: 'horizontal',
                    spaceBetween: 15,
                    slidesPerGroup: 1,
                    // loop: true,
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.sec-form .arrows .prev',
                        prevEl: '.sec-form .arrows .next',
                    }
                }
            }
        });


        var swiperTwo = new Swiper('.sec-style .style-slider-item', {
            spaceBetween: 15,
            slidesPerView: 1,
            navigation: {
                nextEl: '.sec-style .arrows .prev',
                prevEl: '.sec-style .arrows .next',
            },
            pagination: {
                el: '.sec-style .swiper-pagination',
            }
        });
        sliderVideo = swiperTwo;

        let itemsSlider = document.querySelectorAll(".item-color .color-slider");
        itemsSlider.forEach(function (e, i) {
            var swiper = new Swiper('.item-color .color-slider-' + (i) + '', {
                breakpoints: {
                    500: {
                        direction: 'vertical',
                        spaceBetween: 14,
                        slidesPerGroup: 1,
                        slidesPerView: "auto",
                        navigation: {
                            nextEl: '.item-color .color-slider-' + (i) + ' .arrows .prev',
                            prevEl: '.item-color .color-slider-' + (i) + ' .arrows .next'
                        }
                    },
                    300: {
                        direction: 'horizontal',
                        slidesPerGroup: 1,
                        spaceBetween: 10,
                        slidesPerView: 1,
                        navigation: {
                            nextEl: '.item-color .color-slider-' + (i) + ' .arrows .prev',
                            prevEl: '.item-color .color-slider-' + (i) + ' .arrows .next'
                        },
                        pagination: {
                            el: '.item-color .color-slider-' + (i) + ' .swiper-pagination'
                        }
                    }
                }
            });
        })
    }


    loadImg();


    function update() {
        var Now = new Date(),
            Finish = new Date();
        Finish.setHours(23);
        Finish.setMinutes(59);
        Finish.setSeconds(59);
        if (Now.getHours() === 23 && Now.getMinutes() === 59 && Now.getSeconds === 59) {
            Finish.setDate(Finish.getDate() + 1);
        }
        var sec = Math.floor((Finish.getTime() - Now.getTime()) / 1000);
        var hrs = Math.floor(sec / 3600);
        sec -= hrs * 3600;
        var min = Math.floor(sec / 60);
        sec -= min * 60;
        $(".timer .hours").html(pad(hrs));
        $(".timer .minutes").html(pad(min));
        $(".timer .seconds").html(pad(sec));
        setTimeout(update, 200);
    }

    update();


    $(".sec-table .content .tabs div").on("click",
        function () {
            let name = this.dataset.tab;
            $(".sec-table .content .content-tabs .block-tab").removeClass("active");
            $(".sec-table .content .content-tabs").find(".block-tab[data-tab='" + name + "']").addClass("active");
        }
    )
    try {
        $(".sec-table .content .tabs div")[0].click();
    } catch ($e) {
        console.log($e);
    }


    $(".sec-colors .item-color-text .btn-color").on("click",
        function () {
            let posForm = $(".sec-form").offset().top;
            $('html').animate({
                scrollTop: posForm
            }, 1100);
            let color = $(this).data("color");
            $("body").attr("data-colorpage", color);
            let index = $(this).data("num");
            editColorPage(index);

        }
    )
    $(".top-section .btn-color").on("click",
        function () {
            let posForm = $(".sec-colors").offset().top;
            $('html').animate({
                scrollTop: posForm - 20
            }, 1100);
        }
    )
    $(".to-form.btn-color").on("click",
        function () {
            let posForm = $(".sec-form").offset().top;
            $('html').animate({
                scrollTop: posForm
            }, 1100);
        }
    )
    $(".content.mob .tit-tab").on("click",
        function () {
            $(this).closest(".block-tab").toggleClass("active");
        }
    )

    try {
        $(".content.mob .tit-tab")[0].click();
    } catch ($e) {
        console.log($e);
    }


    $(".top-section .right-sec .swiper-slide img").on("click",
        function () {
            let bigImg = $(this).closest(".right-sec").find(".wrap-img img");
            bigImg.attr("src", $(this).data("way"));
            let color = $(this).data("color");
            $("body").attr("data-colorpage", color);
            let index = $(this).closest(".swiper-slide").index();
            editColorPage(index);
        }
    )
    $(".sec-form .slider .swiper-slide img").on("click",
        function () {
            let bigImg = $(this).closest(".form_wrap").find(".wrap-img img");
            bigImg.attr("src", $(this).data("way"));
            let color = $(this).data("color");
            $("body").attr("data-colorpage", color);
            let index = $(this).closest(".swiper-slide").index();
            editColorPage(index);
        }
    )
    $(".sec-colors .swiper-slide img").on("click",
        function () {
            let bigImg = $(this).closest(".item-color-img").find(".wrap-img img");
            bigImg.attr("src", $(this).data("way"));
        }
    )
    $(".table-size").on("click",
        function () {
            if (window.innerWidth < 768) {
                $(".popap-table.table").addClass("active");
            }
        }
    )
    $(".popup__toggle").on("click",
        function () {
            $(".popap-table.form").addClass("active");
        }
    )
    $(".close-popap.table").on("click",
        function () {
            $(".popap-table.table").removeClass("active");
        }
    )
    $(".close-popap.form").on("click",
        function () {
            $(".popap-table.form").removeClass("active");
        }
    )


    function editColorPage(i) {
        let color = $("body").data("colorpage");
        if (i >= 0) {
            // edit slider VIDEO
            sliderVideo.destroy();
            var swiperTwo = new Swiper('.sec-style .style-slider-item', {
                spaceBetween: 15,
                slidesPerView: 1,
                initialSlide: i,
                navigation: {
                    nextEl: '.sec-style .arrows .prev',
                    prevEl: '.sec-style .arrows .next',
                },
                pagination: {
                    el: '.sec-style .swiper-pagination',
                }
            });
            sliderVideo = swiperTwo;
            $(".sec-form label.color select").val(i)
        }

        // edit FORM SELECTED
        // $(".sec-form label.color select option").removeAttr('selected');
        // $(".sec-form label.color select option[data-val='" + color + "']").trigger( "change" );

    }

    function loadImg() {

        let imgs = $("img.url-load");
        imgs.each(function (e) {
            $(this).attr("src", $(this).data("way"));
        })
        initSlider();
        initReviews();
    }

    function initReviews() {

        let imgs = $("img.review-load");
        imgs.each(function (e) {
            $(this).attr("src", $(this).data("way"));
        })

        var swiperReviews = new Swiper('.reviews .reviews-list', {
            spaceBetween: 15,
            loop: true,

            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: '.reviews .reviews-list_wrap .arrows .prev',
                prevEl: '.reviews .reviews-list_wrap .arrows .next',
            }
        });
    }


    function pad(s) {
        s = ("00" + s).substr(-2);
        return "<span>" + s[0] + "</span><span>" + s[1] + "</span>";
    }


    var url_string = window.location.href
    var url = new URL(url_string);
    var utm = url.searchParams.get("utm_term");

    if (utm) {
        editColorPage(utm);
    }
    $(".inp-phone").mask("\+38(999) 999-99-99");
}
