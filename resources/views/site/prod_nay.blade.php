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
                            产品中心            </span><i class="fa fa-angle-down"></i></dt>

                </dl>
            </li>
        </ul>

        <section class="page_con">
            <div class="layout">
                <style>
                    @media only screen and (min-width: 0) and (max-width: 1024px){
                        .page_con{background: #f7f7f7;}
                        .page_nav_bd{display: none;}
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
                            <dd>
                                <a class='active' href="#">全部</a>
                                <a  href="#">广州仪器仪表</a>
                                <a  href="#">椭圆齿轮流量计</a>
                                <a  href="#">浮球液位开关</a>
                                <a  href="#">涡街流量计</a>
                                <a  href="#">压力变送器</a>
                                <a  href="#">电磁流量计</a>
                                <a  href="#">微型流量计</a>
                                <a  href="#">金属管浮子流量计</a>
                                <a  href="#">超声波流量计</a>
                                <a  href="#">涡轮流量计</a>
                                <a  href="#">温度湿度变送器</a>
                                <a  href="#">液体流量计</a>
                                <a  href="#">气体涡轮流量计</a>
                            </dd>
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <dt><span>产品</span><i class="fa fa-angle-down"></i></dt>
                            <dd>
                                <a href="#">全部</a>
                                <a   class='active' href="#">FS4003系列气体质量流量传感器</a>
                                <a   href="#">FS4001气体流量传感器</a>
                                <a   href="#">热式气体质量流量计</a>
                                <a   href="#">MF5200气体质量流量计</a>
                                <a   href="#">MF5212气体质量流量计</a>
                                <a   href="#">MF5700气体流量计</a>
                                <a   href="#">微型气体流量计</a>
                            </dd>
                        </dl>
                    </li>

                </ul>

                <div class="pro_view1">
                    <div class="pro_view1_left">
                        <div class="pro_view1_bd">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="pic"><img src="images/prod_man.jpg" alt="智能涡轮流量计" /></div>
                                        <p>智能涡轮流量计</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="pic"><img src="images/prod_man2.jpg" alt="智能涡轮流量计" /></div>
                                        <p>CGTB61212-W 版面2</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="pic"><img src="images/prod_man3.jpg" alt="CGTB61212-W 版面3" /></div>
                                        <p>CGTB61212-W 版面3</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="pic"><img src="images/prod_man4.jpg" alt="CGTB61212-W 版面4" /></div>
                                        <p>CGTB61212-W 版面4</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pro_view1_hd">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide active"><a href="javascript:void(0);"><img src="images/prod_man.jpg" alt="CGTB61212-W 卓越灰" /></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="images/prod_man2.jpg" alt="CGTB61212-W 版面2" /></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="images/prod_man3.jpg" alt="CGTB61212-W 版面3" /></a></div>
                                    <div class="swiper-slide"><a href="javascript:void(0);"><img src="images/prod_man4.jpg" alt="CGTB61212-W 版面4" /></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pro_view1_right">
                        <h3>智能涡轮流量计</h3>
                        <div class="pro_view1_word"><pre></pre></div>
                        <div class="pro_view1_word2">
                            <ul>
                                <li><span>上传时间：</span>2021-07-30</li>
                                <li><span>简要描述：</span></li>
                                <li>MF5600气体质量流量计专门为需要显示器和表体分离的应用需求而设计的。例如医院供氧系统小型空分系统。该流量计的标准工业用户界面（RS485/4~20mA）及用户自定报警功能更好实现的异地或网络监控。现有的产品是MF5612和MF5619可分别测量0-300SLPM和0-800SLPM气体流量。</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="ind3 pro_view3">
                    <div class="ind_tit">
                        <h3>详细介绍</h3>
                        <figure><h4><span>related </span>suggestion</h4></figure>
                        <i class="ind_tit_ico"></i>
                    </div>
                    <div class="pro_nay">
                        <p> 应用环境</p>

                        <p>MF5600气体质量流量计是用于测量和控制气体质量流量的新型仪表。可用于石油、化工、钢铁、冶金、电力、轻工、医药、环保等工业部门的空气、烃类气体、可燃性气体、烟道气体的监测。</p>
                        <p>特  点</p>
                        <p>可靠性高       重复性好      测量精度高      压损小</p>
                        <p>无活动部件     量程比宽      响应速度快      无须温压补偿</p>
                        <p>MF5600气体质量流量计应  用</p>
                        <p>•工业管道中气体质量流量测量   •烟囱排出的烟气流速测量
                            •煅烧炉烟道气流量测量         •燃气过程中空气流量测量
                            •压缩空气流量测量             •半道体芯片制造过程中气体流量测量
                            •污水处理中气体流量测量       •加热通风和空调系统中的气体流量测量
                            •熔剂回收系统气体流量测量     •燃烧锅炉中燃烧气体流量测量
                            •天然气、火炬气、氢气等气体流量测量
                            •啤酒生产过程中二氧化碳气体流量测量
                            •水泥、卷烟、玻璃厂生产过程中气体质量流量</p>

                        <p>产品特点：</p>

                        <p>  - 分体式显示器可通过经特殊设计的连接电缆安装于远离气体管路的地方</p>
                        <p>  - 流量计标配有RS485通讯模块，选配有4~20mA标准电流输出，PULSE脉冲输出</p>
                        <p> - 光洁的不锈钢管体有利于氧气测量</p>
                        <p>- 超大量程有利于监控气体流量 </p>
                        <p>- 内置安全插件使安装便捷</p>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
