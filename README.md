# Kuartal

This repository is the **shared home** for everything that's common across every Kuartal property — brand identity and the design system every Laravel site/app is built on. It is **not** where any individual website or app's code lives.

## Repository strategy

One repository per deployable product, plus this one for what they all share:

| Repo | Holds |
| --- | --- |
| **kuartal** (this one) | Brand assets (logo, colors, fonts) and the shared Tailwind/Blade design system every property is built on |
| `kuartal-id` | kuartal.id — the ecosystem portal |
| `kuartal-group` | kuartalgroup.com — investor relations / corporate |
| `kuartal-books` | kuartalbooks.com — publishing storefront |
| `kuartal-space` | kuartalspace.com — community & media |
| `kuartal-impact` | kuartalimpact.org |
| `kuartal-capital` | kuartalcapital.com |
| `kuartal-ventures` | kuartalventures.com |
| `kuartal-systems` | kuartalsystems.com — Kuartal ID login + app launcher + AI Lab |
| *(more as each app in the roadmap gets built — Klassroom, Kuartalku, etc.)* | |

**Why separate, not one giant repo:** each of the above deploys independently to its own domain and server. Keeping them apart means a change to one site never risks breaking another, deployments stay simple (one repo = one deploy), and access can be scoped later (a contractor fixing kuartalspace.com never needs to see kuartal-systems.com's code).

**Why not fully separate with no shared repo at all:** the brand and design system (colors, fonts, dark mode, base components) need to look identical everywhere. This repo is that single source of truth — each product repo starts by copying `design-system/` in, and gets refreshed from here whenever the shared look changes.

## What's in here

- `design-system/` — the Laravel/Tailwind design-system layer: brand color tokens, dark mode, base Blade layout, shared components. See its own README for setup instructions.
- `brand/` — logo files, brand guidelines, and other identity assets (added as they're finalized).

## Note on organization

This repo currently lives under a personal GitHub account (`diemashawkins`). As more product repos get created, it's worth moving everything to a GitHub **Organization** (e.g. `github.com/kuartal`) instead — so the code is owned by the company, not by one person, and teammates or contractors can be added with scoped access per repo. Doing this now, while there's only one repo, is far easier than migrating many repos later.
