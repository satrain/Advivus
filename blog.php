<?php /* Template Name: Blog Template */ 
get_header() ?>

<?php 
// get blog latest post
$latest_post = get_posts( array(
    'numberposts' => 1,
    'orderby'     => 'date',
    'order'       => 'DESC',
) );


// exclude latest post when displaying all the posts (that post is being displayed separately above all posts section)
$exclude_post_id = ! empty( $latest_post ) ? $latest_post[0]->ID : 0;

// get all blog posts
$current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'paged'          => $current_page,
    'post__not_in'   => array( $exclude_post_id ),
);

$blog_posts = new WP_Query( $args );

?>

<header class="header header--small header--blog">
    <div class="container">
        <div class="header__wrap">
            <div class="header__item">
                <h1 class="heading-primary">
                    The Affiliate Marketing Blog
                </h1>

                <p class="header-paragraph">
                    Knowledge about buying and selling internet traffic.
                </p>
            </div>
        </div>
    </div>
</header>

<main>
    <?php if ( $latest_post ): ?>
    <section class="featured_blog">
        <div class="container">
            <?php foreach($latest_post as $post): 
                
                setup_postdata( $post );
                $post_url = get_permalink( $post->ID );
                $post_date = get_the_date('M j, Y');
                $categories = get_the_category();
                $category_names = array();
                foreach ( $categories as $category ) {
                    $category_names[] = $category->name;
                }

                $author_name = get_the_author_meta( 'display_name' );
                $featured_image_url = get_the_post_thumbnail_url( $post->ID, 'large' );

                $custom_excerpt = generate_custom_excerpt( get_the_content(), 30 );
            ?>
            <div class="featured_blog__wrap">
                <img src="<?= esc_url( $featured_image_url ) ?>" alt="featured blog">

                <div class="featured_blog__info">
                    By
                    <span>
                        <?= $author_name ?>
                    </span>
                    |
                    <span>
                        <?= $post_date ?>
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

                <h2 class="heading-blog">
                    <?= get_the_title() ?>
                </h2>

                <p class="paragraph-blog">
                    <?= $custom_excerpt  ?>
                </p>

                <a href="<?= $post_url ?>" class="btn btn-tertiary">
                    Read FUll Article
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="more_posts">
        <div class="container">
            <div class="more_posts__wrap">
                <h2>
                    Read More Blog Posts
                </h2>
                <div class="more_posts__grid">
                    <?php if( $blog_posts->have_posts() ):
                    while( $blog_posts->have_posts() ):    
                    $blog_posts->the_post();
                    $post_date = get_the_date( 'd/m/Y' );
                    $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    $post_permalink = get_permalink();
                    ?>
                    <a href="<?= $post_permalink ?>" class="more_posts__item">
                        <img src="<?= $featured_image_url ?>" alt="blog post image">

                        <h5 class="header-gradient">
                            <?= get_the_title() ?>
                        </h5>

                        <div class="more_posts__item__info">
                            <span>
                                <?= $post_date ?>
                            </span>

                            <span>
                                5 minute read
                            </span>
                        </div>
                    </a>
                    <?php endwhile; 

                    // Pagination
                    $big = 999999999; // need an unlikely integer

                    echo '<div class="pagination">';
                    echo paginate_links( array(
                        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'  => '?paged=%#%',
                        'current' => max( 1, $current_page ),
                        'total'   => $blog_posts->max_num_pages,
                    ) );
                    echo '</div>';
                    
                    wp_reset_postdata();
                        
                    endif; ?>
                </div>

                <div class="more_posts__pagination">
                    <a class="more_posts__pagination__item disabled" href="#">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.354 1.64592C11.4006 1.69236 11.4375 1.74754 11.4627 1.80828C11.4879 1.86903 11.5009 1.93415 11.5009 1.99992C11.5009 2.06568 11.4879 2.13081 11.4627 2.19155C11.4375 2.2523 11.4006 2.30747 11.354 2.35392L5.70701 7.99992L11.354 13.6459C11.4479 13.7398 11.5006 13.8671 11.5006 13.9999C11.5006 14.1327 11.4479 14.26 11.354 14.3539C11.2601 14.4478 11.1328 14.5005 11 14.5005C10.8672 14.5005 10.7399 14.4478 10.646 14.3539L4.64601 8.35392C4.59945 8.30747 4.5625 8.2523 4.5373 8.19155C4.51209 8.13081 4.49911 8.06568 4.49911 7.99992C4.49911 7.93415 4.51209 7.86903 4.5373 7.80828C4.5625 7.74754 4.59945 7.69236 4.64601 7.64592L10.646 1.64592C10.6925 1.59935 10.7476 1.56241 10.8084 1.5372C10.8691 1.512 10.9342 1.49902 11 1.49902C11.0658 1.49902 11.1309 1.512 11.1916 1.5372C11.2524 1.56241 11.3076 1.59935 11.354 1.64592Z" fill="black"/>
                        </svg>
                    </a>

                    <a class="more_posts__pagination__item active" href="#">
                        1
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        2
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        3
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        4
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        5
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        ...
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        11
                    </a>

                    <a class="more_posts__pagination__item" href="#">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64602 14.3541C4.59946 14.3076 4.56252 14.2525 4.53731 14.1917C4.5121 14.131 4.49913 14.0659 4.49913 14.0001C4.49913 13.9343 4.5121 13.8692 4.53731 13.8084C4.56252 13.7477 4.59946 13.6925 4.64602 13.6461L10.293 8.00008L4.64602 2.35408C4.55213 2.2602 4.49939 2.13286 4.49939 2.00008C4.49939 1.86731 4.55213 1.73997 4.64602 1.64608C4.73991 1.5522 4.86725 1.49945 5.00002 1.49945C5.1328 1.49945 5.26013 1.5522 5.35402 1.64608L11.354 7.64608C11.4006 7.69253 11.4375 7.7477 11.4627 7.80845C11.4879 7.86919 11.5009 7.93432 11.5009 8.00008C11.5009 8.06585 11.4879 8.13097 11.4627 8.19172C11.4375 8.25246 11.4006 8.30764 11.354 8.35408L5.35402 14.3541C5.30758 14.4006 5.2524 14.4376 5.19166 14.4628C5.13091 14.488 5.06579 14.501 5.00002 14.501C4.93425 14.501 4.86913 14.488 4.80839 14.4628C4.74764 14.4376 4.69247 14.4006 4.64602 14.3541Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>