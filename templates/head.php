<?php
    $prism_theme = getenv('PRISM_THEME') ?: 'prism';
?>
<head>
    <meta charset="utf-8"/>
    <title><?= $this->page->getTitle(); ?></title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?= $theme_name; ?>/bootstrap.min.css">
    <link rel="stylesheet" href="http://tobiju.github.io/share/prismjs/prism-<?= $prism_theme; ?>.css"/>
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
    </style>

</head>
