FROM richarvey/nginx-php-fpm:latest

# Install Node.js (v18 or latest LTS)
# Install Node.js and npm on Alpine
RUN apk add --no-cache nodejs npm


COPY . .

# Install Node dependencies and build assets
RUN npm install && npm run build

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
