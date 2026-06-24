<?php

/**
 * Centralized per-page SEO overrides.
 * Applied in index.php before includes/head.php, for any $page key present here.
 * Keys must match the $page slug set in api.php (the URL path segment).
 *
 * h1 is informational here for content-team reference / optional template sync;
 * head.php only consumes title/description/keywords.
 */
return [
    'interest-on-balance' => [
        'title'       => 'Earn Interest on Uninvested Balance | TraderTok',
        'description' => 'Make your money work for you. Earn high interest on your uninvested trading account balance with TraderTok. Learn more about our interest rates.',
        'keywords'    => 'broker interest rates, passive income trading account, interest on uninvested cash',
        'h1'          => 'Earn Interest on Your Trading Account Balance',
    ],
    'trading-platform' => [
        'title'       => 'Advanced Online Trading Platform | TraderTok Web & Mobile',
        'description' => 'Discover the powerful TraderTok trading platform. Trade global markets seamlessly with fast execution, advanced charting tools, and technical indicators.',
        'keywords'    => 'best trading platform, desktop trading software, mobile trading app, web trader',
        'h1'          => 'Advanced Multi-Asset Trading Platform',
    ],
    'accessibility' => [
        'title'       => 'Accessibility Policy & Standards | TraderTok',
        'description' => 'TraderTok is committed to providing an accessible web experience and trading platform for all users, including individuals with disabilities.',
        'keywords'    => 'accessible trading platform, web accessibility standards, inclusive trading',
        'h1'          => 'Accessibility Statement',
    ],
    'how-to-verify-account' => [
        'title'       => 'Account Verification Guide - KYC Process | TraderTok',
        'description' => 'Learn how to verify your TraderTok account quickly. Step-by-step guide on submitting KYC documents, identity verification, and proof of address.',
        'keywords'    => 'how to verify TraderTok account, KYC broker documents, verify trading profile',
        'h1'          => 'How to Verify Your Trading Account',
    ],
    'legal-documents' => [
        'title'       => 'Legal Documents & Regulatory Compliance | TraderTok',
        'description' => 'Access all official legal documents, client agreements, and regulatory disclosures for TraderTok. Trade with a transparent and compliant broker.',
        'keywords'    => 'broker legal agreements, regulated broker documents, terms of business',
        'h1'          => 'Legal Documents & Compliance Information',
    ],
    'invite-a-friend' => [
        'title'       => 'Refer a Friend Program - Earn Trading Bonuses | TraderTok',
        'description' => 'Invite your friends to trade with TraderTok and earn exclusive referral bonuses. Share your unique link and start earning rewards together.',
        'keywords'    => 'trading referral program, broker bonus invite, recommend a friend broker',
        'h1'          => 'Refer a Friend & Earn Rewards',
    ],
    'research' => [
        'title'       => 'Daily Market Research & Technical Analysis | TraderTok',
        'description' => 'Stay ahead of the markets with TraderTok\'s comprehensive research hub. Get daily market updates, fundamental analysis, and expert technical insights.',
        'keywords'    => 'daily market insights, forex market research, stock market analysis TraderTok',
        'h1'          => 'Market Research & Trading Insights',
    ],
    'key-information-documents' => [
        'title'       => 'Key Information Documents (KIDs) | TraderTok',
        'description' => 'Review our Key Information Documents (KIDs) to understand the risks, costs, and potential gains or losses associated with each trading product.',
        'keywords'    => 'KIDs trading products, CFD risk disclosure documents, regulatory information sheets',
        'h1'          => 'Key Information Documents (KIDs)',
    ],
    'help-center' => [
        'title'       => 'Help Center & FAQs | TraderTok Support Hub',
        'description' => 'Find answers to frequently asked questions about account setup, deposits, withdrawals, platform features, and more at the TraderTok Help Center.',
        'keywords'    => 'trading support FAQ, account help, troubleshooting trading platform',
        'h1'          => 'TraderTok Help Center',
    ],
    'events-calendar' => [
        'title'       => 'Economic & Trading Events Calendar | TraderTok',
        'description' => 'Track major global financial events, economic releases, corporate earnings, and upcoming live trading webinars with the TraderTok Events Calendar.',
        'keywords'    => 'economic calendar, trading webinars calendar, market events schedule',
        'h1'          => 'Economic Events & Market Calendar',
    ],
    'risk-disclosure' => [
        'title'       => 'Risk Disclosure Statement & Warning | TraderTok',
        'description' => 'Read the TraderTok Risk Disclosure statement. Understand the high level of risk involved in trading leveraged products like Forex and CFDs.',
        'keywords'    => 'financial risk warning, CFD trading risks, leverage risk statement',
        'h1'          => 'Risk Disclosure Notice',
    ],
    'how-to-open-account' => [
        'title'       => 'How to Open a Trading Account | TraderTok Step-by-Step Guide',
        'description' => 'Follow our simple, step-by-step guide to open a live or demo trading account with TraderTok. Start trading global financial markets in minutes.',
        'keywords'    => 'how to create a TraderTok account, sign up for trading, register broker account',
        'h1'          => 'How to Open a Trading Account',
    ],
    'education-hub' => [
        'title'       => 'Trading Education Hub | Learn How to Trade | TraderTok',
        'description' => 'Master the art of trading with the TraderTok Education Hub. Access video tutorials, expert courses, webinars, and ebooks tailored for all experience levels.',
        'keywords'    => 'trading education for beginners, forex trading course, stock market basics',
        'h1'          => 'Trading Education Hub',
    ],
    'buy-and-sell-explained' => [
        'title'       => 'Buying and Selling Explained | Trading Orders Guide | TraderTok',
        'description' => 'Understand the core concepts of online trading. Learn how buy and sell orders work, what long and short positions mean, and how to execute trades.',
        'keywords'    => 'long vs short trading, trading market orders, buying and selling explained',
        'h1'          => 'Buy and Sell Orders Explained',
    ],
    'client-vulnerability' => [
        'title'       => 'Client Vulnerability & Support Policy | TraderTok',
        'description' => 'TraderTok is dedicated to supporting vulnerable clients. Read our policy on how we ensure fair, tailored support and security for all traders.',
        'keywords'    => 'vulnerable customer support broker, fair treatment of clients, responsible investing',
        'h1'          => 'Client Vulnerability Policy',
    ],
    'offers-promotions' => [
        'title'       => 'Exclusive Trading Offers & Promotions | TraderTok',
        'description' => 'Boost your trading potential. Discover active promotional campaigns, deposit bonuses, and exclusive trading offers currently available at TraderTok.',
        'keywords'    => 'TraderTok active offers, forex broker promotions, trading incentives',
        'h1'          => 'Trading Offers & Promotions',
    ],
    'regulations' => [
        'title'       => 'Regulatory Compliance & License Information | TraderTok',
        'description' => 'Trade with peace of mind. TraderTok is a fully regulated broker adhering to strict financial industry standards to protect client funds and security.',
        'keywords'    => 'TraderTok regulation license, safe financial authority broker, secure trading compliance',
        'h1'          => 'Regulations & Licensing Information',
    ],
    'tradertok-club' => [
        'title'       => 'TraderTok Club | Exclusive VIP Trading Benefits',
        'description' => 'Join the TraderTok Club to unlock premium rewards, including dedicated account managers, lower trading fees, priority withdrawals, and VIP events.',
        'keywords'    => 'VIP trading membership, broker loyalty rewards, exclusive trading perks',
        'h1'          => 'Join the TraderTok Club',
    ],
    'client-service-agreement' => [
        'title'       => 'Client Service Agreement | TraderTok Terms of Business',
        'description' => 'Read the formal TraderTok Client Service Agreement. Understand the contractual terms, responsibilities, and conditions governing our trading services.',
        'keywords'    => 'TraderTok user agreement, trading terms of service, client contract terms',
        'h1'          => 'Client Service Agreement',
    ],
    'about' => [
        'title'       => 'About TraderTok | Our Mission, Vision & Values',
        'description' => 'Learn more about TraderTok, a leading international online brokerage provider offering industry-leading conditions to global traders.',
        'keywords'    => 'who is TraderTok, company history broker, corporate values trading',
        'h1'          => 'About TraderTok',
    ],
    'terms-conditions' => [
        'title'       => 'Terms and Conditions | TraderTok Policy',
        'description' => 'Please review the official website terms and conditions of TraderTok before using our services, platforms, and educational materials.',
        'keywords'    => 'website terms of use, trading platform rules, legal disclaimer',
        'h1'          => 'Terms & Conditions',
    ],
    'responsible-trading' => [
        'title'       => 'Responsible Trading & Risk Management | TraderTok',
        'description' => 'Protect your capital. Learn the fundamentals of responsible trading, managing emotional trading risks, and utilizing advanced stop-loss features.',
        'keywords'    => 'risk management in trading, avoid overtrading, stop loss trading psychology',
        'h1'          => 'Responsible Trading Practices',
    ],
    'how-to-withdraw' => [
        'title'       => 'How to Withdraw Funds - Payment Methods | TraderTok',
        'description' => 'Get a clear guide on how to withdraw profits from your TraderTok account. Review available payout options, processing fees, and timeframes.',
        'keywords'    => 'TraderTok withdrawal methods, fast broker withdrawal, withdrawal processing times',
        'h1'          => 'How to Withdraw Funds',
    ],
    'ib-program' => [
        'title'       => 'Introducing Broker (IB) Program | Partner with TraderTok',
        'description' => 'Earn industry-leading commissions by referring clients to our platform. Join the professional TraderTok Introducing Broker (IB) partner network.',
        'keywords'    => 'forex IB commissions, broker affiliate program, partner with trading broker',
        'h1'          => 'Introducing Broker (IB) Program',
    ],
    'account-types' => [
        'title'       => 'Trading Account Types - Standard, Raw, Islamic | TraderTok',
        'description' => 'Compare TraderTok\'s flexible account types to find your perfect fit. Choose from competitive spreads, flexible leverage, and institutional features.',
        'keywords'    => 'standard vs premium trading account, raw spread account, swap free Islamic account',
        'h1'          => 'Trading Account Types',
    ],
    'live-training' => [
        'title'       => 'Live Trading Training & Interactive Workshops | TraderTok',
        'description' => 'Accelerate your market skills. Join expert-led live training sessions and watch professional market analysis executed in real time.',
        'keywords'    => 'interactive trading workshops, learn from professional traders, trading webinars live',
        'h1'          => 'Live Trading Training Sessions',
    ],
    'tax-report' => [
        'title'       => 'Tax Report Generation & Financial Statements | TraderTok',
        'description' => 'Simplify your tax filing. Learn how to generate and download comprehensive annual capital gains tax reports directly from your TraderTok portal.',
        'keywords'    => 'capital gains statement trading, annual tax return broker, export financial statements',
        'h1'          => 'Tax Reports & Trading Statements',
    ],
    'meet-the-team' => [
        'title'       => 'Meet the Team - Leadership & Management | TraderTok',
        'description' => 'Meet the experienced financial professionals, developers, and visionaries driving innovation and integrity behind the TraderTok platform.',
        'keywords'    => 'broker company leadership, financial markets founders, board of directors',
        'h1'          => 'Meet the TraderTok Team',
    ],
    'privacy-policy' => [
        'title'       => 'Privacy Policy & GDPR Data Protection | TraderTok',
        'description' => 'Read the TraderTok Privacy Policy to learn how we store, process, and protect your personal identification documents and sensitive trading data.',
        'keywords'    => 'data protection policy broker, safe trading privacy terms, user data encryption',
        'h1'          => 'Privacy Policy',
    ],
    'top-instruments' => [
        'title'       => 'Top Tradable Instruments & Market Asset List | TraderTok',
        'description' => 'Discover the most liquid and widely traded instruments on TraderTok. Explore top choices across Forex, major shares, commodities, and cryptos.',
        'keywords'    => 'most traded currency pairs, popular stock CFDs, trending crypto pairs',
        'h1'          => 'Top Trading Instruments',
    ],
    'what-is-leverage-and-margin' => [
        'title'       => 'Understanding Leverage and Margin Explained | TraderTok Guide',
        'description' => 'New to leveraged trading? Learn exactly how leverage and margin requirements affect your capital, risk, and buying power with visual examples.',
        'keywords'    => 'how leverage works forex, margin call definition, trading margin requirements',
        'h1'          => 'What Are Leverage and Margin in Trading?',
    ],
    'how-copy-trading-works' => [
        'title'       => 'Copy Trading Guide - Mirror Professional Traders | TraderTok',
        'description' => 'Discover social investing. Read our exhaustive guide on how copy trading works, how to choose reliable master strategy providers, and automate trades.',
        'keywords'    => 'social trading platform, mirror seasoned traders, automatic investment program',
        'h1'          => 'How Copy Trading Works',
    ],
    'contact-us' => [
        'title'       => 'Contact Us | 24/7 Multi-Lingual Customer Support | TraderTok',
        'description' => 'Have a question? Reach the TraderTok support desk via live chat, email, or telephone. Our professional support team is available round-the-clock.',
        'keywords'    => 'broker customer service email, corporate address, technical support office',
        'h1'          => 'Contact TraderTok',
    ],
    'trading-calculators' => [
        'title'       => 'Free Forex & CFD Trading Calculators | TraderTok Tools',
        'description' => 'Accurately manage risks with our free online trading calculators. Instantly compute required margin, pip values, swap rates, and position sizing.',
        'keywords'    => 'pip value calculator, margin requirement calculator, position size tool',
        'h1'          => 'Trading Calculators & Risk Management Tools',
    ],
    'how-to-deposit' => [
        'title'       => 'How to Deposit Funds - Secure Payment Methods | TraderTok',
        'description' => 'Fund your account quickly and securely. View our extensive payment options including wire transfers, credit cards, and electronic wallets.',
        'keywords'    => 'TraderTok deposit methods, instant funding methods, card payment broker',
        'h1'          => 'How to Deposit Funds',
    ],
    'general-risk-disclosure' => [
        'title'       => 'General Risk Disclosure Policy Notice | TraderTok',
        'description' => 'Review our mandatory General Risk Disclosure. Understand the profound financial exposures and volatile behaviors involved in capital market investments.',
        'keywords'    => 'financial risk notice, leveraged trading hazards, trading regulatory notice',
        'h1'          => 'General Risk Disclosure Statement',
    ],
    'segregated-account' => [
        'title'       => 'Segregated Client Funds Protection Strategy | TraderTok',
        'description' => 'Your money\'s security is our absolute priority. At TraderTok, all retail investor capital is held completely separate in Tier-1 segregated accounts.',
        'keywords'    => 'broker safety of funds, capital insurance policy, trusted custodial storage',
        'h1'          => 'Segregated Client Accounts',
    ],
    'trading-central' => [
        'title'       => 'Trading Central Technical Insights & Signals | TraderTok',
        'description' => 'Gain direct premium access to integrated Trading Central tools. Leverage dynamic automated patterns, target indicators, and certified research data.',
        'keywords'    => 'automated market charts signals, technical indicators integration, trading advice alerts',
        'h1'          => 'Trading Central Market Analysis Tools',
    ],
    'cookies-policy' => [
        'title'       => 'Cookie Policy & Web Tracking Information | TraderTok',
        'description' => 'Find out how TraderTok applies website cookies and data tracking tags to tailor safe, optimized personal interactions across our internet properties.',
        'keywords'    => 'tracking preferences browser policy, functional persistent tracking settings',
        'h1'          => 'Cookies Policy',
    ],
    'ib-program-application' => [
        'title'       => 'Introducing Broker (IB) Partner Program Application | TraderTok',
        'description' => 'Submit your Introducing Broker application online today. Partner with a global industry brand and unlock tailored corporate remuneration schedules.',
        'keywords'    => 'IB sign up form trading, commercial brokerage affiliation registration, partner intake sheet',
        'h1'          => 'Apply for the Introducing Broker Program',
    ],
    'tradertok-club-join' => [
        'title'       => 'Apply to Join the Exclusive TraderTok Club Portal',
        'description' => 'Ready to access premier loyalty perks? Fill out the fast intake process to elevate your account status tier inside our elite TraderTok Club circle.',
        'keywords'    => 'upgrade tier trader status, apply premium account benefits, VIP client club signup',
        'h1'          => 'Join the TraderTok Club Today',
    ],
    'edu-tutorials' => [
        'title'       => 'Video Trading Tutorials & Guide Library | TraderTok',
        'description' => 'Browse practical platform video walk-through guides. Learn execution layout setups, charting configurations, and fundamental software features.',
        'keywords'    => 'how to map indicators, dashboard usage modules, beginner walkthrough clips',
        'h1'          => 'Trading Tutorials for Beginners & Professionals',
    ],
    'edu-ebooks' => [
        'title'       => 'Free High-Value Trading Ebooks Download | TraderTok',
        'description' => 'Download premium technical manuals and comprehensive financial guides instantly. Covering fundamental strategy blueprints, trading mindsets, and more.',
        'keywords'    => 'currency strategy book electronic, digital handbook day trading, invest insights document',
        'h1'          => 'Free Trading eBooks & Guides',
    ],
    'courses' => [
        'title'       => 'Professional Online Trading Courses | TraderTok Academy',
        'description' => 'Enroll in fully comprehensive financial trading paths. Structured courses custom crafted for novice learners up through advanced market professionals.',
        'keywords'    => 'academy module finance curriculum, advanced chart lessons masterclass, professional forex classes',
        'h1'          => 'Online Trading Courses',
    ],
    'edu-webinars' => [
        'title'       => 'Interactive Educational Trading Webinars | TraderTok',
        'description' => 'Secure your seat for interactive live financial streams. Watch expert traders perform interactive fundamental deep-dives and Q&A analysis panels.',
        'keywords'    => 'interactive analyst conference, stream financial markets webinar, masterclass trading broadcast',
        'h1'          => 'Live Trading Webinars',
    ],
    'trading-essentials' => [
        'title'       => 'Core Trading Essentials & Fundamental Basics | TraderTok',
        'description' => 'Review the bedrock pillars required for market execution success. Master standard terminal architecture, fundamental setups, and risk definitions.',
        'keywords'    => 'must have skills day trading, foundation toolkit markets, key trading knowledge pillars',
        'h1'          => 'Trading Essentials for Every Trader',
    ],
    'edu-resources' => [
        'title'       => 'Trader Learning Resources & Academic Materials | TraderTok',
        'description' => 'Unlock a master vault filled with interactive cheat-sheets, platform printouts, formulas, and references designed to build superior trading logic.',
        'keywords'    => 'trading reference printable tools, learning download content pack, market worksheets handbook',
        'h1'          => 'Trading Resources & Learning Materials',
    ],
    'edu-market-news' => [
        'title'       => 'Real-Time Market News & Macro Intelligence Reports | TraderTok',
        'description' => 'Never miss a critical market trend. Access our rolling economic news summary capturing breaking global financial headlines and immediate asset responses.',
        'keywords'    => 'daily forex updates breaking, stock sector macro intelligence, global asset price alerts',
        'h1'          => 'Market News & Trading Updates',
    ],
    'edu-glossary' => [
        'title'       => 'Financial & Trading Terms Glossary Dictionary | TraderTok',
        'description' => 'Decode confusing capital market phrases with ease. Look up definitive definitions for hundreds of technical terms across our financial glossary.',
        'keywords'    => 'forex definitions encyclopedia, stock jargon dictionary tool, index margin definitions lookup',
        'h1'          => 'Trading Glossary & Financial Terms',
    ],
    'open-demo-account' => [
        'title'       => 'Open Free Risk-Free Trading Demo Account | TraderTok',
        'description' => 'Refine strategies completely risk-free. Open a free TraderTok demo account equipped with generous virtual simulation currency funds today.',
        'keywords'    => 'practice virtual money simulator, forex simulator risk free, paper trading environment',
        'h1'          => 'Open a Free Demo Trading Account',
    ],
    'open-live-account' => [
        'title'       => 'Open Live Trading Account - Access Global Markets | TraderTok',
        'description' => 'Ready to trade real markets? Create your live TraderTok broker profile today to experience industry leading speeds and razor-thin execution spreads.',
        'keywords'    => 'create live investment profile, register real capital account, join forex broker live',
        'h1'          => 'Open a Live Trading Account',
    ],
];
