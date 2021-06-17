<?php get_header(); ?>
<?php $the_query = new WP_Query();?>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
<div class="d-flex justify-content-center">
	<div class="col-md-8 px-2">

<div class="card-body d-flex justify-content-center"><h2 class="search-title">404</h1></div>
<p class="card-text d-flex justify-content-center mb-5">Page not found.</p>

</div>
</div>
    <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
