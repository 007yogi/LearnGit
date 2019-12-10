<section class="New-blog-flax">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="blog-wrap">
 
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post__in'  => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
);
$query = new WP_Query( $args );
 
if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
 
$sticky_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
//print_r($query);
?>
 
                    <div class="blog-box">
                        <figure><a href="#"><img src="<?php echo $sticky_img ;?>" /></a></figure>   
                        <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                        <div class="share-area">
 
                        <?php $date  = get_the_date();                        
                         $getDate = date('M d, Y', strtotime( $date ));
                        ?>
                            <div class="share-left"><?php echo $getDate ;?><a href="#">Comments</a></div>
                             
                            <div class="clr"></div>
                        </div>
                        <p><?php the_excerpt();?></p>
                        <p><a href="<?php the_permalink();?>">Read More</a></p>          
                         
                        <div class="clr"></div>
                    </div> 
                     
<?php endwhile; endif; wp_reset_query();?>
 
 
                    <div class="row">
 
 
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$sticky = get_option('sticky_posts');
//print_r($sticky);
$args = array('post_type'=>'post','posts_per_page'=>4,'ignore_sticky_posts'=>1,'post__not_in'=>$sticky,'paged'=>$paged); 
 
//query_posts($args);
$wp_query = new WP_Query($args);
 
if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
 
$postImg = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>
 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="blog-box">
                                <figure><a href="<?php the_permalink();?>"><img src="<?php echo $postImg ;?>" /></a></figure>   
                                <h1><a href="#"><?php the_title();?></a></h1>
                                <div class="share-area">
                                <?php $date  = get_the_date();                        
                                 $getDate = date('M d, Y', strtotime( $date ));
                                ?>
                                    <div class="share-left"><?php echo $getDate;?> <a href="#">Comments</a></div>
                                     
                                    <div class="clr"></div>
                                </div>
                                <p><?php the_excerpt();?></p>
                                <p><a href="<?php the_permalink();?>">Read More</a></p>          
                                 
                                <div class="clr"></div>
                            </div>
                        </div>
 
 <?php endwhile; ?>
 
                         
                    </div>
                     
                     <div class="clr"></div>
                                        
      <?php 
    if(function_exists('wp_paginate')){
        wp_paginate();
     }         
?>  
 
<?php endif; wp_reset_query();?>