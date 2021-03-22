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
            <div class="sou">
                <form action="" method="post" target="_self">
                   <?php 
                   if ($t=="b"){
                     echo'<div class="lg" style="background: url(icon/baidu.svg) no-repeat center/cover;" onclick="window.location.href=\'?t=\';"></div>';
                   }else{
                    //上面知道把默认谷歌改成百度，这里不知道改吗大佬们？。。
                     echo'<div class="lg" style="background: url(icon/g.svg) no-repeat center/cover;" onclick="window.location.href=\'?t=b\';"></div>';
                   }

                    ?>
                    <!--input class="t" type="text" value="" name="t" hidden-->
                    <input class="wd" type="text" placeholder="请输入搜索内容" name="q" x-webkit-speech lang="zh-CN" autocomplete="off">
                    <button><svg class="icon" style=" width: 21px; height: 21px; opacity: 0.5;" aria-hidden="true"><use xlink:href="#icon-sousuo"></use></svg></button>
                </form>
                <div id="word"></div>
            </div>
        </div>
        <div class="foot" style="height: 40px;">
          <a href="https://google.co.jp/" style="color: #777;">Google</a> | 
          <a href="https://github.com" style="color: #777;">Github</a><br>
          © 2016-<?php echo date("Y") ?> by <a href="https://github.com">Hello</a> . All rights reserved.</div>
    </div>
</body>
</html>