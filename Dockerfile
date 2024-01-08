FROM node:18 AS build

WORKDIR /src

RUN npm install -g bower

COPY src/ .

COPY .git .

RUN bower install --allow-root

FROM php:7.4-apache-bullseye AS prod

RUN apt update && apt install -y libapache2-mod-auth-openidc libpq-dev git

RUN docker-php-ext-install pgsql

WORKDIR /var/www/html

COPY --from=build /src/ .

RUN chown -R www-data:www-data /var/www/html

COPY entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

