<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>5IUX搜索</title>
    <link rel="apple-touch-icon-precomposed" href="280.png" />
    <meta name="msapplication-TileImage" content="280.png" />
    <link rel="shortcut icon" href="32.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <!--UC强制全屏-->
    <meta name="browsermode" content="application">
    <!--UC应用模式-->
    <meta name="x5-fullscreen" content="true">
    <!--QQ强制全屏-->
    <meta name="x5-page-mode" content="app">
    <!--QQ应用模式-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" id="font-awesome-css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css?ver=1.1422" type="text/css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://at.alicdn.com/t/font_1230786_ewprpwrczvj.js"></script>
    <script src="sou.js"></script>
    <link rel='stylesheet' href='style4.css'>
</head>

<body>
    <!--视频头部背景-->
    <div class="banner-video">
        <!--视频来自阿里云首页，有需要请自行更换-->
        <!--video autoplay loop muted>
            <source src="https://cdn.jsdelivr.net/gh/5iux/uploads/pic/3840-banner.mp4" type="video/mp4">
        </video-->
        <!--注释掉图片可换成视频版本-->
        <img src="https://cn.bing.com//th?id=OHR.HuntsMesa_JA-JP3140979616_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp" alt="">
        <div class="bottom-cover" style="background-image: linear-gradient(rgba(255, 255, 255, 0) 0%, rgb(244 248 251 / 0.6) 50%, rgb(244 248 251) 100%);"></div>
    </div>
    <!--topbar开始-->
    <style>
        .navbar-toggler svg {
            width: 24px;
            height: 24px;
        }
        
        .navbar-toggler .bi-list-nested {
            display: none;
        }
        
        .navbar-toggler.collapsed .bi-list-nested {
            display: block;
        }
        
        .navbar-toggler.collapsed .bi-x {
            display: none;
        }
        
        .navbar-toggler .bi-x {
            display: block;
        }
        .textlogo{
    width: 45px;
    height: 45px;
    display: block;
    font-size: 30px;
    text-align: center;
    vertical-align: middle;
    padding: 0;
    vertical-align: -0.15em;
    fill: currentColor;
    overflow: hidden;
    background: #fff;
    border: 1px solid #eee;  
    border-radius:10px; 
    margin: 0 auto;
  }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="position: absolute; z-index: 10000;">
        <a class="navbar-brand"><img src="https://cdn.jsdelivr.net/gh/5iux/uploads/pic/20200424logo4.svg" height="35" style=" margin-left: -40px;" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <style>
                #he-plugin-simple {
                    z-index: 1000;
                }
            </style>
            <div id="he-plugin-simple"></div>
            <script>
                WIDGET = {
                    CONFIG: {
                        "modules": "01234",
                        "background": 5,
                        "tmpColor": "4A4A4A",
                        "tmpSize": 14,
                        "cityColor": "4A4A4A",
                        "citySize": 14,
                        "aqiSize": 14,
                        "weatherIconSize": 22,
                        "alertIconSize": 16,
                        "padding": "8px 8px 8px 8px",
                        "shadow": "1",
                        "language": "auto",
                        "borderRadius": 5,
                        "fixed": "false",
                        "vertical": "middle",
                        "horizontal": "center",
                        "key": "acd0fdcab4b9481a98d0f59145420fac"
                    }
                }
            </script>
            <script src="https://widget.heweather.net/simple/static/js/he-simple-common.js?v=1.1"></script>
        </div>
    </nav>
    <!--topbar结束-->
    <div class="container" style="margin-top: 100px; position: relative; z-index: 100;">
        <!--搜索开始-->
        <div id="search" class="s-search">
            <div id="search-list" class="hide-type-list">
                <div class="search-group group-a s-current" style="padding-left: 20px">
                    <ul class="search-type">
                        <li><input checked="" hidden="" type="radio" name="type" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label for="type-baidu"><span style="color:#2100E0">百度</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-google" value="https://www.google.com.hk/search?hl=zh-CN&q=" data-placeholder="谷歌搜索"><label for="type-google"><span style="color:#3B83FA">G</span><span style="color:#F3442C">o</span><span style="color:#FFC300">o</span><span style="color:#4696F8">g</span><span style="color:#2CAB4E">l</span><span style="color:#F54231">e</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-duck" value="https://duckduckgo.com/?q=" data-placeholder="Duckduckgo搜索"><label for="type-duck"><span style="color:#b1870b">Duck</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-quan" value="https://temai.m.taobao.com/search.html?pid=mm_30753570_11166349_39936732&union_lens=recoveryid%3A201_11.23.94.254_301551_1614246723242%3Bprepvid%3A201_11.23.94.254_301551_1614246723242&q=" data-placeholder="搜索淘宝优惠券"><label for="type-quan"><span style="color:#ff5722">搜券</span></label></li>
                    </ul>
                </div>
            </div>
            <form action="https://www.baidu.com/s?wd=" method="get" target="_blank" id="super-search-fm">
                <input type="text" id="search-text" placeholder="百度一下" style="outline:0" autocomplete="off">
                <button class="submit" type="submit"><svg style="width: 20px; height: 20px; margin:7px 0; color: #29f;" class="icon" aria-hidden="true">
                        <use xlink:href="#icon-sousuo"></use>
                    </svg><span></button>
                <ul id="word" style="display: none;"></ul>
            </form>
            <div class="set-check hidden-xs">
                <input type="checkbox" id="set-search-blank" class="bubble-3" autocomplete="off">
            </div>
        </div>
        <!--搜索结束-->

 <!-- 只兼容两级分类渲染 -->
                 <?php foreach ($navigation as $key=>$class) : ?>
                 <ul class="mylist row">
                        <li class="title"><svg class="icon" aria-hidden="true"> <use xlink:href="#icon-remen"></use> </svg> <?php echo $class['category_name']; ?></li>
                        <?php foreach ($class['nav'] as $nav) : ?>
                            <li class="col-3 col-sm-3 col-md-3 col-lg-1">
                        <a href="<?php echo $nav['nav_link'] ?>" target="<?php echo $nav['nav_target'] ?>" style="text-align: center;">
                            <?php 
                            $colors=array(
                                "#3B5998"=>"#ffffff",
                                "#E12F67"=>"#ffffff",
                                "#1DB954"=>"#ffffff",
                                "#1769FF"=>"#ffffff",
                                "#CD201F"=>"#ffffff",
                                "#1DA1F2"=>"#ffffff",
                                "#CC2127"=>"#ffffff",
                                "#1AB7EA"=>"#ffffff",
                                "#25D366"=>"#ffffff",
                                "#44546B"=>"#ffffff",
                                "#272727"=>"#ffffff",
                                "#1FBAD6"=>"#ffffff",
                                "#79C142"=>"#ffffff",
                                "#563D7C"=>"#ffffff",
                                "#EA4C89"=>"#ffffff"
                            );
                            $bgcolor = array_rand($colors);$fcolor = $colors[$bgcolor];
                            ?>
                            <?php if(!empty($nav['nav_icon'])): ?>
                            <img class="textlogo shake" src="<?php echo $nav['nav_icon'] ?>"/>
                            <?php else: ?>
                            <p class="textlogo shake" style="background-color:<?php echo $bgcolor; ?>;color:<?php echo $fcolor; ?>"><?php echo mb_substr($nav['nav_name'],0,1) ?></p>
                            <?php endif; ?>
                            <?php echo $nav['nav_name']; ?></a>
                        </li>
                    <?php endforeach; ?>
                      </ul>
            <?php endforeach; ?>
    </div>
    <!--版权信息开始-->
    <p class="mt-5 mb-3 text-muted text-center">©2020 by <a href="https://g.5iux.cn/">5iux</a>. All rights reserved.</p>
    <!--
作者:D.Young
主页：https://blog.5iux.cn/
github：https://github.com/5iux/5iux.github.io
日期：2021-02-04
版权所有，请勿删除
-->
    <!--版权信息结束-->
    <script>
    eval(function(e, t, a, c, i, n) {
        if (i = function(e) {
                return (e < t ? "" : i(parseInt(e / t))) + (35 < (e %= t) ? String.fromCharCode(e + 29) : e.toString(36))
            }, !"".replace(/^/, String)) {
            for (; a--;) n[i(a)] = c[a] || i(a);
            c = [function(e) {
                return n[e]
            }], i = function() {
                return "\\w+"
            }, a = 1
        }
        for (; a--;) c[a] && (e = e.replace(new RegExp("\\b" + i(a) + "\\b", "g"), c[a]));
        return e
    }('!2(){2 g(){h(),i(),j(),k()}2 h(){d.9=s()}2 i(){z a=4.8(\'A[B="7"][5="\'+p()+\'"]\');a&&(a.9=!0,l(a))}2 j(){v(u())}2 k(){w(t())}2 l(a){P(z b=0;b<e.O;b++)e[b].I.1c("s-M");a.F.F.F.I.V("s-M")}2 m(a,b){E.H.S("L"+a,b)}2 n(a){6 E.H.Y("L"+a)}2 o(a){f=a.3,v(u()),w(a.3.5),m("7",a.3.5),c.K(),l(a.3)}2 p(){z b=n("7");6 b||a[0].5}2 q(a){m("J",a.3.9?1:-1),x(a.3.9)}2 r(a){6 a.11(),""==c.5?(c.K(),!1):(w(t()+c.5),x(s()),s()?E.U(b.G,+T X):13.Z=b.G,10 0)}2 s(){z a=n("J");6 a?1==a:!0}2 t(){6 4.8(\'A[B="7"]:9\').5}2 u(){6 4.8(\'A[B="7"]:9\').W("14-N")}2 v(a){c.1e("N",a)}2 w(a){b.G=a}2 x(a){a?b.3="1a":b.16("3")}z y,a=4.R(\'A[B="7"]\'),b=4.8("#18-C-19"),c=4.8("#C-12"),d=4.8("#17-C-15"),e=4.R(".C-1b"),f=a[0];P(g(),y=0;y<a.O;y++)a[y].D("Q",o);d.D("Q",q),b.D("1d",r)}();', 62, 77, "||function|target|document|value|return|type|querySelector|checked||||||||||||||||||||||||||var|input|name|search|addEventListener|window|parentNode|action|localStorage|classList|newWindow|focus|superSearch|current|placeholder|length|for|change|querySelectorAll|setItem|new|open|add|getAttribute|Date|getItem|href|void|preventDefault|text|location|data|blank|removeAttribute|set|super|fm|_blank|group|remove|submit|setAttribute".split("|"), 0, {}));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
