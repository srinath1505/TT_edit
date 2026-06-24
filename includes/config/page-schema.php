<?php

/**
 * Per-page JSON-LD schema markup.
 * Each key is a $page slug; value is the raw JSON string to output inside
 * <script type="application/ld+json">...</script> on that page only.
 *
 * The global Organization / FinancialService / WebSite schema is output
 * on every page directly in includes/head.php (not here).
 */
return [

    'trading-platform' => '{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "@id": "https://tradertok.com/trading-platform#software",
  "name": "TraderTok Trading Platform",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": [
    "Windows",
    "macOS",
    "iOS",
    "Android",
    "Web"
  ],
  "url": "https://tradertok.com/trading-platform",
  "description": "TraderTok provides desktop, web, and mobile trading platforms with access to global financial markets, advanced charting tools, trading calculators, and multi-asset trading capabilities.",
  "publisher": {
    "@type": "Organization",
    "name": "Amber Rock Trade Ltd"
  },
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD",
    "availability": "https://schema.org/InStock"
  },
  "featureList": [
    "Web Trading Platform",
    "Desktop Application",
    "Mobile Trading App",
    "Real-Time Charts",
    "Trading Calculators",
    "Multi-Asset Trading",
    "Windows Support",
    "macOS Support",
    "iOS Support",
    "Android Support"
  ]
}',

    'education-hub' => '{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://tradertok.com/education-hub#collectionpage",
      "url": "https://tradertok.com/education-hub",
      "name": "TraderTok Education Hub",
      "description": "Explore educational resources on trading, including courses, articles, market insights, webinars, eBooks, tutorials, glossaries, and learning tools.",
      "isPartOf": {
        "@type": "WebSite",
        "name": "TraderTok",
        "url": "https://tradertok.com"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Amber Rock Trade Ltd"
      },
      "about": [
        { "@type": "Thing", "name": "Trading Education" },
        { "@type": "Thing", "name": "Financial Markets" },
        { "@type": "Thing", "name": "Forex Trading" },
        { "@type": "Thing", "name": "CFD Trading" }
      ]
    },
    {
      "@type": "WebPage",
      "@id": "https://tradertok.com/education-hub#webpage",
      "url": "https://tradertok.com/education-hub",
      "name": "TraderTok Education Hub",
      "description": "A centralized learning hub providing educational resources, market insights, webinars, eBooks, tutorials, glossaries, and trading guides for users of all experience levels.",
      "inLanguage": "en",
      "publisher": {
        "@type": "Organization",
        "name": "Amber Rock Trade Ltd"
      }
    }
  ]
}',

];
