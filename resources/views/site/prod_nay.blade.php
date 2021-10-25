@extends('site.page_base')

@section('banner')
@endsection

@section('page_main')
    <main class="page_main">
        <div class="page_pos_box layout">
            <div class="page_pos">
                <img src=" images/sit.gif" alt="当前位置" />
                <span>当前位置：</span>
                <a href="index.html">首页</a>
                <span>&gt;</span>
                <a href="product.html">产品中心</a>
                <span>&gt;</span>
                <a href="prod_nay.html">产品详情</a>
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
                            background: #f7f7f7;
                        }

                        .page_nav_bd {
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
                                <li><span>上传时间：</span><span id="pro_date">2021-07-30</span></li>
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

            function initArticleType(pageNum) {
                $.ajax({
                    url: '/article/type/list',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: {
                        category: 1,
                    },
                    success: function(articleTypeResp) {
                        $('#root_type').empty();
                        $('#root_type').append('<a data-typeId="" href="#" >全部</a>')
                        if (articleTypeResp.data) {
                            articleTypeList = articleTypeResp.data.list;

                            var rootTypeList = articleTypeList.filter(function(x) {
                                return !x.parent_id
                            }).map(function(x) {
                                return '<a href="#" data-typeId="' + x.id + '" >' + x.name + '</a>'
                            })
                            $('#root_type').append(rootTypeList.join(''));

                            $('#root_type > a').on('click', function(e) {
                                handleSelectRootCategory(e.target.dataset.typeid)
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
                    fetchData.type_id = e.target.dataset.typeid;
                    fetchData.offset = 0;

                    window.location.href = '/product.html?type_id=' + type_id + '&sub_id=' + fetchData.type_id;
                });
            }

            var articleDetail = {};

            function loadDetail() {
                $.ajax({
                    url: '/article/info',
                    dataType: 'json',
                    method: 'GET',
                    contentType: 'application/json',
                    data: {
                        id: queryString['id'],
                    },
                    success: function(resp) {
                        articleDetail = resp.data.info;
                        setContent();
                        setCovers();
                    }
                });
            }
            loadDetail();

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
