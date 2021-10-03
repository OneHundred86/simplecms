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