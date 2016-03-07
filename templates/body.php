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
<script type="text/javascript">
    $(function () {

        //highlight js
        $(window).on('hashchange', function () {
            var locationHash = window.location.hash;
            console.log(locationHash.replace("#", ""));
            $("body").highlight(locationHash.replace("#", ""));
        });
        $(window).trigger('hashchange');

        //lunr
        var index = lunr(function () {
            this.ref('id');
            this.field('title', {boost: 10});
            this.field('body');
        });
        var store = {};
        var searchResults = $('.js-search-results').addClass('list-search-results');

        $.getJSON("/index.json", function (data) {
            $.each(data, function (key, item) {
                index.add({
                    id: item.id,
                    title: item.title,
                    body: item.body
                });

                store[item.id] = {title: item.title, ref: item.id}
            });
        });

        $('.js-search-input').keyup(function () {
            var query = $(this).val(),
                results = index.search(query);

            if (!results.length) {
                searchResults.empty();
                return;
            }

            var resultsList = results.reduce(function (ul, result) {
                var item = store[result.ref];
                var li = $('<li>').append($('<a>', {
                    href: item.ref + '#' + query,
                    text: item.title
                }));
                ul.append(li);

                return ul;
            }, $('<ul>'));

            searchResults.html(resultsList);
        })
    })
</script>
</body>
