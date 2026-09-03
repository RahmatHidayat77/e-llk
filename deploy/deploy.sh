#!/usr/bin/env bash
# ---------------------------------------------------------------------
# e-LLK — deploy / update on the server
# Run from the repo root on the VPS:  ./deploy/deploy.sh
# ---------------------------------------------------------------------
set -euo pipefail

cd "$(dirname "$0")/.."

if [ ! -f .env ]; then
    echo "==> .env not found — creating from .env.docker"
    cp .env.docker .env
    echo "!!! Edit .env now and set DB_PASSWORD / DB_ROOT_PASSWORD / APP_URL, then re-run."
    exit 1
fi

echo "==> Pulling latest code"
git pull --ff-only

echo "==> Building images"
docker compose build

# Generate a stable APP_KEY into .env on first deploy
if grep -qE '^APP_KEY=$' .env; then
    echo "==> Generating APP_KEY"
    KEY="$(docker compose run --rm --no-deps -T --entrypoint php app artisan key:generate --show | tr -d '\r\n')"
    grep -v '^APP_KEY=' .env > .env.tmp && echo "APP_KEY=${KEY}" >> .env.tmp && mv .env.tmp .env
    echo "==> APP_KEY set"
fi

echo "==> Starting stack"
docker compose up -d

echo "==> Waiting for app container to finish migrations"
sleep 5
docker compose logs --tail=30 app

echo "==> Done. Running containers:"
docker compose ps
