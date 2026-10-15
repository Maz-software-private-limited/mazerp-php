# Architecture — MazERP Books marketing site

This project is a **traditional multi-page website** (not an SPA), mirroring the payroll marketing stack.

## Stack

| Layer | Technology |
|-------|------------|
| Pages | PHP templates (`index.php`, `guides/*.php`, `privacy.php`, `terms.php`) |
| Markup | HTML sections in `includes/sections/` |
| Styles | `assets/css/main.css` + theme tokens in `assets/css/themes/books*.css` |
| Behavior | `assets/js/main.js` (nav, FAQ, contact form fetch) |
| Config | `config.php` + environment variables |

## Product app (separate)

The Books ERP is **Angular** at `mazerp-nx/apps/app-books` — served at `/books/` (dev: `http://localhost:4211/books/`). This marketing site does not embed that app; CTAs link to `books_app_url` and MazERP console login.

## URL layout

- Public base: **`/books/`** (see `base_path` in `config.php`)
- Pretty URLs: Apache `books/.htaccess` or dev `router.php` at repo root
- Section URLs: `/books/features`, `/books/pricing`, etc.

## Environment

| Variable | Purpose |
|----------|---------|
| `MAZERP_BOOKS_URL` | Books SPA base (default `http://localhost:4211/books`) |
| `MAZERP_CONSOLE_URL` | Console login |
| `MAZERP_SITE_URL` | Canonical origin for SEO |
| `MAZERP_CONSOLE_API_URL` | Live plan catalog (`GET …/books/plans?status=active`) |
| `pricing.plans` in `config.php` | Fallback only when `MAZERP_BOOKS_LIVE_PRICING=0` |
