<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <link rel="shortcut icon" type="image/png" href="favicon.ico">

    <?php wp_head(); ?>
</head>
<body>
    <div class="nav">
        <div class="container">
            <nav class="nav__wrap">
                <a href="<?= home_url() ?>" class="nav__logo">
                    <img src="img/logo.png" alt="logo">
                </a>

                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="<?= home_url() ?>" class="nav__link">
                            home
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="/about-us/" class="nav__link">
                            about us
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="/blog/" class="nav__link">
                            blog
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="/contact/" class="nav__link">
                            contact us
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="#" class="nav__link btn btn-primary">
                            log in
                        </a>
                    </li>
                </ul>

                <div class="nav__login">
                    <a href="#" class="btn btn-primary">
                        log in
                    </a>
                </div>

                <div class="nav__burger">
                    <div class="nav__burger--line nav__burger--line-1"></div>
                    <div class="nav__burger--line nav__burger--line-2"></div>
                    <div class="nav__burger--line nav__burger--line-3"></div>
                </div>
            </nav>
        </div>
    </div>