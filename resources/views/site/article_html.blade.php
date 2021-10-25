@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_art.jpg" alt="行业应用" /></div>
            <div class="ind_tit">
                <h3>行业应用</h3>
                <figure>
                    <h4><span>application</span>case</h4>
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
                <a href="#">行业应用</a>
            </div>

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            行业应用 </span><i class="fa fa-angle-down"></i></dt>

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

                        .effect,
                        .page_nav_bd {
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
                            <dd id="root_type">
                                <a class='active' href="article_html.html">全部</a>
                            </dd>
                        </dl>
                    </li>
                </ul>

                <ul class="effect case baguetteBox clearfix">
                </ul>
                <div class="fenye">
                    <ul>
                        <li class="fenye-p"><a onclick='return false' href="#"><i class="fa fa-angle-left"></i></a>
                        </li>
                    </ul>
                    <select class=""
                        onchange='javascript:location.href=this.options[this.selectedIndex].value'>
                    </select>
                </div>
                <ul class="pro_hid">
                </ul>

                <ul class="m_pro baguetteBox">
                    数据加载中，请稍后...
                </ul>
                <a href="javascript:void(0);" class="loading_bnt"
                    onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
                <script>
                    var articleTypeList = [];

                    function initArticleType() {
                        $.ajax({
                            url: '/article/type/list',
                            dataType: 'json',
                            method: 'GET',
                            contentType: 'application/json',
                            data: {
                                category: 2
                            },
                            success: function(articleTypeResp) {
                                $('#root_type').empty();
                                $('#root_type').append('<a class="active" data-typeId="" href="#" >全部</a>')
                                if (!queryString['root_type']) {
                                    $('#root_type > a').addClass('active');
                                }

                                if (articleTypeResp.data) {
                                    articleTypeList = articleTypeResp.data.list;

                                    var rootTypeList = articleTypeList.filter(function(x) {
                                        return !x.parent_id
                                    }).map(function(x) {
                                        if (queryString['root_type'] === x.id) {
                                            return '<a class="active" href="#" data-typeId="' + x.id + '" >' + x
                                                .name + '</a>'
                                        }
                                        return '<a href="#" data-typeId="' + x.id + '" >' + x.name + '</a>'
                                    })
                                    $('#root_type').append(rootTypeList.join(''));

                                    $('#root_type > a').on('click', function(e) {
                                        e.preventDefault();
                                        handleSelectRootCategory(e.target.dataset.typeid)
                                    })
                                }
                            }
                        })
                    }
                    initArticleType();

                    function handleSelectRootCategory(typeId) {
                        fetchData.type_id = typeId;
                        fetchData.offset = 0;
                        fetchArticleList();
                    }

                    var articleList = [];
                    var fetchData = {
                        offset: 0,
                        limit: 20,
                        category: 2,
                        type_id: undefined,
                    }

                    function fetchArticleList() {
                        return $.ajax({
                            url: '/article/list',
                            data: fetchData,
                            method: 'GET',
                            contentType: 'application/json',
                            dataType: 'JSON'
                        }).done(function(resp) {
                            if (resp.errcode === 0) {
                                articleList = resp.data.list;
                                var articleHidElementList = articleList.map(function(article) {
                                    return '<li>' +
                                        '<a href="' + article.covers[0].url + '" data-caption="' + article.title +
                                        '">' +
                                        '<div class="pro_pic"><img realSrc="' + article.covers[0].url + '" alt="' +
                                        article.title + '" /></div>' +
                                        '<div class="pro_words"><h5>' + article.title + '</h5> </div>' +
                                        '</a> </li>'
                                })

                                $('.pro_hid').append(articleHidElementList)

                                articleElementList = articleList.map(function(article) {
                                    return '<li>' +
                                        '<a href="' + article.covers[0].url + '" data-caption="' + article.title +
                                        '">' +
                                        '<div class="pro_pic"><img realSrc="' + article.covers[0].url + '" alt="' +
                                        article.title + '" /></div>' +
                                        '<div class="pro_words"><h5>' + article.title +
                                        '</h5> <i class="effect_ico"></i> </div>' +
                                        '</a> </li>'
                                });

                                $('.effect.baguetteBox').empty();
                                $('.effect.baguetteBox').append(articleElementList)
                                var pages = resp.data.total / 20;
                                loadPagignations(pages);
                            }
                        })
                    }
                    fetchArticleList();

                    function loadPagignations(totalPage) {
                        var paginationList = ['<li data-offset="' + (fetchData.offset - 1) +
                            '" class="fenye-p"><a href="#"><i class="fa fa-angle-left"></i></a></li>'
                        ];

                        if (fetchData.offset > 5) {
                            paginationList.push('<li><span>···</span></li>');
                        }
                        if (fetchData.offset < 5) {
                            for (var index = 1; index <= totalPage; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '"><a href="#">' + index + '</a></li>');
                                if (index >= 5) {
                                    paginationList.push('<li><span>···</span></li>');
                                    paginationList.push('<li data-offset="' + fetchData.totalPage - 1 + '"><a href="#">' + totalPage + '</a></li>');
                                }
                            }
                        } else if (fetchData.offset >= totalPage - 4) {
                            for (var index = offset - 1; index <= totalPage; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '" ><a href="#">' + index + '</a></li>');
                            }
                        } else {
                            for (var index = fetchData.offset - 1; index <= fetchData.offset + 3; index++) {
                                paginationList.push('<li data-offset="' + index - 1 + '"><a href="#">' + index + '</a></li>');
                            }
                            paginationList.push('<li><span>···</span></li>');
                            paginationList.push('<li data-offset="' + totalPage - 1 + '"><a href="#">' + totalPage + '</a></li>');
                        }
                        paginationList.push('<li data-offset="' + fetchData.offset + 1 +
                            '" class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>')

                        $('.fenye ul').append(paginationList.join(''));

                        var paginationSelect = [];
                        for (var i = 1; i <= totalPage; i++) {
                            paginationSelect.push('<option value="' + i - 1 + '">' + i + '</option>')
                        }
                        $('.fenye select').append(paginationSelect.join(''));

                        $('.fenye ul li[data-offset="' + fetchData.offset + '"]').addClass('active');
                        $('.fenye ul li').on('click', function(e) {
                            var ele = e.target;
                            if (ele) {
                                var offset = ele.dataset.offset;
                                if (offset >= 0) {
                                    fetchData.offset = offset;
                                    fetchProductList();
                                }
                            }
                        });

                        $('.fenye select').value = fetchData.offset;
                    }

                    var _content = []; //临时存储li循环内容
                    var loading = {
                        _default: 6, //默认显示图片个数
                        _loading: 20, //每次点击按钮后加载的个数
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
                            fetchData.offset = fetchData.offset + 1;
                            fetchProductList().done(function() {
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
                            });
                        }
                    }
                    loading.init();
                </script>
            </div>
        </section>
    </main>
@endsection
