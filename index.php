<?php get_header();?>
<?php $the_query = new WP_Query( 'posts_per_page=30' );?>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
<div class="row pt-3">
    <div class="col md-8 px-2 pb-3">
        <!-- top row -->
        <div class="row pb-3">
            <!-- left col -->
            <div class="col-lg h-100 px-1">
                <!-- upper left -->
                <?php if($the_query -> have_posts()): $the_query -> the_post();?>
                    <div class="card border-0"  style="width:100%;">
                        <div style="width: 100%; height: 200px; margin: auto;">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'left-thumb' ); ?>
                            </a>
                        </div>
                        <div class="card-body p-1 px-2">
                            <h5 class="card-title pt-2"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                            <!-- desktop excerpt -->
                            <div class="d-none d-lg-block">
                                <?php the_shortest_excerpt(); ?>
                            </div>
                            <!-- mobile excerpt -->
                            <div class="d-block d-lg-none">
                                <?php the_short_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            
                <!-- lower left -->
                <?php if($the_query -> have_posts()): $the_query -> the_post();?>
                    <div class="card border-0"  style="width:100%;">
                        <div style="width: 100%; height: 200px; margin: auto;">
                            <a href=<?php the_permalink(); ?>>
                                <?php the_post_thumbnail( 'left-thumb' ); ?>
                            </a>
                        </div>
                        <div class="card-body p-1 px-2">
                            <h5 class="card-title pt-2"><strong><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></strong></h5>
                            <!-- desktop excerpt -->
                            <div class="d-none d-lg-block">
                                <?php the_shortest_excerpt(); ?>
                            </div>
                            <!-- mobile excerpt -->
                            <div class="d-block d-lg-none">
                                <?php the_short_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif;?>

            </div>
            <!-- middle col -->
            <div class="col-lg-5 h-100 px-1">
                <?php if($the_query -> have_posts()): $the_query -> the_post();?>
                <div class="h-100 px-1">
                    <div class="card border-top-0 border-bottom-0 px-3">
                        <a href="#"><h3 class="card-title"><strong><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></strong></h3></a>

                        <a href=<?php the_permalink(); ?>>
                            <?php the_post_thumbnail( 'left-thumb' ); ?>
                        </a>
                        <div class="card-body card-body p-0 pb-3">
                            <p class="card-text"> <?php the_long_excerpt(); ?></p>
                        </div>
                    </div>
                </div> 
                <?php endif;?>
            </div>
            <!-- right col -->
            <div class="col-lg h-100 px-1">
                <!-- special feature -->
                <div class="card border-top-0 border-right-0 border-left-0 mx-3" style="width:%; height:%;">
                    <div class="card-body">
                        <a class="text-black no-hover" href="https://studentinsurgent.org/issues/may-2020/"><h5 class="card-title"><strong class="text-condensed">Covid-19 zine out now!</strong></h5>
                        <p class="card-text">Read online or print and fold at home</p></a>
                    </div>
                </div>
                <!-- condensed list of article titles -->
                <?php for($row_condensed = 0; $row_condensed < 3; $row_condensed++): ?>
                    <div class="row m-0 p-0">
                        <?php for($condensed = 0; $condensed < 2; $condensed++): ?>
                            <div class="col-md h-100 px-2">
                                <?php if($the_query -> have_posts()): $the_query -> the_post();?>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></strong></h5>
                                            <p class="card-text"></p>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
        <?php for($page_count = 0; $page_count < 3; $page_count++): if ( $page_count % 2 == 0 ) { ?>
            <div class="row pb3 p-0 border-bottom">
            <!--second row / long list of articles -->
                <?php for($i = 0; $i < 6; $i++):
                    if($the_query -> have_posts()): $the_query -> the_post();
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
                                <div><?php the_standard_excerpt(); ?></div>
                            </div>
        			    </div>
    			    </div>
    			 
                <?php endif; endfor; ?>
            </div>
        <!-- end of long list of articles-->
        </div>
        <?php } else { ?>
        <!-- new row -->
            <div class="row pb3 p-0 border-bottom justify-content-center">
            <!--second row / long list of articles -->
                <?php for($i = 0; $i < 6; $i++):
                    if($the_query -> have_posts()): $the_query -> the_post();
                    ?>
                    <div class="col-md-8 py-2">
                        <div class="row">
            				<div class="col-md-4 py-2">
        			    		<a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'left-thumb' ); ?>
            					</a>
            				</div>
        			        <div class="col-md">
        			            <h5 class="card-title"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5>
                                <div><?php the_standard_excerpt(); ?></div>
                            </div>
        			    </div>
    			    </div>
    			 
                <?php endif; endfor; ?>
            </div>
        <!-- end of long list of articles-->
        </div>
    <?php } endfor; ?>
</div>

<?php get_footer(); ?>
