# Fosters Law — SEO, UX and Content QA Backlog

Scope: maintain existing visual design (under 10% visual change); do not alter advertising or CRM tracking without validation. This is an implementation checklist, not a claim that items have been deployed.

## Verified from theme source
- The site uses WordPress and ACF options for office locations; update addresses in WordPress, not hard-coded templates.
- `header.php` already calls `wp_head()` and loads GTM, Meta Pixel, and Act-On. Do not add duplicate tracking tags.
- `functions.php` already enables WordPress `title-tag`. Check the active SEO plugin before generating any meta descriptions, canonical tags, Open Graph tags or schema.
- The contact form is injected through a shortcode; test real form submissions and HubSpot attribution before changing it.
- `header.php` contains `#mainContent`; a skip navigation link can target it without restructuring the page.

## Priority 1: measure and fix conversion loss
1. Test contact form on mobile and desktop; verify field validation, confirmation, CRM creation, notification delivery and source attribution. Use test records and remove them afterward.
2. Test tap-to-call links on mobile and phone number consistency across key pages; do not change call tracking numbers without attribution review.
3. Build HubSpot lifecycle funnel: unique PI contacts -> reached -> qualified -> consultation -> signed case. Exclude soft conversions and duplicate Google Ads events.
4. Investigate page-specific mobile friction using Clarity recordings, especially contact and motor vehicle accident pages. Do not treat page views or Clarity smart events as submitted leads.

## Priority 2: technical/local SEO validation
1. Inventory indexed pages in Search Console, compare with sitemap, identify excluded URLs and canonical conflicts.
2. Audit page titles, meta descriptions, canonical tags, H1s, internal links and structured data in the live WordPress output; check SEO plugin settings before editing templates.
3. Check Google Business Profile categories, services, reviews, address consistency and landing pages with the account owner. Do not fabricate reviews or add unsupported locations.
4. Run mobile PageSpeed Insights and Core Web Vitals for homepage, PI, vehicle accident and contact pages. Record before/after metrics.
5. Review image dimensions, descriptive alt text and compression for actual page assets. Preserve visual design.

## Priority 3: content gap and editorial approval
Candidate topics only, pending lawyer review for accuracy and jurisdiction:
- What to do after a motor vehicle collision in Ontario
- Ontario personal injury claim timelines and limitation considerations
- How a personal injury consultation works
- Questions to ask a personal injury lawyer
- What information to gather after a slip and fall
- Local service-area content for genuinely served communities, avoiding doorway pages

For every proposed article: confirm target query, intent, existing competing page, responsible lawyer, legal review, sources, CTA and internal links. Do not auto-publish legal claims without review. Avoid promises about compensation, outcomes or timelines.

## Acceptance criteria
- No redesign; visual changes limited to accessible keyboard states.
- No new analytics events without a documented measurement plan.
- No duplicate metadata/schema or unverified legal copy.
- Test at 375px, 768px and desktop widths, with keyboard navigation and screen-reader semantics.
- Record screenshots, before/after measurements and rollback steps before production deployment.
