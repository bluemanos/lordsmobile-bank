FROM php:7.2-fpm

MAINTAINER Szymon Bluma <szbluma@gmail.com>

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    zlib1g-dev \
    libicu-dev \
    jpegoptim \
    python \
    byobu \
    g++ \
    libxrender1 \
    libfontconfig \
    nano vim \
    && docker-php-ext-install -j$(nproc) iconv intl zip bcmath

#RUN sed -i -e 's/# en_US.UTF-8 UTF-8/en_US.UTF-8 UTF-8/' /etc/locale.gen && locale-gen > /dev/null
#ENV LANG en_US.UTF-8
#ENV LANGUAGE en_US:en
#ENV LC_ALL en_US.UTF-8

# Install NodeJS using NVM
#RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash > /dev/null && \
#    export NVM_DIR="$HOME/.nvm" > /dev/null && \
#    [ -s "$NVM_DIR/nvm.sh" ] > /dev/null && . "$NVM_DIR/nvm.sh" > /dev/null && \
#    nvm install 11.2 && nvm use node > /dev/null

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && composer --version

# Set timezone
RUN rm /etc/localtime \
  && ln -s /usr/share/zoneinfo/Europe/Warsaw /etc/localtime \
  && "date"

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql gd \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug

WORKDIR /var/www/html

EXPOSE 9000
