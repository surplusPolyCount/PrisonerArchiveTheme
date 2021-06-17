<?php get_header('compact'); ?>
<div class="d-flex justify-content-center" style="min-height: 100vh; background-color: #040404; background-image: url('/images/davis-web.jpg'); background-size: 100% auto; background-repeat: no-repeat;">
    <div>
        <div class="justify-content-center d-none d-md-flex">
            <div class="d-none d-md-block text-white pl-5 pt-5 w-75">
            	<h1 class="mx-3" style="font-weight: 900;">Angela Davis</h1>
            	<h2 class="mx-3"><i>April 30</i></h2>
            	<h2 class="mx-3"><i>4-6pm Straub 156</i></h2>
            </div>
        </div>
        <div class="d-md-none text-white pl-3 pt-5 w-100">
        	<h1 style="font-weight: 900;">Angela Davis</h1>
        	<h2><i>April 30</i></h2>
        	<h2><i>4-6pm Straub 156</i></h2>
        </div>
        <div class="text-white">
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
                <div class="justify-content-center d-none d-md-flex">
                    <div class="w-75">
                    	<div class="ml-5 d-none d-md-block w-50 p-2 px-3" style="background-color: rgba(0, 0, 0, 0.6);"> 
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            	<div class="d-md-none p-2 px-3" style="background-color: rgba(0, 0, 0, 0.6);"> 
                    <?php the_content();?>
                </div>
            <?php endwhile; endif; ?>
        </div>
        </div>
</div>
<?php get_footer(); ?>
