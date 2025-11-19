# Project Manager (Laravel 11)

A simple project manager built during the TreinaWeb Laravel Eloquent course. The stack relies on Docker to provide a reproducible environment with PHP 8.2, Nginx, MySQL 8, and Redis.

## Features

- CRUD of clients, projects, and employees (course material).
- Laravel 11 with Telescope, Redis cache/session, and queue worker container.
- Docker Compose setup for local development (PHP-FPM + Nginx + MySQL + Redis).

## Requirements

- Docker and Docker Compose
- Git

## Getting Started

1. Clone the repository
   ```bash
   git clone https://github.com/luizsantos85/gerenciador-projetos.git
   cd gerenciador-projetos
   ```
2. Create the environment file
   ```bash
   cp .env.example .env
   # adjust DB username/password/ports if necessary
   ```
3. Start the containers
   ```bash
   docker compose up -d
   ```
4. Install dependencies inside the app container
   ```bash
   docker compose exec app composer install
   ```
5. Generate the application key
   ```bash
   docker compose exec app php artisan key:generate
   ```
6. Run migrations (and optional seeders)
   ```bash
   docker compose exec app php artisan migrate --seed
   ```
7. Access the application at `http://localhost:8000`.

### Services exposed

| Service | Image         | Host Port | Notes                               |
| ------- | ------------- | --------- | ----------------------------------- |
| app     | custom PHP    | —         | PHP-FPM container used via Nginx.    |
| nginx   | nginx:alpine  | 8000      | Serves the Laravel app.             |
| mysql   | mysql:8.0     | 3307      | Data stored under `.docker/mysql`.   |
| redis   | redis:latest  | 6379*     | Used for cache, sessions, queues.    |
| queue   | custom PHP    | —         | Runs `php artisan queue:work`.      |

\* Exposed only inside the Docker network, not on the host.

### Useful commands

| Command                                      | Purpose                                   |
| -------------------------------------------- | ----------------------------------------- |
| `docker compose ps`                          | List running containers.                  |
| `docker compose logs -f app`                 | Follow PHP logs.                          |
| `docker compose exec app bash`               | Open an interactive shell.                |
| `docker compose down -v`                     | Stop everything and remove volumes.       |
| `docker compose exec app php artisan queue:work` | Run queues manually (when needed).   |

### Troubleshooting

- **Slow Artisan commands**: ensure the `mysql` container is running before executing Artisan; disable Telescope (`TELESCOPE_ENABLED=false`) if you don't need it during setup.
- **Database access**: update `.env` with the same credentials defined in `docker-compose.yml` (`DB_HOST=mysql`, `DB_PORT=3306`, etc.).
- **Queue container flooding logs**: stop the `queue` service (`docker compose stop queue`) until you configure Redis/DB.

## Development Scripts (Host)

For users preferring a native PHP setup:

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
