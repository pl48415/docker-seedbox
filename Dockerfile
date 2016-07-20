FROM ubuntu:14.04

RUN dpkg-divert --local --rename --add /sbin/initctl
RUN ln -sf /bin/true /sbin/initctl


ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && sudo apt-get -y upgrade
RUN apt-get clean && sudo apt-get autoclean
RUN apt-get install -y nginx rtorrent git php5 php5-cli php5-dev php5-fpm mediainfo unar unzip php5-curl php5-geoip php5-mcrypt php5-xmlrpc
RUN sed -i '/# End of file/ i\* hard nofile 32768\n* soft nofile 32768\n' /etc/security/limits.conf
RUN adduser --disabled-password --gecos "" baja

ADD ./configs/rtorrent.rc /home/baja/.rtorrent.rc

RUN mkdir /root/rtorrent /root/rtorrent/watch /root/rtorrent/downloads /root/rtorrent/.session
RUN mkdir /var/www && cd /var/www
RUN git clone https://github.com/Novik/ruTorrent.git /var/www/rutorrent
RUN mkdir /var/www/rutorrent/conf/users/baja
RUN mkdir /var/www/rutorrent/conf/users/baja/plugins
ADD ./configs/start.sh /start.sh
RUN rm /var/www/rutorrent/conf/config.php
ADD ./configs/config.php /var/www/rutorrent/conf/config.php
RUN rm /var/www/rutorrent/conf/plugins.ini
ADD ./configs/plugins.ini /var/www/rutorrent/conf/plugins.ini
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/rutorrent
ADD ./configs/nginx.conf /etc/nginx/nginx.conf
RUN sed -i "/upload_max_filesize/ c\upload_max_filesize = 40M" /etc/php5/fpm/php.ini
RUN cp /usr/share/nginx/html/* /var/www
RUN cp /etc/nginx/sites-available/default /etc/nginx/sites-available/default.old
ADD ./configs/nginx /etc/nginx/sites-available/default
ADD ./configs/php /etc/nginx/conf.d/php
ADD ./configs/cache /etc/nginx/conf.d/cache
ADD ./configs/rtorrent.rc /root/.rtorrent.rc

CMD ["/bin/bash", "/start.sh"]


