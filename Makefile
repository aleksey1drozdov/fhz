stop:
	cd ./docker/ && docker compose down
build:
	cd ./docker/ && docker compose build
start:
	cd ./docker/ && docker compose build && docker compose up -d && docker exec php-ft bash -c "composer install && npm install && npm run build && php artisan migrate:fresh && php artisan migrate --seed && php artisan websockets:serve"