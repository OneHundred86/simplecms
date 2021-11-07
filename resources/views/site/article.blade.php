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
    $category_url = "/category/" . $category;

    if($category == \App\Model\Article::CATEGORY_PRODUCT){
        $category_name = '产品中心';
        $banner_img = '/images/ban_prod.jpg';
        $banner_name = '';
    }elseif($category == \App\Model\Article::CATEGORY_APP){
        $category_name = '行业应用';
        $banner_img = '/images/ban_art.jpg';
        $banner_name = '';
    }elseif($category == \App\Model\Article::CATEGORY_NEWS){
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
                                <li><span>上传时间：</span><span id="pro_date"></span></li>
                                <li><span>简要描述：</span></li>
                                <li><span id="pro_summary"></span> </li>
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
            setContent();
            setCovers();

            function setContent() {
                $('#pro_title').html(articleDetail.title);
                $('#pro_summary').html(articleDetail.summary);
                $('#pro_date').html(articleDetail.updated_at);
                $('#pro_content').html(articleDetail.content);
            }

            function setCovers() {
                var coverList = articleDetail.covers || [];
                for (const cover of coverList) {
                    $('.swipper-wrapper').append('<div class="swiper-slide"><div class="pic"><img src="' + cover.url +
                        '" /></div></div>')
                }
            }
        </script>

    </main>
@endsection
