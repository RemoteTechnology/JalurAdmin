FROM postgres:13.13-alpine3.19

ARG TZ=UTC
ENV LANG de_DE.utf8
ENV TZ ${TZ}

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && \
    echo ${TZ} > /etc/timezone

# Установка cron и supervisord
RUN apk add --no-cache cronie supervisor

# Создание рабочей директории
WORKDIR /var/www/data/database

# Создание папки для дампов
RUN mkdir "/var/www/data/database/dump"

COPY crontab /etc/crontabs/root
COPY dump.sh .
RUN chmod +x /var/www/data/database/dump.sh

# Копирование конфигурационного файла supervisord
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 5432

# Запуск supervisord
CMD ["/usr/bin/supervisord"]