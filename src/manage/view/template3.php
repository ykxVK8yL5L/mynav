<?php
//禁用错误报告
error_reporting(0);
$t=htmlspecialchars($_GET["t"]);
$q=htmlspecialchars($_POST["q"]);
if (empty($q)) {
}else{
  if ($t=="b"){
    echo'<script>window.location.href="//www.baidu.com/s?ie=utf-8&word='.$q.'";</script>';
  }else{
    //默认谷歌
    echo'<script>window.location.href="https://www.google.com.hk/search?hl=zh&q='.$q.'";</script>';
  }
};
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <meta name="referrer" content="no-referrer" />
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" href="icon/280.png?v=1.0.1" sizes="280x280" />
  <link rel="apple-touch-icon-precomposed" href="icon/280.png?v=1.0.1" />
  <meta name="msapplication-TileImage" content="icon/280.png?v=1.0.1" />
  <link rel="shortcut icon" href="icon/32.png?v=1.0.1"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="full-screen" content="yes"><!--UC强制全屏-->
  <meta name="browsermode" content="application"><!--UC应用模式-->
  <meta name="x5-fullscreen" content="true"><!--QQ强制全屏-->
  <meta name="x5-page-mode" content="app"><!--QQ应用模式-->
  <title>简单搜索</title>
  <link href="style.css?t=<?php echo date("ymdhi"); ?>" rel="stylesheet">
  <link href="wea.css?t=<?php echo date("ymdhi"); ?>" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="//at.alicdn.com/t/font_400990_j21lstb4wx.js"></script>
  <script src="sou.js?t=<?php echo date("ymdhi"); ?>"></script>
  <script src="wea.js?t=<?php echo date("ymdhi"); ?>"></script>
  <style type="text/css">
.textlogo{
    width: 14px;
    height: 14px;
    line-height:14px;
    border-radius: 2px;
    display: inline-block;
    font-size: 14px;
    text-align: center;
    vertical-align: middle;
    padding: 0;
    margin: 0 2px 0 8px;
    vertical-align: -0.15em;
    fill: currentColor;
    overflow: hidden;
}
/* --- search --- */
#search{width:80%;margin:0 auto; padding: 0 0 10px; position: relative; z-index: 2;  border-radius: 5px;}
#search form{position:relative}
#search-text{width:100%;height:50px; line-height: 50px; text-indent: 10px; font-size:16px;border-radius:5px;background-color:#fff; border:none; box-shadow: 0 0.5rem 0.625rem #d4d4d44d;transition: 0.3s all linear;}
#search-text:focus{background: #fff; box-shadow: 0 0px 24px 0 rgba(50, 50, 50, 0.08); border-color: #fff; }
#search button{position:absolute;top:0;right:0;background:none;border:0; border-radius:20px;width:60px;height:36px;margin:7px 0 0;line-height:36px;border-radius:3px; outline: none;}
#search button:hover{cursor:pointer}
#search button i{color:#ddd;font-size:18px}
.search-group{display:none;padding-left:75px}
.s-current .search-type{padding-left:0;display:block}
.s-current{display:block}
#search-list{position:relative}
.s-type{position:absolute;top:0;left:0;z-index:13;width:75px}
.s-type:hover{height:auto}
.s-type>span{display:block;height:31px;width:75px}
.s-type-list{display:none;position:absolute;top:31px;padding:9pt 0;width:70px;background:#fff;border-radius:5px;box-shadow:0 9px 20px rgba(0,0,0,.16)}
.s-type-list:before{position:absolute;top:-1pc;left:20px;content:'';display:block;width:0;height:0;border:10px solid transparent;border-bottom-color:#fff}
.s-type-list label{display:block;font-size:15px;text-align:center;font-weight:normal;margin-bottom:0;padding:2px 0;cursor:pointer;transition:.3s}
.s-type-list label:hover{background:rgba(136,136,136,.1)}
.s-type-list .tile-lg{color:#fff;width:3pc;height:3pc;font-size:1.25rem;line-height:3rem;border-radius:.3rem;display:block;margin:auto}
.s-type:hover .s-type-list{display:block}
.type-text{position:absolute;left:0;width:75px;padding-left:9pt;font-size:1pc;line-height:31px}
/*.type-text:after{content:"\f105";font-family:FontAwesome;margin:0 0 0 15px}*/
.search-type{white-space:nowrap;margin:0}.search-type label{margin:0}
.search-type li{display:inline-block; background: rgb(255 255 255 / 0.4); border-radius: 3px 3px 0 0;}
.search-type li label{display:inline-block;padding:0 11px;font-size:14px;line-height:31px;border-radius:3px 3px 0 0;cursor:pointer}
.search-type input:checked+label,.search-type input:hover+label{background-color:#fff;}
#search-text::-webkit-input-placeholder {color: #bbb;}
#word{ position: absolute; list-style: none; top:55px; left: 0px; width: 100%; background: rgba(259,259,259,0.9); border-radius: 5px; z-index:20000; padding: 15px 10px; box-shadow: 0 0 10px #aaa; }
#word li{ height:35px; padding: 0 5px; text-indent: 30px; background: url(sou.svg) no-repeat 5px; background-size: 20px;  line-height: 35px; cursor: pointer; font-size: 16px; border-radius: 5px;}
#word li:hover{ background-color: #ddd;}
.set-check{margin-top:3px;font-size:9pt}.set-check label{margin-left:3px}
.set-check input,.set-check label{opacity:0;transition:all .3s ease}
.search-type li{list-style:none;display:inline-block}
</style>
</head>

<body>
    <script>
    /*随机bing背景start,如无需求可注释掉*/
    $.ajax({
        url: './bg/',
        dataType: 'json',
        error: function() {
            console.log('网络错误！');
        },
        success: function(res) {
            //var bgimg;
            var x=Math.floor(Math.random()*9);
            $("body").append('<style> body{background:url("https://cn.bing.com'+res.images[x].url+'") no-repeat center/cover;}</style>');
        }
    });
    /*随机bing背景end*/
    </script> 
    <div id="menu"><i></i></div>
    <div class="list closed">
        <ul>
          <!------>


           <!-- 只兼容两级分类渲染 -->
                 <?php foreach ($navigation as $key=>$class) : ?>
                        <li class="title"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-kongzhitai"></use></svg> <?php echo $class['category_name']; ?></li>
                        <?php foreach ($class['nav'] as $nav) : ?>
                            <li>
                        <a href="<?php echo $nav['nav_link'] ?>" target="<?php echo $nav['nav_target'] ?>">
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
                            <span class="textlogo shake" style="background-color:<?php echo $bgcolor; ?>;color:<?php echo $fcolor; ?>"><?php echo mb_substr($nav['nav_name'],0,1) ?></span>
                            <?php endif; ?>
                            <?php echo $nav['nav_name']; ?></a>
                        </li>
                    <?php endforeach; ?>
            <?php endforeach; ?>

        </ul>
    </div>
<!--天气-->
    <div class="mywth">
        <div class="wea_hover">
            <div class="wea_in wea_top"></div>
            <div class="wea_in wea_con">
                <ul></ul>
            </div>
            <div class="wea_in wea_foot">
                <ul></ul>
            </div>
        </div>
        <!--天气插件，基于和风天气接口制作-->
    </div>    
    <!--div class="mywth" style="width: 200px;">
       <div id="he-plugin-simple"></div> <script>WIDGET = {CONFIG:{"modules":"10234","background":5,"tmpColor":"4A4A4A","tmpSize":"14","cityColor":"4A4A4A","citySize":"14","aqiSize":"14","weatherIconSize":"20","alertIconSize":"16","padding":"0px","shadow":"0","language":"auto","borderRadius":5,"fixed":"false","vertical":"middle","horizontal":"left","key":"f60588bd99d94495b907562a23e05666"}}</script> <script src="https://widget.heweather.net/simple/static/js/he-simple-common.js?v=1.1"></script>
    </div-->    
    <div id="content">
        <div class="con">
            <div class="shlogo" style="background: url(icon/logo3.svg) no-repeat center/cover;"></div>
          <!--搜索开始-->
        <div id="search" class="s-search">
            <div id="search-list" class="hide-type-list">
                <div class="search-group group-a s-current" style="padding-left: 20px">
                    <ul class="search-type">
                        <li><input checked="" hidden="" type="radio" name="type" id="type-baidu" value="https://www.baidu.com/s?wd=" data-placeholder="百度一下"><label for="type-baidu"><span style="color:#2100E0">百度</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-google" value="https://www.google.com.hk/search?hl=zh-CN&q=" data-placeholder="谷歌搜索"><label for="type-google"><span style="color:#3B83FA">G</span><span style="color:#F3442C">o</span><span style="color:#FFC300">o</span><span style="color:#4696F8">g</span><span style="color:#2CAB4E">l</span><span style="color:#F54231">e</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-syys" value="https://syys.ml/search.php?v=" data-placeholder="电影、剧集、综艺、动漫"><label for="type-syys"><span style="color:#b1870b">影视</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-drive" value="https://disk.misiai.com/search?what=disk&kw=" data-placeholder="影视、小说、网盘"><label for="type-drive"><span style="color:#e91e63">网盘</span></label></li>
                        <li><input hidden="" type="radio" name="type" id="type-weibo" value="https://s.weibo.com/weibo/" data-placeholder="微博搜索"><label for="type-weibo"><span style="color:#ff5722">微博</span></label></li>
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
        </div>
        <div class="foot" style="height: 40px;">
          <a href="https://google.co.jp/" style="color: #777;">Google</a> | 
          <a href="https://github.com" style="color: #777;">Github</a><br>
          © 2016-<?php echo date("Y") ?> by <a href="https://github.com">Hello</a> . All rights reserved.</div>
    </div>
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
</body>
</html>
