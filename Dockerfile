FROM node:18 AS build

WORKDIR /src

RUN npm install -g bower

COPY src/ .

COPY .git ./.git

RUN bower install --allow-root

FROM php:7.4-apache-bullseye AS prod

RUN apt update && apt install -y libapache2-mod-auth-openidc libpq-dev git

RUN docker-php-ext-install pgsql

RUN git config --system --add safe.directory /var/www/html

WORKDIR /var/www/html

COPY --from=build /src/ .

RUN chmod -R 777 /etc/apache2 ; chmod -R 777 /var/www/html

COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

