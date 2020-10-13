FROM php:7.4.6-fpm

ARG UID
EXPOSE $UID

RUN adduser -u 1000 --disabled-password --gecos "" caitox
RUN mkdir /home/caitox/.ssh
RUN chown -R caitox:caitox /home/caitox
RUN echo "StrictHostKeyCheking no" >> /home/caitox/.ssh/config
RUN echo "export COLUMNS=300" >> /home/caitox/.bashrc
RUN echo "alias sf=/appdata/www/bin/console" >> /home/caitox/.bashrc

COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim mc librabbitmq-dev libssh-dev \
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap bcmath sockets \
    && pecl install xdebug amqp \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache amqp xdebug

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update
RUN wget https://cs.symfony.com/download/php-cs-fixer-v2.phar -O php-cs-fixer
RUN chmod a+x php-cs-fixer 
RUN mv php-cs-fixer /usr/local/bin/php-cs-fixer

RUN mkdir -p /appdata/www

USER caitox
RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --optimize-autoloader --classmap-authoritative \
    && composer clear-cache

WORKDIR /appdata/www