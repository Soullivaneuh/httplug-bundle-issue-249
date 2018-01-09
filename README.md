# Docker API internal error using service

## Run

```
./configure
docker-compose build
docker-compose up -d
docker-compose exec docker docker pull debian
docker-compose exec console composer install
docker-compose exec console php bin/test.php
```
