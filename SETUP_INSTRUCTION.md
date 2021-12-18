# First step: Make sure installed Docker & Docker Compose
# Run command follow following step:
<!-- Create container docker of services -->
1. sudo docker-compose up -d
<!-- Run migrate to create DB -->
2. sudo docker-compose exec php7 php artisan migrate
<!-- Run seeder to migrate sample data (account admin) -->
3. sudo docker-compose exec php7 php artisan seed:
<!-- Run webpack to apply js, css -->
4. sudo docker-compose run --rm node npm run dev