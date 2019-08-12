<?php
declare(strict_types=1);

function elixir($path) {
    return $path;
}

$break = 'point';

return function (string $app, array $posts): void { ?>
    <!DOCTYPE html>
    <html lang="en" data-ng-app="CodeReviewApp">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta name="robots" content="noindex, nofollow">
        <title>Latchel Code Review</title>

        <!-- <link href="https://fonts.googleapis.com/css?family=News+Cycle|Open+Sans:300,400" rel="stylesheet">-->
        <link rel="stylesheet" href="<?= elixir('css/' . $app . '.css') ?>">

        <!-- ng-cloak -->
        <style type="text/css">
            [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
                display: none !important;
            }

            .lat-ng-container {
                text-decoration: none;
                padding: 8px;
                margin: 12px;
                border: crimson solid 2px;
            }
        </style>
    </head>


    <body>

    <div class="header" data-ng-include="includes/header.html"></div>

    <h1>AngularJS PHP blog</h1>

    <div class="content">
        <?php foreach ($posts as $post) { ?>
            <post post-id="<?= $post->post_id ?>" user-name="<?= $post->user->name ?>">
                <?= $post->html ?>
            </post>
        <?php } ?>
    </div>

    <div class="footer" data-ng-include="includes/footer.html"></div>

    <script src="js/vendor.js"></script>
    <script src="<?= elixir('js/' . $app . '.js') ?>"></script>

    </body>
    </html>

<?php };

