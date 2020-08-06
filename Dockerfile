ARG MAGE_BASE_IMAGE="sdmagentodev.azurecr.io/base-images/magento-php-fpm:7.3-develop"

FROM ${MAGE_BASE_IMAGE} as build
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


FROM ${MAGE_BASE_IMAGE}
ARG CLIENT_THEME="SomethingDigital/bryantpark AnimalPak/default"
ARG MAGENTO_THEME="Magento/backend"

COPY --chown=app:app . /var/www/html

COPY --from=build \
     --chown=app:app \
     /var/www/html /var/www/html

RUN wget -O /var/www/html/bin/n98-magerun2.phar https://files.magerun.net/n98-magerun2.phar && \
    chmod +x /var/www/html/bin/n98-magerun2.phar

RUN composer dump-autoload --no-interaction

RUN yarn && \
    cd /var/www/html/vendor/somethingdigital/magento2-theme-bryantpark && \
    yarn && \
    cd /var/www/html/vendor/snowdog/frontools && \
    yarn && \
    cd /var/www/html

RUN php /var/www/html/bin/magento setup:di:compile && \
    php bin/magento setup:static-content:deploy -f --exclude-theme \
    Magento/luma

RUN php /var/www/html/bin/magento sd:dev:static ${CLIENT_THEME} && \
    php /var/www/html/bin/magento sd:dev:static --area=adminhtml ${MAGENTO_THEME}

USER root

ENV PATH /usr/local/rvm/bin/:$PATH

SHELL ["/bin/bash", "-c", "-l"]

# RVM upgraded in base image but requires downgrade, without removing 2.7 use does not work as expected
RUN rvm remove 2.7.0
RUN rvm install ruby-2.6.3
RUN ruby -v

USER root
RUN cd /var/www/html/app/design/frontend/AnimalPak/default && \
    /bin/bash -c "source /etc/profile; bundle install"

USER app

RUN /bin/bash -c "source /etc/profile; yarn build"

VOLUME /var/www
