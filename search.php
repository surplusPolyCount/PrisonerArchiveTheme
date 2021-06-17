<?php get_header('compact'); ?>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">

<div class="d-flex justify-content-center">
	<div class="col-md-8 px-2">

<div class="card-body px-0"><h2 class="search-title">Search results for "<?php echo get_search_query(); ?>"</h1></div>
<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Display post content ?>
		<div class="card border-0">
                        <div style="margin: auto;">
                            <a href=<?php the_permalink(); ?>>
                            </a>
                        </div>
                <div class="card-body px-0 mb-2 border-bottom">
    			    <div class="row flex-row-reverse">
        				<div class="col-md-4 col-md-push-8 py-2">
    			    		<a href="<?php the_permalink(); ?>">
        						<?php the_post_thumbnail( 'left-thumb' ); ?>
        					</a>
        				</div>
    			        <div class="col-md-8 col-md-pull-4">
    			            <h5 class="card-title"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div><?php the_standard_excerpt(); ?></div>
                            <div class="search-subtitle">
                				<span class="mr-1">
            				        By <strong><?php foreach (get_the_terms(get_the_ID(), 'authors') as $author): ?>
                                    <a class="no-hover text-dark" href="/authors/<?php echo $author->slug; ?>"><?php echo $author->name ?></a>
                                    <?php endforeach; ?></strong>
                                </span>
                				<span><?php if (!empty(get_the_terms(get_the_ID(), 'issues'))) { echo '<a class="no-hover search-subtitle hover-black" href="/issues/'; echo get_the_terms(get_the_ID(), 'issues')[0]->slug; echo '">'; echo get_the_terms(get_the_ID(), 'issues')[0]->name; echo " Issue</a>"; } else { echo get_the_date('F j, Y'); } ?></span>
            			    </div>
                        </div>
    			    </div>
    			    
    			</div>
		</div>
<?php
    endwhile; 
else:?>
<div class="card-body">
	<p>No results found!</p>
</div>
<?php 
endif; 
?>
	</div>
</div>

    <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
