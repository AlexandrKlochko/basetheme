<footer class="site-footer">
    <div class="container py-4">
        <div class="row py-4 text-center">
            <?php if ($contacts = get_field('contacts', 'option')): ?>
                <div class="col-md-6 col-12 text-white text-md-left px-0">
                    <div class="col-12">
                        <h3><?php _e('Contact', '_simpletheme') ?></h3>
                    </div>
                    <div class="col-12 py-2">
                        <?php echo $contacts ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($form = get_field('newsletters_form', 'option')): ?>
                <div class="col-md-6 col-12 text-white text-md-right px-0">
                    <div class="col-12">
                        <h5><?php _e('Subscribe to our newsletters', '_simpletheme') ?></h5>
                    </div>
                    <div class="col-12 py-2">
                        <?php echo $form ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row pt-4 text-center">
            <div class="col-md-6 col-12 text-danger text-md-left px-0 py-2 d-flex">
                <?php if (have_rows('social_icons', 'option')): ?>
                    <?php while (have_rows('social_icons', 'option')): the_row(); ?>
                        <?php $icon = get_sub_field('icon');
                        $link = get_sub_field('link'); ?>
                        <div class="col">
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['title'] ?>">
                                <img src="<?php echo wp_get_attachment_thumb_url($icon['ID']) ?>"/>
                            </a>
                        </div>
                    <?php endwhile ?>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-12 text-white text-md-right px-0  pt-2">
                <div class="col-12">
                    <?php _e('© ', '_simpletheme') ?><?php echo date('Y') ?><?php _e('. All rights reserved.', '_simpletheme') ?><?php echo bloginfo('name') ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
