# Dockerfile for SCARF

FROM ubuntu:14.04
LABEL maintainer "wdhongtw@gmail.com"

RUN apt-get update
RUN apt-get install apache2 mysql-server php5 libapache2-mod-php5 php5-mysql -y

COPY html/scarf /var/www/html/scarf/
COPY startup.sh /root/startup.sh
COPY install.php /root/install.php
RUN chmod 755 /root/startup.sh

EXPOSE 80
CMD ["/root/startup.sh"]
