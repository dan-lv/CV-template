#!/bin/sh
# Exit on fail
set -e
chown -R www-data:www-data /app/storage

# Run crontab
crond start

php-fpm
# Finally call command issued to the docker service
exec "$@"
