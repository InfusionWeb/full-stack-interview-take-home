#!/bin/bash

echo "Starting Laravel container..."

# Run setup script if it exists
if [ -f /setup-env.sh ]; then
    chmod +x /setup-env.sh
    /setup-env.sh
fi

# Start nginx and php-fpm
service nginx start
exec php-fpm
