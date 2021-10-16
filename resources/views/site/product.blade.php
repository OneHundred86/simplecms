@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_prod.jpg" alt="产品中心" /></div>
            <div class="ind_tit">
                <h3>产品中心</h3>
                <figure>
                    <h4><span>Product</span>center</h4>
                </figure>

                <i class="ind_tit_ico2"></i>
            </div>
        </div>
    </div>
@endsection

@section('page_main')
    <main class="page_main">
        <div class="page_pos_box layout">
            <div class="page_pos">
                <img src=" images/sit.gif" alt="当前位置" />
                <span>当前位置：</span>
                <a href="#">首页</a>
                <span>&gt;</span>
                <a href="#">产品中心</a>
            </div>

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            产品中心 </span><i class="fa fa-angle-down"></i></dt>

                </dl>
            </li>
        </ul>

        <section class="page_con">
            <div class="layout">
                <style>
                    @media only screen and (min-width: 0) and (max-width: 1024px) {
                        .page_con {
                            padding-top: .32rem;
                            background: #f7f7f7;
                        }

                        .pro {
                            display: none;
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
                            <dt><span>分类</span><i class="fa fa-angle-down"></i></dt>
                            <dd id="root_type">
                                <a class='active' href="#">全部</a>
                                <a href="#">广州仪器仪表</a>
                                <a href="#">椭圆齿轮流量计</a>
                                <a href="#">浮球液位开关</a>
                                <a href="#">涡街流量计</a>
                                <a href="#">压力变送器</a>
                                <a href="#">电磁流量计</a>
                                <a href="#">微型流量计</a>
                                <a href="#">金属管浮子流量计</a>
                                <a href="#">超声波流量计</a>
                                <a href="#">涡轮流量计</a>
                                <a href="#">温度湿度变送器</a>
                                <a href="#">液体流量计</a>
                                <a href="#">气体涡轮流量计</a>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><span>产品</span><i class="fa fa-angle-down"></i></dt>
                            <dd class="sub_type">
                                <a href="#">全部</a>
                            </dd>
                        </dl>
                    </li>

                </ul>


                <ul class="pro">
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="prod_nay.html">
                            <div class="pro_pic">
                                <img class="show" src=" images/proud02.jpg" alt="CTB909021-W 女皇白" />
                                <!-- <img class="fade" src="https://194.zhunducdn.com/fsjhtccn/public/upload/20210809/263ee28800c7d72137898d14e2731656.jpg" alt="CTB909021-W 女皇白" />-->
                            </div>
                        </a>
                        <div class="pro_words">
                            <div class="pro_bg">
                                <h5><a href="prod_nay.html">DFL-P投入式静压式液位计变送器</a></h5>
                                <!--<p>CTB909021-W</p>
                                                                            <em class="pub_link" onclick="showQuery('501-CTB909021-W 女皇白')">询价</em> -->
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="fenye">
                    <ul>
                        <li class="fenye-p"><a onclick='return false' href="#"><i class="fa fa-angle-left"></i></a>
                        </li>
                        <li class='active'><a onclick='return false' href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><span>···</span></li>
                        <li><a href="#">9</a></li>
                        <li class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <select class=""
                        onchange='javascript:location.href=this.options[this.selectedIndex].value'>
                        <option value="#" selected>1</option>
                        <option value="#">2</option>
                        <option value="#">3</option>
                        <option value="#">4</option>
                        <option value="#">5</option>
                        <option value="#">6</option>
                        <option value="#">7</option>
                        <option value="#">8</option>
                        <option value="#">9</option>
                    </select>
                </div>
                <ul class="pro_hid">
                    
                </ul>
                <ul class="m_pro">
                    数据加载中，请稍后...
                </ul>
                <a href="javascript:void(0);" class="loading_bnt"
                    onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
                <script>
                    var articleTypeList = [];

                    function initArticleType(pageNum) {
                        $.ajax({
                            url: '/article/type/list',
                            dataType: 'json',
                            contentType: 'application/json',
                            data: {
                                category: 1,
                                offset: pageNum,
                                limit: 12
                            }
                            success: function(articleTypeResp) {
                                $('#root_type').empty();
                                $('#root_type').append('<a class="active" data-typeId="" href="#" >全部</a>')
                                if (articleTypeResp.data) {
                                    articleTypeList = articleTypeResp.data.list;

                                    var rootTypeList = articleTypeList.filter(function(x) {
                                        return !x.parent_id
                                    }).map(function(x) {
                                        return '<a href="#" data-typeId="' + x.id + '" >' + x.name + '</a>'
                                    })
                                    $('#root_type').append(rootTypeList.join(''));

                                    $('#root_type > a').on('click', function(e) {
                                        handleSelectRootCategory(this.data['typeId'])
                                    })
                                }
                            }
                        })
                    }
                    initArticleType();

                    function handleSelectRootCategory(type_id) {
                        $('#sub_type').empty();
                        $('#sub_type').append('<a class="active" data-typeId="" href="#" >全部</a>')

                        var subTypeList = articleTypeList.filter(function(x) {
                            return x.parent_id === type_id
                        });
                        subTypeListMap = subTypeList.map(function(x) {
                            return '<a class="active" data-typeId="' + x.id + '" href="#" >全部</a>'
                        })

                        $('#sub_type').append(subTypeList.join(''));
                        $('#sub_type > a').on('click', function(e) {
                            fetchData.type_id = this.data['typeId'];
                            fetchData.offset = 0;
                            fetchProductList();
                        })
                    }

                    var articleList = [];
                    var fetchData = {
                        offset: 0,
                        limit: 20,
                        category: 1,
                        type_id: undefined,
                    }
                    function fetchProductList() {
                        $.ajax({
                            url: '/article/list',
                            data: fetchData,
                            method: 'POST',
                            contentType: 'application/json',
                            dataType: 'JSON',
                            success: function(resp) {
                                if (resp.data) {
                                    articleList = resp.data.list,
                                    const articleElementList = articleList.map(function(article) {
                                        return '<a href="/product/'+ article.id +'"><div class="pro_pic"><img realSrc="' + article.covers[0].url +'" alt="' + article.title + '" /></div> <div class="pro_words"><h5></h5> </div> </a>'
                                    })

                                    $('.pro_hid').append(articleElementList)

                                }

                            }
                        })
                    }

                    var _content = []; //临时存储li循环内容
                    var loading = {
                        _default: 6, //默认显示图片个数
                        _loading: 6, //每次点击按钮后加载的个数
                        init: function() {
                            var lis = $(".pro_hid li");
                            $(".m_pro").html("");
                            for (var n = 0; n < loading._default; n++) {
                                lis.eq(n).appendTo(".m_pro");
                            }
                            $(".m_pro img").each(function() {
                                $(this).attr('src', $(this).attr('realSrc'));
                            })
                            for (var i = loading._default; i < lis.length; i++) {
                                _content.push(lis.eq(i));
                            }
                            $(".pro_hid").html("");
                        },
                        loadMore: function() {
                            var mLis = $(".m_pro li").length;
                            for (var i = 0; i < loading._loading; i++) {
                                var target = _content.shift();
                                if (!target) {
                                    $('.loading_bnt span').html("全部加载完毕");
                                    break;
                                }
                                $(".m_pro").append(target);
                                $(".m_pro img").eq(mLis + i).each(function() {
                                    $(this).attr('src', $(this).attr('realSrc'));
                                });
                            }
                        }
                    }
                    loading.init();
                </script>
            </div>
        </section>
    </main>
@endsection
