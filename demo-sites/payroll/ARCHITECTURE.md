# Architecture — multi-page marketing site

This project is a **traditional multi-page website** (not an SPA).

## Stack

| Layer | Technology |
|-------|------------|
| Pages | PHP templates (`index.php`, `guides/*.php`, `privacy.php`, `terms.php`) |
| Markup | HTML sections in `includes/sections/` |
| Styles | `assets/css/main.css` |
| Behavior | `assets/js/main.js` (nav, FAQ, contact form fetch) |
| Config | `config.php` + environment variables |

Each user-facing URL loads a **full server-rendered page**. There is no client-side router and no JavaScript framework.

## URL layout

- Public base: **`/payroll/`** (see `base_path` in `config.php`)
- Pretty URLs: Apache `payroll/.htaccess` or dev `router.php` at repo root
- Product app (Angular SPA) is separate: `mazerp-nx/apps/app-payroll`

## When to add pages

1. Add a `.php` file (or file under `guides/`).
2. Register the pretty path in `includes/url-routes.php`.
3. Add a rewrite rule in `payroll/.htaccess` and handle the path in `router.php` if needed.
4. List the URL in `sitemap.php`.

Do not introduce React/Vite for this site unless requirements change fundamentally.
