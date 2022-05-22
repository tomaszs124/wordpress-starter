<?php

get_header();
?>
<?php
if ( have_posts() ):
    while ( have_posts() ): the_post(); ?>
        <div class="page__content">
            <article class="entry">
                <header class="entry__header">
                    <div class="wrapper">
                        <h1 class="h1 post__title">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </header>
                <div class="wrapper">
                    <div class="entry__content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>