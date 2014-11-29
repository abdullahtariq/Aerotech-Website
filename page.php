<?php
get_header(); ?>
<?php
  if(have_posts()): 
  while(have_posts()) :
  the_post(); 
 
  ?>
  <?php $pagename = get_query_var('pagename');
if ( !$pagename && $id > 0 ) {
// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
  $post = $wp_query->get_queried_object();
  $pagename = $post->post_name;

  }
 
 ?>
       <!-- Jumbotron -->
      <div class="jumbotron" >
        <div id="wrapper" class="clearfix">

  <div id="featured" class="col-md-12">


    <div id="featured" >

      
              
      <?php 
    // the_post_thumbnail( 'full' );
     the_post_thumbnail('full', array( 'class'  => "img-responsive attachment-post-thumbnail"));
      ?>

    </div>

    <!-- end of #featured-image -->

  </div><!-- end of #featured -->

      </div>

    </div> <!-- /jumbotron -->
     <div class="jumbotron about-us-detail">
      <div id="wrapper" class="clearfix">
      <!-- Example row of columns -->
      <div class="<?php the_title(); ?> " id="featured">
            <?php $testinomial = get_field('show_player_reviews'); ?>
            <div class="left-content col-md-8 <?php echo $pagename ?>">
           <h3 class="featured-title title text-left"> <?php the_title(); ?></h3>
            <?php the_content(); ?>
          <?php  if($testinomial==1){ ?>
              <div class="col-md-4 col-md-4-about <?php echo $pagename; ?>-players">
<div class="">

            <h3 class="featured-title title">
              What Players are Saying
            </h3>

          
               

                 <?php
        
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
        <?php //$my_date = get_the_time('d.M.Y', $blog->ID);  ?>
        
         
          <p class="">
          <?php echo get_post_meta($blog->ID, 'testimonial', true);  ?><br>
—         <?php echo get_post_meta($blog->ID, 'player_name', true);  ?>
        </p><br />
       </div>
           <?php }
    endif;
   ?>  
          
      

      </div>

    </div> <!-- end of col-md-4 -->

          <?php } ?>
      </div>
      </div>
    </div> <!-- /widget wrap -->
    <?php
  endwhile;
  endif;
  ?>
    </div> <!-- /container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>