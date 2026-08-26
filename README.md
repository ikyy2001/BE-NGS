# Nusa Garuda Studio - Backend API & Admin Dashboard

Backend API & Filament Admin Panel built with Laravel for Nusa Garuda Studio.

---

## Admin Panel Access & Credentials

The admin dashboard is hosted at `/admin`.

- **URL**: `http://localhost:8000/admin`
- **Default Admin Email**: `admin@nusagaruda.com`
- **Default Admin Password**: `password`

---

## Mandatory Deployment Checklist

> [!IMPORTANT]
> **Required Storage Link Step**:
> You MUST run the following command on deployment or fresh setup so that uploaded project, testimonial, team, and gallery images are publicly accessible:
> ```bash
> php artisan storage:link
> ```

---

## Setup Commands

```bash
# 1. Install Composer dependencies
composer install

# 2. Set up environment
copy .env.example .env
php artisan key:generate

# 3. Migrate and seed database
php artisan migrate:fresh --seed

# 4. Link public storage directory
php artisan storage:link

# 5. Run local development server
php artisan serve
```
