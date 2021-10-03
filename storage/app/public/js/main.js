function mouseenterClass(ul,li1,li2){
    $(function(){
        $(li1).mouseenter(function(){
            var index = $(li1).index(this);
            $(li1).removeClass("active");
            $(li2).removeClass("active");
            $(li1).eq(index).addClass("active");
            $(li2).eq(index).addClass("active");
        });
        $(li1).removeClass("active");
        $(li2).removeClass("active");
        $(li1).eq(0).addClass("active");
        $(li2).eq(0).addClass("active");
    });
}

function clickClass(ul,li1,li2){
    $(function(){
        $(li1).click(function(){
            var index = $(li1).index(this);
            $(li1).removeClass("active");
            $(li2).removeClass("active");
            $(li1).eq(index).addClass("active");
            $(li2).eq(index).addClass("active");
        });
        $(li1).removeClass("active");
        $(li2).removeClass("active");
        $(li1).eq(0).addClass("active");
        $(li2).eq(0).addClass("active");
    });
}

function mouseenterTimeClass(ul,li1,li2,time){
    var adv_index = 0;
    var adv_task;
    $(function(){
        $(li1).mouseenter(function(){
            var index = $(li1).index(this);
            $(li1).removeClass('active');
            $(li2).removeClass('active');
            $(li1).eq(index).addClass('active');
            $(li2).eq(index).addClass('active');
            adv_index = index+1;
            if(adv_index==$(li1).length){
                adv_index=0;
            }
        });
        $(li1).removeClass('active');
        $(li2).removeClass('active');
        $(li1).eq(0).addClass('active');
        $(li2).eq(0).addClass('active');
        adv_index = 0+1;
        if(adv_index==$(li1).length){
            adv_index=0;
        }
        $(ul).hover(function(){
            clearInterval(adv_task);
        },function(){
            adv_task = setInterval(function(){
                $(li1).removeClass('active');
                $(li2).removeClass('active');
                $(li1).eq(adv_index).addClass('active');
                $(li2).eq(adv_index).addClass('active');
                adv_index = adv_index+1;
                if(adv_index==$(li1).length){
                    adv_index=0;
                }
            },time);
        }).mouseleave();
    });
}

function swiper_btn(SwiperName){
    $(SwiperName + " .swiper-button-next").addClass("active");
    $(SwiperName + " .swiper-button-prev").click(function () {
        $(this).addClass("active");
        $(SwiperName + " .swiper-button-next").removeClass("active");
    });
    $(SwiperName + " .swiper-button-next").click(function () {
        $(this).addClass("active");
        $(SwiperName + " .swiper-button-prev").removeClass("active");
    });
}

// function tip_show(object,msg,url="",time=1500){
//     if(object.attr('disabled') != true){
//         object.attr('disabled',true);
//     }
//     $('.tip_show').html(msg);
//     $('.tip_show').show();
//     $('.tip_show').addClass('bounceIn').addClass('animated');
//     if(url != ""){
//         window.location.href = url;
//     }
//     setTimeout(function () {
//         $('.tip_show').hide();
//         object.attr('disabled',false);
//     }, time);
// }

function delayed(object){
    if(object.attr('disabled') != true){
        object.attr('disabled',true);
        object.css('background','#bfbfbf');
    }
    setTimeout(function(){
        object.attr('disabled',false);
        object.css('background','#536072');
    },5000);
}

/*== 返回顶部 ==*/
$(function () {
    var back = $('.go_top');
    back.click(function () {
        var timer = setInterval(function () {
            $(window).scrollTop($(window).scrollTop() - 50);
            if ($(window).scrollTop() == 0) {
                clearInterval(timer);
            }
        }, 2);
    });
    if(window.innerWidth > 1024){
        $(window).scroll(function () {
            var heig = $(document).scrollTop();
            if (heig > 400) {
                back.show();
            } else {
                back.hide();
            }
        });
    }
});

/*== 图片放大 ==*/
$(function(){
    baguetteBox.run(".baguetteBox", {
        animation: "fadeIn",
    });
});

/*== 当前城市 ==*/
if($(".location").length>0){
    clickClass("location",".location_hd dd",".location_bd dd");
    
    $(".location_hd dd:nth-of-type(2)").click(function(){
        $(".h_right li:nth-of-type(1)").addClass("active");
    });
    $(".location_bg").click(function(){
        $(".h_right li:nth-of-type(1)").removeClass("active");
        $(".location_hd dd").removeClass("active");
        $(".location_bd dd").removeClass("active");
        $(".location_hd dd").eq(0).addClass("active");
        $(".location_bd dd").eq(0).addClass("active");
    });
    $(".location_hd dd:nth-of-type(1)").click(function(){
        $(".h_right li:nth-of-type(1)").removeClass("active");
    });
}

/*== 顶部固定导航 ==*/
if($(".h_box").length>0){
    var h_fixed_height = $(".h_fixed").height();
    $(".h_box").css({height: h_fixed_height});
    var h_top_height = $(".h_top").height();

    $(window).scroll(function(){
        if($(window).scrollTop() > h_top_height){
            if($('.h_fixed').hasClass('active')){
                return false;
            }else{
                $('.h_fixed').addClass('active');
            }
        }else{
            if($('.h_fixed').hasClass('active')){
                $('.h_fixed').removeClass('active');
            }else{
                return false;
            }
        }
    });

}

/*== 顶部二级导航 ==*/
$('.h_nav li').hover(function(){
    $(this).find('dl').stop(true,true);
    $(this).find('dl').slideDown(500);
},function(){
    $(this).find('dl').stop(true,true);
    $(this).find('dl').slideUp(500);
});

/*== 移动端导航 ==*/
if($(".meun_btn").length>0){
    function meun_btn(){
        $('.mobile_menu_box').slideToggle(300);
        $(".meun_btn").toggleClass("meun_btn_open");
    }
    $(".mobile_menu_nav ul li .tit").click(function(){
        $(this).toggleClass("active").parent().siblings().find(".tit").removeClass("active");
        $(this).next(".mobile_second_nav").slideToggle(300).parent().siblings().find(".mobile_second_nav").slideUp(300);
    });
}

/*== 搜索弹框 ==*/
$(".search_box .will_close").click(function(){
    $(".search_box").fadeOut(500);
    // $("html,body").fadeIn(500).css({"overflow":"visible"});
});
function search_show(){
    $(".search_box").fadeIn(500).css({"display":"flex"});
    $(".search_con").addClass("bounceIn").addClass("animated");
    // $("html,body").fadeIn(500).css({"overflow":"hidden"});
}
function search_show_close(){
    $(".m_search_btn").toggleClass("m_close_btn");
    $(".search_box").slideToggle(350)
    // $("html,body").fadeIn(500).css({"overflow":"hidden"});
}

/*== 首页banner ==*/
if($(".ind_banner").length > 0){
    var ind_banner = new Swiper('.ind_banner .swiper-container', { 
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.ind_banner .swiper-pagination',
            clickable: true,
        },
    });
}
if($(".m_ind_banner").length > 0){
    var m_ind_banner = new Swiper('.m_ind_banner .swiper-container', { 
        observer: true,
        observeParents: true,
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.m_ind_banner .swiper-pagination',
            clickable: true,
        },
    });
}

/*== 首页留言 ==*/
if($(".feedback").length > 0){
    $(".feedback_hd li").click(function(){
        $(".feedback_box").show();
        $(this).addClass("active").siblings().removeClass("active");
        var type = $(this).attr("data-type");
        var discount = $(this).attr("data-discount");
        var text1 = $(this).attr("data-caption1");
        var text2 = $(this).attr("data-caption2");
        var text3 = $(this).attr("data-caption3");
        var text4 = $(this).attr("data-caption4");
        var text5 = $(this).attr("data-caption5");
        $(".feedback_type").val(type);
        $(".feedback_discount").val(discount);
        $(".feedbackText1").text(text1);
        $(".feedbackText2").text(text2);
        $(".feedback_form section .form_btn").attr("value",text3);
        if($(this).index() != "0"){
            $(".feedbackCount").hide();
        }else{
            $(".feedbackCount").show();
        }
        if(text4 != ""){
            $(".feedbackText4").text(text4);
            $(".feedbackText4").show();
        }else{
            $(".feedbackText4").hide();
        }
        if(text5 != ""){
            $(".feedbackText5").text(text5);
            $(".feedbackText5").show();
        }else{
            $(".feedbackText5").hide();
        }
    });

    $(".close_ico").click(function(){
        $(".feedback_box").hide();
    });
    $(window).resize(function () {
        if(window.innerWidth > 1500){
            $(".feedback_box").show();
        }
    });
}

/*== 首页新品推荐 ==*/
if($(".ind3_swiper").length > 0){
    var ind3_swiper = new Swiper('.ind3_swiper .swiper-container',{
        observer: true,
        observeParents: true,
        slidesPerView: 4,
        spaceBetween: 26.667,
        navigation: {
            nextEl: '.ind3_swiper .swiper-button-next',
            prevEl: '.ind3_swiper .swiper-button-prev',
        },
        breakpoints: {
            375: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            520: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 26.667,
            },
        },
    });
}

/*== 首页热门活动 ==*/
if($(".ind4_swiper").length > 0){
    var ind4_words = new Swiper('.ind4_words .swiper-container',{
        observer: true,
        observeParents: true,
        speed:1000,
        simulateTouch: false,
    });

    var ind4_pic = new Swiper('.ind4_pic .swiper-container',{
        observer: true,
        observeParents: true,
        speed:1000,
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
        },
        pagination : {
            el: ".ind4_pic .swiper-pagination",
            clickable: true,
        },
        controller: {
            control: ind4_words,
        },
    });
}

/*== 首页空间效果 ==*/
if($(".ind5_swiper").length > 0){
    var ind5_swiper = new Swiper('.ind5_swiper .swiper-container', { 
        observer: true,
        observeParents: true,
        pagination: {
            el: '.ind5_swiper .swiper-pagination',
            clickable: true,
        },
    });
}

/*== 首页产品中心 ==*/
if($(".ind6_swiper").length > 0){
    var ind6_swiper = new Swiper('.ind6_swiper .swiper-container', { 
        observer: true,
        observeParents: true,
        pagination: {
            el: '.ind6_swiper .swiper-pagination',
            clickable: true,
        },
    });
}

/*== 首页媒体中心 ==*/
var ind7_swiper = new Swiper('.ind7_swiper .swiper-container',{
    observer: true,
    observeParents: true,
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
        nextEl: '.ind7_swiper .swiper-button-next',
        prevEl: '.ind7_swiper .swiper-button-prev',
    },
    breakpoints: {
        520: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 2,
            spaceBetween: 26.667,
        },
    },
    on: {
        slideChangeTransitionStart: function(){
            var curIndex = this.activeIndex+1;
            curIndex = Math .ceil(curIndex);
            curIndex = '000'+curIndex;
            curIndex = curIndex.substring(curIndex.length-2,curIndex.length);
            $('#curIndex').text(curIndex);
            var totalPage = Math .ceil($(".ind7_swiper .swiper-slide").length);
            totalPage = '000'+totalPage;
            totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
            $('#total').text(totalPage);
        },
    },
});
if($(".ind7_swiper .swiper-slide").length>0){
    $('#curIndex').text("01");
    var totalPage = Math .ceil($(".ind7_swiper .swiper-slide").length);
    totalPage = '000'+totalPage;
    totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
    $('#total').text(totalPage);
}

/*== 移动端内页导航 ==*/
if($(".m_page_nav").length>0){
    $(".m_page_nav li dl dt").click(function(){
        $(this).parents("li").toggleClass("active");
        $(this).siblings("dd").slideToggle("slow");
        if($(this).find("i").hasClass("fa-angle-down")){
            $(this).find("i").removeClass("fa-angle-down");
            $(this).find("i").addClass("fa-angle-up");
        }else{
            $(this).find("i").removeClass("fa-angle-up");
            $(this).find("i").addClass("fa-angle-down");
        }
    });
}

/*== 荣誉证书 ==*/
if($(".about2_swiper").length > 0){
    var about2_swiper = new Swiper('.about2_swiper .swiper-container',{
        observer: true,
        observeParents: true,
        slidesPerView: 4,
        spaceBetween: 26.667,
        navigation: {
            nextEl: '.about2_swiper .swiper-button-next',
            prevEl: '.about2_swiper .swiper-button-prev',
        },
        breakpoints: {
            375: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            520: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1300: {
                slidesPerView: 3,
                spaceBetween: 26.667,
            },
        },
    });
}

/*== 生产设备 ==*/
if($(".about3_pic").length > 0){
    var about3_pic = new Swiper('.about3_pic .swiper-container',{
        observer: true,
        observeParents: true,
        navigation: {
            nextEl: '.about3_pic .swiper-button-next',
            prevEl: '.about3_pic .swiper-button-prev',
        },
        on: {
            slideChangeTransitionStart: function(){
                var curIndex = this.activeIndex+1;
                curIndex = Math .ceil(curIndex);
                curIndex = '000'+curIndex;
                curIndex = curIndex.substring(curIndex.length-2,curIndex.length);
                $('#curIndex').text(curIndex);
                var totalPage = Math .ceil($(".about3_pic .swiper-slide").length);
                totalPage = '000'+totalPage;
                totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
                $('#total').text(totalPage);
            },
        },
    });
    if($(".about3_pic .swiper-slide").length>0){
        $('#curIndex').text("01");
        var totalPage = Math .ceil($(".about3_pic .swiper-slide").length);
        totalPage = '000'+totalPage;
        totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
        $('#total').text(totalPage);
    }
}

/*== 发展历程 ==*/
var about5_bd = new Swiper('.about5_bd .swiper-container',{
    observer: true,
    observeParents: true,
    effect : 'fade',
    simulateTouch: false,
    autoHeight: true,
    navigation: {
        nextEl: '.about5_hd .swiper-button-next',
        prevEl: '.about5_hd .swiper-button-prev',
    },
    on: {
        slideChangeTransitionStart: function(){
           about5_hd.slideTo(this.realIndex, 600, false);
            $(".about5_hd .swiper-slide").eq(this.activeIndex).addClass("swiper-slide-active").siblings().removeClass("swiper-slide-active");
        },
    },
});

var about5_hd = new Swiper('.about5_hd .swiper-container',{
    observer: true,
    observeParents: true,
    slidesPerView: 7,
    spaceBetween: 15,
    breakpoints: {
        550: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        1023: {
            slidesPerView: 5,
        },
        1100: {
            slidesPerView: 6,
        },
        
    },
    on: {
        slideChangeTransitionStart: function(){
          about5_bd.slideTo(this.realIndex, 600, false);
        },
    },
});

$(".about5_hd .swiper-slide").mouseenter(function(){
    num = $(this).index();
    $(this).addClass("swiper-slide-active").siblings().removeClass("swiper-slide-active");
    about5_bd.slideTo(num, 600, false);
});

/*== 产品更多选项 ==*/
if($(".page_nav_hd").length>0){
    $(".page_nav_hd .right li").click(function(){
        $(".page_nav_bd ").slideToggle("slow");
        if($(this).find("i").hasClass("fa-angle-down")){
            $(this).find("i").removeClass("fa-angle-down");
            $(this).find("i").addClass("fa-angle-up");
        }else{
            $(this).find("i").removeClass("fa-angle-up");
            $(this).find("i").addClass("fa-angle-down");
        }
    });

    if(window.innerWidth <= 1024){
        $(".page_nav_bd li dl dt").click(function(){
            $(this).parents("li").toggleClass("active");
            $(this).siblings("dd").slideToggle("slow");
            if($(this).find("i").hasClass("fa-angle-down")){
                $(this).find("i").removeClass("fa-angle-down");
                $(this).find("i").addClass("fa-angle-up");
            }else{
                $(this).find("i").removeClass("fa-angle-up");
                $(this).find("i").addClass("fa-angle-down");
            }
        });
    }
}

/*== 产品详情 ==*/
if($(".pro_view1").length > 0){
    var pro_view1_bd = new Swiper('.pro_view1_bd .swiper-container',{
        observer: true,
        observeParents: true,
        effect : 'fade',
        on: {
            slideChangeTransitionStart: function(){
               pro_view1_hd.slideTo(this.realIndex, 600, false);
                $(".pro_view1_hd .swiper-slide").eq(this.activeIndex).addClass("active").siblings().removeClass("active");
            },
        },
    });

    var pro_view1_hd = new Swiper('.pro_view1_hd .swiper-container',{
        observer: true,
        observeParents: true,
        slidesPerView: "auto",
        spaceBetween: 4,
        on: {
            slideChangeTransitionStart: function(){
              pro_view1_bd.slideTo(this.realIndex, 600, false);
            },
        },
    });

    $(".pro_view1_hd .swiper-slide").click(function(){
        num = $(this).index();
        $(this).addClass("active").siblings().removeClass("active");
        pro_view1_bd.slideTo(num, 600, false);

        //点击后导航滑动
        var _pag = $(".pro_view1_hd .swiper-slide.active").index();
        var _num = $(".pro_view1_hd .swiper-slide").length - 1;
        if(_pag > 1 && _pag != _num){
            _pag = _pag -1 ;
            pro_view1_hd.slideTo(_pag, 600, false);
        }else if (_pag == _num){
            pro_view1_hd.slideTo(_pag - 2, 600, false);
        }else{
            pro_view1_hd.slideTo(0, 600, false);
        }
    });
}

if($(".pro_view2").length > 0){
    var pro_view2_bd = new Swiper('.pro_view2_bd .swiper-container',{
        observer: true,
        observeParents: true,
        navigation: {
            nextEl: '.pro_view2_bd .swiper-button-next',
            prevEl: '.pro_view2_bd .swiper-button-prev',
        },
        on: {
            slideChangeTransitionStart: function(){
               pro_view2_hd.slideTo(this.realIndex, 600, false);
                $(".pro_view2_hd .swiper-slide").eq(this.activeIndex).addClass("active").siblings().removeClass("active");
            },
        },
    });

    var pro_view2_hd = new Swiper('.pro_view2_hd .swiper-container',{
        observer: true,
        observeParents: true,
        slidesPerView: 5,
        spaceBetween: 25,
        breakpoints: {
            375: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            520: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
        on: {
            slideChangeTransitionStart: function(){
              pro_view2_bd.slideTo(this.realIndex, 600, false);
            },
        },
    });

    $(".pro_view2_hd .swiper-slide").click(function(){
        num = $(this).index();
        $(this).addClass("active").siblings().removeClass("active");
        pro_view2_bd.slideTo(num, 600, false);

        //点击后导航滑动
        var _pag = $(".pro_view2_hd .swiper-slide.active").index();
        var _num = $(".pro_view2_hd .swiper-slide").length - 1;
        if(_pag > 1 && _pag != _num){
            _pag = _pag -1 ;
            pro_view2_hd.slideTo(_pag, 600, false);
        }else if (_pag == _num){
            pro_view2_hd.slideTo(_pag - 2, 600, false);
        }else{
            pro_view2_hd.slideTo(0, 600, false);
        }
    });
}

/*== 效果中心详情 ==*/
if($(".effect_view_swiper").length > 0){
    var effect_view_swiper = new Swiper('.effect_view_swiper .swiper-container',{
        observer: true,
        observeParents: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.effect_view_swiper .swiper-button-next',
            prevEl: '.effect_view_swiper .swiper-button-prev',
        },
    });
}

/*== 媒体中心详情 ==*/
if($(".pub_view_swiper").length > 0){
    var pub_view_swiper = new Swiper('.pub_view_swiper .swiper-container',{
        observer: true,
        observeParents: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.pub_view_swiper .swiper-button-next',
            prevEl: '.pub_view_swiper .swiper-button-prev',
        },
        on: {
            slideChangeTransitionStart: function(){
                var curIndex = this.activeIndex+1;
                curIndex = Math .ceil(curIndex);
                curIndex = '000'+curIndex;
                curIndex = curIndex.substring(curIndex.length-2,curIndex.length);
                $('#curIndex').text(curIndex);
                var totalPage = Math .ceil($(".pub_view_swiper .swiper-slide").length);
                totalPage = '000'+totalPage;
                totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
                $('#total').text(totalPage);
            },
        },
    });
    if($(".pub_view_swiper .swiper-slide").length>0){
        $('#curIndex').text("01");
        var totalPage = Math .ceil($(".pub_view_swiper .swiper-slide").length);
        totalPage = '000'+totalPage;
        totalPage = totalPage.substring(totalPage.length-2,totalPage.length);
        $('#total').text(totalPage);
    }
}


/*== 招商加盟 ==*/
mouseenterClass(".join3_con",".join3_hd li",".join3_bd li");

if($(".m_join3_swiper").length > 0){
    var m_join3_swiper = new Swiper('.m_join3_swiper .swiper-container', { 
        observer: true,
        observeParents: true,
        pagination: {
            el: '.m_join3_swiper .swiper-pagination',
            clickable: true,
        },
    });
}

/*== 经销商登录 ==*/
$('.login_box .will_close').click(function () {
    $('.login_box').fadeOut(500);
});
$('.login_btn').click(function () {
    $('.login_box').fadeIn(500).css({display:'flex'});
    $('.login_con').addClass('bounceIn').addClass('animated');
});

/*== 0元设计 ==*/
$('.design_box .will_close').click(function () {
    $('.design_box').fadeOut(500);
});
$('.design_btn').click(function () {
    $('.design_box').fadeIn(500).css({display:'flex'});
    $('.design_con').addClass('bounceIn').addClass('animated');
});

/*== 产品询价 ==*/
function showQuery(idName){
    $('.design_box2').fadeIn(500).css({display:'flex'});
    $('.design_con2').addClass('bounceIn').addClass('animated');
    $('#pro_idName').val('询价产品(id-name)：' + idName);
}
$(".design_box2 .will_close").click(function(){
    $('.design_box2').fadeOut(500);
});

/*== 优惠二维码 ==*/
$('.qrcode_box .will_close').click(function () {
    $('.qrcode_box').fadeOut(500);
});

/*== 微信公众号弹框 ==*/
if(window.innerWidth <= 1024){
    $('.fixed_box .will_close').click(function () {
        $('.fixed_box').fadeOut(500);
    });
    $('.fixed_wx').click(function () {
        $('.fixed_box').fadeIn(500).css({display:'flex'});
        $('.fixed_con').addClass('bounceIn').addClass('animated');
    });
}

/*== 移动端返回顶部 ==*/
$(".fixed li:last-child").click(function() {
    $("body,html").animate({
        scrollTop: $("body").offset().top
    },
    1000);
    return false;
});