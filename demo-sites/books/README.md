# MazERP Books marketing site

Multi-page PHP marketing site for **MazERP Books** (accounting, inventory, GST). Not the Angular ERP at `mazerp-nx/apps/app-books`.

## Local run (subdirectory)

From repo root:

```bash
php -S localhost:8089 -t . router.php
```

Open [http://localhost:8089/books/](http://localhost:8089/books/)

Set SEO origin:

```bash
set MAZERP_SITE_URL=http://localhost:8089/books
set MAZERP_BOOKS_URL=http://localhost:4211/books
set MAZERP_CONSOLE_URL=https://app.mazerp.com/console
```

## Live pricing API

Plans are loaded server-side from the MazERP **console API** (same as app-console `PlanApi`):

`GET {MAZERP_CONSOLE_API_URL}/{product}/plans?status=active`

Defaults (production):

- `MAZERP_CONSOLE_API_URL` → `https://api.mazerp.com/console`
- Product → `books`
- Full URL → `https://api.mazerp.com/console/books/plans?status=active`

Optional environment variables:

| Variable | Purpose |
|----------|---------|
| `MAZERP_CONSOLE_API_URL` | Console API base (no trailing slash) |
| `MAZERP_BOOKS_PRODUCT_CODE` | Usually `books` |
| `MAZERP_BOOKS_LIVE_PRICING` | Set `0` to disable API and use static `pricing.plans` in config |

Responses are cached under `storage/pricing-plans.cache.json` for 300 seconds (configurable in `config.php` → `pricing.api.cache_ttl`).

Checkout CTAs link to `{MAZERP_CONSOLE_URL}/books/pricing?plan_code=…&billing=monthly|yearly`.

If the API is unreachable, the pricing section shows an error and a link to [official console pricing](https://app.mazerp.com/console/books/pricing)—no placeholder prices.

**Local PHP on Windows:** If `php-curl` / OpenSSL extensions are not enabled, the site falls back to `curl.exe` for API requests.

**Production API (`api.mazerp.com/console`):** If you see HTTP 502 from that host, the console API upstream needs to be restored on the server; the marketing site cannot fix that. For local UI testing only, you may temporarily set `MAZERP_CONSOLE_API_URL=https://staging-api.mazerp.com/console` (same API shape as production).

## Themes

Preview alternates with `?theme=books_2` … `books_5`. Default: `books` (Ledger Gateway).
