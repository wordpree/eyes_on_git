<?php
/**
 * The template for displaying one-page website.
 
 */

get_header(); ?>

	<div id="primary" class="content-area lander-page">
		<main id="main" class="site-main" role="main">
           
		   	    <?php
				 $page_slugs =array('call-to-action',
									'',
								   'services',
								   'meet',
								   'contact'
								  );
			
				  foreach ($page_slugs as $page_slug){
				  	  if($page_slug ==''):?>
			          <section id='testimonials'>
			            <div class='indent clear'>testimonials</div>
				      </section>
				      <?php continue;
					  else:?>
					  <section id='<?php echo $page_slug;?>'>
		              <?php endif;?>
			          <div class='indent clear'>
			          <?php if($page_slug != 'call-to-action'): ?>
			               <h2 class='section-title'> <?php get_the_title();?> </h2>
			       
			          <?php	endif;							  
					  $query =new WP_Query("pagename=$page_slug");			     
					  if($query->have_posts()){
						  while($query->have_posts()){
							  $query->the_post();						 
							  echo '<div class=entry-content>';
							  the_content();
							  echo '</div>';

							  
						  }
					  wp_reset_postdata();
					  }
				    echo '</div>';
				    echo '</section>';
					    
				  }
				
				  ?>
 
          
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
