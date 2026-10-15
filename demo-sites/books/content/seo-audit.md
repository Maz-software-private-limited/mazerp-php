# SEO audit — MazERP Payroll marketing site

Audit against the **seo-optimizer** skill checklist (Oct 2026). Re-run after major releases.

## Keyword map

| Page | Primary intent | Primary keyword | Secondary |
|------|----------------|---------------|-----------|
| Home | Commercial + transactional | payroll software India | monthly payroll, PF ESI TDS |
| Guide: checklist | Informational | monthly payroll checklist India | payroll software India, LOP |
| Guides hub | Navigational | payroll guides India | — |

## On-page checklist

| Item | Home | Guide | Guides hub |
|------|------|-------|------------|
| Title &lt; 60 chars, keyword near start | Yes | Yes | Yes |
| Meta description 150–160 chars | Yes (`seo_meta_description()`) | Yes | Yes |
| H1 with primary/semantic keyword | Yes | Yes | Yes |
| Keyword in first ~100 words | Yes | Yes | Yes |
| Logical H2/H3 hierarchy | Yes | Yes | Yes |
| Readable URL slug | `index.php` | `monthly-payroll-checklist-india.php` | `guides/` |
| Internal links (3–5+ per long page) | Yes | Yes | Yes |
| Unique canonical | Yes | Yes | Yes |
| Open Graph + Twitter | Yes | Yes | Yes |
| Image alt text | Logo alt enhanced | — | — |
| Mobile viewport | Yes | Yes | Yes |

## Technical SEO

| Item | Status |
|------|--------|
| `lang="en-IN"` | Done |
| Canonical URLs via `MAZERP_SITE_URL` + `absolute_url()` | Done |
| `robots.txt` + `Disallow: /storage/` | Done |
| Dynamic `robots.php` for absolute Sitemap URL | Done (use `.htaccess.example`) |
| XML sitemap with `lastmod` | `sitemap.php` |
| JSON-LD Organization | Done |
| JSON-LD WebSite | Home |
| JSON-LD SoftwareApplication | Home |
| JSON-LD FAQPage | Home (from `config.php` FAQ) |
| JSON-LD Article | Guide |
| JSON-LD HowTo | Guide |
| JSON-LD BreadcrumbList | Guide |
| Core Web Vitals helpers | CSS preload, logo dimensions, `fetchpriority` on logo, deferred JS |

## Structured data validation

After deploy, test:

- [Google Rich Results Test](https://search.google.com/test/rich-results)
- [Schema Markup Validator](https://validator.schema.org/)

## Post-launch (Search Console)

1. Set `MAZERP_SITE_URL` to production origin.
2. Submit `https://<domain>/sitemap.php`.
3. Monitor queries for “payroll software india”, “monthly payroll checklist”.
4. Improve CTR from titles/descriptions if impressions are high and clicks low.

## Gaps / backlog

| Priority | Item |
|----------|------|
| High | Dedicated OG image 1200×630 (not logo-only) |
| High | Register property in Google Search Console |
| Medium | Pretty URLs (`/guides/monthly-payroll-checklist-india/`) via rewrite |
| Medium | Pillar cluster: PF/ESI/TDS guide linked from home |
| Low | `hreflang` if Hindi pages are added |
| Low | External cite to authoritative statutory sources (EPFO/ESIC) where appropriate |

## Topic cluster (skill: pillar + clusters)

- **Pillar:** Home + software positioning  
- **Cluster 1:** Monthly payroll checklist (live)  
- **Cluster 2 (planned):** PF, ESI, and TDS in one payroll run  
- **Cluster 3 (planned):** LOP and attendance cut-offs  

Link all clusters ↔ home ↔ contact CTA.
