#!/bin/bash

# Set your environment variables
APP_NAME="Laravel"
APP_ENV="local"
APP_DEBUG="true"
APP_URL="http://localhost"

PHP_CLI_SERVER_WORKERS="4"
BCRYPT_ROUNDS="12"

DB_CONNECTION="sqlite"
SESSION_DRIVER="file"
CACHE_STORE="file"

# Create or overwrite the .env file
cat > .env <<EOL
APP_NAME=${APP_NAME}
APP_ENV=${APP_ENV}
APP_KEY=
APP_DEBUG=${APP_DEBUG}
APP_URL=${APP_URL}

PHP_CLI_SERVER_WORKERS=${PHP_CLI_SERVER_WORKERS}
BCRYPT_ROUNDS=${BCRYPT_ROUNDS}

DB_CONNECTION=${DB_CONNECTION}
SESSION_DRIVER=${SESSION_DRIVER}
CACHE_STORE=${CACHE_STORE}

VITE_APP_NAME="\${APP_NAME}"
EOL

composer install

php artisan key:generate

npm install

npm run build
touch database/database.sqlite
php artisan migrate --seed -n

echo "Environment set up successfully."
