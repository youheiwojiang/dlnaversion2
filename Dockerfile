FROM bjwbjw123456/dlna:latest

RUN apt-get install -y \
	apache2\
	libapache2-mod-php5\
	php5\
	sqlite\
	sqlite3\
    php5-sqlite

RUN rm /usr/local/bin/run.sh

COPY chute/run.sh /usr/local/bin/run.sh

RUN rm /etc/php5/apache2/php.ini

COPY chute/php.ini /etc/php5/apache2/php.ini

COPY chute/index.php /var/www/html/index.php

COPY chute/handle.php /var/www/html/handle.php

COPY chute/data.php /var/www/html/data.php

COPY chute/dbpri.sh /usr/local/bin/dbpri.sh

COPY chute/fun.shell /usr/local/bin/fun.shell

COPY chute/repo/* /music/

EXPOSE 80/tcp

CMD ["bash", "usr/local/bin/run.sh" ]
