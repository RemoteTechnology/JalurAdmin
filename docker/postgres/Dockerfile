FROM postgres:13.13-alpine3.19

ARG TZ=UTC
ENV LANG de_DE.utf8
ENV TZ ${TZ}

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime && \
    echo ${TZ} > /etc/timezone
EXPOSE 5432
WORKDIR /var/www/data/database
        