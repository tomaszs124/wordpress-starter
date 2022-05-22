<?php

get_header();
?>
<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?>
    <article>
        <div class="wrapper">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();