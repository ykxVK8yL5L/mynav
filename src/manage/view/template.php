<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="webkit" name="renderer"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
    <link href="favicon.ico" rel="shortcut icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <!--减少服务器的资源开销用了cdn,如果想全部使用自己的服务器的jquery,注释cdn的jquery和"js/qieh.js",取消注释"js/jquery.min.js"即可-->
    <script src="js/jquery.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/font.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <title>本地导航</title>
    <style type="text/css">
        /*背景图设置,设置路径在"css/style.css"下的3315行开始,默认关闭*/
        /*也可以直接打开下面注释直接覆盖原生的渐变色背景,建议打开背景图之后注释原生的3318和3319行渐变色背景样式*/
        body {
            overflow: auto;
            /*background-size: cover;*/
            /*background: url(img/background.jpg) no-repeat;*/
            /*background-attachment: fixed;*/
        }

        #footer {
            height: unset;
        }

        .footer-contents {
            position: unset;
        }

        .footer-contents .links .line {
            margin-top: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        /*以下补充样式用于修复手机浏览下的一些体验*/
        @media only screen and (max-width: 479px) {
            div ul li {
                display: flex;
                margin: 0 0 0 0;
            }

            div ul li a {
                width: 100%;
            }

            div ul li a img {
                width: 100%;
            }

            div ul li a strong {
                width: 100%;
            }
        }

        @media only screen and (max-width: 349px) {
            div ul li {
                width: 33.33%;
            }
        }

        @media only screen and (min-width: 350px) and (max-width: 479px) {
            div ul li {
                width: 25%;
            }
        }

.navbar {
  overflow: hidden;
  background: rgba(0,0,0,0.6);
  position: fixed;
  bottom: 0;
  width: 100%;
  display:flex;/*Flex布局*/
display: -webkit-flex; /* Safari */
overflow-x: scroll;
    white-space:nowrap;
      flex-direction:row;
  justify-content:center;
}



/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track 
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
*/
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}


.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;

}

.navbar a:hover {
  background: #f1f1f1;
  color: black;
}

.navbar a.active {
  background-color: #4CAF50;
  color: white;
}



    </style>
</head>
<body>
<div id="particles-js" style="position:absolute; top: 0; z-index: -1; width: 100%;height: 100%;">
    <canvas class="particles-js-canvas-el" height="960" style="width: 100%; height: 100%;" width="1303"></canvas>
</div>
<script>particlesJS("particles-js", {
    particles: {
        number: {
            value: 20,
            density: {
                enable: !0,
                value_area: 1000
            }
        },
        color: {
            value: "#e1e1e1"
        },
        shape: {
            type: "circle",
            stroke: {
                width: 0,
                color: "#000000"
            },
            polygon: {
                nb_sides: 5
            },
            image: {
                src: "img/github.svg",
                width: 100,
                height: 100
            }
        },
        opacity: {
            value: 0.5,
            random: !1,
            anim: {
                enable: !1,
                speed: 1,
                opacity_min: 0.1,
                sync: !1
            }
        },
        size: {
            value: 15,
            random: !0,
            anim: {
                enable: !1,
                speed: 180,
                size_min: 0.1,
                sync: !1
            }
        },
        line_linked: {
            enable: !0,
            distance: 650,
            color: "#cfcfcf",
            opacity: 0.26,
            width: 1
        },
        move: {
            enable: !0,
            speed: 2,
            direction: "none",
            random: !0,
            straight: !1,
            out_mode: "out",
            bounce: !1,
            attract: {
                enable: !1,
                rotateX: 600,
                rotateY: 1200
            }
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: {
                enable: !1,
                mode: "repulse"
            },
            onclick: {
                enable: !1,
                mode: "push"
            },
            resize: !0
        },
        modes: {
            grab: {
                distance: 400,
                line_linked: {
                    opacity: 1
                }
            },
            bubble: {
                distance: 400,
                size: 40,
                duration: 2,
                opacity: 8,
                speed: 3
            },
            repulse: {
                distance: 200,
                duration: 0.4
            },
            push: {
                particles_nb: 4
            },
            remove: {
                particles_nb: 2
            }
        }
    },
    retina_detect: !0
});</script>
<div id="wrap">
    <div id="main">
        <!-- 外网访问地址 -->
        <div class="app animated fadeInLeft" id="app">
            <?php foreach ($navigation as $key=>$class) : ?>
                <ul <?php $key!=0? print 'style="display:none"': print '' ?>>
                        <?php foreach ($class['nav'] as $nav) : ?>
                            <li>
                        <a href="<?php echo $nav['nav_link'] ?>" target="<?php echo $nav['nav_target'] ?>
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
                            <img class="shake" src="<?php echo $nav['nav_icon'] ?>"/>
                            <?php else: ?>
                            <span class="textlogo shake" style="background-color:<?php echo $bgcolor; ?>;color:<?php echo $fcolor; ?>"><?php echo mb_substr($nav['nav_name'],0,1) ?></span>
                            <?php endif; ?>
                            <strong><?php echo $nav['nav_name']; ?></strong></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>

        </div>
        <!-- 内网网访问地址 -->
        <div style="clear: both;"></div>
    </div>
</div>
<div id="footer">
    <div class="footer-contents">
        <div class="links">
            <div class="line">
                <a href="/"></a>&nbsp;&nbsp;&nbsp;
                <span class="footer-link-separator"></span>&nbsp;&nbsp;&nbsp;
                <span class="copyright"></span>
            </div>
        </div>
    </div>
</div>



<div class="navbar">
 <?php foreach ($navigation as  $key=>$menu) : ?>
           <a href="#home" class="<?php $key==0? print "active": print "" ?>"><?php echo $menu['category_name']; ?></a>
 <?php endforeach; ?>
</div>
<script type="text/javascript">
    $(function() {
        $(".navbar a").click(function() {
            $(this).addClass("active").siblings().removeClass("active");
            $("#app ul").eq($(this).index()).show().siblings().hide();
        })

        $("body").swipe( {
        //Generic swipe handler for all directions
        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            var cindex = $('.navbar a.active').index();
            var tlength = $('.navbar a').length;
            if(direction=='left'&&cindex<(tlength-1)){
                $('.navbar a')[cindex+1].click();
            }
            if(direction=='right'&&cindex>0){
                $('.navbar a')[cindex-1].click();
            }
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
         threshold:75
      });
    })
</script>
</body>

</html>
