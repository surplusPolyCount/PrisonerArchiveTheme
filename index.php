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
        $args = array('post_type'=>'prisoner_submission', 'posts_per_page'=>6);
        //use $args variables to query for the unique post type
        $new_query = new WP_Query($args); 
        //dequeue the first post from the query
        //$new_query->the_post(); 
        //all functions below use properties from dequed post 
        //(even though not explicitly typed)
        while($new_query -> have_posts() ):$new_query -> the_post();     
    ?>

<!-- EXAMPLES: (for source, go to line 445 and below in functions.php)
    <?php $currentAuthor = get_sub_author($post->ID); ?>
    <?php $currentDate = get_sub_date($post->ID);?>
    <?php $currentPenpal =get_sub_penpal($post->ID);?>
    <?php $currentCity = get_sub_address($post->ID)['city'];?>
    <?php $currentStreet = get_sub_address($post->ID)['street'];?>
    <?php $currentZip = get_sub_address($post->ID)['zip'];?>
    <?php $currentState = get_sub_address($post->ID)['state'];?> -->

    <div class="card border-dark m-3" style="width: 18rem;">
        <div class="card-body card-background-main text-dark">
            <h5 class="card-title card-text-main text-center px-0"><?php the_title();?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item card-background-secondary card-text-secondary"><?php print(get_sub_author($post->ID));?></li>
            <li class="list-group-item card-background-secondary card-text-secondary"><?php print(get_sub_date($post->ID));?></li>
            <li class="list-group-item card-background-secondary card-text-secondary"><?php print(get_sub_address($post->ID)['street']);?>
                <br> 
                <?php print(get_sub_address($post->ID)['city'] . ", " . get_sub_address($post->ID)['state']);?>
                <br> 
                <?php print(get_sub_address($post->ID)['zip']);?></li>
        </ul>
        <div class="card-body card-background-tertiary">
            <a href="<?php echo(get_sub_pdflink($post->ID)); ?>" class="card-link">Access the PDF here</a>
        </div>
    </div>
    <?php endwhile;?>
</div>

<?php get_footer(); ?>
