<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

$cssBootswatch = getenv('CSS_BOOTSWATCH') ?: 'cerulean';

?>
<body data-spy="scroll" data-target="#sideNav" data-offset="50" class="bbt-theme-<?php echo $cssBootswatch; ?>">
<div class="page-wrapper">
    <?php echo $this->render('core'); ?>
</div>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lunr.js/0.6.0/lunr.min.js"></script>
<script src="http://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="https://tobiju.github.io/share/prismjs/main.js"></script>
<script src="https://tobiju.github.io/share/prismjs/prism.js"></script>
<script src="https://raw.githubusercontent.com/olivernn/lunr.js/master/lunr.min.js"></script>
<script type="text/javascript">
    var index = lunr(function () {
        this.ref('id');
        this.field('title', {boost: 10});
        this.field('content');
    });

    var store = {};

    $.getJSON("/index.json", function (data) {
        $.each(data, function (key, item) {
            index.add({
                id: item.id,
                title: item.title,
                content: item.content
            });

            store[item.id] = {
                href: item.id,
                title: item.title,
                content: item.content
            }
        });
    });

    $(function () {
        var searchResults = $('.js-search-results').addClass('list-search-results');

        $('.js-search-input').keyup(function () {
            var query = $(this).val(),
                results = index.search(query);

            if (!results.length) {
                searchResults.empty();
                return;
            }

            var resultsList = results.reduce(function (ul, result) {
                var item = store[result.ref];

                var title = $('<b>').text(item.title);

                // TODO: move to function
                var contentText = item.content;
                var cropedText = '';

                var re = new RegExp("\\s.{0,10}" + query + ".*?\\b.{0,10}.\\s", "gi");

                $.each(contentText.match(re), function (key, value) {
                    cropedText += '...' + value + '...';
                });

                var content = $('<p>').html(cropedText);

                var div = $('<div>')
                    .append(title)
                    .append(content);
                var a = $('<a>').attr('href', item.href)
                    .append(div);
                var li = $('<li>')
                    .append(a);
                ul.append(li);

                return ul;
            }, $('<ul>'));

            searchResults.html(resultsList);
        })
    })
</script>
</body>
