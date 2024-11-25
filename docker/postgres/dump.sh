#!/bin/bash

export PATH=$PATH:/usr/local/bin
export PGPASSWORD="lama22"

DB_HOST="localhost"
DB_PORT="5432"
DB_USER="raptor"
DB_NAME="jalur_db"
DATE=$(date +"%Y-%m-%d_%H-%M-%S")
OUTPUT_FILE="$DATE-$DB_NAME.dump.sql"

# Ожидание запуска PostgreSQL
until pg_isready -h $DB_HOST -p $DB_PORT -U $DB_USER; do
    echo "Ожидание запуска PostgreSQL..."
    sleep 1
done

pg_dump -h $DB_HOST -p $DB_PORT -U $DB_USER -d $DB_NAME --data-only -f /var/www/data/database/dump/$OUTPUT_FILE

if [ $? -eq 0 ]; then
    echo "Дамп базы данных успешно создан: $OUTPUT_FILE"
else
    echo "Ошибка при создании дампа базы данных"
fi
# pg_dump -h jalur_postgres -p 5432 -U raptor -d jalur_db --data-only -f /var/www/data/database/dump/$(date +"%Y-%m-%d_%H-%M-%S").jalur_db.dump.sql