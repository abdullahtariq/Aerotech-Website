<?php
/**
 * 
 *Template Name: Home Page Template
 */

get_header(); ?>
<?php
  if(have_posts()): 
  while(have_posts()) :
  the_post();	
 $header_image = get_field('header_image');
  ?>
	     <!-- Jumbotron -->
      <div class="jumbotron">
        <div id="wrapper" class="clearfix">

	<div id="featured" class="col-md-12">


		<div id="featured-image" class="col-md-7">

			
							
			<p><img class="aligncenter" src="<?php echo $header_image["url"]; ?>"  alt=""></p>

		</div>

		<div class="col-md-4 fit">

			<h2 class="featured-title">
				
				<?php echo get_field('home_title'); ?>			
			</h2>

			<h4 class="featured-subtitle">
				<?php echo get_field('sub_heading'); ?>
					</h4>
 
				<?php
			the_content();
			?>
 <?php
  endwhile;
  endif;
  ?>
			
		</div>
		<!-- end of #featured-image -->

	</div><!-- end of #featured -->

      </div>

    </div> <!-- /jumbotron -->
     <div class="jumbotron widdget-wrap">

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4 home-widget">
		        
          <h3 class="title">What Players are Saying</h3>
			              <?php
			            if(have_posts()): 
			          while(have_posts()) :
			          the_post();
			          ?>

			           <?php
			  endwhile;
			    endif;
			    $args = array(
			     'post_type' => 'testimonial',
			     'post_status' => 'publish',
			     'orderby' => 'rand',
			     'order' =>  'Desc',
			     'showposts' =>  '2'
			   );
			  $medias = get_posts($args); 

			  ?>

          <?php
    
        
    if(count($medias) > 0):
       
      foreach($medias as $blog)
      {
        

        //echo get_post_meta($blog->ID, 'testimonial', true);
        ?>
         <div class="mkspost-wrap">
         
        <?php //$my_date = get_the_time('d.M.Y', $blog->ID);  ?>
        
         
          <p >
          <?php echo get_post_meta($blog->ID, 'testimonial', true);  ?><br>
—         <?php echo get_post_meta($blog->ID, 'player_name', true);  ?>
        </p><br />
       </div>
           <?php }
    endif;
   ?>  
          
        </div>
        <div class="col-lg-4 home-widget">
          <h3 class="title">Choose the right shaft 
			for me. Find a Clubfitter</h3>
          <p><img class="aligncenter img-responsive" src="<?php bloginfo( 'template_url' ); ?>/img/small_banner.png" width="100%;" alt=""></p>
       </div>
			        <?php
			            if(have_posts()): 
			          while(have_posts()) :
			          the_post();
			          ?>

			           <?php
			  endwhile;
			    endif;
			    $args = array(
			     'post_type' => 'newsmedia',
			     'post_status' => 'publish',
			     'orderby' => 'post_date',
			     'order' =>  'Desc',
			     'showposts' =>  '4',
			     'tax_query' => array(
			    array(
			      'taxonomy' => 'news-media-category',
			      'field' => 'slug',
			      'terms' => 'press-release'
			    )
			  )
			   );
			  $medias = get_posts($args); 

			  ?>
        <div class="col-lg-4 thirdwidget home-widget">

          <h3 class="title">Aerotech Tour News</h3>
           <?php
  
    if(count($medias) > 0):
       
      foreach($medias as $blog)
      {

        ?>
         
        <?php $my_date = get_the_time('d.M.Y', $blog->ID);  ?>
          <p><?php echo $blog->post_excerpt; ?></p><br/>
          <p id="NewsDate" class="NewsDate"><?php echo $my_date; ?></p>
    
       
           <?php }
    endif;
   ?>  
          <p><?php echo $blog->post_excerpt; ?></p><br/>
          <p id="NewsDate" class="NewsDate"><?php echo $my_date; ?></p>
         
		<a href="<?php echo site_url(); ?>/news-media"><p class="thirdwidget-more">more></p></a>
        </div>
      </div>
    </div> <!-- /widget wrap -->
    </div> <!-- /container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>