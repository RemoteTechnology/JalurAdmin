FROM postgres:13.13-alpine3.19

ARG TZ=UTC
ENV LANG de_DE.utf8
ENV TZ ${TZ}

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && \
    echo ${TZ} > /etc/timezone

RUN apk add --no-cache supervisor postgresql-client

RUN mkdir -p /var/log/postgresql && \
    chown -R postgres:postgres /var/log/postgresql

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www/data/database
RUN mkdir "/var/www/data/database/dump"
COPY dump.sh /var/www/data/database/dump.sh
RUN chmod +x /var/www/data/database/dump.sh

EXPOSE 5432

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]