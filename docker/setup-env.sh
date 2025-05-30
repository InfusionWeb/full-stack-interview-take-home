#!/bin/bash

# Example: Set up Laravel environment

# Create .env if it doesn't exist
if [ ! -f .env ]; then
    echo "Setting up Laravel environment..."

    cp .env.example .env
    # Ensure SQLite DB file exists
    if [ ! -f database/database.sqlite ]; then
        touch database/database.sqlite
    else
        echo "SQLite database file already exists."
    fi

    # Install dependencies
    composer install

    # Generate Laravel app key
    php artisan key:generate

    # Run migrations and seed
    php artisan migrate:fresh --seed --no-interaction

    echo "Setup complete."
fi


exec "$@"  # Hand off to CMD
