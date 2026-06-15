"use strict";
/**
 * Inserts Section 20 (Cent Account) into terms-conditions.php and renumbers
 * termsConditionsPage.h22–h45 → h23–h46. Bumps displayed section numbers 20–32 → 21–33
 * in renumbered sections (not in new Cent Account block).
 */
const fs = require("fs");
const path = require("path");

const phpPath = path.join(__dirname, "..", "includes", "terms-conditions.php");
let html = fs.readFileSync(phpPath, "utf8").replace(/\r\n/g, "\n");

const centBlock = `
      <h1 class="doc-sub">
        <span data-i18n="termsConditionsPage.h22">20. CENT ACCOUNT TERMS AND CONDITIONS</span>
      </h1>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p1"><b>20.1 Eligibility</b><br />
        The Cent Account is available only to clients residing in eligible regions as determined by
        the Company from time to time.<br />
        The Company reserves the right to refuse, suspend, restrict, or terminate a Cent Account
        where a client no longer meets the eligibility requirements.</p>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p2"><b>20.2 Equity Requirements</b><br />
        The Cent Account is intended for clients maintaining account equity within the range
        specified by the Company.<br />
        To remain eligible for a Cent Account, the account equity must be maintained between
        USD 10 and USD 1,000, excluding any promotional bonuses, credits, or other non-
        withdrawable amounts provided by the Company.<br />
        For the purpose of determining eligibility, the Company may deduct any bonus, credit, or
        similar promotional amount from the account equity calculation.<br />
        Where the account equity exceeds the maximum permitted threshold or otherwise falls
        outside the eligibility criteria, the Company may suspend the Cent Account and transfer
        the client to another account type deemed appropriate by the Company.<br />
        The Company may restrict trading activity during the review and migration process.</p>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p3"><b>20.3 Prohibited Trading Practices</b><br />
        Scalping is strictly prohibited on Cent Accounts.<br />
        The Company reserves the right, at its sole discretion, to determine whether a trading
        strategy constitutes scalping or any other prohibited trading practice.<br />
        If the Company determines that a client has engaged in scalping or other prohibited
        trading activity, the Company may:<br />
        a) Suspend or terminate the account;<br />
        b) Restrict or remove trading privileges;<br />
        c) Restrict, delay, or withhold withdrawal requests pending investigation; and/or<br />
        d) Take any other action deemed necessary to protect the integrity of its services.</p>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p4"><b>20.4 Account Migration</b><br />
        Where a client no longer qualifies for a Cent Account, the Company may migrate the
        account to another account type without prior approval from the client.<br />
        The Company shall determine the most appropriate account type based on its internal
        policies and eligibility requirements.</p>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p5"><b>20.5 Amendments</b><br />
        The Company reserves the right to modify, amend, replace, or remove any provision of
        these Terms and Conditions at any time and at its sole discretion.<br />
        Any such amendments shall become effective immediately upon implementation unless
        otherwise determined by the Company.</p>
      <p class="doc-page-hero-subtitle" data-i18n-html="termsConditionsPage.h22_p6"><b>20.6 General Provisions</b><br />
        The Company's interpretation of these Terms and Conditions shall be final and binding.<br />
        The Company reserves all rights not expressly granted herein.<br />
        By opening or using a Cent Account, the client acknowledges and agrees to be bound by
        these Terms and Conditions.</p>

`;

const marker =
  '      <h1 class="doc-sub">\n        <span data-i18n="termsConditionsPage.h22">20. DURATION OF AGREEMENT -';

if (!html.includes(marker)) {
  console.error("Insert marker not found — file may already be updated.");
  process.exit(1);
}

// Renumber h45→h46 … h22→h23 (reverse to avoid collisions)
for (let i = 45; i >= 22; i--) {
  const re = new RegExp(`termsConditionsPage\\.h${i}(?=[^_0-9]|_)`, "g");
  html = html.replace(re, `termsConditionsPage.h${i + 1}`);
}

// Insert Cent Account before Duration (now h23)
const durationMarker =
  '      <h1 class="doc-sub">\n        <span data-i18n="termsConditionsPage.h23">20. DURATION OF AGREEMENT -';
if (!html.includes(durationMarker)) {
  console.error("Duration marker not found after renumber.");
  process.exit(1);
}
html = html.replace(durationMarker, centBlock + durationMarker);

// Bump heading section numbers 20→21 … 32→33 in h23–h35 spans
const headingRe =
  /(<span data-i18n="termsConditionsPage\.h(2[3-9]|3[0-5])">)(\d+)\./g;
html = html.replace(headingRe, (_, prefix, _hn, num) => {
  const n = parseInt(num, 10);
  if (n >= 20 && n <= 32) {
    return `${prefix}${n + 1}.`;
  }
  return `${prefix}${num}.`;
});

// Bump subsection numbers in body keys h23–h35 (20.x→21.x … 32.x→33.x), high to low
function bumpSubsections(chunk, fromSec, toSec) {
  const re = new RegExp(`\\b${fromSec}\\.(\\d+)`, "g");
  return chunk.replace(re, `${toSec}.$1`);
}

const parts = html.split(/(?=      <h1 class="doc-sub">)/);
const out = [];
for (const part of parts) {
  const hm = part.match(/data-i18n="termsConditionsPage\.(h\d+)"/);
  if (!hm) {
    out.push(part);
    continue;
  }
  const hKey = hm[1];
  const hNum = parseInt(hKey.slice(1), 10);
  if (hNum >= 23 && hNum <= 35) {
    let p = part;
    for (let sec = 32; sec >= 20; sec--) {
      p = bumpSubsections(p, sec, sec + 1);
    }
    out.push(p);
  } else {
    out.push(part);
  }
}
html = out.join("");

fs.writeFileSync(phpPath, html, "utf8");
console.log("Updated", phpPath);
