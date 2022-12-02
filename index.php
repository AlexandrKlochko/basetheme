<?php get_header(); ?>
    <div id="main-block" class="container-fluid px-4 py-0 main-block">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): ?>
                <div class="container py-4 ">
                    <?php the_post(); ?>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>