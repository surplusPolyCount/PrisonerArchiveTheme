<?php get_header();?>
<?php $the_query = new WP_Query( 'posts_per_page=30' );?>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
<div class="row pt-3">
    <?php 
          $args = array('post_type'=>'prisoner_submission', 'posts_per_page'=>3);
          $new_query = new WP_Query($args); 
          $new_query->the_post(); 

    ?>
    <h2><?php echo the_title();?></h2>
    
    <!-- AUTHOR TERMS --> 
    <h2>
    <?php 
        $author_terms = get_the_terms( $post->ID, 'authors');
        echo($author_terms[0]->name); 
    ?>
    </h2>

    <!-- DATE TERMS --> 
    <h2>
    <?php 
        $date_terms = get_the_terms( $post->ID, 'date_sent' );    
        echo $date_terms[0]->name;
    ?>
    </h2> 

    <!-- PENPAL TERMS--> 
    <h2>
    <?php 
        $date_terms = get_the_terms( $post->ID, 'wants_penpal' );    
        echo $date_terms[0]->name;
    ?>
    </h2>

    <!-- ADDRESS TERMS --> 
    <h2><?php echo(post_address($post->ID, 'address'));?></h2>
    </br>

    <!-- PDF TERMS -->
    <?php $img = get_post_meta($post->ID, 'wp_custom_attachment', true); ?>
        <a href="<?php echo($img['url']); ?>">access the pdf directly through this </a>

</div>

<?php get_footer(); ?>
