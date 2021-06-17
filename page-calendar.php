<?php get_header('compact'); ?><!--uses function in wp library to get header file-->	

<!-- simple calendar styling -->
<style>
.simcal-current-year {
    letter-spacing: -0.05em;
    font-weight: 300;
    color: #000;
}
.simcal-current-month {
    letter-spacing: -0.05em;
    font-weight: 900;
    color: #000;
}
</style>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
	<div class="row justify-content-center">
		<div style="max-width: 800px;">
                    <div class="my-2">
                    <?php if (have_posts()) : while(have_posts()) : the_post();?>
                        <?php the_content();?>
                    <?php endwhile; endif; ?>
                    </div>
		    <div class="my-2 d-flex justify-content-center align-items-center">
                        <?php foreach (wp_get_post_tags(get_the_ID()) as $tag): ?>
			    <a class="post-tag mx-2 px-2 py-1" href="/?s=<?php echo $tag->name; ?>">
                                <?php echo $tag->name; ?>
                            </a>
			<?php endforeach; ?>
		    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?><!--uses function in wp library to get footer file-->
