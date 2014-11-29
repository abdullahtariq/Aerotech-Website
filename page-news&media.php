<?php 
/*
Template Name: News & Media Template
*/

get_header(); 


?>
<?php $pagename = get_query_var('pagename');
if ( !$pagename && $id > 0 ) {
// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
  $post = $wp_query->get_queried_object();
  $pagename = $post->post_name;

  }
 
 ?>
<?php
  $pageType = get_field('page_type');
  $term= 'all'; 
  if($pageType == 'media'){
    $term = 'media';
  } else{
    $term = 'press-release';
  }
 ?>

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
     'showposts' =>  '1000',
     'tax_query' => array(
    array(
      'taxonomy' => 'news-media-category',
      'field' => 'slug',
      'terms' => $term
    )
  )
   );
  $medias = get_posts($args); 

  ?>

  <div class="jumbotron ">
        <div id="wrapper" class="">

  <div id="featured" class="">


    <div id="featured-banner" class="">

      
      <p><?php 
      the_post_thumbnail('full', array( 'class'  => "img-responsive attachment-post-thumbnail"));
      ?></p>

    </div>
  </div><!-- /#feature -->
  </div><!-- /#wrapper -->
</div><!-- /.jumbotron -->
<?php //print_r($medias); ?>
    <div class="jumbotron " style="padding: 0 15px !important;">
        <div id="wrapper" class="">

  <div id="featured" class="">


      <div class="row">
        <div class="col-md-8 col-md-8-media"> <!-- 8 column div -->

          <div class="row-detail">


        <h3 class="featured-title title">
          <?php the_title(); ?>
        </h3>
     
      <div class="content-setting"><?php the_content(); ?></div>
      
        
        </div>
<?php
    
        
    if(count($medias) > 0):
       
      foreach($medias as $blog)
      {
        

        //echo get_post_meta($blog->ID, 'testimonial', true);
        ?>
         <div class="mkspost-wrap">
           <?php $pdf_obj = get_field('pdf_1', $blog->ID);  ?>
        <?php $my_date = get_the_time('d.M.Y', $blog->ID);  ?>
        <?php if($pageType != 'media'){ ?>
           <a href="<?php echo get_permalink( $blog->ID ); ?>"><h5 class="title sub-title"><?php echo $blog->post_title; ?></h5></a> 
        <?php }else{ ?>
         <a href="<?php echo $pdf_obj['url']; ?>" target="_blank">
          <p class="title sub-title">
          <?php echo $blog->post_excerpt; ?>
        </p></a>
          <?php } ?>
          <p>
            <?php echo $my_date; ?>
          </p><br />
       </div>
           <?php }
    endif;
   ?>  
        
       

        </div> <!-- 8 columns div ends -->

        <div class="col-md-4 col-md-4-modify"> <!-- 4 column div starts here -->
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
<div class="news-widget"><h3 class="title">What Players are Saying</h3></div>
          <?php
    
        
    if(count($medias) > 0):
       
      foreach($medias as $blog)
      {
        

        //echo get_post_meta($blog->ID, 'testimonial', true);
        ?>
             <div class="news-widget">
            
          
                    <?php //$my_date = get_the_time('d.M.Y', $blog->ID);  ?>
                  
                   
                    <p >
                    <?php echo get_post_meta($blog->ID, 'testimonial', true);  ?><br>
                  —<?php echo get_post_meta($blog->ID, 'player_name', true);  ?>
                  </p><br />
                 </div>
                     <?php }
              endif;
             ?>  
          
          
        </div>
        </div> <!-- 4 column div ends here -->

      </div>


  </div><!-- end of #featured -->

      </div>
    </div>

<?php get_footer(); ?>
