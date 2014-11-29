<?php 
/*
Template Name: Dealers/Distrubutors Template
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
            if(have_posts()): 
          while(have_posts()) :
          the_post();
          ?>

           <?php
  endwhile;
    endif;
    $args = array(
     'post_type' => 'distributor',
     'post_status' => 'publish',
     'orderby' => 'title',
     'order' =>  'ASC',
     'showposts' =>  '1000'
   );
  $medias = get_posts($args); 

  ?>

  <div class="jumbotron ">
        <div id="wrapper" class="">

  <div id="featured" class="">


    <div id="featured-banner" class="">
      <div class="delear-region-details">click region to locate your nearest dealer/ditrubutor</div>
<?php 
      the_post_thumbnail('full', array( 'class'  => "img-responsive attachment-post-thumbnail dealersMap","usemap" => "#Map"));
      ?>
      <!-- <img src="http://localhost/aerotech/wp-content/uploads/2014/11/4-1.jpg" usemap="#Map" class="img-responsive dealersMap"> -->
   <map name="Map" id="Map">
  <area shape="poly" class="filter map-filter" data-toggle="tooltip" data-placement="left" title="Search for region west" data-filter=".west" data-maphilight='{"stroke":false,"fillOpacity":0.1,"fillColor":"ffffff"}' coords="307,65,469,88,466,193,486,194,486,248,475,248,474,316,434,314,414,315,416,321,383,319,344,296,319,293,308,273,296,263,285,255,278,231,276,214,266,190,265,172,276,132,288,88,288,70,306,64,306,64,306,64" alt="west" />
  <area shape="poly" class="filter map-filter" data-toggle="tooltip" data-placement="left" title="Search for region north" data-filter=".north" data-maphilight='{"stroke":false,"fillOpacity":0.1,"fillColor":"ffffff"}' coords="472,88,550,87,588,94,601,95,582,114,591,111,596,116,614,101,642,106,656,114,660,120,666,133,670,138,678,154,670,168,688,168,698,162,702,190,689,212,668,207,658,213,649,224,633,228,628,238,620,240,618,250,569,252,563,246,489,248,488,194,469,190,472,87,473,87,472,89"  alt="north" />
  <area shape="poly" class="filter map-filter" data-toggle="tooltip" data-placement="left" title="Search for region south" data-filter=".south" data-maphilight='{"stroke":false,"fillOpacity":0.1,"fillColor":"ffffff"}' coords="753,178,704,190,690,214,676,211,662,214,646,226,630,238,622,246,619,257,613,256,566,254,556,248,488,250,478,252,476,316,436,318,456,342,470,356,494,347,501,352,507,365,515,375,522,391,541,398,544,368,551,358,566,352,581,345,598,345,616,348,634,346,630,332,640,329,648,330,658,326,674,326,678,334,691,325,711,339,717,360,729,374,747,378,741,350,732,334,720,316,721,294,736,277,749,258,760,246,766,232,761,220,754,210,750,200,748,187,753,177"  alt="south" />
  <area shape="poly" class="filter map-filter" data-toggle="tooltip" data-placement="left" title="Search for region east" data-filter=".east" data-maphilight='{"stroke":false,"fillOpacity":0.1,"fillColor":"ffffff"}' coords="782,62,796,62,805,81,812,89,800,99,790,107,787,126,765,136,766,157,756,154,758,170,762,190,753,180,706,186,701,160,712,145,709,142,734,129,734,124,742,110,758,103,774,96,780,88,779,73"  alt="east" />

</map>
<?php 
      the_post_thumbnail('full', array( 'class'  => "img-responsive responsive-image attachment-post-thumbnail"));
      ?>
<div class="dealer-reagion-selected"><p>Selected Region : north</p></div>
    </div>
<?php //print_r($medias); ?>
 

  </div><!-- end of #featured -->

      </div>
    </div>

    <div class="jumbotron ">
      <div id="wrapper" class="">

      <div id="featured" class=""> 

<div id="Container" class="Container">
      <div class="row">
        <div class="col-md-12"> <!-- 8 column div -->

          <div class="row-detail">
           

        <h3 class="featured-title title">
          <?php the_title(); ?>
        </h3>
     
      <div class="content-setting"><?php the_content(); ?></div>
      
         <button class="filter btn btn-warning filter-all responsive-btn" data-filter="all" id="mix-all">All</button>
         <button class="filter btn btn-warning filter-all responsive-btn" data-filter=".west" >West</button>
         <button class="filter btn btn-warning filter-all responsive-btn" data-filter=".north" >North</button>
         <button class="filter btn btn-warning filter-all responsive-btn" data-filter=".south">South</button>
         <button class="filter btn btn-warning filter-all responsive-btn" data-filter=".east" >East</button>
            
        </div>
<?php
    
        
    if(count($medias) > 0):
       $i = 1;
      foreach($medias as $blog)
      {
        
         //print_r($blog);
        $location = get_post_meta($blog->ID, 'location', true);
        ?>
         <div class="mix <?php echo $location; ?> col-md-3 dealer-details " data-myorder="<?php echo $i; ?>">
           <h4><?php echo $blog->post_title; ?></h4> 
           <?php echo $blog->post_content; ?>
       </div>
            
           <?php 
           $i++;
           //if(($i-1)%4 == 0){echo "<div class='creating-padding'></div>";}
         }
    
    endif;
   ?>  
        
       

        </div> <!-- 12 columns div ends -->


      </div>
      
      </div><!-- End of Container -->

      </div><!-- end of #featured -->

      </div>
    </div>
    <script type="text/javascript">
    $(function(){
          $('#Container').mixItUp({
          callbacks: {
            onMixEnd: function(state){
              if(state.activeFilter == '.mix')
                $('#mix-all').fadeOut();
              else
                $('#mix-all').fadeIn();
              
              var value = state.activeFilter.substring(1, 6);
              if(value == "mix"){
                value = "all";
              }
              $('.dealer-reagion-selected').html("<p>Selected Region : "+value+"</p>");  
            } 
          }
        });
          $('.dealersMap').maphilight();
    });
    </script>
    <style type="text/css">
    .Container .mix{
      margin-bottom: 2%;
      display: none;
      
     }

     #featured > div#Container{
      padding-left: 7px;
     }
     .delear-region-details{
         font-weight: bold;
    left: 18px;
    position: absolute !important;
    text-transform: uppercase;
    top: 30px;
    width: 20%;
    z-index: 1;
     }
       .dealer-reagion-selected {
      bottom: 30px;
      left: 18px;
      position: absolute !important;
      text-transform: capitalize;
  }
    </style>
<?php get_footer(); ?>


