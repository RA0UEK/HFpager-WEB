This is WEB-SITE for HFpagerNG

1. Install termux
2. Install termux.boot
3. Configure termux.boot
4. Install web-server and PHP
5. Correct Apache config
6. Put files into htdocs
7. Start web-server
8. Htaccess config


1. Install termux https://f-droid.org/ru/packages/com.termux/
Apply commands:
termux-setup-storage
pkg update && upgrade


2. Install termux.boot https://f-droid.org/ru/packages/com.termux.boot/


3. In /.termux/boot create start.boot with text:
#!/data/data/com.termux/files/usr/bin/sh
termux-wake-lock && sshd && httpd
php /data/data/com.termux/files/usr/share/apache2/default-site/htdocs/starthfp.php


4. Install web-server and php:
pkg install apache2
pkg install php
pkg install php-apache


5. Correct httpd.conf:
AllowOverride All #For use .htaccess
LoadModule php_module libexec/apache2/libphp.so
AddHandler application/x-httpd-php .php
LoadModule mpm_prefork_module libexec/apache2/mod_mpm_prefork.so


6. Put into /data/data/com.termux/files/usr/share/apache2/default-site/htdocs files:
index.php
beacons.php
transmit.php
showbar.php
starthfp.php
.htaccess
.htpasswd

8. Start web-server
httpd -k start

9. Change htaccess.txt to .htaccess and htpasswd.txt to .htpasswd for use Htaccess-Authorization
login: hfpager
pass: hfpager
