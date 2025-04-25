FROM php:8.3-cli

# Встановлюємо необхідні розширення
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip

# Встановлюємо Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Встановлюємо PHPUnit глобально
RUN composer global require phpunit/phpunit

# Додаємо глобальні пакети composer до PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

COPY start-server.sh /usr/local/bin/start-server.sh
RUN chmod +x /usr/local/bin/start-server.sh

