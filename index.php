<?php
ob_start();
echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";
require __DIR__ . '/ensure-api-cache-shape.php';
require __DIR__ . '/api.php';
require __DIR__ . '/includes/blog-url-helpers.php';

$routeConfig = require __DIR__ . '/includes/config/page-routes.php';
$staticRoutes = $routeConfig['static'];
$dynamicRoutes = $routeConfig['dynamic'];
$blogPosts = (isset($get->blog) && is_array($get->blog)) ? $get->blog : [];
$blogDetailPost = null;

/**
 * Canonicalize legacy query-style pages (/?page=slug) to pretty routes (/slug).
 * Article URLs stay as /education?id=<slug> (not nested paths) so relative assets resolve.
 */
$basePath = rtrim(str_replace('\\', '/', dirname((string) ($_SERVER['SCRIPT_NAME'] ?? '/index.php'))), '/');
$requestUri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '';
$requestQuery = (string) parse_url($requestUri, PHP_URL_QUERY);
parse_str($requestQuery, $requestQueryParams);
if (isset($requestQueryParams['page']) && is_string($requestQueryParams['page'])) {
    $legacyPage = trim($requestQueryParams['page'], '/');
    if ($legacyPage !== '') {
        if ($legacyPage === 'education-article') {
            $legacyPage = 'education';
        }
        unset($requestQueryParams['page']);
        $canonicalPath = ($basePath === '' ? '' : $basePath) . '/' . $legacyPage;
        $canonicalUrl = $canonicalPath . (empty($requestQueryParams) ? '' : ('?' . http_build_query($requestQueryParams)));
        $canonicalUrl = $canonicalUrl === '' ? '/' : $canonicalUrl;
        header('Location: ' . $canonicalUrl, true, 301);
        exit;
    }
}

// /education/<slug> or /education-article/<slug> -> /education?id=<slug> (301 for bookmarks / SEO)
if (isset($page) && is_string($page) && strpos($page, '/') !== false) {
    [$pageRoot, $pageRemainder] = explode('/', $page, 2);
    $pageRoot = trim($pageRoot, '/');
    $pageRemainder = trim($pageRemainder, '/');
    if ($pageRoot === 'education-article' || $pageRoot === 'education') {
        $queryString = isset($_SERVER['QUERY_STRING']) ? (string) $_SERVER['QUERY_STRING'] : '';
        parse_str($queryString, $pathParams);
        unset($pathParams['page']);
        if ($pageRemainder !== '') {
            $pathParams['id'] = rawurldecode(str_replace('+', ' ', $pageRemainder));
        }
        $canonicalPath = ($basePath === '' ? '' : $basePath) . '/education';
        $canonicalUrl = $canonicalPath . (empty($pathParams) ? '' : ('?' . http_build_query($pathParams)));
        header('Location: ' . $canonicalUrl, true, 301);
        exit;
    }
}

if (isset($page) && $page === 'education-article') {
    $queryString = isset($_SERVER['QUERY_STRING']) ? (string) $_SERVER['QUERY_STRING'] : '';
    parse_str($queryString, $legacyPathParams);
    unset($legacyPathParams['page']);
    $canonicalPath = ($basePath === '' ? '' : $basePath) . '/education';
    $canonicalUrl = $canonicalPath . (empty($legacyPathParams) ? '' : ('?' . http_build_query($legacyPathParams)));
    header('Location: ' . $canonicalUrl, true, 301);
    exit;
}

// Legacy /blogDetail?id=530 -> /{cms-url-address} when slug exists.
if ($page === 'blogDetail' && isset($_GET['id']) && (string) $_GET['id'] !== '') {
    $legacyBlogPost = blog_find_by_id($blogPosts, $_GET['id']);
    if ($legacyBlogPost !== null) {
        $legacySlug = blog_post_slug($legacyBlogPost);
        if ($legacySlug !== '') {
            $redirectPath = ($basePath === '' ? '' : $basePath) . '/' . $legacySlug;
            header('Location: ' . $redirectPath, true, 301);
            exit;
        }
    }
} elseif (
    !empty($page)
    && !isset($staticRoutes[$page])
    && !in_array($page, $dynamicRoutes, true)
) {
    $blogDetailPost = blog_find_by_slug($blogPosts, (string) $page);
}

// Academy: page-specific SEO (API $get defaults are site-wide).
if (!empty($page)) {
    if ($page === 'claim-offer') {
        $get->title = 'Claim Offer | TraderTok';
        $get->desc = 'Register your interest to claim a promotion. Our team will follow up with eligibility and next steps.';
        $get->keyw = 'claim offer, trading promotion, bonus, TraderTok';
    } elseif ($page === 'lead-thank-you') {
        $get->title = 'Thank You | TraderTok';
        $get->desc = 'Your request has been received.';
        $get->keyw = 'thank you, confirmation';
    } elseif ($page === 'blog') {
        $get->title = 'Blogs | TraderTok';
        $get->desc = 'Read TraderTok blog articles covering trading education, market insights, and platform updates.';
        $get->keyw = 'TraderTok blog, trading articles, market insights, education';
    } elseif ($blogDetailPost !== null) {
        blog_apply_detail_seo($get, $blogDetailPost);
    } elseif ($page === 'blogDetail') {
        $legacyBlogPost = blog_find_by_id($blogPosts, $_GET['id'] ?? '');
        if ($legacyBlogPost !== null) {
            blog_apply_detail_seo($get, $legacyBlogPost);
        } else {
            $get->title = 'Blog | TraderTok';
            $get->desc = 'Read articles on the TraderTok blog.';
            $get->keyw = 'TraderTok blog, trading articles';
        }
    } elseif ($page === 'education') {
        $eduArticlesPath = __DIR__ . '/assets/data/education_articles.json';
        $articleId = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
        $eduArticle = null;
        if (is_readable($eduArticlesPath)) {
            $eduList = json_decode((string) file_get_contents($eduArticlesPath), true);
            if (is_array($eduList)) {
                if ($articleId !== '') {
                    foreach ($eduList as $item) {
                        if (is_array($item) && (($item['id'] ?? '') === $articleId)) {
                            $eduArticle = $item;
                            break;
                        }
                    }
                }
                if ($eduArticle === null && isset($eduList[0]) && is_array($eduList[0])) {
                    $eduArticle = $eduList[0];
                }
            }
        }
        if ($eduArticle !== null) {
            $metaTitle = trim((string) ($eduArticle['seo_title'] ?? ''));
            if ($metaTitle === '') {
                $metaTitle = trim((string) ($eduArticle['title'] ?? 'Trading Education'));
            }
            if (stripos($metaTitle, 'tradertok') === false) {
                $metaTitle .= ' | TraderTok';
            }
            $metaDesc = trim((string) ($eduArticle['meta_description'] ?? ''));
            if ($metaDesc === '') {
                $metaDesc = trim((string) ($eduArticle['excerpt'] ?? ''));
            }
            $kwRaw = $eduArticle['keywords'] ?? [];
            $kwList = is_array($kwRaw)
                ? array_values(array_filter(array_map('trim', $kwRaw)))
                : [];
            $get->title = $metaTitle;
            $get->desc = $metaDesc;
            $get->keyw = implode(', ', $kwList);
        }
    } elseif (in_array($page, [
        'offers',
        'vn',
        'th',
        'ph',
        'id',
        'pk',
        'latam',
        'na',
        'ke',
        'gh',
        'ng',
        'za',
        'tt',
        'gy',
    ], true)) {
        $get->title = 'Offers & Promotions | TraderTok';
        $get->desc = 'Discover region-specific promotions and exclusive trading opportunities tailored for traders in your area.';
        $get->keyw = 'trading offers, promotions, bonuses, TraderTok';
    } else {
        $courseSeo = require __DIR__ . '/includes/config/course-seo.php';
        if (isset($courseSeo[$page])) {
            $get->title = $courseSeo[$page]['title'];
            $get->desc = $courseSeo[$page]['description'];
            $get->keyw = $courseSeo[$page]['keywords'];
        }
    }
}

// Centralized SEO overrides — authoritative source of truth, applied last so it
// wins over any earlier per-page block in this file.
if (!empty($page)) {
    $pageSeoMap = require __DIR__ . '/includes/config/page-seo.php';
    if (isset($pageSeoMap[$page])) {
        $get->title = $pageSeoMap[$page]['title'];
        $get->desc  = $pageSeoMap[$page]['description'];
        $get->keyw  = $pageSeoMap[$page]['keywords'];
    }
    unset($pageSeoMap);
}

require 'includes/head.php';

echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";

if (!$page) {
    require 'includes/home.php';
    require 'includes/footer.php';
    exit;
}

$menuDetail = (object)[];

if (isset($staticRoutes[$page])) {
    require $staticRoutes[$page];
    require 'includes/footer.php';
    exit;
}

if ($blogDetailPost !== null) {
    $blogDetail = $blogDetailPost;
    require 'includes/blogDetail.php';
    require 'includes/footer.php';
    exit;
}

switch ($page) {
    case 'otherPage':
        foreach ($get->other_page as $pageOther) {
            if ($pageOther->url == $getURL) {
                $menuDetail = $pageOther;
                break;
            }
        }
        require 'includes/otherPage.php';
        break;

    case 'extraMenu':
        $extraMenuTarget = __DIR__ . '/includes/extraMenuPage.php';
        if (!file_exists($extraMenuTarget)) {
            die('Missing template: includes/extraMenuPage.php');
        }

        foreach ($get->extra_menu as $extraMenu) {
            if ($extraMenu->id == $_GET['id']) {
                $menuDetail = $extraMenu;
                break;
            }
        }
        require $extraMenuTarget;
        break;

    case 'documents':
        $documentTarget = __DIR__ . '/includes/document.php';
        if (!file_exists($documentTarget)) {
            die('Missing template: includes/document.php');
        }
        require $documentTarget;
        break;

    case 'blogDetail':
        $blogDetail = blog_find_by_id($blogPosts, $_GET['id'] ?? '');
        require 'includes/blogDetail.php';
        break;

    default:
        foreach ($get->menus as $pageMenus) {
            if ($pageMenus->url == $page) {
                $menuDetail = $pageMenus;
                break;
            }
        }

        if (!count((array) $menuDetail)) {
            die('page not found...');
        }

        require 'includes/page.php';
        break;
}

require 'includes/footer.php';

ob_end_flush();