# Bookdown Project

This forms a skeleton Bookdown production project, with an eye toward publishing via Github Pages.

First, clone the repository you want to work in, called `{$REPO}`. This may be a user/organization repository (`organization.github.io`) or a Github project `gh-pages` branch.

Then use composer to install the Bookdown project as a subdirectory inside `{$REPO}`. We suggest `_bookdown` since Github Pages will not publish directory-prefixed paths.

    cd {$REPO}
    composer create-project -s dev bookdown/project _bookdown
    cd _bookdown

Generate the example project:

    ./vendor/bin/bookdown book/bookdown.json

This will generate the example HTML files at the root of `{$REPO}`.

To browse the example HTML, run the built-in PHP server:

    php -S localhost:8080 -t {$REPO}

Edit the `templates/head.php` file to modify the `<head>` on all generated files.

Edit the `book/bookdown.json` file to add your own `book/` content, including both Markdown and other `bookdown.json` files.

You may wish to add the following lines to `{$REPO}/.gitignore`:

    /_bookdown/vendor

Then `git add` the `_bookdown/` directory along with the generated files, and push to publish.
