#!/bin/bash

# Run migrations
php artisan migrate --force

# Start Apache in the foreground
apache2-foreground
