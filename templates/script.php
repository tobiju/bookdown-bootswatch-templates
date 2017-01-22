<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015-2016 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */
?>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lunr.js/0.6.0/lunr.min.js"></script>
<script src="http://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="https://tobiju.github.io/share/prismjs/main.js"></script>
<script src="https://tobiju.github.io/share/prismjs/prism.js"></script>
<script type="text/javascript">

    function Search() {
        this.store = {};
        this.index = lunr(function () {
            this.ref('id');
            this.field('title', {boost: 10});
            this.field('content');
        });
        this.searchResults = $('.js-search-results').addClass('list-search-results');
    }

    Search.prototype = {
        constructor: Search,
        init: function () {
            this.createIndex();
            this.bindEvents();
        },
        createIndex: function () {
            var $this = this,
                indexFilePath = $('.js-search-input').data('roothref') + 'index.json';

            $.getJSON(indexFilePath, function (data) {
                $.each(data, function (key, item) {
                    $this.index.add({
                        id: item.id,
                        title: item.title,
                        content: item.content
                    });

                    $this.store[item.id] = {
                        href: item.id,
                        title: item.title,
                        content: item.content
                    }
                });
            });
        },
        bindEvents: function () {
            var $this = this;

            $('html')
                .on('click', function (event) {
                    $this.close($(this), event);
                });

            $('.js-search-input, .js-search-results')
                .on('click', function (event) {
                    $this.click($(this), event);
                });

            $('.js-search-input')
                .on('focus', function (event) {
                    $this.focus($(this), event);
                })
                .on('keyup', function (event) {
                    $this.search($(this), event)
                })
                .on('keydown', function (event) {
                    if ($('.js-search-results ul').is(':visible')){
                        $this.navigation($(this), event)
                    }
                })
        },
        click: function (element, event) {
            event.stopPropagation();
        },
        focus: function (element, event) {
            this.searchInputWidth = element.css('width');
            element.animate({
                'width': 600
            }, 500);
            $('#js-navbar-collapse > ul').fadeOut();
        },
        close: function (element, event) {
            var $this = this;

            $('.js-search-results').hide();
            $('.js-search-input').animate({
                'width': $this.searchInputWidth
            }, 500);
            $('#js-navbar-collapse > ul').fadeIn();
        },
        search: function (element, event) {
            var $this = this;

            if (event.keyCode == 13 || event.keyCode == 38 || event.keyCode == 40) {
                return;
            }

            var query = element.val(),
                results = $this.index.search(query);

            if (!results.length) {
                $this.searchResults.empty();
                return;
            }

            var resultsList = results.reduce(function (ul, result) {
                var item = $this.store[result.ref];
                var title = $('<b>').text(item.title);

                var cropText = $this.cropText(item.content, query);
                if (cropText.length === 0) {
                    cropText = $('<p>').html(item.content.substring(0, 120) + "...");
                }
                var content = content = $('<p>').html(cropText);

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

            this.searchResults.html(resultsList);

            $('.js-search-results').show();
            $(".js-search-results li:first-child").addClass('selected');
        },
        cropText: function (content, query) {
            var cropedText = '',
                re = new RegExp("\\s?(.{0,30})?" + query + ".*?\\b(.{0,30}.)?\\s?", "gi");

            $.each(content.match(re), function (key, value) {
                cropedText += '...' + value + '...';
            });

            return cropedText;
        },
        navigation: function (element, event) {
            var selected = null,
                listSelector = ".js-search-results ul",
                listItemSelector = listSelector + " li",
                selectedListItemSelector = listItemSelector + ".selected",
                selectedListItemSelectorAnchor = listItemSelector + ".selected a";

            // enter
            if (event.keyCode == 13) {
                event.preventDefault();
                this.close();
                window.location.replace($(selectedListItemSelectorAnchor).attr('href'));
            }

            // up
            if (event.keyCode == 38) {
                selected = $(selectedListItemSelector);
                $(listItemSelector).removeClass("selected");

                if (selected.prev().length == 0) {
                    selected.siblings().last().addClass("selected");
                } else {
                    selected.prev().addClass("selected");
                }

                selected = $(selectedListItemSelector);
                this.scrollListUp(selected);
            }

            // down
            if (event.keyCode == 40) {
                selected = $(selectedListItemSelector);
                $(listItemSelector).removeClass("selected");

                if (selected.next().length == 0) {
                    selected.siblings().first().addClass("selected");
                } else {
                    selected.next().addClass("selected");
                }

                selected = $(selectedListItemSelector);
                this.scrollListDown(selected);
            }
        },
        scrollListDown: function (element) {
            var ul = element.parent(),
                ulHeight = ul.height(),
                ulBottomPosition = ulHeight + ul.scrollTop(),
                liBottomPosition = element.position().top + element.height();

            if (liBottomPosition > ulBottomPosition) {
                ul.scrollTop(liBottomPosition - ulHeight);
            }

            if (element.is(':first-child')) {
                ul.scrollTop(0);
            }
        },
        scrollListUp: function (element) {
            var ul = element.parent(),
                ulTopPosition = ul.scrollTop(),
                liTopPosition = element.position().top;

            if (liTopPosition < ulTopPosition) {
                ul.scrollTop(element.position().top);
            }

            if (element.is(':last-child')) {
                ul.scrollTop(element.position().top - element.height());
            }
        }
    };

    $(function () {
        var search = new Search();
        search.init();
    });
</script>
