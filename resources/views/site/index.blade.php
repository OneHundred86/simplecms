@extends('site.page_base')

@section('banner')
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>

    <div class="layui-carousel" id="banner">
        <div carousel-item="">
            <div style="background-image: url(images/banner.jpg);background-repeat: no-repeat;background-size:100% 100%;">
            </div>
            <div style="background-image: url(images/ban_art.jpg);background-repeat: no-repeat;background-size:100% 100%;">
            </div>
        </div>
    </div>

    <script>
        $.ajax({
            url: '/article/list/',
            method: 'GET',
            contentType: 'application/json'
            data: {
                category: 0,
                limit: 1,
                offset: 0,
            },
            dataType: 'json',
            success: (resp) => {
                var otherList = resp.data.list || []
                var firstOther = otherList.length > 0 ? otherList[0] : null;
                var coverList = [];

                if (firstOther) {
                    coverList = firstOther.covers.map(x => '<div style="background-image: url(' + x.img +
                        ');background-repeat: no-repeat;background-size:100% 100%;"></div>')
                    $('#banner > div').clear();
                    $('banner').html('<div carousel-item>="">' + coverList.join('') + '</div>');
                }

            }
        })

        layui.use(['carousel'], function() {
            var carousel = layui.carousel;

            //改变下时间间隔、动画类型、高度
            carousel.render({
                elem: '#banner',
                interval: 5000,
                anim: 'fade',
                width: '100%',
                height: '500px'
            });
        });
    </script>
@endsection

@section('page_main')
    <main class="main">
        <div class="box1">
            <div class="layout clearfix">
                <img src="images/in_us.jpg" alt="迪川仪器仪表" class="pic" />
                <div class="words ind_tit">
                    <h5>GUANGZHOU DICHUAN INSTRUMENT Co.,LTD</h5>
                    <h4>广州迪川仪器仪表有限公司</h4>
                    <hr />
                    <p>广州迪川仪器仪表有限公司是一家专业工控仪表企业。以雄厚的资金为后盾，以高、新、尖的技术力量为核心。
                        在传感器、自控仪表、流量计及过程控制工艺等方面以诚信为本、平等互惠为原则，为客户创造成熟的产品及优质的服务。公司以产品的销售及提供工程技术服务并重的市场营销方式来满足用户的各种需求为已任。主要产品有：温度传感器，温度变送器，压力传感器，压力变送器，LWGY涡轮流量计（变送器），l涡街流量
                    </p>

                    <a href="about.html">查看更多</a>
                </div>
            </div>

            <ul class="box1_1 layout clearfix">
                <li class="wow bounceInLeft" data-wow-duration="2.5s">
                    <i></i>
                    <p>13+ 年</p>
                    <h5>从事仪表行业</h5>
                    <hr />
                </li>
                <li class="wow bounceInLeft" data-wow-duration="2s">
                    <i></i>
                    <p>30+人</p>
                    <h5>公司技术团队</h5>
                    <hr />
                </li>
                <li class="wow bounceInRight" data-wow-duration="2s">
                    <i></i>
                    <p>400+</p>
                    <h5>行业成功应用经验</h5>
                    <hr />
                </li>
                <li class="wow bounceInRight" data-wow-duration="2.5s">
                    <i></i>
                    <p>15,000+</p>
                    <h5>服务合作过客户</h5>
                    <hr />
                </li>
            </ul>
        </div>

        <div class="box2" style="background:#fff">
            <div class="box2_pn1">
                <div class="layout ind_tit">
                    <!--  <h5>Full roof wall customization professional</h5>-->
                    <h4><b>行业应用</b></h4>

                    <div class="words">
                        <!-- <h5>Brand</h5>-->
                        <p>适用于各个行业的测量技术，
                            服务和专有技术</p>
                        <a href="#">查看更多</a>
                    </div>

                    <div class="pic"><img src="images/box2_pn1_pic2.png" alt="全屋顶墙一体定制更专业" /></div>

                </div>
            </div>
            <!-- 移动端 -->
            <div class="layout m_words">
                <p><img src="images/artu.jpg" /></p>
            </div>
            <!-- 移动端 -->

        </div>

        <div class="box3">
            <div class="layout">
                <div class="page_tit3">
                    <i></i>
                    <h2>RECOMMEND PRODUCTS</h2>
                    <h6>产品推荐</h6>
                    <hr />
                </div>
                <ul class="box3_con">
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud02.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud02.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud02.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="box3_pic">
                                <img src="images/proud.jpg" alt="产品图" />
                            </div>
                            <div class="box3_words">电波流量计</div>
                        </a>
                    </li>
                </ul>
                <div class="bax3_any"><a href="#">查看更多</a></div>
            </div>
        </div>


        <div class="box7">

            <div class="box7_con">
                <div class="box7_words layout">
                    <div class="box7_font">
                        <p>联系我们</p>
                        <ul>
                            <li>020-85550363/31199948</li>
                            <li>地址：广州市番禺区石基镇前锋南路 125号恒星工业园东座四楼</li>
                            <li>手机：15302383334</li>


                            <div class="bax7_any"><a href="contact.html">查看更多>></a></div>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="box8 layout">
            <div class="box8_top">
                <div class="ind_tit">
                    <h2>Brand News</h2>
                    <h6>品牌动态</h6>
                    <hr />
                </div>

            </div>
            <ul class="box8_bottom clearfix">
                <li>
                    <a title="超七成高端科学仪器依赖进口，国产
    仪器如何突围" href="news_nay.html">
                        <div class="box8_pic"><img src="images/newstu.jpg" alt="超七成高端科学仪器依赖进口，国产
    仪器如何突围" style="object-fit:scale-down" /></div>
                        <div class="box8_words">
                            <h5>超七成高端科学仪器依赖进口，国产仪器如何突围</h5>
                            <p>据统计，到2017年，诺贝尔奖自然科学获奖项目中，因
                                发明科学仪器而直接获奖的项目占11%...</p>
                            <figure>
                                <time>2021-04-01</time>
                                <span>more+</span>
                            </figure>
                        </div>
                    </a>
                </li>
                <li>
                    <a title="超七成高端科学仪器依赖进口，国产
    仪器如何突围" href="news_nay.html">
                        <div class="box8_pic"><img src="images/newstu02.jpg" alt="超七成高端科学仪器依赖进口，国产
    仪器如何突围" style="object-fit:scale-down" /></div>
                        <div class="box8_words">
                            <h5>超七成高端科学仪器依赖进口，国产仪器如何突围</h5>
                            <p>据统计，到2017年，诺贝尔奖自然科学获奖项目中，因
                                发明科学仪器而直接获奖的项目占11%...</p>
                            <figure>
                                <time>2021-04-01</time>
                                <span>more+</span>
                            </figure>
                        </div>
                    </a>
                </li>
                <li>
                    <a title="超七成高端科学仪器依赖进口，国产
    仪器如何突围" href="news_nay.html">
                        <div class="box8_pic"><img src="images/newstu.jpg" alt="超七成高端科学仪器依赖进口，国产
    仪器如何突围" style="object-fit:scale-down" /></div>
                        <div class="box8_words">
                            <h5>超七成高端科学仪器依赖进口，国产仪器如何突围</h5>
                            <p>据统计，到2017年，诺贝尔奖自然科学获奖项目中，因
                                发明科学仪器而直接获奖的项目占11%...</p>
                            <figure>
                                <time>2021-04-01</time>
                                <span>more+</span>
                            </figure>
                        </div>
                    </a>
                </li>
                <li>
                    <a title="超七成高端科学仪器依赖进口，国产
    仪器如何突围" href="news_nay.html">
                        <div class="box8_pic"><img src="images/newstu02.jpg" alt="超七成高端科学仪器依赖进口，国产
    仪器如何突围" style="object-fit:scale-down" /></div>
                        <div class="box8_words">
                            <h5>超七成高端科学仪器依赖进口，国产仪器如何突围</h5>
                            <p>据统计，到2017年，诺贝尔奖自然科学获奖项目中，因
                                发明科学仪器而直接获奖的项目占11%...</p>
                            <figure>
                                <time>2021-04-01</time>
                                <span>more+</span>
                            </figure>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="bax8_any"><a href="news.html">查看更多>></a></div>
        </div>
    </main>
@endsection
