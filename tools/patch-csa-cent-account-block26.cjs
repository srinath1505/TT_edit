"use strict";
/**
 * Inserts English Cent Account section into block26 of all CSA locale bundles.
 */
const fs = require("fs");
const path = require("path");

const bundlesDir = path.join(__dirname, "i18n-overrides", "bundles");
const en = JSON.parse(
  fs.readFileSync(
    path.join(bundlesDir, "clientServiceAgreement.bodies.en.json"),
    "utf8"
  )
);
const b26 = en.block26;
const centStart = b26.indexOf(
  '<p class="doc-page-hero-subtitle">\n        <strong>Cent Account Terms'
);
const centEnd = b26.indexOf(
  '<p class="doc-page-hero-subtitle">\n        <strong>Types of Orders:'
);
if (centStart < 0 || centEnd < 0) {
  console.error("Cent section not found in en block26");
  process.exit(1);
}
const centHtml = b26.slice(centStart, centEnd);

const INSERT_NEEDLES = [
  "Types of Orders",
  "Các loại đơn",
  "Jenis Pesanan",
  "Jenis Order",
  "Mga Uri ng Order",
  "Mga Uri",
  "Tipos de Órdenes",
  "Tipos de Ordenes",
  "Tipos de órdenes",
  "Execution Practices in Financial",
  "Prácticas de ejecución",
  "Thực hành thực hiện",
  "عمل درآمد کے طریقے",
];

function findInsertIndex(block26) {
  for (const needle of INSERT_NEEDLES) {
    const idx = block26.indexOf(needle);
    if (idx < 0) continue;
    const pStart = block26.lastIndexOf('<p class="doc-page-hero-subtitle">', idx);
    if (pStart >= 0) return pStart;
  }
  const slip = block26.indexOf("Slippage");
  if (slip >= 0) {
    let pos = slip;
    for (let n = 0; n < 3; n++) {
      pos = block26.lastIndexOf('<p class="doc-page-hero-subtitle">', pos - 1);
      if (pos < 0) break;
    }
    if (pos >= 0) return pos;
  }
  return -1;
}

for (const f of fs.readdirSync(bundlesDir)) {
  if (!f.startsWith("clientServiceAgreement.bodies.") || f.endsWith(".en.json")) {
    continue;
  }
  const p = path.join(bundlesDir, f);
  const data = JSON.parse(fs.readFileSync(p, "utf8"));
  if (data.block26.includes("Cent Account Terms")) {
    console.log("skip", f);
    continue;
  }
  const at = findInsertIndex(data.block26);
  if (at < 0) {
    console.error("no insert point:", f);
    process.exit(1);
  }
  data.block26 = data.block26.slice(0, at) + centHtml + data.block26.slice(at);
  fs.writeFileSync(p, JSON.stringify(data, null, 2) + "\n", "utf8");
  console.log("patched", f);
}

console.log("Done.");
