@extends('site.page_base')
<script>
    <?php
    //    $category = 1;
    //    $category_name = '产品中心';
    //    $category_url = 'product.html';
    //    $category_name_en = 'Product center';
    //    $category_detail_name = '产品详情';
    //    $category_detail_url = 'prod_nay.html';
    //    $banner_img = 'images/ban_prod.jpg';
    //    $banner_name = '';
    
    $category = $article->category;
    $category_url = '/category/' . $category;
    
    if ($category == \App\Model\Article::CATEGORY_PRODUCT) {
        $category_name = '产品中心';
        $banner_img = '/images/ban_prod.jpg';
        $banner_name = '';
    } elseif ($category == \App\Model\Article::CATEGORY_APP) {
        $category_name = '行业应用';
        $banner_img = '/images/ban_art.jpg';
        $banner_name = '';
    } elseif ($category == \App\Model\Article::CATEGORY_NEWS) {
        $category_name = '新闻中心';
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
                <a hrf="{{ $category_url }}">{{ $category_name }}</a>
            </div>

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            {{ $category_name }} </span><i class="fa fa-angle-down"></i></dt>
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

                        .page_nav_bd {
                            display: none;
                        }
                    }

                </style>

                @if ($category == \App\Model\Article::CATEGORY_PRODUCT)
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
                        <li>
                            <dl>
                                <dt><span>产品</span><i class="fa fa-angle-down"></i></dt>
                                <dd class="sub_type">
                                    <a href="#">全部</a>
                                </dd>
                            </dl>
                        </li>

                    </ul>

                    <div class="pro_view1">
                        <div class="pro_view1_left">
                            <div class="pro_view1_bd">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                    </div>
                                </div>
                            </div>
                            <div class="pro_view1_hd">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pro_view1_right">
                            <h3 id='pro_title'></h3>
                            <div class="pro_view1_word">
                                <pre></pre>
                            </div>
                            <div class="pro_view1_word2">
                                <ul>
                                    <li id='pro_date'><span>上传时间：</span></li>
                                    <li><span>简要描述：</span></li>
                                    <li id="pro_summary"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="ind3 pro_view3">
                        <div class="ind_tit">
                            <h3>详细介绍</h3>
                            <figure>
                                <h4><span>related </span>suggestion</h4>
                            </figure>
                            <i class="ind_tit_ico"></i>
                        </div>
                        <div class="pro_nay" id="pro_content">
                        </div>
                    </div>
                @endif

                @if ($category == \App\Model\Article::CATEGORY_NEWS)
                    <div class="pub_view">
                        <div class="pub_view_tit">
                            <h2 id="pro_title"></h2>
                            <figure>
                                <span>发布日期：<span id="pro_date"></span></span>
                                <span>阅读量: <span id="pro_count"></span></span>
                                <span>作者：<a href="#">广州迪川仪器仪表有限公司</a></span>
                            </figure>
                        </div>
                        <div id="pro_content" class="pub_view_con pro_nay">
                        </div>
                        <div class="pub_view_bot">
                            <figure class="pub_view_back"><a href="javascript:history.back(-1);">返 回&gt;&gt;</a></figure>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <script>
            var articleTypeList = [];
            var queryString = {};
            $.each(document.location.search.substr(1).split('&'), function(c, q) {
                var i = q.split('=');
                if (i.length >= 2) {
                    queryString[i[0].toString()] = i[1].toString();
                }
            });

            var articleDetail = @json($article);

            function initArticleType(pageNum) {
                $.ajax({
                    url: '/article/type/list',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: {
                        category: {{ $category }},
                    },
                    success: function(articleTypeResp) {
                        $('#root_type').empty();
                        $('#root_type').append('<a data-typeId="" href="{{ $category_url }}" >全部</a>')

                        if (articleTypeResp.data) {
                            articleTypeList = articleTypeResp.data.list;
                            var rootTypeList = articleTypeList.filter(function(x) {
                                return !x.parent_id
                            }).map(function(x) {
                                if ({{ $article->type->parent_id }} === x.id) {
                                    return '<a class="active" href="{{ $category_url }}?root_type=' + x.id + '">' + x.name + '</a>'
                                }
                                return '<a href="{{ $category_url }}?root_type=' + x.id + '">' +
                                    x.name + '</a>'
                            })
                            $('#root_type').append(rootTypeList.join(''));
                        }
                    }
                })
            }

            function loadSubTypeList() {
                var subTypeList = articleTypeList.filter(function(type) {
                    return type.parent_id === {{ $article->type->parent_id }};
                });

                if (subTypeList.length > 0) {
                    $('.sub_type_container').css({
                        display: 'block'
                    });
                    $('#sub_type').empty();
                    $('#sub_type').append('<a href="{{ $category_url }}?root_type={{ $article->type->parent_id }}">全部</a>')

                    subTypeListMap = subTypeList.map(function(x) {
                        if ($article.type.id === x.id.toString()) {
                            return '<a class="active" href="{{ $category_url }}?root_type={{ $article->type->parent_id }}&sub_type={{ $article->type->id }}">' + x.name + '</a>'
                        }
                        return '<a' + 'href="{{ $category_url }}?root_type={{ $article->type->parent_id }}&sub_type={{ $article->type->id }}">' + x.name + '</a>'
                    })
                } else {
                    $('.sub_type_container').css({
                        display: 'none'
                    });
                }
            }
	    if($('#root_type').length > 0) {
		    initArticleType();
		    loadSubTypeList();
	    }

            setContent();
            setCovers();

            function setContent() {
                $('#pro_title').html(articleDetail.title);
                $('#pro_summary').append(articleDetail.summary);
                $('#pro_date').append(articleDetail.updated_at);
                $('#pro_count').append(articleDetail.read_cnt);
                $('#pro_content').html(articleDetail.content);
            }

            function setCovers() {
                var coverList = articleDetail.covers || [];
                for (const cover of coverList) {
                    $('.swiper-wrapper').append('<div class="swiper-slide"><div class="pic"><img src="' + cover.url +
                        '" /></div></div>')
                }
            }
        </script>

    </main>
@endsection
