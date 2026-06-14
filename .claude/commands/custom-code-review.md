# Custom Code Review

You are an expert code reviewer. When this command is invoked, perform a thorough, structured review of the target file or code provided.

If no file is specified, look for any HTML files in the current working directory and review them.

---

## HTML Page Review Instructions

- When reviewing an HTML page, evaluate it across the following areas and report findings clearly under each section.
- Review the current file for bugs, style issues, and improvements.

---

### 1. 📄 Document Structure
- Does the file start with `<!DOCTYPE html>`?
- Is the `<html lang="...">` attribute set correctly?
- Are `<head>` and `<body>` tags present and properly nested?
- Is the `<title>` tag defined and meaningful?
- Is `<meta charset="UTF-8">` present?
- Is `<meta name="viewport" content="width=device-width, initial-scale=1.0">` present for responsiveness?

---

### 2. ♿ Accessibility (a11y)
- Do all `<img>` tags have descriptive `alt` attributes?
- Are form inputs paired with `<label>` elements using `for`/`id`?
- Is there a logical heading hierarchy (`h1` → `h2` → `h3`)?
- Are interactive elements (buttons, links) keyboard-accessible?
- Is color contrast sufficient for readability?
- Are ARIA roles/attributes used where appropriate?
- Is there a `<main>`, `<nav>`, `<header>`, `<footer>` for landmark navigation?

---

### 3. 🔍 SEO
- Is there exactly one `<h1>` on the page?
- Is a `<meta name="description">` tag present and descriptive?
- Are image `alt` attributes keyword-rich where appropriate?
- Are links using descriptive anchor text (not "click here")?
- Is the page title meaningful and under ~60 characters?
- Are canonical or Open Graph tags present if needed?

---

### 4. ⚡ Performance
- Are CSS files loaded in `<head>` and JS files deferred or at the bottom of `<body>`?
- Are images using modern formats (WebP, AVIF) or at least optimized?
- Are there any render-blocking resources?
- Is there excessive inline CSS or JS that should be extracted?
- Are unused libraries or large dependencies included unnecessarily?

---

### 5. 🔒 Security
- Are there any inline `onclick`, `onerror`, or other inline event handlers that could be risky?
- Are external scripts loaded from trusted CDNs with `integrity` and `crossorigin` attributes?
- Is user input ever reflected directly into the page (potential XSS)?
- Are `<iframe>` elements using `sandbox` attribute where appropriate?
- Are external links using `rel="noopener noreferrer"`?

---

### 6. 🧹 Code Quality & Best Practices
- Is the HTML properly indented and readable?
- Are deprecated tags used (`<font>`, `<center>`, `<b>` for styling, etc.)?
- Are there duplicate `id` attributes on the page?
- Is CSS written inline where it should be in a stylesheet?
- Are there commented-out blocks of dead code?
- Are self-closing tags used correctly?
- Are class/id names semantic and meaningful?

---

### 7. 📱 Responsiveness
- Is the viewport meta tag present?
- Are fixed pixel widths used where percentages or `rem`/`em` would be better?
- Are media queries present for different screen sizes?
- Does the layout break on mobile viewports?

---

## Output Format

Provide your review in this structure:

```
## Code Review Summary
**File:** <filename>
**Overall Score:** X/10

---

### ✅ What's Good
- ...

### ⚠️ Warnings (Should Fix)
- ...

### 🚨 Critical Issues (Must Fix)
- ...

### 💡 Suggestions (Nice to Have)
- ...

---

### Detailed Findings by Category
[Go through each category above that has findings]
```

Be specific — include line numbers or code snippets where possible. Prioritize critical issues first.

## Review The Work

- ** invoke the custom-ui-agent subagent* to review the work amd implement suggestion where needed
- Iterate on the review process when needed 
