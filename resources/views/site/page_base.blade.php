<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>广州迪川仪器仪表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="css/media.css">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/main_ind.css"/>
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" href=" css/common.min.css"/>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src=" js/jquery-3.4.1.js"></script>
    <script src=" js/jqueryCommon.min.js"></script>
</head>

<body>

<div class="keoror_container">
    <!--公共头部-->
    <div class="pc_top">
        <div class="h_top layout2">
            <a class="h_logo" href="index.html" title="广州迪川仪器仪表"><img src="images/logo.png" alt="广州迪川仪器仪表"/></a>
            <ul class="h_right">
                <li>
                    全国服务电话：<b>020-31199948</b>
                </li>

            </ul>
        </div>
        <div class="h_box">
            <div class="h_fixed">
                <div class="h_con layout2">
                    <ul class="h_nav">
                        <li><a href="index.html">首页</a></li>

                        <li class="active">
                            <a href="about.html">公司介绍</a>
                            <dl class="h_second_nav">
                                <dd><a href="about.html">关于迪川</a></dd>
                                <dd><a href="about.html#honor">荣誉证书</a></dd>

                            </dl>
                        </li>
                        <li>
                            <a href="product.html">产品中心</a>
                            <dl class="h_second_nav">
                                <dd><a href="product.html">微型流量计</a></dd>
                                <dd><a href="product.html">涡街流量计</a></dd>
                                <dd><a href="product.html">MF系列气体流量计</a></dd>
                                <dd><a href="product.html">广州仪器仪表</a></dd>
                                <dd><a href="product.html">齿轮流量计</a></dd>
                                <dd><a href="product.html">电磁流量计.系列</a></dd>
                                <dd><a href="product.html">金属管浮子流量计</a></dd>
                                <dd><a href="product.html">国际精品系列</a></dd>
                            </dl>
                        </li>
                        <li>
                            <a href="article.html">行业应用</a>
                            <dl class="h_second_nav">
                                <dd><a href="article.html">环保</a></dd>
                                <dd><a href="article.html">热电</a></dd>
                                <dd><a href="article.html">化工</a></dd>
                                <dd><a href="article.html">城市燃气</a></dd>
                            </dl>
                        </li>
                        <li>
                            <a href="news.html">新闻中心</a>
                            <dl class="h_second_nav">
                                <dd><a href="news.html">行业新闻</a></dd>
                                <dd><a href="news.html">公司动态</a></dd>
                                <dd><a href="shipin.html">视频专区</a></dd>
                            </dl>
                        </li>
                        <li>
                            <a href="contact.html">联系方式</a>
                            <dl class="h_second_nav">
                                <dd><a href="contact.html">联系我们</a></dd>

                            </dl>
                        </li>


                    </ul>
                    <form method="get" action="https://www.fsjhtc.cn/prosearch" id="search" name="searchForm">
                        <select name="sel" class="sel">
                            <option value="0">微型流量计</option>
                            <option value="1">MF系列气体流量计</option>
                            <option value="2">涡街流量计</option>
                            <option value="3">广州仪器仪表</option>
                        </select>
                        <input type="text" name="keywords" class="text" placeholder="热门搜索：超声波流量计、涡轮流量计"
                               autocomplete="off" value=""/>
                        <input type="submit" class="submit" value="" title="搜索"/>
                    </form>
                    <div class="m_search_btn" onClick="search_show()"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#search').submit(function () {
            var search = $("#search input[name='keywords']").val();
            var sel = $("#search select[name='sel']").val();

            var _this = $(this);
            if (search == '') {
                layer.msg('请输入关键词', {time: 2000});
                return false;
            } else {
                if (sel == 0) {
                    var url = '';
                    url = 'https://www.gzyqyb.cn/prosearch';
                } else if (sel == 1) {
                    url = 'https://www.gzyqyb.cn/effesearch';
                } else if (sel == 2) {
                    url = 'https://www.gzyqyb.cn/newssearch';
                } else if (sel == 3) {
                    url = 'https://www.gzyqyb.cn/panosearch';
                }
                document.searchForm.attributes["action"].value = url;
                _this.parent().submit();
            }
        });
    </script>
    <!-- 移动端头部 -->
    <div class="model_nav">
        <div class="layout">
            <a title="广州迪川仪器仪表有限公司" class="m_logo" href="#"><img src="web/images/logo.png" alt="广州迪川仪器仪表有限公司"/></a>
            <div class="m_right">
                <div class="m_search_btn" onClick="search_show_close()"></div>
                <div class="meun_btn" onClick="meun_btn()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="mobile_menu_box">
            <div class="mobile_menu_nav">
                <ul>
                    <li><p class="tit"><a href="index.html">首页</a></p></li>
                    <li>
                        <p class="tit"><span>公司介绍</span><b></b></p>
                        <dl class="mobile_second_nav">
                            <dd><a href="about.html">关于迪川</a></dd>
                            <dd><a href="about.html">荣誉证书</a></dd>

                        </dl>
                    </li>
                    <li>
                        <p class="tit"><span>产品中心</span><b></b></p>
                        <dl class="mobile_second_nav">
                            <dd><a href="product.html">微型流量计</a></dd>
                            <dd><a href="product.html">涡街流量计</a></dd>
                            <dd><a href="product.html">MF系列气体流量计</a></dd>
                            <dd><a href="product.html">广州仪器仪表</a></dd>
                            <dd><a href="product.html">齿轮流量计</a></dd>
                            <dd><a href="product.html">电磁流量计.系列</a></dd>
                            <dd><a href="product.html">金属管浮子流量计</a></dd>
                            <dd><a href="product.html">国际精品系列</a></dd>
                        </dl>
                    </li>
                    <li>
                        <p class="tit"><span>行业应用</span><b></b></p>
                        <dl class="mobile_second_nav">
                            <dd><a href="article.html">环保</a></dd>
                            <dd><a href="article.html">热电</a></dd>
                            <dd><a href="article.html">化工</a></dd>
                            <dd><a href="#">城市燃气</a></dd>
                        </dl>
                    </li>
                    <li>
                        <p class="tit"><span>新闻中心</span><b></b></p>
                        <dl class="mobile_second_nav">
                            <dd><a href="news.html">行业新闻</a></dd>
                            <dd><a href="news.html">公司动态</a></dd>
                            <dd><a href="shipin.html">视频专区</a></dd>
                        </dl>
                    </li>
                    <li>
                        <p class="tit"><span> 联系方式</span><b></b></p>
                        <dl class="mobile_second_nav">
                            <dd><a href="contact.html">联系我们</a></dd>

                        </dl>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- 移动端头部 -->


    <div class="search_box">
        <div class="search_con">
            <div class="layout">
                <img src="web/images/m_search.png" alt="搜索"/>
                <h3>search<br/>for</h3>
                <form method="get" action="https://www.fsjhtc.cn/prosearch" id="m_search" name="m_searchForm">
                    <select name="sel" class="sel">
                        <option value="0">微型流量计</option>
                        <option value="1">MF系列气体流量计</option>
                        <option value="2">涡街流量计</option>
                        <option value="3">广州仪器仪表</option>
                    </select>
                    <input type="text" name="keywords" class="text" placeholder="请输入搜索内容" autocomplete="off" value=""/>
                    <input type="submit" class="submit" value="enter" title="进入"/>
                </form>
                <div class="will_close">
                    <i></i>
                    <p>close</p>
                </div>
            </div>
        </div>
    </div>

    <div class="qrcode_box">
        <div class="qrcode_con">
            <i class="will_close"></i>
            <div class="qrcode_words">
                <div id="qrcode"></div>
                <p>保存二维码，扫一扫可获取凭证信息到实体门店兑现</p>
            </div>
        </div>
    </div>

    @section('banner')
        this is banner
    @show

    {{--  page main --}}
    @section('page_main')
    @show

    {{--  aside--}}
    @include('site.aside')

    {{--    footer--}}
    @include('site.footer')
</div>
<script src=" js/executemap.js"></script>
<script src="js/main.js"></script>

</body>
</html>