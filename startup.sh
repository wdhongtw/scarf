#!/bin/sh

WORK_DIR='/root'

service apache2 start
service mysql start

mysql -u root -e "CREATE DATABASE scarf;"
mysql -u root -e "CREATE USER 'scarf'@'localhost' IDENTIFIED BY 'Jk8R5ahU8FfpMZUT';"
mysql -u root -e "GRANT ALL ON scarf.* TO 'scarf'@'localhost';"

php ${WORK_DIR}/install.php

bash
