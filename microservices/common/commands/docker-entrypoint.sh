#!/bin/bash

service docker restart

# Wait for the checkout service to be ready
until curl -s http://localhost:8001; do
  echo 'Waiting for the checkout service...'
  sleep 5
done

# Execute the migration command
#docker exec -it ppro-checkout-service-container php artisan migrate --force
#docker run --user bobongtanga -v /var/run/docker.sock:/var/run/docker.sock -it ppro-catalog-service-container php artisan migrate --force
#docker exec --user bobongtanga -it ppro-catalog-service-container php artisan migrate --force
docker exec -it ppro-catalog-service-container php artisan migrate --force
# Add any other commands you need to run in one-time-service

#docker-compose exec -T checkout-service php artisan migrate --force

# Add any other commands you need to run in one-time-service