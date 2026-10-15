# Timex promotion page

Single-page PHP site for **Timex** (MazERP time & attendance).

## Run locally

From `demo-sites/`:

```bash
php -S localhost:8089 -t . router.php
```

Open [http://localhost:8089/timex/](http://localhost:8089/timex/) (router) or [http://localhost:8089/demo-sites/timex/](http://localhost:8089/demo-sites/timex/) (direct path — assets resolve automatically).

## Files

| File | Purpose |
|------|---------|
| `index.php` | Full landing page |
| `config.php` | URLs, pricing, FAQ copy |
| `bootstrap.php` | Helpers |
| `demo-request.php` | POST handler for demo form → `storage/demo-requests.jsonl` |

## Environment

| Variable | Purpose |
|----------|---------|
| `MAZERP_TIMEX_URL` | **Get started** link |
| `MAZERP_CONSOLE_URL` | **Log in** |
| `MAZERP_BASE_PATH` | URL prefix (default `timex`) |
