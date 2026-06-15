"use strict";
/**
 * Renumbers termsConditionsPage.h22–h45 → h23–h46 in flat overrides and legal.* bundles.
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const overridesDir = path.join(root, "tools", "i18n-overrides");
const bundlesDir = path.join(overridesDir, "bundles");

const NEW_H22 = "20. CENT ACCOUNT TERMS AND CONDITIONS";

function bumpHeading(val) {
  if (typeof val !== "string") return val;
  return val.replace(/^(\d+)\./, (_, num) => {
    const n = parseInt(num, 10);
    return n >= 20 && n <= 32 ? `${n + 1}.` : `${num}.`;
  });
}

function processFlatObject(obj) {
  const tc = {};
  const rest = {};
  for (const [k, v] of Object.entries(obj)) {
    const m = k.match(/^termsConditionsPage\.h(\d+)$/);
    if (!m) {
      rest[k] = v;
      continue;
    }
    tc[`h${m[1]}`] = v;
  }
  if (!Object.keys(tc).length) return obj;

  const next = {};
  for (const [hk, hv] of Object.entries(tc)) {
    const n = parseInt(hk.slice(1), 10);
    if (n >= 22 && n <= 45) {
      next[`h${n + 1}`] = bumpHeading(hv);
    } else {
      next[hk] = hv;
    }
  }
  next.h22 = NEW_H22;

  const out = { ...rest };
  const ordered = Object.keys(next)
    .sort((a, b) => parseInt(a.slice(1), 10) - parseInt(b.slice(1), 10));
  for (const hk of ordered) {
    out[`termsConditionsPage.${hk}`] = next[hk];
  }
  return out;
}

function processFile(filePath) {
  const data = JSON.parse(fs.readFileSync(filePath, "utf8"));
  const updated = processFlatObject(data);
  fs.writeFileSync(filePath, JSON.stringify(updated, null, 2) + "\n", "utf8");
  console.log("updated", path.relative(root, filePath));
}

for (const f of fs.readdirSync(overridesDir)) {
  if (f.endsWith(".flat.json")) {
    processFile(path.join(overridesDir, f));
  }
}
for (const f of fs.readdirSync(bundlesDir)) {
  if (f.startsWith("legal.") && f.endsWith(".json")) {
    processFile(path.join(bundlesDir, f));
  }
}

// Patch translated h22 from locale files where available
const localeMap = {
  "es-419.flat.json": "es-419.json",
  "vn.flat.json": "vn.json",
  "th.flat.json": "th.json",
  "id.flat.json": "id.json",
  "my.flat.json": "my.json",
  "ph.flat.json": "ph.json",
  "pk.flat.json": "pk.json",
};
for (const [flatName, localeName] of Object.entries(localeMap)) {
  const localePath = path.join(root, "locales", localeName);
  const flatPath = path.join(overridesDir, flatName);
  if (!fs.existsSync(localePath) || !fs.existsSync(flatPath)) continue;
  const loc = JSON.parse(fs.readFileSync(localePath, "utf8"));
  const h22 = loc.termsConditionsPage && loc.termsConditionsPage.h22;
  if (!h22) continue;
  const flat = JSON.parse(fs.readFileSync(flatPath, "utf8"));
  flat["termsConditionsPage.h22"] = h22;
  fs.writeFileSync(flatPath, JSON.stringify(flat, null, 2) + "\n", "utf8");
  console.log("patched h22 from locale", localeName);
}

console.log("Done.");
