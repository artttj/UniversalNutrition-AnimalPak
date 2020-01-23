ARG BASE_URL=magento.test
ARG CLIENT_THEME="SomethingDigital/bryantpark"
ARG MAGENTO_THEME="Magento/backend"
ARG MAGE_MODE=developer
ARG MAGE_FRONTEND_THEMES="Magento/backend SomethingDigital/bryantpark"
ARG MAG_BASE_IMAGE="magento-php-fpm-7.2:latest"

FROM ${MAG_BASE_IMAGE} as build

ARG SSH_PRIVATE_KEY

RUN mkdir -p /var/www/.ssh && \
    echo "${SSH_PRIVATE_KEY}" > /var/www/.ssh/id_rsa && \
    chmod 0600 /var/www/.ssh/id_rsa && \
    touch /var/www/.ssh/known_hosts && \
    ssh-keyscan github.com >> /var/www/.ssh/known_hosts

COPY composer.json composer.json
COPY composer.lock composer.lock
COPY auth.json auth.json
COPY composer-patches composer-patches
RUN composer install --no-interaction && rm -rf /var/www/.composer

COPY --chown=app:app . /var/www/html
RUN composer dump-autoload --no-interaction

FROM ${MAG_BASE_IMAGE}
ARG BASE_URL
ARG CLIENT_THEME
ARG MAGENTO_THEME
ARG MAGE_MODE
ARG MAGE_FRONTEND_THEMES

COPY --from=build \
     --chown=app:app \
     /var/www/html /var/www/html

RUN yarn && \
    cd /var/www/html/vendor/somethingdigital/magento2-theme-bryantpark && \
    yarn && \
    cd /var/www/html/vendor/snowdog/frontools && \
    yarn && \
    cd /var/www/html

RUN php /var/www/html/bin/magento setup:di:compile && \
    php bin/magento setup:static-content:deploy -f

RUN php /var/www/html/bin/magento sd:dev:static ${CLIENT_THEME} && \
    php /var/www/html/bin/magento sd:dev:static --area=adminhtml ${MAGENTO_THEME}

RUN /bin/bash -c "source /etc/profile; yarn build"

RUN wget -O /var/www/html/bin/n98-magerun2.phar https://files.magerun.net/n98-magerun2.phar && \
    chmod +x /var/www/html/bin/n98-magerun2.phar
