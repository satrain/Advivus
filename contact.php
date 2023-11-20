<?php /* Template Name: Contact Template */
get_header() ?>

<header class="header header--small header--contact">
    <div class="container">
        <div class="header__wrap">
            <div class="header__item">
                <h3 class="heading-gold">
                    Feel Free To Reach Out
                </h3>

                <h1 class="heading-primary">
                    Contact Advivus
                </h1>

                <p class="header-paragraph">
                    Whether you are a publisher or an advertiser, our team is ready to help you in every step of the onboarding process. Advivus is the transparent and reliable network. Read more about us and see for yourself how we can help your business reach new goals quickly.
                </p>
            </div>

            <div class="header__item">
                <div class="header__text">
                    <span></span>

                    <h6>
                        Hong Kong Office
                    </h6>

                    <address>
                        7F, MW Tower<br>
                        111 Bonham Strand<br>
                        Sheung Wan<br>
                        Hong Kong
                    </address>

                    <h6>
                        Email
                    </h6>

                    <a href="mailto:support@advivus.com">
                        support@advivus.com
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="start">
        <div class="container-fluid-2">
            <div class="start__wrap">
                <div class="start__item">
                    <h2 class="heading-secondary">
                        Start your affiliate journey today!
                    </h2>

                    <p class="paragraph-mid">
                        Excited to explore the opportunities of affiliate marketing and elevate your digital experience? Reach out to us now and let's start this journey together. Advertisers and Affiliates - success awaits you here
                    </p>

                    <div class="start__buttons">
                        <a href="#" class="btn btn-tertiary">
                            affiliate sign up
                        </a>

                        <a href="#" class="btn btn-quaternary">
                            advertiser sign up
                        </a>
                    </div>
                </div>

                <div class="start__item">
                    <img src="<?= get_template_directory_uri() ?>/img/section-start.jpg" alt="start image">
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>