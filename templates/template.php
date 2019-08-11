<?php

function elixir($path) {
    return $path;
}

return function ($app, $posts) { ?>
    <!DOCTYPE html>
    <html lang="en" data-ng-app="CodeReviewApp">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta name="robots" content="noindex, nofollow">
        <title>Latchel Code Review</title>

        <link href="https://fonts.googleapis.com/css?family=News+Cycle|Open+Sans:300,400" rel="stylesheet">
        <link rel="stylesheet" href="<?= elixir('css/' . $app . '.css') ?>">
    </head>


    <body>

    <div class="header" data-ng-include="includes/header.html"></div>

    <h1>AngularJS PHP blog</h1>

    <div class="content">
        <?php foreach ($posts as $post) { ?>
            <post post-id="<?= $post->post_id ?>" user-name="<?= $post->user->name ?>">
                <?= $post->html ?>
            </post>
        <? } ?>
    </div>

    <div class="footer" data-ng-include="includes/footer.html"></div>

    <script src="<?= elixir('js/' . $app . '.js') ?>"></script>

    </body>
    </html>
<?php } ?>