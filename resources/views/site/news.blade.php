@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_new.jpg" alt="媒体中心" /></div>
            <div class="ind_tit">
                <h3>媒体中心</h3>
                <figure>
                    <h4><span>Media</span>center</h4>
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
                <a href="index.html">首页</a>
                <span>&gt;</span>
                <a href="news.html">新闻中心</a>
                <span>&gt;</span>
                <a href="news.html">行业新闻</a>

            </div>

            <!-- 非产品中心、应用案例 -->

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            <!-- 媒体中心二级变一级 -->
                            新闻专区
                        </span><i class="fa fa-angle-down"></i></dt>

                    <!-- 非产品中心-->
                    <!-- 媒体中心三级变二级 -->
                </dl>
            </li>
        </ul>

        <section class="page_con">
            <div class="layout">
                <style>
                    .m_news {
                        display: none;
                    }

                    @media only screen and (min-width: 0) and (max-width: 1024px) {
                        .page_con {
                            padding-top: .32rem;
                        }

                        .pc_news {
                            display: none;
                        }

                        .m_news {
                            display: flex;
                        }
                    }

                </style>
                <!-- 新闻专区 -->
                <ul class="news pc_news">
                </ul>
                <div class="fenye">
                    <ul></ul>
                    <select class="" onchange='javascript:location.href=this.options[this.selectedIndex].value'>
                    </select>
                </div><!-- 新闻专区 -->
                <ul class="news_hid">
                </ul>
                <ul class="news m_news">
                    数据加载中，请稍后...
                </ul>
                <a href="javascript:void(0);" class="loading_bnt"
                    onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
                <script>
                    var articleList = [];
                    var fetchData = {
                        offset: 0,
                        limit: 20,
                        category: 3,
                        type_id: undefined,
                    }

                    function fetchNewsList() {
                        return $.ajax({
                            url: '/article/list',
                            data: fetchData,
                            method: 'POST',
                            contentType: 'application/json',
                            dataType: 'JSON'
                        }).done(function(resp) {
                            if (resp.errcode === 0) {
                                articleList = resp.data.list,
                                    var articleHidElementList = articleList.map(function(article) {
                                        return '<li class="img_scale">' + '<a href="news_nay.html?id=' + article.id +
                                            '">' +
                                            '<div class="pic"><img src="' + article.covers[0].url + '" alt="' + article
                                            .title + '"/></div>' +
                                            '<div class="words">' +
                                            '<h5>' + article.title + '</h5><p>' + article.summary + '</p>' +
                                            '<div class="bot"> <time>' + article.created_at +
                                            '</time><em><i class="pro_ico"></i> 查看详情</em> </div>' +
                                            ' </div></a>' + '</li>'
                                    })
                                $('.news.news_hid').append(articleHidElementList)

                                articleElementList = articleList.map(function(article) {
                                    return '<li class="img_scale">' + '<a href="news_nay.html?id=' + article.id + '">' +
                                        '<div class="pic"><img src="' + article.covers[0].url + '" alt="' + article
                                        .title + '"/></div>' +
                                        '<div class="words">' +
                                        '<h5>' + article.title + '</h5><p>' + article.summary + '</p>' +
                                        '<div class="bot"> <time>' + article.created_at +
                                        '</time><em><i class="pro_ico"></i> 查看详情</em> </div>' +
                                        ' </div></a>' + '</li>'
                                });

                                $('.news.pc_news').empty();
                                $('.news.pc_news').append(articleElementList)
                                var pages = resp.data.total / 20;
                                loadPagignations(pages);
                            }
                        })
                    }

                    function loadPagignations(pageSize) {
                        var paginationList = ['<li data-offset="' + offset - 1 +
                            '" class="fenye-p"><a href="#"><i class="fa fa-angle-left"></i></a></li>'
                        ];

                        if (offset > 5) {
                            paginationList.push('<li><span>···</span></li>');
                        }
                        if (offset < 5) {
                            for (var index = 1; index <= pageSize; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '"><a href="#">' + index + '</a></li>');
                                if (index >= 5) {
                                    paginationList.push('<li><span>···</span></li>');
                                    paginationList.push('<li data-offset="' + pageSize - 1 + '"><a href="#">' + pageSize + '</a></li>');
                                }
                            }
                        } else if (offset >= pageSize - 4) {
                            for (var index = offset - 1; index <= pageSize; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '" ><a href="#">' + index + '</a></li>');
                            }
                        } else {
                            for (var index = offset - 1; index <= offset + 3; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '"><a href="#">' + index + '</a></li>');
                            }
                            paginationList.push('<li><span>···</span></li>');
                            paginationList.push('<li data-offset="' + pageSize - 1 + '"><a href="#">' + pageSize + '</a></li>');
                        }
                        paginationList.push('<li data-offset="' + offset + 1 +
                            '" class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>')

                        $('.fenye ul').append(paginationList.join(''));

                        var paginationSelect = [];
                        for (var i = 1; i <= pageSize; i++) {
                            paginationSelect.push('<option value="' + i - 1 + '">' + i + '</option>')
                        }
                        $('.fenye select').append(paginationSelect.join(''));

                        $('.fenye ul li[data-offset]="' + offset + '"').addClass('active');
                        $('.fenye ul li').on('click', function(e) {
                            var ele = e.target;
                            if (ele) {
                                var offset = ele.data['offset'];
                                if (offset >= 0) {
                                    fetchData.offset = offset;
                                    fetchNewsList();
                                }
                            }
                        });

                        $('.fenye select').value = offset;
                    }

                    var _content = []; //临时存储li循环内容
                    var loading = {
                        _default: 6, //默认显示图片个数
                        _loading: 20, //每次点击按钮后加载的个数
                        init: function() {
                            var lis = $(".news_hid li");
                            $(".m_news").html("");
                            for (var n = 0; n < loading._default; n++) {
                                lis.eq(n).appendTo(".m_news");
                            }
                            $(".m_news img").each(function() {
                                $(this).attr('src', $(this).attr('realSrc'));
                            })
                            for (var i = loading._default; i < lis.length; i++) {
                                _content.push(lis.eq(i));
                            }
                            $(".pro_hid").html("");
                        },
                        loadMore: function() {
                            var mLis = $(".m_news li").length;
                            fetchData.offset = fetchData.offset + 1;
                            fetchNewsList().done(function() {
                                for (var i = 0; i < loading._loading; i++) {
                                    var target = _content.shift();
                                    if (!target) {
                                        $('.loading_bnt span').html("全部加载完毕");
                                        break;
                                    }
                                    $(".m_news").append(target);
                                    $(".m_news img").eq(mLis + i).each(function() {
                                        $(this).attr('src', $(this).attr('realSrc'));
                                    });
                                }
                            });
                        }
                    }
                    loading.init();
                </script>
            </div>
        </section>
    </main>
@endsection
