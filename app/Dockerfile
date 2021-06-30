FROM php:7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev mariadb-client && \

    #zip,unzip
    apt-get install -y zip unzip && \

    #vim
    apt-get install -y vim

#composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \

    useradd -m -s /bin/bash -u 1000 meidaimae && \

    sed -i 's/user\ \=\ www-data/user\ \=\ meidaimae/g' /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's/group\ \=\ www-data/group\ \=\ meidaimae/g' /usr/local/etc/php-fpm.d/www.conf
WORKDIR /var/www
