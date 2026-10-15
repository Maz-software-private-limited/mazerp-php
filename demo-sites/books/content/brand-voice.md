# MazERP Payroll — brand voice (marketing)

Derived from the **content-creator** skill (`brand_guidelines.md`) and analysis of live site copy.

## Archetypes

| Role | Archetype | How it shows up |
|------|-----------|-----------------|
| Primary | **The Guide** | Step-by-step monthly flow, checklists, plain explanations of PF/ESI/TDS/LOP |
| Secondary | **The Expert** | Confident about payroll mechanics; no hype, no unverified stats |

## Voice dimensions

- **Formality:** Professional (B2B), conversational where helpful
- **Perspective:** Second person (*you*, *your team*) over first person (*we*)
- **Tone:** Trustworthy, educational, direct—never sensational

## Tone attributes (use 3–5)

1. **Educational** — teach the monthly sequence, not buzzwords  
2. **Trustworthy** — say what the product does; avoid guaranteed compliance claims  
3. **Authoritative** — use correct Indian payroll terms (PF, ESI, TDS, LOP, payslip)  
4. **Friendly** — acknowledge month-end pain without mocking the reader  

## Writing rules

- Lead with the reader’s job (run payroll, approve, send payslips)
- Prefer benefits tied to actions: “Approve once, payslips match the run”
- Avoid empty words: *streamline*, *revolutionize*, *cutting-edge*
- CTAs name the outcome: **Open payroll app**, **Book my walkthrough**, **Get a quote**
- Do not invent testimonials, logos, certifications, or performance statistics

## Terminology

| Use | Avoid |
|-----|--------|
| Monthly payroll run / pay cycle | Payroll solution |
| Payslips | Pay stubs (unless audience is mixed) |
| Loss of pay (LOP) | Unpaid time (alone, without LOP where relevant) |
| MazERP Payroll | MazERP pay roll, Payroll module |

## Channel notes

- **Website:** Full terms OK; link guides ↔ product sections  
- **LinkedIn:** 1 insight + 1 CTA; hashtags sparingly (#PayrollIndia #HRIndia)  
- **Email:** Subject = specific month or task (“October payroll: close attendance first”)

## Analyzer baseline

Run on aggregated copy:

```bash
python .claude/skills/content-creator/scripts/brand_voice_analyzer.py payroll/content/site-copy-for-analysis.txt
```

Re-run after major copy changes.
