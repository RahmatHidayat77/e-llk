#!/bin/sh
set -e

cd /var/www/html

# Laravel needs a .env file to exist; APP_KEY and the rest are supplied as real
# environment variables by compose (env_file) and take precedence over this file.
if [ ! -f .env ]; then
    echo "[entrypoint] .env missing, copying from .env.docker"
    cp .env.docker .env
fi

# APP_KEY must be set for it to be stable across restarts. compose injects the
# host .env values as real env vars (env_file), which shadow the .env file, so an
# empty APP_KEY here means it is empty on the host too — generate one and export
# it into this process so php-fpm (started via exec below) picks it up.
if [ -z "$APP_KEY" ]; then
    echo "[entrypoint] WARNING: APP_KEY not set — generating a temporary key."
    echo "[entrypoint] Set APP_KEY in .env (deploy/deploy.sh does this) so it is"
    echo "[entrypoint] stable across restarts and sessions survive."
    php artisan key:generate --force >/dev/null 2>&1 || true
    APP_KEY="$(grep '^APP_KEY=' .env | cut -d= -f2-)"
    export APP_KEY
fi

# Wait for the database to accept connections
if [ -n "$DB_HOST" ]; then
    echo "[entrypoint] waiting for database at ${DB_HOST}:${DB_PORT:-3306}"
    tries=0
    until php -r '
        $h=getenv("DB_HOST"); $p=getenv("DB_PORT")?:3306;
        $u=getenv("DB_USERNAME"); $pw=getenv("DB_PASSWORD"); $db=getenv("DB_DATABASE");
        try { new PDO("mysql:host=$h;port=$p;dbname=$db", $u, $pw); exit(0); }
        catch (Exception $e) { exit(1); }
    ' 2>/dev/null; do
        tries=$((tries + 1))
        if [ "$tries" -ge 60 ]; then
            echo "[entrypoint] database not reachable after 60 attempts, aborting"
            exit 1
        fi
        sleep 2
    done
    echo "[entrypoint] database is up"
fi

# Re-discover packages (bootstrap/cache is not baked into the image)
php artisan package:discover --ansi || true

# Storage symlink (public/storage -> storage/app/public)
php artisan storage:link || true

# Run migrations
php artisan migrate --force

# Cache config & views (NOT routes: this app uses a closure route)
php artisan config:cache
php artisan view:cache

exec "$@"
