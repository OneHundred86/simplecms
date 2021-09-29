@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_new.jpg" alt="媒体中心"/></div>
            <div class="ind_tit">
                <h3>媒体中心</h3>
                <figure><h4><span>Media</span>center</h4></figure>

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
                新闻专区            </span><i class="fa fa-angle-down"></i></dt>

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
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg.jpg" alt="红红火火，新兴基地二期窑炉点火仪式"/></div>
                            <div class="words">
                                <h5>红红火火，新兴基地二期窑炉点火仪式</h5>
                                <p></p>
                                <div class="bot">
                                    <time>2021-03-10</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg02.jpg" alt="世界冠军助阵，企业趣味羽毛球比赛圆满结束！"/></div>
                            <div class="words">
                                <h5>世界冠军助阵，企业趣味羽毛球比赛圆满结束！</h5>
                                <p>为增强企业的凝聚力，推动企业文化建设，促进企业内部各品牌员工间的交流互动，提高员工身体素质，12月28-29日，集团企业在4楼羽毛球场隆重举行了趣味羽毛球比赛。</p>
                                <div class="bot">
                                    <time>2020-11-30</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg03.jpg" alt="号外|企业二期窑炉建设奠基仪式圆满举行"/></div>
                            <div class="words">
                                <h5>号外|企业二期窑炉建设奠基仪式圆满举行</h5>
                                <p> 11月4日，企业新兴生产基地（二期建设）举行了盛大的奠基仪式。企业董事、各部门领导及媒体代表齐聚新兴生产基地，共同见证了这一历史性的重要时刻！</p>
                                <div class="bot">
                                    <time>2020-11-05</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg04.jpg" alt="智能水表市场需求2021年上半年市场情况"/></div>
                            <div class="words">
                                <h5>智能水表市场需求2021年上半年市场情况</h5>
                                <p>近日，为了关注客户需求、倾听客户呼声、改进工作质量，精心打造了实用而高效的投诉建议平台。以后有问题、要投诉、提建议，通过这个平台统统都可以实现。</p>
                                <div class="bot">
                                    <time>2020-11-02</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg05.jpg" alt="中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
揭牌仪式"/></div>
                            <div class="words">
                                <h5>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</h5>
                                <p>怀柔科学城促进科学仪器产业创新发展暨“怀柔科仪谷”建设发布会在京举行，北京怀柔仪器和传感器有限公司(以下简称“怀柔仪器公司”)也挂牌成立。</p>
                                <div class="bot">
                                    <time>2020-10-22</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg06.jpg" alt="2021年度仪器仪表行业第六期培训班——IPD模式
下的研发项目管理在汉威集团举办"/></div>
                            <div class="words">
                                <h5>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</h5>
                                <p>2021年7月30日至31日，由中国仪器仪表行业协会主办、汉威科技集团股份有限公司（以下简称“汉威集团”）</p>
                                <div class="bot">
                                    <time>2020-09-24</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg.jpg" alt="红红火火，新兴基地二期窑炉点火仪式"/></div>
                            <div class="words">
                                <h5>红红火火，新兴基地二期窑炉点火仪式</h5>
                                <p></p>
                                <div class="bot">
                                    <time>2021-03-10</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg02.jpg" alt="世界冠军助阵，企业趣味羽毛球比赛圆满结束！"/></div>
                            <div class="words">
                                <h5>世界冠军助阵，企业趣味羽毛球比赛圆满结束！</h5>
                                <p>为增强企业的凝聚力，推动企业文化建设，促进企业内部各品牌员工间的交流互动，提高员工身体素质，12月28-29日，集团企业在4楼羽毛球场隆重举行了趣味羽毛球比赛。</p>
                                <div class="bot">
                                    <time>2020-11-30</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg03.jpg" alt="号外|企业二期窑炉建设奠基仪式圆满举行"/></div>
                            <div class="words">
                                <h5>号外|企业二期窑炉建设奠基仪式圆满举行</h5>
                                <p> 11月4日，企业新兴生产基地（二期建设）举行了盛大的奠基仪式。企业董事、各部门领导及媒体代表齐聚新兴生产基地，共同见证了这一历史性的重要时刻！</p>
                                <div class="bot">
                                    <time>2020-11-05</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg04.jpg" alt="智能水表市场需求2021年上半年市场情况"/></div>
                            <div class="words">
                                <h5>智能水表市场需求2021年上半年市场情况</h5>
                                <p>近日，为了关注客户需求、倾听客户呼声、改进工作质量，精心打造了实用而高效的投诉建议平台。以后有问题、要投诉、提建议，通过这个平台统统都可以实现。</p>
                                <div class="bot">
                                    <time>2020-11-02</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg05.jpg" alt="中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
揭牌仪式"/></div>
                            <div class="words">
                                <h5>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</h5>
                                <p>怀柔科学城促进科学仪器产业创新发展暨“怀柔科仪谷”建设发布会在京举行，北京怀柔仪器和传感器有限公司(以下简称“怀柔仪器公司”)也挂牌成立。</p>
                                <div class="bot">
                                    <time>2020-10-22</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img src="images/newimg06.jpg" alt="2021年度仪器仪表行业第六期培训班——IPD模式
下的研发项目管理在汉威集团举办"/></div>
                            <div class="words">
                                <h5>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</h5>
                                <p>2021年7月30日至31日，由中国仪器仪表行业协会主办、汉威科技集团股份有限公司（以下简称“汉威集团”）</p>
                                <div class="bot">
                                    <time>2020-09-24</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
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
                        <li><a href="#">6</a></li>
                        <li class="fenye-n"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    <select class="" onchange='javascript:location.href=this.options[this.selectedIndex].value'>
                        <option value="#" selected>1</option>
                        <option value="#">2</option>
                        <option value="#">3</option>
                        <option value="#">4</option>
                        <option value="#">5</option>
                        <option value="#">6</option>
                    </select></div><!-- 新闻专区 -->
                <ul class="news_hid">
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg.jpg" alt="红红火火，新兴基地二期窑炉点火仪式"/></div>
                            <div class="words">
                                <h5>红红火火，新兴基地二期窑炉点火仪式</h5>
                                <p></p>
                                <div class="bot">
                                    <time>2021-03-10</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg02.jpg" alt="世界冠军助阵，企业趣味羽毛球比赛圆满结束！"/></div>
                            <div class="words">
                                <h5>世界冠军助阵，企业趣味羽毛球比赛圆满结束！</h5>
                                <p>为增强企业的凝聚力，推动企业文化建设，促进企业内部各品牌员工间的交流互动，提高员工身体素质，12月28-29日，集团企业在4楼羽毛球场隆重举行了趣味羽毛球比赛。</p>
                                <div class="bot">
                                    <time>2020-11-30</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="号外|企业二期窑炉建设奠基仪式圆满举行"/></div>
                            <div class="words">
                                <h5>号外|企业二期窑炉建设奠基仪式圆满举行</h5>
                                <p> 11月4日，企业新兴生产基地（二期建设）举行了盛大的奠基仪式。企业董事、各部门领导及媒体代表齐聚新兴生产基地，共同见证了这一历史性的重要时刻！</p>
                                <div class="bot">
                                    <time>2020-11-05</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="为客户服务！金豪瓷砖投诉建议平台上线啦！"/></div>
                            <div class="words">
                                <h5>为客户服务！金豪瓷砖投诉建议平台上线啦！</h5>
                                <p>近日，为了关注客户需求、倾听客户呼声、改进工作质量，金豪瓷砖精心打造了实用而高效的投诉建议平台。以后有问题、要投诉、提建议，通过这个平台统统都可以实现。</p>
                                <div class="bot">
                                    <time>2020-11-02</time>

                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg04.jpg" alt="陶博会|金豪瓷砖化身流量收割机，广受瞩目！"/></div>
                            <div class="words">
                                <h5>智能水表市场需求2021年上半年市场情况</h5>
                                <p>智能水表市场需求2021年上半年市场情况智能水表市场需求2021年上半年市场情况</p>
                                <div class="bot">
                                    <time>2020-10-22</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg05.jpg" alt="终于来了！金豪全新品牌宣传片正式上线啦！"/></div>
                            <div class="words">
                                <h5>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</h5>
                                <p>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</p>
                                <div class="bot">
                                    <time>2020-09-24</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg06.jpg" alt="2021年度仪器仪表行业第六期培训班——IPD模式
下的研发项目管理在汉威集团举办"/></div>
                            <div class="words">
                                <h5>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</h5>
                                <p>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</p>
                                <div class="bot">
                                    <time>2020-09-04</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg.jpg" alt="红红火火，新兴基地二期窑炉点火仪式"/></div>
                            <div class="words">
                                <h5>红红火火，新兴基地二期窑炉点火仪式</h5>
                                <p></p>
                                <div class="bot">
                                    <time>2021-03-10</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg02.jpg" alt="世界冠军助阵，企业趣味羽毛球比赛圆满结束！"/></div>
                            <div class="words">
                                <h5>世界冠军助阵，企业趣味羽毛球比赛圆满结束！</h5>
                                <p>为增强企业的凝聚力，推动企业文化建设，促进企业内部各品牌员工间的交流互动，提高员工身体素质，12月28-29日，集团企业在4楼羽毛球场隆重举行了趣味羽毛球比赛。</p>
                                <div class="bot">
                                    <time>2020-11-30</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="号外|企业二期窑炉建设奠基仪式圆满举行"/></div>
                            <div class="words">
                                <h5>号外|企业二期窑炉建设奠基仪式圆满举行</h5>
                                <p> 11月4日，企业新兴生产基地（二期建设）举行了盛大的奠基仪式。企业董事、各部门领导及媒体代表齐聚新兴生产基地，共同见证了这一历史性的重要时刻！</p>
                                <div class="bot">
                                    <time>2020-11-05</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="为客户服务！金豪瓷砖投诉建议平台上线啦！"/></div>
                            <div class="words">
                                <h5>为客户服务！金豪瓷砖投诉建议平台上线啦！</h5>
                                <p>近日，为了关注客户需求、倾听客户呼声、改进工作质量，金豪瓷砖精心打造了实用而高效的投诉建议平台。以后有问题、要投诉、提建议，通过这个平台统统都可以实现。</p>
                                <div class="bot">
                                    <time>2020-11-02</time>

                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg04.jpg" alt="陶博会|金豪瓷砖化身流量收割机，广受瞩目！"/></div>
                            <div class="words">
                                <h5>智能水表市场需求2021年上半年市场情况</h5>
                                <p>智能水表市场需求2021年上半年市场情况智能水表市场需求2021年上半年市场情况</p>
                                <div class="bot">
                                    <time>2020-10-22</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg05.jpg" alt="终于来了！金豪全新品牌宣传片正式上线啦！"/></div>
                            <div class="words">
                                <h5>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</h5>
                                <p>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</p>
                                <div class="bot">
                                    <time>2020-09-24</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg06.jpg" alt="2021年度仪器仪表行业第六期培训班——IPD模式
下的研发项目管理在汉威集团举办"/></div>
                            <div class="words">
                                <h5>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</h5>
                                <p>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</p>
                                <div class="bot">
                                    <time>2020-09-04</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg.jpg" alt="红红火火，新兴基地二期窑炉点火仪式"/></div>
                            <div class="words">
                                <h5>红红火火，新兴基地二期窑炉点火仪式</h5>
                                <p></p>
                                <div class="bot">
                                    <time>2021-03-10</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg02.jpg" alt="世界冠军助阵，企业趣味羽毛球比赛圆满结束！"/></div>
                            <div class="words">
                                <h5>世界冠军助阵，企业趣味羽毛球比赛圆满结束！</h5>
                                <p>为增强企业的凝聚力，推动企业文化建设，促进企业内部各品牌员工间的交流互动，提高员工身体素质，12月28-29日，集团企业在4楼羽毛球场隆重举行了趣味羽毛球比赛。</p>
                                <div class="bot">
                                    <time>2020-11-30</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="号外|企业二期窑炉建设奠基仪式圆满举行"/></div>
                            <div class="words">
                                <h5>号外|企业二期窑炉建设奠基仪式圆满举行</h5>
                                <p> 11月4日，企业新兴生产基地（二期建设）举行了盛大的奠基仪式。企业董事、各部门领导及媒体代表齐聚新兴生产基地，共同见证了这一历史性的重要时刻！</p>
                                <div class="bot">
                                    <time>2020-11-05</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg03.jpg" alt="为客户服务！金豪瓷砖投诉建议平台上线啦！"/></div>
                            <div class="words">
                                <h5>为客户服务！金豪瓷砖投诉建议平台上线啦！</h5>
                                <p>近日，为了关注客户需求、倾听客户呼声、改进工作质量，金豪瓷砖精心打造了实用而高效的投诉建议平台。以后有问题、要投诉、提建议，通过这个平台统统都可以实现。</p>
                                <div class="bot">
                                    <time>2020-11-02</time>

                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg04.jpg" alt="陶博会|金豪瓷砖化身流量收割机，广受瞩目！"/></div>
                            <div class="words">
                                <h5>智能水表市场需求2021年上半年市场情况</h5>
                                <p>智能水表市场需求2021年上半年市场情况智能水表市场需求2021年上半年市场情况</p>
                                <div class="bot">
                                    <time>2020-10-22</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg05.jpg" alt="终于来了！金豪全新品牌宣传片正式上线啦！"/></div>
                            <div class="words">
                                <h5>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</h5>
                                <p>中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式中国仪器仪表行业协会秘书长李跃光参加“怀柔科仪谷”
                                    揭牌仪式</p>
                                <div class="bot">
                                    <time>2020-09-24</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="img_scale">
                        <a href="news_nay.html">
                            <div class="pic"><img realSrc="images/newimg06.jpg" alt="2021年度仪器仪表行业第六期培训班——IPD模式
下的研发项目管理在汉威集团举办"/></div>
                            <div class="words">
                                <h5>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</h5>
                                <p>2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办2021年度仪器仪表行业第六期培训班——IPD模式
                                    下的研发项目管理在汉威集团举办</p>
                                <div class="bot">
                                    <time>2020-09-04</time>
                                    <em><i class="pro_ico"></i> 查看详情</em>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul class="news m_news">
                    数据加载中，请稍后...
                </ul>
                <a href="javascript:void(0);" class="loading_bnt" onClick="loading.loadMore();"><i></i><span>加载更多</span></a>
                <script>
                    var _content = []; //临时存储li循环内容
                    var loading = {
                        _default: 6, //默认显示图片个数
                        _loading: 6, //每次点击按钮后加载的个数
                        init: function () {
                            var lis = $(".news_hid li");
                            $(".m_news").html("");
                            for (var n = 0; n < loading._default; n++) {
                                lis.eq(n).appendTo(".m_news");
                            }
                            $(".m_news img").each(function () {
                                $(this).attr('src', $(this).attr('realSrc'));
                            })
                            for (var i = loading._default; i < lis.length; i++) {
                                _content.push(lis.eq(i));
                            }
                            $(".news_hid").html("");
                        },
                        loadMore: function () {
                            var mLis = $(".m_news li").length;
                            for (var i = 0; i < loading._loading; i++) {
                                var target = _content.shift();
                                if (!target) {
                                    $('.loading_bnt span').html("全部加载完毕");
                                    break;
                                }
                                $(".m_news").append(target);
                                $(".m_news img").eq(mLis + i).each(function () {
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
