<!-- for single blog posts -->

<?php get_header('compact'); ?><!--uses function in wp library to get header file-->	
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Rubik+Mono+One&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">

		<script>
		    
			function toggleDisplay(name) {
				var section = document.getElementById(name);
				section.style.display = (section.style.display == "none") ? "block" : "none";
			}
		</script>
    <div id="contentwide" class="px-0 justify-content-center m-auto w-full">
	<div class="row justify-content-center">
		<div style="max-width: 800px;">
                    <div class="text-center my-2"> <h1 class="post-title" style="font-family: 'Rubik Mono One'; font-weight: 400;">Rogues Gallery</h1></div>
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;" onclick="toggleDisplay('ford')"><img src="/images/heads/allynford.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Allyn Ford</span></a>
                  <div id="ford" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[0])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('ford-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="ford-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[0])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
                  
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;"  onclick="toggleDisplay('lillis')"><img src="/images/heads/charleslillis.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Charles Lillis</span></a>
                  <div id="lillis" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[1])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('lillis-links')" class="no-hover text-condensened p-2" style="cursor: pointer; background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="lillis-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[1])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
                  
                  
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;"  onclick="toggleDisplay('ballmer')"><img src="/images/heads/connieballmer.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Connie Ballmer</span></a>
                  <div id="ballmer" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[2])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a  onclick="toggleDisplay('ballmer-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="ballmer-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[2])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
                  
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;"  onclick="toggleDisplay('gonyea')"><img src="/images/heads/josephgonyea.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Joseph Gonyea</span></a>
                  <div id="gonyea" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[3])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('gonyea-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="gonyea-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[3])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;" onclick="toggleDisplay('aaron')"><img src="/images/heads/marciaaaron.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Marcia Aaron</span></a>
                  <div id="aaron" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[4])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('aaron-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="aaron-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[4])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;" onclick="toggleDisplay('schill')"><img src="/images/heads/michaelschill.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Michael Schill</span></a>
                  <div id="schill" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[5])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('schill-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="schill-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[5])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;"  onclick="toggleDisplay('bragdon')"><img src="/images/heads/peterbragdon.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Peter Bragdon</span></a>
                  <div id="bragdon" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[6])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('bragdon-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="bragdon-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[6])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
<div class="text-center my-2">
                  <a class="no-hover text-black" style="cursor: pointer;"  onclick="toggleDisplay('kari')"><img src="/images/heads/rosskari.jpeg" class="headImg" alt="head"><span class="h3" style="font-family: 'Permanent Marker';">Ross Kari</span></a>
                  <div id="kari" style="text-align: left; display: none;"><?php foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[7])[0]) as $link) { 
                  echo '<p>'; echo $link; echo '</p>'; 
                  } ?>
                  <a onclick="toggleDisplay('kari-links')" class="no-hover text-condensened p-2" style="background-color: red; font-weight: 900; color: #fff; font-style: italic;">View Sources ></a>
                  <div class="mt-2" id="kari-links" style="display: none;"><?php 
                  foreach(explode("\n", explode("BEGINLINKS", explode("BEGINBIO", get_post_meta(get_the_ID(), 'page-specific', true))[7])[1]) as $link) { 
                  echo '<p class="mb-1" ><a href="'; echo $link; echo '">'; echo $link; echo '</a></p>'; 
                  } ?></div>
                  </div>
                  </div>
</div>
                    <div class="post-text my-2">
                    <?php if (have_posts()) : while(have_posts()) : the_post();?>
                        <?php the_content();?>
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
