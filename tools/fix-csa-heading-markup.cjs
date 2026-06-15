"use strict";
/**
 * Fixes broken CSA section headings (blocks 05–23): adds missing <h1 class="doc-sub">
 * and removes orphan empty <h1> before block closing divs.
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");

function fixHeadingHtml(html) {
  let out = html;
  // Orphan empty h1 before closing wrapper div (PHP only)
  out = out.replace(/\n      <h1 class="doc-sub">\n      <\/div>/g, "\n      </div>");
  // Block opens with bare <span>…</span></h1> (missing opening h1)
  if (/^\s*<span>/.test(out) && !/^\s*<h1 class="doc-sub">/.test(out)) {
    out = out.replace(/^(\s*)<span>/, "$1<h1 class=\"doc-sub\">\n$1        <span>");
  }
  return out;
}

function fixPhpFile() {
  const phpPath = path.join(root, "includes", "client-service-agreement.php");
  let html = fs.readFileSync(phpPath, "utf8");
  html = html.replace(
    /(<div data-i18n-html="clientServiceAgreementPage\.block(?:0[5-9]|1[0-9]|2[0-3])">\n)(<span>)/g,
    "$1<h1 class=\"doc-sub\">\n        $2"
  );
  html = html.replace(/\n      <h1 class="doc-sub">\n      <\/div>/g, "\n      </div>");
  fs.writeFileSync(phpPath, html, "utf8");
  console.log("fixed", phpPath);
}

function fixBundles() {
  const bundlesDir = path.join(root, "tools", "i18n-overrides", "bundles");
  for (const f of fs.readdirSync(bundlesDir)) {
    if (!f.startsWith("clientServiceAgreement.bodies.") || !f.endsWith(".json")) {
      continue;
    }
    const p = path.join(bundlesDir, f);
    const data = JSON.parse(fs.readFileSync(p, "utf8"));
    let n = 0;
    for (let i = 5; i <= 23; i++) {
      const key = `block${String(i).padStart(2, "0")}`;
      if (!data[key]) continue;
      const fixed = fixHeadingHtml(data[key]);
      if (fixed !== data[key]) {
        data[key] = fixed;
        n++;
      }
    }
    if (n) {
      fs.writeFileSync(p, JSON.stringify(data, null, 2) + "\n", "utf8");
      console.log("fixed", f, n, "blocks");
    }
  }
}

fixPhpFile();
fixBundles();
console.log("Run: node tools/merge-client-service-agreement-bodies.cjs all");
