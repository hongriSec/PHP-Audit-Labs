#!/bin/bash
set -e

#查看mysql服务的状态，方便调试，这条语句可以删除
echo `service mysql status`
chown -R mysql:mysql /var/lib/mysql

echo '1.启动mysql....'
#启动mysql
service mysql start
sleep 3
echo `service mysql status`
mysql -uroot -proot
echo '2.开始导入数据....'
#导入数据
mysql < /var/www/html/day1.sql
echo '3.导入数据完毕....'

sleep 3
echo `service mysql status`


#sleep 3
echo `service mysql status`
echo 'mysql容器启动完毕,且数据导入成功'
/usr/sbin/apache2ctl -D FOREGROUND

echo `service apache2 satus`

tail -f /dev/null
