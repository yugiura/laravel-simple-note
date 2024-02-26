FROM mysql/mysql-server:8.0

ENV MYSQL_DATABASE=laravel \
  MYSQL_USER=appuser \
  MYSQL_PASSWORD=p@ssw0rd \
  MYSQL_ROOT_PASSWORD=r00tp@ssw0rd \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf
