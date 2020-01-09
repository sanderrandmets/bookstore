#1/bin/bash

echo "hello, world!"
export DEBIAN_FRONTEND=noninteractive
apt update -y
apt upgrade -y
apt install mariadb-server php php-mysql
service mysql start
mysql -u root <<EOF
UPDATE mysql.user SET plugin = 'mysql_native_password' WHERE user = 'root' AND plugin = 'unix_socket';
FLUSH PRIVILEGES;
CREATE DATABASE Books;
EOF
mysql -u root Books < Books.sql