<?php get_header('compact'); ?><!--uses function in wp library to get header file-->	
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
	<div class="row justify-content-center">
		<div style="max-width: 800px;">
                    <div class="text-center my-2"> <h2 class="search-title"><?php the_title(); ?></h1></div>
                    <div class="my-2">
                    <?php if (have_posts()) : while(have_posts()) : the_post();?>
                        <?php 
                        echo '<p>';
                        eo_the_start();
                        echo ' - ';
                        eo_the_end(); 
                        echo '</p>';
                        eo_venue_name();
                        eo_venue_description();
                        the_content();
                        ?>
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
