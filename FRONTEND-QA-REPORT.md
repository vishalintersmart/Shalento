# Frontend QA Report — Shalento Medical Journey

**Date:** 2026-10-19 · **Verdict:** **FAIL** (one open accessibility issue needs a design decision — see QA-01). Everything else that could be tested here passes or is a documented environment limitation.

## 1. Executive summary

| Item | Value |
|---|---|
| Project | Static HTML site, Sass (ITCSS) → CSS, vanilla JS; Bootstrap 5.3.3 (carousel only), Splide 4.1.4 |
| Routes found / tested | 1 / 1 (`index.html`). 14 linked inner pages don't exist yet (QA-08) |
| Issues found | 18 |
| Fixed and verified | 14 |
| Open | 2 (QA-01, QA-08) |
| Blocked by environment | 2 (QA-13, QA-14) |
| Highest open severity | P1: white text on the gold-gradient buttons fails contrast (QA-01) |

## 2. Environment and coverage

- **Machine and server:** Windows 11, WAMP Apache 2.4.62. `mod_headers`, `mod_deflate` and `mod_expires` are disabled locally; I didn't change the global server config. Node 26.11.1, npm 11.13.0, Dart Sass 1.83.1.
- **Browsers:** Chrome (Playwright and headless Lighthouse 12.6.1) and Microsoft Edge 155 (Lighthouse and headless screenshots). Firefox and Safari aren't installed.
- **Tools:** axe-core 4.10.3 and html-validate 9.5.5, installed temporarily in a scratch folder (not added to the project), and `npm audit`.
- **Build:** production (compressed CSS, minified vendor JS).
- **Viewports:** 320, 360, 375, 390, 430, 576, 700, 768, 900, 1024, 1100, 1280, 1366, 1440, 1600 and 1920px.
- **Not performed:** Firefox/Safari testing, real-device touch testing, field (real-user) Core Web Vitals, and verifying the server headers (the modules are off locally).
- **Keyboard:** full Tab walkthrough of all 52–53 stops at 1440 and 390px, plus the mobile menu, Escape, and the FAQ via Enter.

## 3. Scorecard

| Category | Status | Found | Fixed | Outstanding |
|---|---|--:|--:|--:|
| Code review | PASS | 2 | 2 | 0 |
| Build and lint | PASS (no linter configured; Sass build is clean) | 0 | 0 | 0 |
| Robots and indexing | PASS (source); headers BLOCKED | 1 | 1 | 0 |
| Performance | PARTIAL | 4 | 3 | 1 (blocked) |
| Console and network | PASS | 1 | 1 | 0 |
| HTML validation | PASS (0 errors) | 3 | 3 | 0 |
| Security | PASS (source); headers BLOCKED | 1 | 1 (policy only) | 0 |
| Accessibility | FAIL | 6 | 5 | 1 |
| Responsive design | PASS | 1 | 1 | 0 |
| Visual alignment | PASS | 0 | 0 | 0 |
| Functional testing | PARTIAL | 1 | 0 | 1 |
| SEO and metadata | PASS (score 63 is the intended noindex) | 0 | 0 | 0 |
| Cross-browser | PARTIAL (Chrome and Edge; no Firefox or Safari) | 0 | 0 | 0 |

## 4. Performance

All figures are Lighthouse 12.6.1 lab results against the local production build. There is no compression locally.

| Run | Performance | Accessibility | Best Practices | SEO | FCP | LCP | TBT | CLS | Weight |
|---|--:|--:|--:|--:|--:|--:|--:|--:|--:|
| Mobile, before | 74 | 100* | 100 | 100 | 1.4 s | 6.2 s | 200 ms | 0 | 1048 KB / 61 requests |
| Mobile, after (median of 3) | 92 | 100 | 100 | 63† | 1.4 s | 3.2 s | 110 ms | 0 | 612 KB / 45 requests |
| Desktop, before | 98 | 96 | 100 | 100 | 0.3 s | 1.1 s | 10 ms | 0 | — |
| Desktop, after | 99 | 100 | 100 | 63† | 0.4 s | 0.8 s | 30 ms | 0 | 715 KB / 47 requests |
| Desktop, after — Edge 155 | 99 | 100 | 100 | 63† | — | 0.8 s | — | 0 | no console errors |

Mobile used simulated Slow 4G with 4× CPU slowdown; desktop used Lighthouse's desktop preset.

\* Lighthouse skips content that is hidden before scroll-reveal. A full axe run with everything revealed found the real violations (QA-04 to QA-07).

† SEO drops because of the intended `noindex` (the "is-crawlable" audit). That is expected and was not "fixed".

Mobile LCP of 3.2s is still above the 2.5s target. In every run the observed LCP equals the first paint (about 1.2s); the rest is Lighthouse's simulation of roughly 150KB of uncompressed HTML, CSS and JS loading first. Enabling compression should close the gap, but that can't be verified locally (QA-13).

## 5. Issue register

| ID | Severity | Category | Description | Status |
|---|---|---|---|---|
| QA-01 | P1 | Accessibility | White text on the gold-gradient buttons (`.btnGold`, 8 CTAs) measures 2.6:1 median, 1.7:1 worst case; WCAG AA needs 4.5:1 | **Open — needs a design decision** |
| QA-02 | P1 | Performance | Mobile LCP 6.2s: the hero text sat at `opacity: 0` until the JS scroll-reveal ran (93% of LCP was render delay) | Fixed and verified (hero is CSS-animated now) |
| QA-03 | P1 | Performance | Splide loop clones fetched lazy images immediately, because `src` came before `loading="lazy"` and clones copy attributes in order. About 25 images loaded on first paint | Fixed and verified (4 raster images on initial load) |
| QA-04 | P2 | Accessibility | Gold eyebrows, notice label, outline button and FAQ icon at 1.98–2.38:1 on light backgrounds | Fixed and verified: new `$clr-gold-text: #7f6633` (≥4.5:1) on light backgrounds; brand gold kept on navy |
| QA-05 | P2 | Accessibility / HTML | Splide puts `role="tabpanel"` on `<li>` slides, which isn't allowed; also `aria-label` on plain divs | Fixed and verified: slides are `<div>`, slider roots are labelled `<section>`s |
| QA-06 | P2 | Accessibility | Slider dots were 8×8px targets 16px apart, and the hero indicators 23px tall (WCAG 2.5.8) | Fixed and verified: 24px hit areas with the same visuals |
| QA-07 | P3 | HTML | `<address>` inside `<span>`; phone number used ordinary spaces | Fixed and verified |
| QA-08 | P2 | Functional | 14 internal links point to pages that don't exist yet (`about.html`, `treatments.html`, …); the 4 social links are `#` | Open (pages not built yet) |
| QA-09 | P1 | Indexing | No `robots.txt`, meta robots or `X-Robots-Tag` | Fixed: `robots.txt` (served 200), meta robots `noindex, nofollow, noarchive`, guarded `X-Robots-Tag` in `.htaccess` |
| QA-10 | P2 | Responsive | 992–1439px: the Why-Shalento heading column collapsed to 0px and the Network heading to 71px, clipping the "Why Shalento?" button | Fixed and verified |
| QA-11 | P2 | Performance | Oversized images: 1920px hero on mobile, 714px emblem, 1376px treatment JPGs, PNG logos | Fixed: responsive `srcset` and WebP throughout |
| QA-12 | P3 | Network | The browser fetched WAMP's 198KB root `favicon.ico` | Fixed: project favicon (11KB) |
| QA-13 | P2 | Performance | No text compression or cache headers (about 149KB compressible) | Blocked: rules are in `.htaccess` but the modules are disabled locally |
| QA-14 | P3 | Security | No security headers are served | Blocked: CSP, nosniff, Referrer-Policy, frame and Permissions-Policy headers are in `.htaccess`. The CSP itself was checked with a temporary meta tag: 0 violations, all 7 sliders and the carousel working |
| QA-15 | P3 | Performance | `bootstrap.min.js` is 60KB, of which 44KB goes unused (only the carousel is needed) | Accepted. The fix is a carousel-only bundle, which would need a bundler |
| QA-16 | P3 | Code | Hero slide 2 was fetched eagerly while off-screen | Fixed: lazy, then requested after the load event |
| QA-17 | P1 | Accessibility | Keyboard focus landed on buttons inside sections the scroll-reveal hadn't shown yet (`opacity: 0`): 40+ invisible focus stops | Fixed and verified: `[data-animate]:focus-within` reveals the block instantly. 0 hidden focus stops at 1440 and 390px, and every stop scrolls into view |
| QA-18 | P2 | Accessibility | With the full-screen mobile menu open, Tab moved focus onto hero controls hidden behind the overlay | Fixed and verified: main content, footer and skip link are `inert` while the menu is open; Escape closes it, returns focus to the toggle and removes `inert` |

**QA-01 options** (each one changes the design visibly):
1. Keep the gold buttons but use dark text (`#172139`), as the footer button already does.
2. Darken the gradient to about `#7f6633`.

## 6. Security

- `npm audit`: 0 vulnerabilities.
- No `innerHTML`, `eval` or `javascript:` URLs, and no secrets anywhere in the code.
- No third-party CDNs: all scripts and fonts are served from the project itself.
- No links open new tabs, so `noopener` isn't needed.
- The headers in `.htaccess` are guarded with `IfModule` and will apply once the server modules are enabled.

## 7. Indexing policy

- `robots.txt` contains `Disallow: /`, and every page carries meta robots `noindex`.
- Trade-off: `Disallow` stops crawlers from ever seeing the `noindex` tag. That means URLs that are already known can still appear in results without content.
- For a truly private staging site, use HTTP authentication or an IP allowlist.
- On a real domain, `robots.txt` must sit at the domain root.
- Before go-live, remove: `robots.txt`, the meta robots tag, and the `X-Robots-Tag` block in `.htaccess`.

## 8. Fixes implemented

- **Files changed:**
  - `index.html`
  - `assets/js/app.js` (also: `inert` while the menu is open)
  - `assets/sass/1-base/_animations.sass` (reveal on focus)
  - `assets/sass/0-abstracts/_variables.sass` and `_mixins.sass`
  - `assets/sass/2-plugins/_splide.sass`
  - `assets/sass/3-modules/` — `_hero-carousel`, `_notice-bar`, `_buttons`, `_faq`, `_section-heading` and `_feature-card` partials
  - New files: `robots.txt`, `.htaccess`, image variants and `favicon.png`
- **Rerun after the changes:**
  - Lighthouse: 3 mobile runs and 1 desktop run
  - axe: 0 violations at 1440 and 390px
  - html-validate: 0 errors
  - Responsive sweep at 16 widths: no overflow or clipping, and the slider/grid modes switch as designed
  - Uncached image-request test
  - Console: no errors
- **Interactions checked earlier in this session:** mobile menu (Escape closes and focus returns), mousewheel on the vertical slider, step-by-step animation, service-card hover, FAQ accordion.

## 9. Remaining

- QA-01: gold-button contrast (design decision).
- QA-08: inner pages and social URLs.
- Verify compression, caching and security headers on the target server.
- Not yet run: Firefox and Safari (not installed), real-device touch testing, field Core Web Vitals.

## 10. Verdict

**FAIL**, solely on QA-01: the white-on-gold primary CTAs fail WCAG AA contrast. Fixing it means a visual change, which needs the designer's approval. Once a QA-01 option is applied and the server headers are confirmed, the expected verdict is **PASS WITH WARNINGS** (open items: QA-08 links, no Firefox/Safari coverage).
