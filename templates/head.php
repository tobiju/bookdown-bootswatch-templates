<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

    $cssPrism = getenv('CSS_PRISM') ?: 'ghcolors';
    $cssBootswatch = getenv('CSS_BOOTSWATCH') ?: 'cerulean';
?>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="HandheldFriendly" content="True"/>
    <title><?= $this->page->getTitle(); ?></title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?= $cssBootswatch; ?>/bootstrap.min.css">
    <link rel="stylesheet"
          href="http://tobiju.github.io/share/prismjs/prism-<?= $cssPrism; ?>.css"/>
    <link rel="stylesheet"
          href="http://tobiju.github.io/share/prismjs/prism-linenumbers.css"/>

    <style>
        body, html {
            height: 100%;
        }

        .page-wrapper {
            min-height: 100%;
            padding-bottom: 204px;
            position: relative;
        }

        /* Header Section */
        header {
            background: white;
            color: black;
            font-weight: 300;
        }

        /* Content Section */
        #content {
            margin-bottom: 17px;
            font-size: 17px;
            min-height: 200px;
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

        /* Overide bootsstrap default style */
        table, .table {
            width: 100%;
            font-size: inherit;
        }

        .table-responsive {
            border: none;
        }

        /* Toc style */
        .nav-toc {
            line-height: 1.6em;
        }

        .nav-toc ul {
            list-style: none;
            padding-left: 0;
        }

        .nav-toc ul li ul {
            list-style: none;
            padding-left: 22px;
        }

        .nav-toc ul li ul li ul {
            list-style: none;
            padding-left: 38px;
        }

        .nav-toc ul li ul li ul li ul {
            list-style: none;
            padding-left: 54px;
        }


    </style>

</head>
