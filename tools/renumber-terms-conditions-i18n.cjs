"use strict";
/**
 * Renumbers termsConditionsPage keys h22–h45 → h23–h46 in locales and body bundles.
 * Inserts new h22 heading (Cent Account) from en.json after renumber completes.
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const localesDir = path.join(root, "locales");
const bundlesDir = path.join(root, "tools", "i18n-overrides", "bundles");

const NEW_H22_HEADING = "20. CENT ACCOUNT TERMS AND CONDITIONS";

function renumberObject(obj) {
  const keys = Object.keys(obj);
  const out = {};
  for (const k of keys) {
    const hm = k.match(/^h(\d+)(_.*)?$/);
    if (!hm) {
      out[k] = obj[k];
      continue;
    }
    const n = parseInt(hm[1], 10);
    const suffix = hm[2] || "";
    if (n >= 22 && n <= 45) {
      out[`h${n + 1}${suffix}`] = obj[k];
    } else {
      out[k] = obj[k];
    }
  }
  return out;
}

function bumpHeadingNumbers(val) {
  if (typeof val !== "string") return val;
  return val.replace(/^(\d+)\./, (_, num) => {
    const n = parseInt(num, 10);
    if (n >= 20 && n <= 32) return `${n + 1}.`;
    return `${num}.`;
  });
}

function processLocaleFile(localePath) {
  const loc = JSON.parse(fs.readFileSync(localePath, "utf8"));
  if (!loc.termsConditionsPage) return;
  const tcp = loc.termsConditionsPage;

  // Renumber heading keys h22–h45
  const headings = {};
  const bodies = {};
  for (const [k, v] of Object.entries(tcp)) {
    const hm = k.match(/^h(\d+)(_.*)?$/);
    if (!hm) {
      bodies[k] = v;
      continue;
    }
    const n = parseInt(hm[1], 10);
    const suffix = hm[2] || "";
    if (n >= 22 && n <= 45) {
      const newKey = `h${n + 1}${suffix}`;
      if (!suffix) {
        headings[newKey] = bumpHeadingNumbers(v);
      } else {
        bodies[newKey] = v;
      }
    } else if (n < 22 || !suffix) {
      if (!suffix) headings[k] = v;
      else bodies[k] = v;
    } else {
      bodies[k] = v;
    }
  }

  headings.h22 = NEW_H22_HEADING;
  loc.termsConditionsPage = { ...headings, ...bodies };
  fs.writeFileSync(localePath, JSON.stringify(loc, null, 2) + "\n", "utf8");
  console.log("locale", path.basename(localePath));
}

function processBundle(bundlePath, centBodies) {
  const bundle = JSON.parse(fs.readFileSync(bundlePath, "utf8"));
  const out = {};
  for (const [k, v] of Object.entries(bundle)) {
    const hm = k.match(/^h(\d+)(_.*)?$/);
    if (!hm) {
      out[k] = v;
      continue;
    }
    const n = parseInt(hm[1], 10);
    const suffix = hm[2] || "";
    if (n >= 22 && n <= 45) {
      out[`h${n + 1}${suffix}`] = v;
    } else {
      out[k] = v;
    }
  }
  if (centBodies) {
    for (const [k, v] of Object.entries(centBodies)) {
      out[k] = v;
    }
  }
  fs.writeFileSync(bundlePath, JSON.stringify(out, null, 2) + "\n", "utf8");
  console.log("bundle", path.basename(bundlePath));
}

const enBundlePath = path.join(bundlesDir, "termsConditions.bodies.en.json");
const enBundle = JSON.parse(fs.readFileSync(enBundlePath, "utf8"));
const centBodies = {};
for (const [k, v] of Object.entries(enBundle)) {
  if (k.startsWith("h22_")) centBodies[k] = v;
}

for (const f of fs.readdirSync(localesDir)) {
  if (f.endsWith(".json")) {
    processLocaleFile(path.join(localesDir, f));
  }
}

for (const f of fs.readdirSync(bundlesDir)) {
  if (!f.startsWith("termsConditions.bodies.") || !f.endsWith(".json")) continue;
  const p = path.join(bundlesDir, f);
  if (f === "termsConditions.bodies.en.json") {
    // en bundle already correct from extract
    console.log("bundle", f, "(skip — from extract)");
    continue;
  }
  processBundle(p, centBodies);
}

console.log("Done.");
