@extends('site.page_base')
<script>
    _CAT = {{ $category }};

    <?php
    if ($category == \App\Model\Article::CATEGORY_PRODUCT) {
        $category_name = '产品中心';
        $category_detail_url = '/prod_nay.html';
        $banner_img = '/images/ban_prod.jpg';
        $banner_name = '';
    } elseif ($category == \App\Model\Article::CATEGORY_APP) {
        $category_name = '行业应用';
        $category_detail_url = '#';
        $banner_img = '/images/ban_art.jpg';
        $banner_name = '';
    } elseif ($category == \App\Model\Article::CATEGORY_NEWS) {
        $category_name = '新闻中心';
        $category_detail_url = '#';
        $banner_img = '/images/ban_new.jpg';
        $banner_name = '';
    }
    ?>
</script>

@section('banner')
<div class="banner_box layout2">
    <div class="page_img">
        <div class="pic"><img src="{{ $banner_img }}" alt="{{ $banner_name }}" /></div>
        <div class="ind_tit">
            <h3>{{ $banner_name }}</h3>
            <figure>
                <h4>{{ $category_name }}</h4>
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
            <img src="/images/sit.gif" alt="当前位置" />
            <span>当前位置：</span>
            <a href="/index.html">首页</a>
            <span>&gt;</span>
            <a href="#">{{ $category_name }}</a>
        </div>
    </div>
    <ul class="m_page_nav">
        <li>
            <dl>
                <dt><span> {{ $category_name }} </span><i class="fa fa-angle-down"></i></dt>
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
                        </dd>
                    </dl>
                </li>
                <li class="sub_type_container" style="display: none;">
                    <dl>
                        <dt><span>产品</span><i class="fa fa-angle-down"></i></dt>
                        <dd id="sub_type">
                            <a href="#">全部</a>
                        </dd>
                    </dl>
                </li>
            </ul>


            <ul class="pro">
            </ul>
            <div class="fenye">
                <ul> </ul>
                <select class="">
                </select>
            </div>
            <ul class="pro_hid"> </ul>
            <ul class="m_pro"> 数据加载中，请稍后... </ul>
            <a href="javascript:void(0);" class="loading_bnt" onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
            <script>
                var articleTypeList = [];
                var queryString = {};
                $.each(document.location.search.substr(1).split('&'), function(c, q) {
                    var i = q.split('=');
                    if (i.length >= 2) {
                        queryString[i[0].toString()] = i[1].toString();
                    }
                });

                function initArticleType(pageNum) {
                    $.ajax({
                        url: '/article/type/list',
                        dataType: 'json',
                        contentType: 'application/json',
                        data: {
                            category: _CAT,
                        },
                        success: function(articleTypeResp) {
                            $('#root_type').empty();
                            $('#root_type').append('<a data-typeId="" href="#" >全部</a>')
                            if (!queryString['root_type']) {
                                $('#root_type > a').addClass('active');
                            }

                            if (articleTypeResp.data) {
                                articleTypeList = articleTypeResp.data.list;
                                var rootTypeList = articleTypeList.filter(function(x) {
                                    return !x.parent_id
                                }).map(function(x) {
                                    if (queryString['root_type'] === x.id) {
                                        return '<a class="active" href="#" data-typeId="' + x.id +
                                            '" >' + x
                                            .name + '</a>'
                                    }
                                    return '<a href="#" data-typeId="' + x.id + '" >' + x.name + '</a>'
                                })
                                $('#root_type').append(rootTypeList.join(''));

                                $('#root_type > a').on('click', function(e) {
                                    e.preventDefault();
                                    $('#root_type > a').removeClass('active');
                                    $(e.target).addClass('active');
                                    fetchData.type_id = e.target.dataset.typeid;

                                    loadSubTypeList(parseInt(e.target.dataset.typeid));
                                    fetchArticleList();
                                })
                            }
                        }
                    })
                }
                initArticleType();

                function loadSubTypeList(typeId) {
                    var hasSubTypes = articleTypeList.some(function(type) {
                        return type.parent_id === typeId;
                    });
                    console.log('earo say the type', hasSubTypes, typeId);
                    if (hasSubTypes) {
                        $('.sub_type_container').css({
                            display: 'block'
                        });
                        $('#sub_type').empty();
                        $('#sub_type').append('<a data-typeId="" href="#" >全部</a>')
                        if (!queryString['sub_type']) {
                            $('#sub_type > a').addClass('active');
                        }

                        var subTypeList = articleTypeList.filter(function(x) {
                            return x.parent_id === typeId
                        });
                        subTypeListMap = subTypeList.map(function(x) {
                            if (queryString['sub_type'] === x.id.toString()) {
                                return '<a class="active" data-typeId="' + x.id + '" href="#" >' + x.name + '</a>'
                            }
                            return '<a data-typeId="' + x.id + '" href="#" >' + x.name + '</a>'
                        })

                        $('#sub_type').append(subTypeListMap.join(''));
                        $('#sub_type > a').on('click', function(e) {
                            e.preventDefault();
                            $('#sub_type > a').removeClass('active');
                            $(e.target).addClass('active');

                            fetchData.type_id = e.target.dataset.typeid;
                            fetchData.offset = 0;
                            fetchProductList();
                        })
                    } else {
                        $('.sub_type_container').css({
                            display: 'none'
                        });
                    }
                }

                var articleList = [];
                var fetchData = {
                    offset: 0,
                    limit: 20,
                    category: _CAT,
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
                            var articleHidElementList = articleList.map(mobileItemTemplate)
                            $('.pro_hid').append(articleHidElementList)

                            articleElementList = articleList.map(itemTemplate);
                            $('.pro').empty();
                            $('.pro').append(articleElementList)

                            var pages = resp.data.total / 20;
                            loadPagignations(pages);
                        }
                    })
                }
                fetchArticleList();

                function mobileItemTemplate(article) {
                    return '<li><a href="{{ $category_detail_url }}?id=' + article.id +
                        '"><div class="pro_pic"><img realSrc="' + article.covers[0].url +
                        '" alt="' + article.title +
                        '" /></div> <div class="pro_words"><h5></h5> </div> </a></li>'

                }

                function itemTemplate(article) {
                    return '<li>' +
                        '<a href="{{ $category_detail_url }}?id=' + article.id +
                        '"><div class="pro_pic"><img class="show" src="' +
                        article.covers[0] + '" alt="' + article.title + '" /></div>' +
                        '<div class="pro_words"><div class="pro_bg"><h5><a href="{{ $category_detail_url }}?id="' +
                        article.id + '>' + article.title + '</a></h5> </div> </div>' +
                        '</li>'
                }

                function loadPagignations(totalPage) {
                    var paginationList = ['<li data-offset="' + (fetchData.offset - 1) +
                        '" class="fenye-p"><a href="#"><i class="fa fa-angle-left"></i></a></li>'
                    ];

                    if (fetchData.offset > 5) {
                        paginationList.push('<li><span>···</span></li>');
                    }
                    if (fetchData.offset < 5) {
                        for (var index = 1; index <= totalPage; index++) {
                            paginationList.push('<li data-offset="' + (index - 1) + '"><a href="#">' + index + '</a></li>');
                            if (index >= 5) {
                                paginationList.push('<li><span>···</span></li>');
                                paginationList.push('<li data-offset="' + (fetchData.totalPage - 1) + '"><a href="#">' +
                                    totalPage +
                                    '</a></li>');
                            }
                        }
                    } else if (fetchData.offset >= totalPage - 4) {
                        for (var index = offset - 1; index <= totalPage; index++) {
                            paginationList.push('<li data-offset="' + (index - 1) + '" ><a href="#">' + index +
                                '</a></li>');
                        }
                    } else {
                        for (var index = fetchData.offset - 1; index <= fetchData.offset + 3; index++) {
                            paginationList.push('<li data-offset="' + (index - 1) + '"><a href="#">' + index + '</a></li>');
                        }
                        paginationList.push('<li><span>···</span></li>');
                        paginationList.push('<li data-offset="' + (totalPage - 1) + '"><a href="#">' + totalPage +
                            '</a></li>');
                    }
                    paginationList.push('<li data-offset="' + (fetchData.offset + 1) +
                        '" class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>')

                    $('.fenye ul').empty();
                    $('.fenye ul').append(paginationList.join(''));

                    var paginationSelect = [];
                    for (var i = 1; i <= totalPage; i++) {
                        paginationSelect.push('<option value="' + i - 1 + '">' + i + '</option>')
                    }
                    $('.fenye select').empty();
                    $('.fenye select').append(paginationSelect.join(''));

                    $('.fenye ul li[data-offset="' + fetchData.offset + '"]').addClass('active');
                    $('.fenye ul li').on('click', function(e) {
                        e.preventDefault();

                        var ele = $(e.target).parents('li')[0];
                        if (ele) {
                            var offset = $(ele).parents('li')[0].dataset.offset;
                            if (offset >= 0) {
                                fetchData.offset = offset;
                                fetchArticleList();
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