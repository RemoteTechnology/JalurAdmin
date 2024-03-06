FROM postgres:13.13-alpine3.19
WORKDIR /var/lib/postgresql/data

# CMD ["/bin/sh", "-c", "/var/www/dump/dump.sh"]