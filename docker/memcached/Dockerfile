FROM memcached:latest

WORKDIR /var/www/data/cache

ENV MEMCACHED_MAX_ITEM_SIZE 10m
ENV MEMCACHED_MAX_ITEMS 100000
ENV MEMCACHED_MAX_CONNECTIONS 1024
ENV MEMCACHED_PERSISTENT_ID 1
ENV MEMCACHED_USERNAME m_raptor
ENV MEMCACHED_PASSWORD m_lama22

EXPOSE 5000
