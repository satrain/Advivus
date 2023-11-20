<?php get_header() ?>

<?php 

$latest_post = get_posts( array(
    'numberposts' => 5,
    'orderby'     => 'date',
    'order'       => 'DESC',
) );

$categories = get_the_category();
$category_names = array();
foreach ( $categories as $category ) {
    $category_names[] = $category->name;
}

// get all categories of all blog posts
$categories = get_categories();

$author_id = get_post_field('post_author');
$author_name = get_the_author_meta('display_name', $author_id);
$avatar_url = get_avatar_url( $author_id, array( 'size' => 150 ) );

?>

<main>
    <section class="blog_single">
        <div class="container">
            <div class="blog_single__wrap">
                <div class="blog_single__header">
                    <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?>" alt="featured blog image">

                    <div class="blog_single__info">
                        By
                        <span>
                        <?= $author_name ?>
                    </span>
                        |
                        <span>
                        <?= get_the_date('M j, Y') ?>
                    </span>
                        |
                        <span>
                        10 minute read
                    </span>
                        |
                        <span>
                        <?= $category_names[0] ?>
                    </span>
                    </div>
                </div>

                <div class="blog_single__grid">
                    <div class="blog_single__item">
                        <div class="blog_single__blog">
                            <!--  Render Blog Here  -->

                            <h1>
                                <?php the_title() ?>
                            </h1>
                            <?php the_content() ?>
                        </div>

                        <div class="blog_single__author">
                            <img src="<?= $avatar_url ?>" alt="author of blog">

                            <div class="blog_single__author__text">
                                <h4>
                                    Written by <?= $author_name ?>
                                </h4>

                                <p>
                                    <?= $author_name ?> is an online marketing specialist and copywriter for Advivus. She has worked intensively with SEO and copywriting for several years in the US market and has since worked for an online marketing agency helping clients to succeed with their online marketing efforts.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="blog_single__recent">
                        <?php if ( $latest_post ): ?>
                            <h3>
                                Recent Blog Posts
                            </h3>

                            <ul>
                                <?php foreach($latest_post as $post): setup_postdata( $post ); ?> 
                                    <li>
                                        <a href="<?= get_permalink( $post->ID ) ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <h3>
                            Categories
                        </h3>

                        <ul>
                            <?php $i=0;
                            foreach($categories as $category): ?>
                                <?php if($i > 4): break; endif; ?>
                                <li>
                                    <a href="<?= get_category_link($category->term_id) ?>">
                                        <?= $category->name ?>
                                    </a>
                                </li>
                            <?php $i++; endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reach">
        <div class="container">
            <div class="reach__wrap">
                <h4>
                    discover the Advivus difference
                </h4>

                <h2>
                    Reach out to one of our Client Success Managers today.
                </h2>

                <p>
                    Let's explore how Advivus can redefine your digital journey and help you achieve your business
                    goals. Welcome to the future of affiliate marketing - welcome to Advivus!
                </p>

                <a class="btn btn-primary" href="contact.html">
                    Contact us
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>