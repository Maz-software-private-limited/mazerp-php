# MazERP CRM — marketing site

Multi-page marketing site (PHP, HTML, CSS, vanilla JS). The CRM **product** is Angular at `mazerp-nx/apps/app-crm` (`http://localhost:4212/crm`).

Visual design is **CRM-specific** (not shared with payroll/books themes).

## Run locally

From repo root `mazerp-marketting`:

```bash
php -S localhost:8089 -t . router.php
```

Open [http://localhost:8089/crm/](http://localhost:8089/crm/).

**Apache:** enable `mod_rewrite`; use `crm/.htaccess`.

## Configuration

Edit `config.php` or set environment variables:

| Variable | Purpose |
|----------|---------|
| `MAZERP_CONSOLE_URL` | Console base — **Log in** |
| `MAZERP_CRM_URL` | CRM app (default `http://localhost:4212/crm`) — **Get started** |
| `MAZERP_CONTACT_EMAIL` | Optional email for demo form via `mail()` |
| `MAZERP_SITE_URL` | Public origin including `/crm` |
| `MAZERP_BASE_PATH` | URL prefix (`crm` by default) |
| `MAZERP_CRM_PRICE_*` | Pricing overrides |

Section URLs load **only that section** (same as payroll): `/crm/features`, `/crm/pricing`, etc. Home `/crm/` shows the full landing page.

Logo: `assets/img/logo-crm.svg` (override via `config.php` → `logo`).

## Structure

- `index.php` — home (all sections)
- `includes/sections/` — hero, features, pricing, FAQ, contact, …
- `assets/css/main.css` — CRM design tokens and layout
- `contact.php` — demo form API; appends to `storage/demo-requests.jsonl`
