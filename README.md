# Docker PHP-FPM 7.4 & Nginx 1.18 on Alpine Linux
PHP-FPM 7.4 & Nginx 1.18 setup for Docker, build on Alpine Linux

自用NAS导航 DOCKER命令:  
docker run -p 10020:8080 ykxvk8yl5l/mynav:latest   
导航管理后台: /manage/index.php 生成即可  

  如需数据持久化，挂载目录拷贝/var/www/html到本地目录即可或直接拷贝github项目中的src目录内容到本地然后挂载到/var/www/html即可


代码出自:https://github.com/asundust/NAS-Nav-iCloud   
运行环境出自：https://github.com/TrafeX/docker-php-nginx  
