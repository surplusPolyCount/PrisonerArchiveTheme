<?php 
    get_header();
    $this_pdf = get_sub_pdflink($post->ID); 
    $this_author = get_sub_author($post->ID);
    $this_addr = get_sub_address($post->ID); 
?>
<div id="contentwide" class="px-0 justify-content-center m-auto w-full">
    <div class="row" style="margin-bottom: 3rem;  padding-bottom: 1rem;border-bottom: 2px solid black;">
        <div class="col-4">
                <h2><?php the_title();?></h2>
                <?php if($this_author):?>
                    <h5> by:<?php echo($this_author);?> </h5>
                <?php endif; ?> 

                <?php if(not_empty($this_addr)):?>
                <h5> from:
                    <?php print($this_addr['street']);?>
                    <br> 
                    <?php print($this_addr['city'] . "  " . $this_addr['state']);?>
                    <br> 
                    <?php print($this_addr['zip']);?></li>
                </h5> 
                <?php endif; ?> 
                <h5> <?php print(get_sub_date($post->ID));?> </h5> 
        </div> 
        <div class="col-8"> 
            <?php if (have_posts()) : while(have_posts()) : the_post();?>
                            <?php the_content();?>
            <?php endwhile; endif; ?>
        </div> 
    </div>
	<div class="row justify-content-center">
		<div style="">
            <?php if($this_pdf):?>
            <iframe src="<?php echo($this_pdf);?>" style="width:1000px; height: 500px;" frameborder="0"></iframe>
            <?php endif;?>
        </div>
    </div>
</div>
<?php get_footer();?>