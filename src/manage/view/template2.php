<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="viggo" />
    <title> 网址导航</title>
    <meta name="keywords" content=".Start, 网址导航,私有云网址导航,程序员导航,IT导航,私有云,快捷入口,快捷导航">
    <meta name="description" content=".Start 专注于私有云的网址导航">
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <link rel="stylesheet" href="../assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="../assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/xenon-core.css">
    <link rel="stylesheet" href="../assets/css/xenon-components.css">
    <link rel="stylesheet" href="../assets/css/xenon-skins.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
.textlogo{
    width: 40px;
    height: 54px;
    line-height:54px;
    border-radius: 10px;
    display: inline-block;
    font-size: 36px;
    text-align: center;
    vertical-align: middle;
    padding: 0;
}
</style>
</head>

<body class="page-body">
    <!-- skin-white -->
    <div class="page-container">
        <div class="sidebar-menu toggle-others fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <div class="logo">
                        <a href="/" class="logo-expanded">
                            <img src="../assets/images/logo@2x.png" width="100%" alt="" />
                        </a>
                        <a href="/" class="logo-collapsed">
                            <img src="../assets/images/logo-collapsed@2x.png" width="40" alt="" />
                        </a>
                    </div>
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa-bars"></i>
                        </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
                    <!-- 只兼容两级分类渲染 -->
                    <?php foreach ($menuTree as $menu) : ?>
                        <?php if (count($menu['child']) <= 0) : ?>
                            <li>
                                <a href="#tag-<?php echo $menu['id']; ?>" class="smooth">
                                    <i class="linecons-star"></i>
                                    <span class="title"><?php echo $menu['category_name']; ?></span>
                                </a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a>
                                    <i class="linecons-lightbulb"></i>
                                    <span class="title"><?php echo $menu['category_name']; ?></span>
                                </a>
                                <ul>
                                    <?php foreach ($menu['child'] as $menu) : ?>
                                        <li>
                                            <a href="#tag-<?php echo $menu['id']; ?>" class="smooth">
                                                <span class="title"><?php echo $menu['category_name']; ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="main-content">
            <nav class="navbar user-info-navbar" role="navigation">
                <!-- User Info, Notifications and Menu Bar -->
                <!-- Left links for user info navbar -->
                <ul class="user-info-menu left-links list-inline list-unstyled">
                    <li class="hidden-sm hidden-xs">
                        <a href="#" data-toggle="sidebar">
                            <i class="fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php foreach ($navigation as $class) : ?>
                <?php if (count($class['nav']) <= 0) continue; ?>
                <!-- <?php echo $class['category_name'] ?> -->
                <h4 class="text-gray"><i class="linecons-tag" style="margin-right: 7px;" id="tag-<?php echo $class['category_id'] ?>"></i><?php echo $class['category_name'] ?></h4>
                <div class="row">
                    <?php foreach ($class['nav'] as $nav) : ?>
                        <div class="col-sm-3">
                            <div class="xe-widget xe-conversations box2 label-info" onclick="window.open('<?php echo $nav['nav_link'] ?>', '<?php echo $nav['nav_target'] ?>')" data-toggle="tooltip" data-placement="bottom" title="<?php echo $nav['nav_link'] ?>" data-original-title="<?php echo $nav['nav_name'] ?>">
                                <div class="xe-comment-entry">
                                    <a class="xe-user-img">
                                        <?php 
                            $colors=array(
                              "#3b5998"=>"#ffffff",
                               "#E12F67"=>"#ffffff",
                               "#1db954"=>"#ffffff",
                               "#1769ff"=>"#ffffff",
                               "#cd201f"=>"#ffffff",
                               "#1da1f2"=>"#ffffff",
                               "#cc2127"=>"#ffffff",
                               "#ea4c89"=>"#ffffff",
                               "#56B68B"=>"#ffffff",
                               "#0077b5"=>"#ffffff",
                               "#cc3732"=>"#ffffff",
                               "#323232"=>"#ffffff",
                               "#F8630E"=>"#ffffff",
                               "#F94877"=>"#ffffff",
                               "#FFFC00"=>"#ffffff",
                               "#0066DC"=>"#ffffff",
                               "#25D366"=>"#ffffff",
                               "#1ab7ea"=>"#ffffff",
                               "#4d75a3"=>"#ffffff",
                               "#44546B"=>"#ffffff",
                               "#00b489"=>"#ffffff",
                               "#006ed2"=>"#ffffff",
                               "#ff5700"=>"#ffffff",
                               "#05CC47"=>"#ffffff",
                               "#C41200"=>"#ffffff",
                               "#D51007"=>"#ffffff",
                               "#272727"=>"#ffffff",
                               "#313131"=>"#ffffff",
                               "#FF5A60"=>"#ffffff",
                               "#1FBAD6"=>"#ffffff",
                               "#2196F3"=>"#ffffff",
                               "#FF0000"=>"#ffffff",
                               "#0088CC"=>"#ffffff",
                               "#007EE5"=>"#ffffff",
                               "#2890C3"=>"#ffffff",
                               "#1C1B1A"=>"#ffffff",
                               "#E62B1E"=>"#ffffff",
                               "#ff3366"=>"#ffffff",
                               "#52bad5"=>"#ffffff",
                               "#263F6A"=>"#ffffff",
                               "#79c142"=>"#ffffff",
                               "#222222"=>"#ffffff",
                               "#008cdd"=>"#ffffff",
                               "#A4C639"=>"#ffffff",
                               "#00AFF0"=>"#ffffff",
                               "#76CC1E"=>"#ffffff",
                               "#1D508D"=>"#ffffff",
                               "#6ebc6c"=>"#ffffff",
                               "#0088CC"=>"#ffffff",
                               "#46A5E3"=>"#ffffff",
                               "#0050EF"=>"#ffffff",
                               "#6441A5"=>"#ffffff",
                               "#205081"=>"#ffffff",
                               "#DC3D50"=>"#ffffff",
                               "#8ba753"=>"#ffffff",
                               "#002B5C"=>"#ffffff",
                               "#96BF48"=>"#ffffff",
                               "#B30838"=>"#ffffff",
                               "#000000"=>"#ffffff",
                               "#171515"=>"#ffffff",
                               "#E12828"=>"#ffffff",
                               "#344A5F"=>"#ffffff",
                               "#C13832"=>"#ffffff",
                               "#1caff6"=>"#ffffff",
                               "#9abb70"=>"#ffffff",
                               "#19a9e5"=>"#ffffff",
                               "#000000"=>"#ffffff",
                               "#379ECC"=>"#ffffff",
                               "#21759b"=>"#ffffff",
                               "#ff0000"=>"#ffffff",
                               "#DD4814"=>"#ffffff",
                               "#2e9fff"=>"#ffffff",
                               "#bb0000"=>"#ffffff",
                               "#4b9123"=>"#ffffff",
                               "#B97A45"=>"#ffffff",
                               "#c22026"=>"#ffffff",
                               "#f6a006"=>"#ffffff",
                               "#2585e5"=>"#ffffff",
                               "#45a1ff"=>"#ffffff",
                               "#4264fb"=>"#ffffff",
                               "#563d7c"=>"#ffffff"
                            );
                            $bgcolor = array_rand($colors);$fcolor = $colors[$bgcolor];
                            ?>
                                         <?php if(!empty($nav['nav_icon'])): ?>
                                         <img data-src="<?php echo $nav['nav_icon'] ?>" class="lozad img-circle" width="40">
                                        <?php else: ?>
                                        <span class="textlogo shake" style="background-color:<?php echo $bgcolor; ?>;color:<?php echo $fcolor; ?>"><?php echo mb_substr($nav['nav_name'],0,1) ?></span>
                                        <?php endif; ?>
                                    </a>
                                    <div class="xe-comment">
                                        <a href="#" class="xe-user-name overflowClip_1">
                                            <strong><?php echo $nav['nav_name']; ?></strong>
                                        </a>
                                        <p class="overflowClip_2"><?php echo $nav['nav_desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <br />
                <!-- END <?php echo $class['category_name'] ?> -->
            <?php endforeach; ?>

            <!-- Main Footer -->
            <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
            <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
            <!-- Or class "fixed" to  always fix the footer to the end of page -->
            <footer class="main-footer sticky footer-type-1">
                <div class="footer-inner">
                    <!-- Add your copyright text here -->
                    <div class="footer-text">
                        &copy; 2017-2020 <strong>快捷导航</strong> design by <strong>Viggo</strong> development by <strong>iChenYun</strong>
                    </div>
                    <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                    <div class="go-up">
                        <a href="#" rel="go-top">
                            <i class="fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- 锚点平滑移动 -->
    <script type="text/javascript">
        $(document).ready(function() {
            //img lazy loaded
            const observer = lozad();
            observer.observe();

            $(document).on('click', '.has-sub', function() {
                var _this = $(this)
                if (!$(this).hasClass('expanded')) {
                    setTimeout(function() {
                        _this.find('ul').attr("style", "")
                    }, 300);

                } else {
                    $('.has-sub ul').each(function(id, ele) {
                        var _that = $(this)
                        if (_this.find('ul')[0] != ele) {
                            setTimeout(function() {
                                _that.attr("style", "")
                            }, 300);
                        }
                    })
                }
            })
            $('.user-info-menu .hidden-sm').click(function() {
                if ($('.sidebar-menu').hasClass('collapsed')) {
                    $('.has-sub.expanded > ul').attr("style", "")
                } else {
                    $('.has-sub.expanded > ul').show()
                }
            })
            $("#main-menu li ul li").click(function() {
                $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
                $(this).addClass('active'); // 添加当前元素的样式
            });
            $("a.smooth").click(function(ev) {
                ev.preventDefault();

                public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
                ps_destroy();
                $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top - 30
                }, {
                    duration: 500,
                    easing: "swing"
                });
            });
            return false;
        });

        var href = "";
        var pos = 0;
        $("a.smooth").click(function(e) {
            $("#main-menu li").each(function() {
                $(this).removeClass("active");
            });
            $(this).parent("li").addClass("active");
            e.preventDefault();
            href = $(this).attr("href");
            pos = $(href).position().top - 30;
        });
    </script>
    <!-- Bottom Scripts -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/TweenMax.min.js"></script>
    <script src="../assets/js/resizeable.js"></script>
    <script src="../assets/js/joinable.js"></script>
    <script src="../assets/js/xenon-api.js"></script>
    <script src="../assets/js/xenon-toggles.js"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="../assets/js/xenon-custom.js"></script>
    <script src="../assets/js/lozad.js"></script>
</body>

</html>
