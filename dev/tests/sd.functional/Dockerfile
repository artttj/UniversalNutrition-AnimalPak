FROM python:2.7-alpine

RUN mkdir -p /sd.functional
RUN pip install -U pip
COPY python-required-libraries.txt /
RUN pip install --no-cache-dir -r python-required-libraries.txt
RUN rm -rf /python-required-libraries.txt
RUN webdrivermanager firefox chrome --linkpath /usr/local/bin

#COPY common            /sd.functional/common
#COPY custom_libraries  /sd.functional/custom_libraries
#COPY resources         /sd.functional/resources
#COPY suites            /sd.functional/suites
#COPY entrypoint.sh     /sd.functional/entrypoint.sh
#COPY datafile.csv      /sd.functional/datafile.csv

RUN apk update && apk add --no-cache bash \
    alsa-lib \
    at-spi2-atk \
    atk \
    cairo \
    cups-libs \
    dbus-libs \
    eudev-libs \
    expat \
    flac \
    gdk-pixbuf \
    glib \
    libgcc \
    libjpeg-turbo \
    libpng \
    libwebp \
    libx11 \
    libxcomposite \
    libxdamage \
    libxext \
    libxfixes \
    tzdata \
    python3-tkinter \
    libexif \
    udev \
    xvfb \
    zlib-dev \
    chromium \
    chromium-chromedriver

#RUN chmod +x /sd.functional/entrypoint.sh
#WORKDIR /sd.functional
#ENTRYPOINT ["/sd.functional/entrypoint.sh"]
#CMD ["--help"]
