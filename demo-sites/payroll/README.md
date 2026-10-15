# MazERP Payroll — marketing site

**Multi-page** marketing site: PHP, HTML, CSS, and vanilla JavaScript (not an SPA). See [ARCHITECTURE.md](ARCHITECTURE.md).

The payroll **product** is a separate Angular app in `mazerp-nx` at `apps/app-payroll`.

## Run locally

**Subdirectory (default)** — from repo root `mazerp-marketting`:

```bash
php -S localhost:8089 -t .. router.php
```

Open [http://localhost:8089/payroll/](http://localhost:8089/payroll/).

**Apache:** enable `mod_rewrite`; `payroll/.htaccess` maps pretty paths to PHP scripts.

**Document root = this folder** — URLs have no `/payroll` prefix:

```bash
set MAZERP_BASE_PATH=
php -S localhost:8080
```

Open [http://localhost:8080/index.php](http://localhost:8080/index.php).

## Configuration

Edit `config.php` or set environment variables:

| Variable | Purpose |
|----------|---------|
| `MAZERP_CONSOLE_URL` | Console base (default `http://localhost:4210/console`) — **Log in** |
| `MAZERP_PAYROLL_URL` | Payroll app (default `http://localhost:4214/payroll`) — **Get started** |
| `MAZERP_MARKETING_URL` | MazERP marketing origin for **All products** menu (default `https://www.mazerp.com`) — Books, CRM, Payroll, Timex |
| `MAZERP_CONTACT_EMAIL` | Public contact email (default `info@maztechno.com`; also used for demo form `mail()`) |
| `MAZERP_CONTACT_PHONE` | Display phone (default `+91 81100 87700`) |
| `MAZERP_CONTACT_PHONE_E164` | Digits only for `tel:` links (default `918110087700`) |
| `MAZERP_CONTACT_WHATSAPP_E164` | WhatsApp number for `wa.me` (default same as phone) |
| `MAZERP_SOCIAL_FACEBOOK` | Facebook page URL |
| `MAZERP_SOCIAL_INSTAGRAM` | Instagram profile URL |
| `MAZERP_SOCIAL_TWITTER` | X (Twitter) profile URL |
| `MAZERP_SOCIAL_LINKEDIN` | LinkedIn company or profile URL |
| `MAZERP_SITE_URL` | Public site origin including `/payroll` (e.g. `https://www.example.com/payroll`) |
| `MAZERP_BASE_PATH` | URL prefix segment (`payroll` by default). Set empty when `payroll/` is the vhost root. |
| `MAZERP_THEME` | Visual theme id: `payroll`, `payroll_2`, `payroll_3`, `payroll_4`, or `payroll_5` |
| `MAZERP_PRICE_MONTHLY` | Base plan price per month (default **999** INR) |
| `MAZERP_INCLUDED_EMPLOYEES` | Employees included in base plan (default **10**) |
| `MAZERP_PRICE_ADDON_EMPLOYEE` | Per extra employee / month (default **99** INR) |

**Section URLs:** `/payroll/pricing`, `/payroll/features`, and other nav paths load dedicated pages. With the built-in server, use repo `router.php` from the parent folder, or `php -S localhost:8000 router.php` inside `payroll/`.

## Themes

Five marketing styles share the same PHP pages; tokens live in `assets/css/themes/`.

| Id | Name | Hero | Header |
|----|------|------|--------|
| `payroll` | Enterprise Gateway | Navy gradient | Full-width bar |
| `payroll_2` | Flat Minimal | Light | Floating pill |
| `payroll_3` | Warm Operations | Teal split | Bar |
| `payroll_4` | Editorial Contrast | Black band | Bar |
| `payroll_5` | Indigo Glass | Soft mesh | Bar |

- **Preview:** [http://localhost:8089/payroll/themes](http://localhost:8089/payroll/themes) or `?theme=payroll_2` on the homepage (nav links keep the query).
- **Production:** set `MAZERP_THEME=payroll_2` or `default_theme` in `config.php`.

## Content & SEO

Brand voice, **seo-audit.md**, social launch copy, and calendar live in `content/`. Guides for organic search are in `guides/`.

1. Set `MAZERP_SITE_URL` to your public origin.
2. Submit `{MAZERP_SITE_URL}/sitemap.php` in Search Console.
3. Optional: route `robots.txt` to `robots.php` (see `.htaccess.example`) for an absolute Sitemap URL.

Pricing plans, FAQ, and copy can be updated in `config.php` without changing layout files.

## Structure

- `index.php` — home (all marketing sections)
- `privacy.php`, `terms.php` — legal pages
- `contact.php` — demo form API (JSON); appends to `storage/demo-requests.jsonl`
- `includes/` — header, footer, section partials
- `assets/css/main.css`, `assets/js/main.js`

## Related product

- Local payroll app: `nx serve app-payroll` → `http://localhost:4214/payroll/`
- Post-login dashboard: `/payroll/<organizationId>/dashboard`
