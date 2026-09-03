# e-LLK — Deployment Guide

Single-host deployment with Docker Compose: **nginx + PHP-FPM (Laravel 7) + MySQL 8**.
Target: 1 BytePlus (Volcengine) ECS instance in `ap-southeast-1` (Johor).

> Jakarta (`ap-southeast-3`) is **not enabled** on the current BytePlus account —
> `ap-southeast-1` is the nearest available region. See "Provisioning" below.

---

## 1. What's in this repo

| Path | Purpose |
|------|---------|
| `Dockerfile` | Multi-stage build: `composer` deps → `php:8.0-fpm` runtime |
| `docker/nginx/Dockerfile` + `default.conf` | nginx image serving `public/` + proxying PHP |
| `docker/php/entrypoint.sh` | waits for DB, `key:generate`, `migrate --force`, `config/view:cache` |
| `docker/php/php.ini` | production PHP + OPcache settings |
| `docker-compose.yml` | `app` + `web` + `db` services, named volumes |
| `.env.docker` | environment template (copy to `.env`, set passwords) |
| `deploy/cloud-init.yaml` | ECS user-data: installs Docker, clones repo |
| `deploy/deploy.sh` | pull + rebuild + restart on the server |

Persistent data lives in three Docker volumes: `db_data` (MySQL),
`storage_data` (`storage/`), `uploads_data` (`public/uploads/`).

---

## 2. Provisioning the server (BytePlus ECS)

**Blocked until the BytePlus account has balance** (currently `$0`, no credit line).
Once funded, the instance can be created via the console or the MCP tooling with:

| Setting | Value |
|---|---|
| Region | `ap-southeast-1` (Johor) |
| Instance type | `ecs.e-c1m2.large` (2 vCPU / 4 GiB) — burstable, cheapest that fits |
| Image | Ubuntu 22.04 LTS x86_64 |
| System disk | 40 GiB ESSD |
| Public IP | assign EIP, or "assign public IP" pay-by-traffic |
| Security group | inbound `22` (your IP only), `80`, `443` from `0.0.0.0/0` |
| User data | contents of `deploy/cloud-init.yaml` |

Alternative sizes: `ecs.e-c1m1.large` (2 vCPU / 2 GiB) is enough for light use;
`ecs.e-c1m2.xlarge` (4 vCPU / 8 GiB) if the DB + app get busy.

---

## 3. First deploy

SSH in, then:

```bash
cd /opt/e-llk                 # already cloned by cloud-init
cp .env.docker .env           # if not already done
nano .env                     # set DB_PASSWORD, DB_ROOT_PASSWORD, APP_URL=http://<EIP or domain>
./deploy/deploy.sh            # builds images, generates APP_KEY, runs the stack
```

`deploy/deploy.sh` writes a stable `APP_KEY` into `.env` on first run. If you bring
the stack up manually with `docker compose up -d` instead, the entrypoint generates
a **temporary** key each start (sessions won't survive a restart) — so run
`docker compose run --rm --no-deps --entrypoint php app artisan key:generate --show`
and paste the result into `.env` as `APP_KEY=...`.

Visit `http://<server-ip>/` → redirects to `/login`.

> Verified locally: build, auto-migrations, login flow, and asset serving all work;
> a fresh `down -v` + deploy comes up with zero errors in `storage/logs`.

### Create the first user

There is no admin seeder. Create one via tinker (`HOME=/tmp` is needed because the
container user has no home dir; `foto` has no DB default so pass an empty string):

```bash
docker compose exec -e HOME=/tmp app php artisan tinker --execute='
  \App\User::create([
    "name"=>"Admin","nip"=>"0","email"=>"admin@ellk.id",
    "jabatan"=>"Admin","foto"=>"","password"=>bcrypt("CHANGE_ME"),
  ]);'
```

---

## 4. Updates

```bash
./deploy/deploy.sh
```

(pulls `master`, rebuilds images, `docker compose up -d`, migrations run via entrypoint.)

---

## 5. Operations

| Task | Command |
|---|---|
| Logs | `docker compose logs -f app` / `web` / `db` |
| Shell in app | `docker compose exec app sh` |
| Artisan | `docker compose exec app php artisan <cmd>` |
| DB backup | `docker compose exec db mysqldump -u root -p"$DB_ROOT_PASSWORD" ellk > backup-$(date +%F).sql` |
| DB restore | `docker compose exec -T db mysql -u root -p"$DB_ROOT_PASSWORD" ellk < backup.sql` |
| Stop | `docker compose down` (keeps volumes) |
| Nuke data | `docker compose down -v` ⚠️ deletes DB + uploads |

### HTTPS

Point a domain at the EIP, then either:
- put Caddy / nginx-proxy + Let's Encrypt in front, or
- add a `certbot` sidecar and a `443` server block.

Set `APP_URL=https://<domain>` in `.env` and `docker compose up -d` afterwards.

---

## 6. Notes / gotchas

- **Route cache is intentionally skipped** — `routes/web.php` has a closure route
  (`Route::get('/', fn() => redirect('/login'))`) which Laravel 7 cannot cache.
- Frontend assets (`public/css/app.css`, `public/js/*`) are **committed**; there is
  no Node build in the image. If you change `resources/js|sass`, run
  `npm install && npm run production` locally and commit the rebuilt `public/` files.
- Redis is configured but unused (`QUEUE_CONNECTION=sync`, file cache/sessions), so
  no Redis container is included.
- Mail failures are swallowed by the app (`try/catch`), so SMTP can stay unset.
