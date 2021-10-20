### 服务端

#### 部署

假设代码部署在/Users/admin/Code/html/simplecms；
后台域名：my.simplecms:8080
前台域名：

###### 1.配置.env

```
APP_DEBUG=false
APP_URL=http://test.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxx
DB_USERNAME=xxx
DB_PASSWORD=xxx

CACHE_DRIVER=redis
QUEUE_DRIVER=redis
```

###### 2.用户权限

a、修改文件夹权限

```shell
chown -R www:www storage
```

b、修改nginx和php-fpm执行用户为www

###### 3.nginx
```
server {
    listen       8080;
    server_name  my.simplecms;

    charset utf8;

    access_log  /Users/admin/Logs/nginx/my.simplecms.access.log;
    error_log   /Users/admin/Logs/nginx/my.simplecms.error.log debug;

    index index.html;

    root /Users/admin/Code/html/simplecms/public;

    client_max_body_size 100M;
    client_body_timeout 300;

    location / {
        try_files $uri $uri/ @web;
    }

    location @web {
        proxy_set_header Host my.simplecms-php:8080;
        proxy_pass http://127.0.0.1:8080;
    }

    # 隐藏文件不可访问
    location ~ /\..* {
        deny all;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        include        fastcgi.conf;

        #include servers/ips.conf;
    }
}

server {
    listen       8080;
    server_name  my.simplecms-php;

    charset utf8;

    access_log  /Users/admin/Logs/nginx/my.simplecms-php.access.log;

    index index.php;

    root /Users/admin/Code/html/simplecms/public;

    client_max_body_size 100M;
    client_body_timeout 300;

    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        include        fastcgi.conf;

        #include servers/ips.conf;
    }
}


server {
    listen       80;
    server_name  my.scsite;

    charset utf8;

    access_log  /Users/admin/Logs/nginx/my.scsite.access.log;

    index index.html index.htm index.php;

    root /Users/admin/Code/html/simplecms/storage/app/public;

    
    location / {
        try_files $uri $uri/ @web;
    }

    location = / {
        rewrite ^/(.*)$ /sitepage/index.html break;
        proxy_http_version 1.1;
        proxy_set_header Connection "keep-alive";
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header Host my.simplecms-php:8080;
        proxy_pass http://127.0.0.1:8080;
    }

    location @web {
        rewrite ^/(.*)$ /sitepage/$1 break;
        proxy_http_version 1.1;
        proxy_set_header Connection "keep-alive";
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header Host my.simplecms-php:8080;
        proxy_pass http://127.0.0.1:8080;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        include        fastcgi.conf;

        #include servers/ips.conf;
    }
}

```
###### 4.限制文件上传大小(可选)

编辑php.ini

```
upload_max_filesize 100M
post_max_size       100M
max_execution_time  300
```

###### 5.配置supervisor(可选) -- 队列

```
[program:freya-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/test/artisan queue:work --tries=3 --daemon --queue --timeout=300
autostart=true
autorestart=true
user=www
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/test/storage/logs/supervisor.log
```

###### 6.配置定时器(可选)  crontab -e -u www

```
* * * * * php /var/www/test/artisan schedule:run >> /dev/null 2>&1
```

###### 7.生成env的key

php artisan key:generate

###### 8.迁移数据库

php artisan migrate

###### 9.install
composer install
php artisan migrate


