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
    <title><?= $this->page->getTitle(); ?></title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?= $cssBootswatch; ?>/bootstrap.min.css">
    <link rel="stylesheet"
          href="http://tobiju.github.io/share/prismjs/prism-<?= $cssPrism; ?>.css"/>
    <link rel="stylesheet"
          href="http://tobiju.github.io/share/prismjs/prism-linenumbers.css"/>

    <script src="http://tobiju.github.io/share/prismjs/main.js"></script>
    <script src="http://tobiju.github.io/share/prismjs/prism.js"></script>

    <style>

        /* Header Section */

        header {
            background: white;
            color: black;
            font-size: 16px;
            font-weight: 300;
        }

        /* Content Section */
        #content {
            margin-bottom: 16px;
            font-size: 17px;
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
            font-size: inherit;
        }
    </style>

</head>
