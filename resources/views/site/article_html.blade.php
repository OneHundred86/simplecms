@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_art.jpg" alt="行业应用"/></div>
            <div class="ind_tit">
                <h3>行业应用</h3>
                <figure><h4><span>application</span>case</h4></figure>

                <i class="ind_tit_ico2"></i>
            </div>
        </div>
    </div>
@endsection

@section('page_main')
    <main class="page_main">
        <div class="page_pos_box layout">
            <div class="page_pos">
                <img src=" images/sit.gif" alt="当前位置"/>
                <span>当前位置：</span>
                <a href="index.html">首页</a>
                <span>&gt;</span>
                <a href="#">行业应用</a>
            </div>

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            行业应用            </span><i class="fa fa-angle-down"></i></dt>

                </dl>
            </li>
        </ul>

        <section class="page_con">
            <div class="layout">
                <style>
                    @media only screen and (min-width: 0) and (max-width: 1024px) {
                        .page_con {
                            background: #f7f7f7;
                        }

                        .effect, .page_nav_bd {
                            display: none;
                        }

                        .m_pro {
                            margin-top: 0;
                        }
                    }
                </style>
                <div class="page_nav_hd">
                    <div class="left"><span>全部</span></div>
                    <ul class="right">
                        <li><a href="javascript:void(0);">更多选项<i class="fa fa-angle-down"></i></a></li>
                    </ul>
                </div>
                <ul class="page_nav_bd">
                    <li>
                        <dl>
                            <dt><span>系列</span><i class="fa fa-angle-down"></i></dt>
                            <dd>
                                <a class='active' href="article.html">全部</a>
                                <a href="article.html">环保</a>
                                <a href="article.html">热电</a>
                                <a href="article.html">化工</a>
                                <a href="article.html">城市燃气</a>

                            </dd>
                        </dl>
                    </li>
                </ul>

                <ul class="effect case baguetteBox clearfix">
                    <li>
                        <a href="images/artimg01.jpg" data-caption="陕西西安蓝博公寓">
                            <div class="pic"><img src="images/artimg01.jpg" alt="陕西西安蓝博公寓"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安蓝博公寓</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg02.jpg" data-caption="湖南省衡阳市衡阳县中医院">
                            <div class="pic"><img src="images/artimg02.jpg" alt="湖南省衡阳市衡阳县中医院"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>湖南省衡阳市衡阳县中医院</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg03.jpg" data-caption="国家统计署">
                            <div class="pic"><img src="images/artimg03.jpg" alt="国家统计署"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>国家统计署</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg04.jpg" data-caption="海口锦瑞富仁危险品运输分厂">
                            <div class="pic"><img src="images/artimg04.jpg" alt="海口锦瑞富仁危险品运输分厂"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>海口锦瑞富仁危险品运输分厂</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg05.jpg" data-caption="崇礼区太子城小镇">
                            <div class="pic"><img src="images/artimg05.jpg" alt="崇礼区太子城小镇"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>崇礼区太子城小镇</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg06.jpg" data-caption="安徽滁州星恒电源（特斯拉电源）">
                            <div class="pic"><img src="images/artimg06.jpg" alt="安徽滁州星恒电源（特斯拉电源）"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>安徽滁州星恒电源（特斯拉电源）</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg07.jpg" data-caption="(天津)天保房地产空港商业住宅项目一期精装修工程">
                            <div class="pic"><img src="images/artimg07.jpg" alt="(天津)天保房地产空港商业住宅项目一期精装修工程"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>(天津)天保房地产空港商业住宅项目一期精装修工程</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg08.jpg" data-caption="陕西西安软件公寓">
                            <div class="pic"><img src="images/artimg08.jpg" alt="陕西西安软件公寓"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安软件公寓</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg09.jpg" data-caption="陕西西安锦业公寓工程项目">
                            <div class="pic"><img src="images/artimg09.jpg" alt="陕西西安锦业公寓工程项目"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安锦业公寓工程项目</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg10.jpg" data-caption="濮阳市杂技学院">
                            <div class="pic"><img src="images/artimg10.jpg" alt="濮阳市杂技学院"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>濮阳市杂技学院</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg01.jpg" data-caption="陕西西安蓝博公寓">
                            <div class="pic"><img src="images/artimg01.jpg" alt="陕西西安蓝博公寓"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安蓝博公寓</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg02.jpg" data-caption="湖南省衡阳市衡阳县中医院">
                            <div class="pic"><img src="images/artimg02.jpg" alt="湖南省衡阳市衡阳县中医院"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>湖南省衡阳市衡阳县中医院</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg03.jpg" data-caption="国家统计署">
                            <div class="pic"><img src="images/artimg03.jpg" alt="国家统计署"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>国家统计署</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg04.jpg" data-caption="海口锦瑞富仁危险品运输分厂">
                            <div class="pic"><img src="images/artimg04.jpg" alt="海口锦瑞富仁危险品运输分厂"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>海口锦瑞富仁危险品运输分厂</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg05.jpg" data-caption="崇礼区太子城小镇">
                            <div class="pic"><img src="images/artimg05.jpg" alt="崇礼区太子城小镇"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>崇礼区太子城小镇</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg06.jpg" data-caption="安徽滁州星恒电源（特斯拉电源）">
                            <div class="pic"><img src="images/artimg06.jpg" alt="安徽滁州星恒电源（特斯拉电源）"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>安徽滁州星恒电源（特斯拉电源）</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg07.jpg" data-caption="(天津)天保房地产空港商业住宅项目一期精装修工程">
                            <div class="pic"><img src="images/artimg07.jpg" alt="(天津)天保房地产空港商业住宅项目一期精装修工程"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>(天津)天保房地产空港商业住宅项目一期精装修工程</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg08.jpg" data-caption="陕西西安软件公寓">
                            <div class="pic"><img src="images/artimg08.jpg" alt="陕西西安软件公寓"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安软件公寓</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg09.jpg" data-caption="陕西西安锦业公寓工程项目">
                            <div class="pic"><img src="images/artimg09.jpg" alt="陕西西安锦业公寓工程项目"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>陕西西安锦业公寓工程项目</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg10.jpg" data-caption="濮阳市杂技学院">
                            <div class="pic"><img src="images/artimg10.jpg" alt="濮阳市杂技学院"/></div>
                            <div class="words">
                                <div class="box">
                                    <h5>濮阳市杂技学院</h5>
                                    <i class="effect_ico"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="fenye">
                    <ul>
                        <li class="fenye-p"><a onclick='return false' href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class='active'><a onclick='return false' href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><span>···</span></li>
                        <li><a href="#">9</a></li>
                        <li class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <select class="" onchange='javascript:location.href=this.options[this.selectedIndex].value'>
                        <option value="#" selected>1</option>
                        <option value="#">2</option>
                        <option value="#">3</option>
                        <option value="#">4</option>
                        <option value="#">5</option>
                        <option value="#">6</option>
                        <option value="#">7</option>
                        <option value="#">8</option>
                        <option value="#">9</option>
                    </select></div>
                <ul class="pro_hid">
                    <li>
                        <a href="images/artimg01.jpg" data-caption="陕西西安蓝博公寓">
                            <div class="pro_pic">
                                <img realSrc="images/artimg01.jpg" alt="陕西西安蓝博公寓"/>
                            </div>
                            <div class="pro_words">
                                <h5>陕西西安蓝博公寓</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg02.jpg" data-caption="湖南省衡阳市衡阳县中医院">
                            <div class="pro_pic">
                                <img realSrc="images/artimg02.jpg" alt="湖南省衡阳市衡阳县中医院"/>
                            </div>
                            <div class="pro_words">
                                <h5>湖南省衡阳市衡阳县中医院</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg03.jpg" data-caption="国家统计署">
                            <div class="pro_pic">
                                <img realSrc="images/artimg03.jpg" alt="国家统计署"/>
                            </div>
                            <div class="pro_words">
                                <h5>国家统计署</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg04.jpg" data-caption="北京同仁堂河北省唐山市分厂">
                            <div class="pro_pic">
                                <img realSrc="images/artimg04.jpg" alt="北京同仁堂河北省唐山市分厂"/>
                            </div>
                            <div class="pro_words">
                                <h5>北京同仁堂河北省唐山市分厂</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg05.jpg" data-caption="崇礼区太子城小镇">
                            <div class="pro_pic">
                                <img realSrc="images/artimg05.jpg" alt="崇礼区太子城小镇"/>
                            </div>
                            <div class="pro_words">
                                <h5>崇礼区太子城小镇</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg06.jpg" data-caption="安徽滁州星恒电源（特斯拉电源）">
                            <div class="pro_pic">
                                <img realSrc="images/artimg06.jpg" alt="安徽滁州星恒电源（特斯拉电源）"/>
                            </div>
                            <div class="pro_words">
                                <h5>安徽滁州星恒电源（特斯拉电源）</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg07.jpg" data-caption="(天津)天保房地产空港商业住宅项目一期精装修工程">
                            <div class="pro_pic">
                                <img realSrc="images/artimg07.jpg" alt="(天津)天保房地产空港商业住宅项目一期精装修工程"/>
                            </div>
                            <div class="pro_words">
                                <h5>(天津)天保房地产空港商业住宅项目一期精装修工程</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg08.jpg" data-caption="陕西西安软件公寓">
                            <div class="pro_pic">
                                <img realSrc="images/artimg08.jpg" alt="陕西西安软件公寓"/>
                            </div>
                            <div class="pro_words">
                                <h5>陕西西安软件公寓</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg09.jpg" data-caption="陕西西安锦业公寓工程项目">
                            <div class="pro_pic">
                                <img realSrc="images/artimg09.jpg" alt="陕西西安锦业公寓工程项目"/>
                            </div>
                            <div class="pro_words">
                                <h5>陕西西安锦业公寓工程项目</h5>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="images/artimg10.jpg" data-caption="濮阳市杂技学院">
                            <div class="pro_pic">
                                <img realSrc="images/artimg10.jpg" alt="濮阳市杂技学院"/>
                            </div>
                            <div class="pro_words">
                                <h5>濮阳市杂技学院</h5>
                            </div>
                        </a>
                    </li>
                </ul>

                <ul class="m_pro baguetteBox">
                    数据加载中，请稍后...
                </ul>
                <a href="javascript:void(0);" class="loading_bnt" onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
                <script>
                    var _content = []; //临时存储li循环内容
                    var loading = {
                        _default: 6, //默认显示图片个数
                        _loading: 6, //每次点击按钮后加载的个数
                        init: function () {
                            var lis = $(".pro_hid li");
                            $(".m_pro").html("");
                            for (var n = 0; n < loading._default; n++) {
                                lis.eq(n).appendTo(".m_pro");
                            }
                            $(".m_pro img").each(function () {
                                $(this).attr('src', $(this).attr('realSrc'));
                            })
                            for (var i = loading._default; i < lis.length; i++) {
                                _content.push(lis.eq(i));
                            }
                            $(".pro_hid").html("");
                        },
                        loadMore: function () {
                            var mLis = $(".m_pro li").length;
                            for (var i = 0; i < loading._loading; i++) {
                                var target = _content.shift();
                                if (!target) {
                                    $('.loading_bnt span').html("全部加载完毕");
                                    break;
                                }
                                $(".m_pro").append(target);
                                $(".m_pro img").eq(mLis + i).each(function () {
                                    $(this).attr('src', $(this).attr('realSrc'));
                                });
                            }
                            baguetteBox.destroy();
                            baguetteBox.run(".baguetteBox", {
                                animation: "fadeIn",
                            });
                        }
                    }
                    loading.init();
                </script>
            </div>
        </section>
    </main>
@endsection
