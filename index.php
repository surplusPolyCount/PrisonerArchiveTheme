<?php 
    //gets navbar, and everything above it, as well as
    //external resources that would normally be put into the 
    //HTML <head> tag
    get_header();
?>
<div id="contentwide" class="px-0 justify-content-center m-auto w-full">
    <div class="row pt-3">  
    <?php 
          //establish variables for new query
          $args = array('post_type'=>'prisoner_submission', 'posts_per_page'=>3);
          //use $args variables to query for the unique post type
          $new_query = new WP_Query($args); 
          //dequeue the first post from the query
          $new_query->the_post(); 
          //all functions below use properties from dequed post 
          //(even though not explicitly typed)
    ?>
    <h2>
    <?php
        //example: the function on line 23 can be thought of: 
        //print(the_post().the_title()); 
        echo the_title();
        ?></h2>
    
<!-- EXAMPLES: (for source, go to line 445 and below in functions.php)-->

    <!-- AUTHOR TERMS --> 
    <h2>
        <?php echo(get_sub_author($post->ID)); ?>
    </h2>

    <!-- DATE TERMS --> 
    <h2>
        <?php echo(get_sub_date($post->ID));?>
    </h2> 

    <!-- PENPAL TERMS--> 
    <h2>
        <?php echo(get_sub_penpal($post->ID));?>
    </h2>

    <!-- ADDRESS TERMS --> 
    <h2>
        <?php echo(get_sub_address($post->ID)['city']);?>
    </h2>
    <h2>
        <?php echo(get_sub_address($post->ID)['street']);?>
    </h2>
    <h2>
        <?php echo(get_sub_address($post->ID)['zip']);?>
    </h2>
    <h2>
        <?php echo(get_sub_address($post->ID)['state']);?>
    </h2>
    </br>

    <!-- PDF TERMS -->
    <a href="<?php echo(get_sub_pdflink($post->ID)); ?>">access the pdf directly through this </a>

</div>

<?php get_footer(); ?>
