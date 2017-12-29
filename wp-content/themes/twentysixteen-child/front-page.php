<?php
/*
*Description:child theme front page
*@since 0.0.1
*@version 0.0.1
*create by Hai
*date 08/10/17
*/
/*=================
   1.header 2.About 3.featured work 4.resume 5.social link 6.footer
=================*/
get_header();?>

<?php
 $args =array(
     'post_type'=>'post',
	 'posts_per_page'=>10,
	 'orderby'=>'rand',
	 'category_name' =>'art'
 );
$art =new WP_Query($args);

?>
<div class="site-slider">
  <div class='slider-banner'>
   <!--div class='btn-prev btn-arrow'></div--> 
   <div class="slider-panel">
     <div class="item-wrapper clone-2">
		 <div class="slider-item" style="background-image: url('<?php echo get_theme_mod('slider_bg_img2')?>')">
		     <div class="slider-content art-work">
	         <?php if($art->have_posts()):
		     $i=1;
			 while($art->have_posts()):
				 $art->the_post();
					 if(has_post_thumbnail()):
						 $bg_img=wp_get_attachment_image_src(get_post_thumbnail_id(),array('300','300'));?>
						 <a href="<?php the_permalink()?>" class="bg-img" style="background-image:url('<?php echo $bg_img[0]?>')">
					  <?php endif; 
							echo '<div class="caption">';
							   the_title('<h3>','</h3>');
							   the_content('');
							echo '</div>';
							echo '<div class="angel-1"></div>';
							echo '<div class="angel-2"></div>';
						  echo '</a>';

				 if($i == 3||$i == 7){
					echo "<br class='art-break'>";
				 }
				 if($i == 2||$i == 5||$i == 7){
					echo "<br class='art-break-sm' style='display:none'>";
				 }
				 $i++;
			 endwhile;
		  endif;
		  wp_reset_postdata();
	     ?>
</div>
		 </div>
	 </div> 
     <div class="item-wrapper">
		 <div class="slider-item" style="background-image: url('<?php echo get_theme_mod('slider_bg_img1')?>')">
		   <div class="slider-content"></div> 
		 </div>
	 </div>
	 <div class="item-wrapper">
		 <div class="slider-item" style="background-image: url('<?php echo get_theme_mod('slider_bg_img2')?>')">
		    <div class="slider-content art-work">
	        <?php if($art->have_posts()):
		     $i=1;
			 while($art->have_posts()):
				 $art->the_post();
					 if(has_post_thumbnail()):
						 $bg_img=wp_get_attachment_image_src(get_post_thumbnail_id(),array('300','300'));?>
						 <a href="<?php the_permalink()?>" class="bg-img" style="background-image:url('<?php echo $bg_img[0]?>')">
					  <?php endif; 
							echo '<div class="caption">';
							   the_title('<h3>','</h3>');
							   the_content('');
							echo '</div>';
							echo '<div class="angel-1"></div>';
							echo '<div class="angel-2"></div>';
						  echo '</a>';

				 if($i == 3||$i == 7){
					echo "<br class='art-break'>";
				 }
				 if($i == 2||$i == 5||$i == 7){
					echo "<br class='art-break-sm' style='display:none'>";
				 }
				 $i++;
			 endwhile;
		  endif;
		  wp_reset_postdata();
	     ?>
</div>
		 </div>
	 </div>
	 <div class="item-wrapper clone-1">
		 <div class="slider-item" style="background-image: url('<?php echo get_theme_mod('slider_bg_img1')?>')">
		   <div class="slider-content"></div> 
		 </div>
	 </div>  
   </div>
   <!--div class='btn-next btn-arrow'></div-->
   <ul class='slider-dots'>
 	<li class='dot1'></li>
 	<li class='dot2'></li>
   </ul>
 </div> 
</div>

<div class="site-resume" id="site-resume">
	<div class='resume-container'>
		<div class='resume'>
			<a href="<?php echo get_theme_mod('resume')?>"><button>Download My Resume</button></a>
		</div>
	</div>
</div>
<?php 
$twitter =esc_url(get_theme_mod('twitter'));
$pinterest =esc_url(get_theme_mod('pinterest'));
$facebook =esc_url(get_theme_mod('facebook'));
$instagram =esc_url(get_theme_mod('instagram'));
$bg_img =get_theme_mod('social_bg_img');
if($twitter||$pinterest ||$facebook ||$instagram):
?>
<div class='site-social-link'>
	<div class='social-links' style='background-image: url("<?php echo $bg_img;?>")'>
	    <div class='content'><h2><?php echo get_theme_mod('social_title')?></h2></div>
	    <?php if($twitter):?>
		<a href="<?php echo $twitter;?>"><i class='icomoon twitter'></i></a>
		<?php endif;if($pinterest):?>
		<a href="<?php echo $pinterest;?>"><i class='icomoon pinterest'></i></a>
		<?php endif;if($facebook):?>
		<a href="<?php echo $facebook;?>"><i class='icomoon facebook'></i></a>
		<?php endif;if($instagram):?>
		<a href="<?php echo $instagram;?>"><i class='icomoon instagram'></i></a>
		<?php endif;?>
	</div> 
</div>
<?php endif;get_footer();