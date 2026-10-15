# SEO report — MazERP Payroll marketing site

Generated using **content-creator** `seo_optimizer.py`, **seo-optimizer** skill audit, and on-site implementation (Oct 2026).

Full checklist and backlog: **[seo-audit.md](./seo-audit.md)**.

## Target keywords

| Type | Keyword |
|------|---------|
| Primary | payroll software India |
| Secondary | monthly payroll, PF ESI TDS payroll, payslip software, payroll processing India, LOP payroll |

## Analyzer scores

| Asset | Words | SEO score | Notes |
|-------|-------|-----------|--------|
| Landing copy (aggregated) | ~120 | 32/100 | Use guides + meta for organic depth |
| Guide: monthly checklist (plain text export) | ~494 | 42/100 | Live page has H1/H2 and internal links; script sees one blob |

Re-run on guide export:

```bash
python .claude/skills/content-creator/scripts/seo_optimizer.py payroll/content/guide-monthly-checklist.txt "payroll software India" "monthly payroll,PF,ESI,TDS,payslip"
```

## On-site SEO implemented

- [x] Unique `<title>` and meta description (home + guides)
- [x] Canonical URLs (`MAZERP_SITE_URL` + `absolute_url()`)
- [x] Open Graph + Twitter Card tags
- [x] `lang="en-IN"`
- [x] JSON-LD: `SoftwareApplication` (home), `Article` (guides), `CollectionPage` (guides hub)
- [x] `robots.txt` + `sitemap.php`
- [x] Internal links: home ↔ guides ↔ features / contact
- [x] Educational article (~600+ words) with H1/H2 structure

## Meta suggestions (home)

- **Title:** Payroll software India · MazERP Payroll (via `$pageTitle`)
- **Description:** See `config.php` → `meta_description` (aim 150–160 characters)

## Next content (calendar)

See `content-calendar.md` and `social-launch-pack.md`.

## Production checklist

1. Set `MAZERP_SITE_URL` to the public origin (e.g. `https://payroll.mazerp.com`)
2. Point `robots.txt` Sitemap to full URL if not at domain root
3. Submit sitemap in Google Search Console / Bing Webmaster
4. Add real `og:image` (1200×630) when brand creative is ready; update `config.php` → `seo.og_image`
