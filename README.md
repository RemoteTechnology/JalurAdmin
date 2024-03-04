docker-compose run db pg_dump -E UTF-8 -U raptor -d jalur_db -h 172.18.0.1 -a --data-only -f jalur_db.sql
