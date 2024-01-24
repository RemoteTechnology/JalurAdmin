sudo docker ps
sudo docker exec -it <ID> bash
psql -U raptor
CREATE DATABASE jalur_db;
exit && exit
sudo docker-compose run artisan migrate
sudo docker-compose run artisan app:create-super-user-command {first_name} {last_name} {gender} {phone} {email}