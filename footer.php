
        </div> <!-- this needs to get moved into every pag.e -->
        <footer>
            <div class="px-5 w-100">
                <div class="row justify-content-center pb-3 mb-3">
                    <div class="col-md-4 order-md-1 px-3">
                        <div class="pt-4">
                        <div class="pt-1">
                            <a href="/"><img id="logo" style="height: 37px; width: auto;" src="/images/mini.svg"></a>
                        </div>
                        <div class="pt-3">
        		    <p class="text-white font-weight-light">
        <strong>The Student Insurgent</strong> is a consensus organized journalistic endeavor based at the University of Oregon in Eugene. We are a radical publication that seeks to deconstruct the existing social order and facilitate its replacement with one which is ecologically sound and functions on egalitarian lines. We agitate and educate the student body by addressing issues which are often ignored or marginalized. We strive to be an open forum -- somewhere the silenced and oppressed can express their ideas and opinions free from the filters of the mainstream media. We exist to challenge oppression, exploitation and hierarchical power structures.
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md order-md-4 text-white pt-4">

                        <li class="contact">Contact Us
                            <ul>	
                                <li class="cat-item text-white">Email</li>
                                <ul class='children'>
    	                            <li class="cat-item"><a class="font-weight-light" href="mailto:inbox@studentinsurgent.org">inbox@studentinsurgent.org</a></li>
    	                        </ul>
                                <li class="cat-item text-white">Mailing Address</li>
                                <ul class='children font-weight-light text-white'>
    	                            <li class="cat-item">The Student Insurgent</li>
    	                            <li class="cat-item">1228 University of Oregon</li>
    	                            <li class="cat-item">Eugene OR 97403</li>
                                </ul>
                            </ul>
                        </li>
                    </div>
                    <div class="col-md order-md-2 text-white pt-4">
                        <?php wp_list_categories(); ?>
                    </div>
                    <div class="col-md order-md-3 text-white issues pt-4">
                        <?php wp_list_categories(array('taxonomy'=>'issues', 'title_li' => '')); ?>
                    </div>
                    
                </div>
		<div class="row mb-3 justify-content-center">
                    <div>
                    <a class="btn btn-outline-danger my-3" href="#" role="button">Top</a>
		    </div>
                </div>
	    </div>
            <?php wp_footer(); ?>
        </footer>
    </body>
</html>
