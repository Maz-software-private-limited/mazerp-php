# mazerp-marketting

Marketing websites for MazERP products (multi-page PHP sites—not SPAs).

## Books site URL

The Books marketing site is served as a **subdirectory**: **`/books/`**

| URL | Purpose |
|-----|---------|
| `/books/` | Home |
| `/books/guides/` | SEO guides |
| `/books/sitemap.xml` | XML sitemap |

Root `index.php` redirects to `/timex/` when using Apache; the dev router sends `/` to `/timex/`. Books and payroll remain at `/books/` and `/payroll/`.

## Payroll site URL

Payroll marketing: **`/payroll/`** — see [payroll/README.md](payroll/README.md).

## Timex site URL

Timex HRM marketing: **`/timex/`** — see [timex/README.md](timex/README.md) (cloned from payroll layout; static pricing in `config.php`, no plans API).

## Run locally (subdirectory layout)

From this repo root (recommended):

```bash
php -S localhost:8089 -t . router.php
```

Open [http://localhost:8089/books/](http://localhost:8089/books/), [http://localhost:8089/payroll/](http://localhost:8089/payroll/), or [http://localhost:8089/timex/](http://localhost:8089/timex/) (pretty URLs).

Set production URL for SEO:

```bash
set MAZERP_SITE_URL=http://localhost:8089/books
set MAZERP_BOOKS_URL=http://localhost:4211/books
```

## Docs

- [books/README.md](books/README.md) — Books marketing configuration
- [payroll/README.md](payroll/README.md) — Payroll marketing configuration
