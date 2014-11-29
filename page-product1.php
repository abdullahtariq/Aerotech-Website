<?php 
/*
Template Name: Products Template
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

<section class="product">
<div class="jumbotron about-us-detail">
        <div style="padding: 0px;" class="clearfix" id="wrapper">

  <div class="" id="featured">

    <div class="left-content col-md-8 products-page-wrap">
    <div style="" class="col-md-8-about col-md-8-product"> 

       <h3 class="featured-title title page-title-product">
        <?php the_title(); ?>
      </h3>      
     
          <?php
            if(have_posts()): 
          while(have_posts()) :
          the_post();
          ?>

           <?php
  endwhile;
    endif;
    $args = array(
     'post_type' => 'product',
     'post_status' => 'publish',
     'orderby' => 'post_date',
     'order' =>  'Desc',
     'showposts' =>  '3',
     'tax_query' => array(
    array(
      'taxonomy' => 'products-category',
      'field' => 'slug',
      'terms' => 'hybrid-shafts'
    )
  )
   );
  $blogs = get_posts($args); 
  
  ?>

<!-- CATEGORY NAMES and ID -->
<?php $termsName = array();$termSlug = array();$k=0;$length_array;$termlink=array();?>
            <?php $terms = get_terms("products-category"); 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, '' );
                        if( is_wp_error( $term_link ) )
                        continue; ?>
                      <?php $termlink[$k] = $term->taxonomy.'?type='.$term->slug ;
                          $termSlug[$k] = $term->slug
                      ?>
             <?php $termsName[$k] = $term->name; ?>
           <?php
                  $k++; 
                } 
                 $length_array = count($termsName);
              ?>
         
                   
<a href="<?php echo $termlink[0]; ?>"><p class="steel-detail title"><?php echo $termsName[0] ?></p></a>
<div class="row col-md-8-product-row">
  <?php
  
    if(count($blogs) > 0):
     
      foreach($blogs as $blog)
      {

        ?>
          <div class="col-md-4">
               <?php 
        // the_post_thumbnail( 'full' );
         echo get_the_post_thumbnail( $blog->ID, 'thumbnail' ); 
          ?>
          <p class="steel-detail title"><?php echo $blog->post_title; ?></p>
          <a href="<?php echo get_permalink( $blog->ID ); ?>"><p class="steel-detail">more &gt;&gt;</p></a>
          </div>
           <?php }
    endif;
   ?>  
            
          </div>

          <!-- ************************************* -->
                  <?php 
                      $args = array(
               'post_type' => 'product',
               'post_status' => 'publish',
               'orderby' => 'post_date',
               'order' =>  'Desc',
               'showposts' =>  '3',
               'tax_query' => array(
              array(
                'taxonomy' => 'products-category',
                'field' => 'slug',
                'terms' => 'iron-shafts'
              )
            )
             );
            $blogs = get_posts($args);
         ?> 
         <a href="<?php echo $termlink[1]; ?>"><p class="steel-detail title"><?php echo $termsName[1] ?></p></a>
         <div class="row col-md-8-product-row">
         <?php
  
            if(count($blogs) > 0):
             
              foreach($blogs as $blog)
              {

                ?>
                 <div class="col-md-4">
                  
                       <?php 
                // the_post_thumbnail( 'full' );
                 echo get_the_post_thumbnail( $blog->ID, 'thumbnail' ); 
                  ?>
                  <p class="steel-detail title"><?php echo $blog->post_title; ?></p>
          <a href="<?php echo get_permalink( $blog->ID ); ?>"><p class="steel-detail">more &gt;&gt;</p></a>
                  </div>
                   <?php }
            endif;
          ?> 
            
          </div>
        

                  <?php 
                      $args = array(
               'post_type' => 'product',
               'post_status' => 'publish',
               'orderby' => 'post_date',
               'order' =>  'Desc',
               'showposts' =>  '3',
               'tax_query' => array(
              array(
                'taxonomy' => 'products-category',
                'field' => 'slug',
                'terms' => 'wood-shafts'
              )
            )
             );
            $blogs = get_posts($args);
         ?> 
         <a href="<?php echo $termlink[2]; ?>"><p class="steel-detail title"><?php echo $termsName[2] ?></p></a>
         <div class="row col-md-8-product-row">
         <?php
  
            if(count($blogs) > 0):
             
              foreach($blogs as $blog)
              {

                ?>
                  <div class="col-md-4">
                       <?php 
                // the_post_thumbnail( 'full' );
                 echo get_the_post_thumbnail( $blog->ID, 'thumbnail' ); 
                  ?>
                  <p class="steel-detail title"><?php echo $blog->post_title; ?></p>
                  <a href="<?php echo get_permalink( $blog->ID ); ?>"><p class="steel-detail">more &gt;&gt;</p></a>
                    </div>
                   <?php }
            endif;
          ?> 
        </div>
        </div><!--/col-md-8-product -->
        </div>
        <div style="" class="col-md-4-player-says col-md-4-about">

      <h3 class="featured-title title">
              What Players are Saying
            </h3>

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
           'showposts' =>  '4'
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
        </div><!--/#featured -->
        </div><!--/#wrapper -->
        </div><!--/#JumboTron -->
        <!-- <div class="ajaxLoad"><button id="load_more" style="display:none;">Load More</button></div> -->
          
      


      
</section>
<style type="text/css">
#leftbar div{
  height: 38px !important;
    width: 40px !important;
}
</style>
<script type="text/javascript">
  $(document).ready(function() { 
     $('#load_more').click(function(){
      if($('.mkspost-wrap').length != $('#total_records').val()){
        $('#load_more').html('<img src="http://www.makesbridge.com/wp-content/uploads/2014/10/ajax-loader.gif" style="background: none repeat scroll 0% 0% transparent;">');
        $.ajax({
          url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
          type:'POST',
          data:'action=my_special_ajax_call&act=blo&tax=blog&group_no='+ $('#track_load').val() +'&type='+$('#tax_type').val(),
          success:function(results)
          {           
            var params = results.split('][');
            $('#news-blog-posts').append(params[1]);
            $('#load_more').html('Load More'); //hide loading image once data is received
            $('#total_groups').val(Math.ceil(params[0]/8));
            var track_load = $('#track_load').val();
            track_load = parseInt(track_load)+1;
            $('#track_load').val(track_load);
            if($('.mkspost-wrap').length == $('#total_records').val())
                $('#load_more').fadeOut();

          }
        }); 
      }else{
        return false;
      }
    });
     /*Get Total value*/
      $.ajax({
          url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
          type:'POST',
          data:'action=my_special_ajax_call&act=blo&tax=blog&group_no='+ $('#track_load').val() +'&type='+$('#tax_type').val()+'&totalOnly=true',
          success:function(results)
          {           
            $('#total_records').val(results);
            $('#load_more').fadeIn();
            $('#track_load').val(1);
          }
        }); 
  });
</script>
<?php get_footer(); ?>
