FROM debian:latest

# Install services, packages and do cleanup
RUN  apt-get update && \
    apt-get -y install  \
    apache2 php7.4 php7.4-mysql php7.4-json\
    mariadb-server \
    mariadb-client \
    php \
    php-mysql \
    libapache2-mod-php 

# Create a directory for the data file
RUN mkdir /data

# Copy files
COPY ./index.html   /var/www/html/index.html

COPY ./README.md    /var/www/html/README.md

COPY ./script.sh    /var/www/html/script.sh

COPY ./compteClient /var/www/html/compteClient
COPY ./images       /var/www/html/images
COPY ./java         /var/www/html/java
COPY ./pageAccueil  /var/www/html/pageAccueil
COPY ./test         /var/www/html/test

# Give permissions to www-data
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

# Expose Apache
EXPOSE 3307
EXPOSE 80

# Run startup script
RUN chmod +x /var/www/html/script.sh
CMD /var/www/html/script.sh
