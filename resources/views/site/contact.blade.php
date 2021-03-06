@extends('site.page_base')

@section('banner')
    <div class="banner_box layout2">
        <div class="page_img">
            <div class="pic"><img src="images/ban_con.jpg" alt="联系我们"/></div>
            <div class="ind_tit">
                <h3>联系我们</h3>
                <figure><h4><span>Contact</span>us</h4></figure>

                <i class="ind_tit_ico2"></i>
            </div>
        </div>
    </div>
@endsection

@section('page_main')

    <main class="page_main">
        <div class="page_pos_box layout">
            <div class="page_pos">
                <img src="images/sit.gif" alt="当前位置"/>
                <span>当前位置：</span>
                <a href="index.html">首页</a>
                <span>&gt;</span>
                <a href="contact.html">联系方式</a>
                <span>&gt;</span>
                <a href="contact.html">联系我们</a>
            </div>

        </div>
        <ul class="m_page_nav">
            <li>
                <dl>
                    <dt><span>
                            联系我们            </span><i class="fa fa-angle-down"></i></dt>

                    <!-- 非产品中心-->
                    <dd>
                        <a href="contact.html">联系方式</a>

                    </dd>
                </dl>
            </li>
        </ul>

        <section class="page_con">
            <div class="layout">
                <div class="pub_box">
                    <div class="contact1">
                        <ul class="contact1_list">
                            <li>电话: <a href="tel:020-85550363">020-85550363/31199948</a></li>
                            <li>手机: 15302383334</li>
                            <li>传真：<a href="020-85628533">020-85628533</a></li>
                            <li>地址：广东 广州市番禺区石基镇前锋南路125号恒星工业园东座四楼</li>
                            <li>邮编:511450</li>
                        </ul>
                        <script type="text/javascript"
                                src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
                        <div style="width:100%;height:550px;border:#ccc solid 1px;" id="dituContent"></div>


                        <script type="text/javascript">
                            //创建和初始化地图函数：
                            function initMap() {
                                createMap();//创建地图
                                setMapEvent();//设置地图事件
                                addMapControl();//向地图添加控件
                                addMarker();//向地图中添加marker
                            }

                            //创建地图函数：
                            function createMap() {
                                var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                                var point = new BMap.Point(113.459866, 22.924854);//定义一个中心点坐标
                                map.centerAndZoom(point, 17);//设定地图的中心点和坐标并将地图显示在地图容器中
                                window.map = map;//将map变量存储在全局
                            }

                            //地图事件设置函数：
                            function setMapEvent() {
                                map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                                map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                                map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                                map.enableKeyboard();//启用键盘上下左右键移动地图
                            }

                            //地图控件添加函数：
                            function addMapControl() {
                                //向地图中添加缩放控件
                                var ctrl_nav = new BMap.NavigationControl({
                                    anchor: BMAP_ANCHOR_TOP_LEFT,
                                    type: BMAP_NAVIGATION_CONTROL_LARGE
                                });
                                map.addControl(ctrl_nav);
                                //向地图中添加缩略图控件
                                var ctrl_ove = new BMap.OverviewMapControl({
                                    anchor: BMAP_ANCHOR_BOTTOM_RIGHT,
                                    isOpen: 1
                                });
                                map.addControl(ctrl_ove);
                                //向地图中添加比例尺控件
                                var ctrl_sca = new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT});
                                map.addControl(ctrl_sca);
                            }

                            //标注点数组
                            var markerArr = [{
                                title: "广州迪川仪器仪表有限公司",
                                content: "电话:&nbsp;020-85550363/31199948",
                                point: "113.457216|22.924272",
                                isOpen: 1,
                                icon: {w: 21, h: 21, l: 0, t: 0, x: 6, lb: 5}
                            }
                            ];

                            //创建marker
                            function addMarker() {
                                for (var i = 0; i < markerArr.length; i++) {
                                    var json = markerArr[i];
                                    var p0 = json.point.split("|")[0];
                                    var p1 = json.point.split("|")[1];
                                    var point = new BMap.Point(p0, p1);
                                    var iconImg = createIcon(json.icon);
                                    var marker = new BMap.Marker(point, {icon: iconImg});
                                    var iw = createInfoWindow(i);
                                    var label = new BMap.Label(json.title, {"offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20)});
                                    marker.setLabel(label);
                                    map.addOverlay(marker);
                                    label.setStyle({
                                        borderColor: "#808080",
                                        color: "#333",
                                        cursor: "pointer"
                                    });

                                    (function () {
                                        var index = i;
                                        var _iw = createInfoWindow(i);
                                        var _marker = marker;
                                        _marker.addEventListener("click", function () {
                                            this.openInfoWindow(_iw);
                                        });
                                        _iw.addEventListener("open", function () {
                                            _marker.getLabel().hide();
                                        })
                                        _iw.addEventListener("close", function () {
                                            _marker.getLabel().show();
                                        })
                                        label.addEventListener("click", function () {
                                            _marker.openInfoWindow(_iw);
                                        })
                                        if (!!json.isOpen) {
                                            label.hide();
                                            _marker.openInfoWindow(_iw);
                                        }
                                    })()
                                }
                            }

                            //创建InfoWindow
                            function createInfoWindow(i) {
                                var json = markerArr[i];
                                var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
                                return iw;
                            }

                            //创建一个Icon
                            function createIcon(json) {
                                var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), {
                                    imageOffset: new BMap.Size(-json.l, -json.t),
                                    infoWindowOffset: new BMap.Size(json.lb + 5, 1),
                                    offset: new BMap.Size(json.x, json.h)
                                })
                                return icon;
                            }

                            initMap();//创建和初始化地图
                        </script>

                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection