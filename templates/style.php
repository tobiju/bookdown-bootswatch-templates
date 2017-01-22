<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015-2016 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */
    $cssPrism = getenv('CSS_PRISM') ?: 'ghcolors';
    $cssBootswatch = getenv('CSS_BOOTSWATCH') ?: 'cerulean';
?>
<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?= $cssBootswatch; ?>/bootstrap.min.css">
<link rel="stylesheet"
      href="https://tobiju.github.io/share/prismjs/prism-<?= $cssPrism; ?>.css"/>
<link rel="stylesheet"
      href="https://tobiju.github.io/share/prismjs/prism-linenumbers.css"/>
<style>
    body, html {
        height: 100%;
        padding-top: 36px;
        position: relative;
    }

    img {
        max-width: 100%;
    }

    code span {
        white-space: nowrap;
    }

    .highlight {
        background: #FFFF88;
    }

    .page-wrapper {
        min-height: 100%;
        padding-bottom: 170px;
        position: relative;
    }

    .box-header {
        position: relative;
    }

    /* Header Section */
    header {
        background: white;
        color: black;
        font-size: 16px;
        font-weight: 300;
    }

    h1:first-child {
        margin-top: 0;
    }

    /* anchor link will be displayed after the static top nav */
    h1:before,
    h2:before,
    h3:before,
    h4:before,
    h5:before,
    h6:before {
        display: block;
        content: " ";
        margin-top: -64px;
        height: 64px;
        visibility: hidden;
    }

    .navbar-brand {
        padding: 0;
    }

    .navbar-brand img {
        max-height: 100%;
    }

    /* Content Section */
    #content {
        margin-bottom: 17px;
        font-size: 17px;
        min-height: 200px;
    }

    .breadcrumb {
        position: relative;
        z-index: 999;
    }

    .links {
        background: #f8f8f8;
        border-top: 1px solid #e5e5e5;
        border-bottom: 1px solid #e5e5e5;
        padding: 16px 0;
    }

    .links .prev {
        text-align: left;
    }

    .links .parent {
        text-align: center;
    }

    .links .next {
        text-align: right;
    }

    /* Search */
    .form-search {
        position: absolute;
        right: 0;
        top: 0;
        z-index: 999;
    }

    @media (max-width: 767px) {
        .form-search {
            position: relative;
            margin-top: 0;
        }
    }

    .form-search .form-control {
        border: 0;
        width: 80px;
    }

    @media (max-width: 767px) {
        .form-search .form-control {
            width: 100% !important;
        }
    }

    .form-search .list-search-results {
        position: relative;
    }

    .form-search .list-search-results ul {
        background: #eee;
        border: 1px solid inherit;
        list-style: none;
        max-height: 300px;
        overflow: auto;
        padding: 0;
        position: absolute;
        width: 100%;
        z-index: 999;
    }

    .form-search .list-search-results ul li:nth-child(even) {
        background: rgba(255, 255, 255, 0.3)
    }

    .form-search .list-search-results ul li.selected {
        background: #ccc;
    }

    .form-search .list-search-results ul li a {
        display: block;
        padding: 4px 8px;
    }

    /* TOC */
    .list-toc .list-group-item {
        background: 0 none;
        position: relative;
        font-weight: bold;
        padding: 0;
    }

    .list-toc .list-group-item .row {
        padding: 7px 0;
    }

    .list-toc .list-group-item .text-number {
        padding-left: 10px;
    }

    .list-toc .list-toc-nested .list-group-item {
        font-weight: normal;
        border: 0 none !important;
    }

    .list-toc .list-toc-nested {
        margin-bottom: 0;
        padding-bottom: 10px;
    }

    .list-toc .list-group-item .bbt-toc-toggle {
        display: block;
        position: absolute;
        top: 5px;
        right: 10px;
        font-weight: normal;
    }

    .list-toc .list-group-item .bbt-toc-toggle:before {
        content: "";
        display: block;
    }

    .list-toc .list-group-item .bbt-toc-toggle.collapsed:before {
        content: "";
        display: block;
    }

    .list-toc > li:nth-child(2n+1) {
        background: rgba(0, 0, 0, 0.03);
    }

    .bbt-theme-cyborg .list-toc > li:nth-child(2n+1),
    .bbt-theme-darkly .list-toc > li:nth-child(2n+1),
    .bbt-theme-slate .list-toc > li:nth-child(2n+1),
    .bbt-theme-superhero .list-toc > li:nth-child(2n+1) {
        background: rgba(255, 255, 255, 0.05);
    }

    .list-toc .list-group-item {
        border-bottom: 0 none;
        border-left: 0 none;
        border-right: 0 none;
        font-size: inherit;
    }

    .list-toc .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }

    .list-toc .list-group-item:last-child {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Left navigation */
    .nav-left ul li a {
        padding-top: 3px;
        padding-bottom: 3px;
        border-left: 1px solid transparent;
    }

    .nav-left ul li.active a,
    .nav-left ul li a:hover {
        background: none !important;
        color: inherit;
        border-color: inherit;
    }

    .navbar-top {
        position: relative;
    }

    .affix {
        top: 60px;
    }

    .badge {
        border-radius: 4px;
        padding: 5px;
    }

    /* Footer Section */
    footer {
        color: black;
        background: white;
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    footer #copyright {
        padding: 30px;
        text-align: center;
        color: #444;
    }

    footer #copyright p {
        margin: 0;
    }

    footer #copyright span a {
        color: white;
    }

    /* Top Navigation */
    @media (max-width: 767px) {
        ul.navbar-nav {
            margin: 0 -15px
        }

        ul.navbar-nav li {
            border-radius: 0;
        }

        ul.navbar-nav li ul {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 0;
            box-shadow: none;
            display: block;
            float: none;
            left: auto;
            padding: 0;
            position: static;
        }

        ul.navbar-nav li ul li a {
            padding: 8px 30px;
        }

        ul.navbar-nav li ul li ul li a {
            padding: 6px 40px;
        }
    }

    @media (min-width: 768px) {

        ul.navbar-nav li {
            display: block;
            position: relative;
            float: left;
        }

        ul.navbar-nav li ul {
            display: none;
        }

        ul.navbar-nav li a {
            display: block;
        }

        ul.navbar-nav li:hover > ul {
            display: block;
            position: absolute;
        }

        ul.navbar-nav li:hover li {
            float: none;
        }

        ul.navbar-nav ul ul {
            left: 100%;
            top: 0;
        }
    }
</style>
