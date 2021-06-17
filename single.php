<!-- for single blog posts -->


<?php get_header('compact'); ?>	
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
    	<div class="row justify-content-center">
    		<div style="max-width: 800px;">
    		    <div class="mt-2 d-flex justify-content-center align-items-center">
                    <?php foreach (get_the_category() as $category): ?>
    			        <a class="post-category mx-2 px-2 pt-1" href="/category/<?php echo $category->slug; ?>">
                            <?php echo $category->name; ?>
                        </a>
                	<?php endforeach; ?>
    		    </div>
                <div class="text-center mb-3"> <h1 class="post-title"><?php the_title(); ?></h1></div>
                <div class="justify-content-center my-2 d-flex">
                <?php if(has_post_thumbnail()):?>
                    <?php the_post_thumbnail('full'); ?>
                <?php endif;?>
		        </div>
		        <!-- artist -->
		        <?php if (!empty(get_the_terms(get_the_ID(), 'artists'))): ?>
		            <div class="d-flex justify-content-center">
		                <span class="text-caption">Art by 
		                    <?php foreach(get_the_terms(get_the_ID(), 'artists') as $artist): ?>
		                        <a class="no-hover text-dark font-weight-normal" href="/artists/<?php echo $artist->slug; ?>"><?php echo $artist->name; ?></a>
		                    <?php endforeach; ?>
		                </span>
		            </div>    
		        <?php endif; ?>
		        <!-- desktop author/date -->
                <div class="d-none d-md-flex justify-content-between border-bottom">
                    <span class="post-subtitle">By <strong class="text-dark">
                        <?php foreach (get_the_terms(get_the_ID(), 'authors') as $author): ?>
                            <a class="no-hover text-dark" href="/authors/<?php echo $author->slug; ?>"><?php echo $author->name ?></a>
                        <?php endforeach; ?></strong>
                    </span>
                    <span class="post-subtitle"><?php if (!empty(get_the_terms(get_the_ID(), 'issues'))) { echo '<a class="no-hover post-subtitle hover-black" href="/issues/'; echo get_the_terms(get_the_ID(), 'issues')[0]->slug; echo '">'; echo get_the_terms(get_the_ID(), 'issues')[0]->name; echo " Issue</a>"; } else { echo get_the_date('F j, Y'); } ?></span>
                </div>
                <!-- mobile author/date -->
                <div class="d-block d-md-none border-bottom">
                    <p class="post-subtitle mb-2">By <?php foreach (get_the_terms(get_the_ID(), 'authors') as $author): ?>
                            <a class="no-hover text-dark" href="/authors/<?php echo $author->slug; ?>"><?php echo $author->name ?></a>
                        <?php endforeach; ?>
                    </p>
                    <p class="post-subtitle mb-1"><?php if (!empty(get_the_terms(get_the_ID(), 'issues'))) { echo '<a class="no-hover post-subtitle hover-black" href="/issues/'; echo get_the_terms(get_the_ID(), 'issues')[0]->slug; echo '">'; echo get_the_terms(get_the_ID(), 'issues')[0]->name; echo " Issue</a>"; } else { echo get_the_date('F j, Y'); } ?></p>
			    </div>
			    <!-- content -->
                <div class="post-text my-2">
                <?php if (have_posts()) : while(have_posts()) : the_post();?>
                    <?php the_content();?>
                <?php endwhile; endif; ?>
                </div>
                <!-- tags and related posts -->
    		    <div class="my-2 d-flex justify-content-center align-items-center">
                    <?php foreach (wp_get_post_tags(get_the_ID()) as $tag): ?>
    			        <a class="post-tag mx-2 px-2 py-1" href="/tag/<?php echo $tag->slug; ?>">
                            <?php echo $tag->name; ?>
                        </a>
                	<?php endforeach; ?>
    		    </div>
    		</div>
        </div>
        <div class="row my-5 justify-content-center">
    		<div class="row my-3 justify-content-center" style="max-width: 1400px;">
    		    <?php
    		        $current_id = get_the_ID();
                    $related_search = array(
                        's' => sprintf("%s %s", strip_tags(get_the_category_list(' ')), strip_tags(get_the_tag_list(' '))),
                    );
                    $query = new WP_Query();
                    $query->parse_query($related_search);
                    relevanssi_do_query($query);
                    $posts_displayed = 0;
                    while ($query->have_posts() && $posts_displayed < 14): 
                        $query->the_post(); 
                        if (get_the_ID() != $current_id):
                            $posts_displayed++;
                            
                ?>  
                    <div class="col-md-6 py-2">
                    <div class="row flex-row-reverse">
                        <?php if (get_the_post_thumbnail_url()): ?>
        				<div class="col-md-4 py-2">
    			    		<a href="<?php the_permalink(); ?>">
        						<?php the_post_thumbnail( 'left-thumb' ); ?>
        					</a>
        				</div>
        				<?php endif; ?>
    			        <div class="col-md">
    			            <h5 class="card-title"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <div><?php the_excerpt(); ?></div>
                           <?php /* <div class="search-subtitle">
                				<span class="mr-1">
            				        By <strong><?php foreach (get_the_terms(get_the_ID(), 'authors') as $author): ?>
                                    <a class="no-hover text-dark" href="/authors/<?php echo $author->slug; ?>"><?php echo $author->name ?></a>
                                    <?php endforeach; ?></strong>
                                </span>
                				<span><?php if (!empty(get_the_terms(get_the_ID(), 'issues'))) { echo '<a class="no-hover search-subtitle hover-black" href="/issues/'; echo get_the_terms(get_the_ID(), 'issues')[0]->slug; echo '">'; echo get_the_terms(get_the_ID(), 'issues')[0]->name; echo " Issue</a>"; } else { echo get_the_date('F j, Y'); } ?></span>
            			    </div> */ ?>
                        </div>
    			    </div></div>
                <?php 
                        endif;
                    endwhile;
                ?>
            </div>
        </div>
    </div>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
