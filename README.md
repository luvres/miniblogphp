# Mini Blog PHP Begin
-----
## Development Environment

### Download source
```
git clone https://github.com/luvres/miniblogphp.git
```
### Database MySQL (MariaDB)
```
docker run --name MariaDB \
-p 3308:3306 \
-e MYSQL_ROOT_PASSWORD=maria \
-d mariadb
```
```
docker exec -ti MariaDB mysql -uroot -pmaria
```
### Web Server PHP
```
docker run --rm --name Php -h php \
--link MariaDB:mariadb-host \
-p 800:80 \
-v miniblogphp:/var/www \
-ti izone/alpine:php
```


