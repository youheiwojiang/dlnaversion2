FROM bjwbjw123456/dlna:latest

RUN apt-get install -y \
	apache2\
	libapache2-mod-php5\
	php5

RUN rm /usr/local/bin/run.sh

COPY chute/run.sh /usr/local/bin/run.sh

EXPOSE 80/tcp

CMD ["bash", "usr/local/bin/run.sh" ]
