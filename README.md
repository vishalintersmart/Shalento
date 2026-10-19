# Shalento Medical Journey — static site

Plain HTML site. Styles are authored in indented Sass (ITCSS layers) and compiled to `assets/css`.

## Build

```bash
npm install
npm run build      # copies vendor JS (Bootstrap, Splide) + compiles app.css / pages.css
npm run watch:css  # recompile on change while developing
```

Bump the `?v=` query on the CSS/JS links in each page after a release build.

## Structure

- `assets/sass/0-abstracts` tokens + mixins (no output)
- `assets/sass/1-base` font, reset, responsive scale, container, reveal animations
- `assets/sass/2-plugins` Bootstrap carousel (compiled from source) + Splide core
- `assets/sass/3-modules` reusable sections/cards (buttons, serviceCard, treatmentCard, …)
- `assets/sass/4-layouts` header + footer
- `assets/sass/5-pages` page-scoped overrides only (`.homePage`, future `.aboutPage`, …)
- `assets/js/app.js` shared behaviour: nav, hero carousel, sliders, step animation, scroll reveal

## Sliders

Add `class="splide …" data-slider="<key>"` and a config entry in `sliderConfigs` (app.js).
A slider loops + autoplays only while it has more slides than `perPage`; otherwise it stays static.
`destroy: true` at a breakpoint turns it into the module's CSS grid.
