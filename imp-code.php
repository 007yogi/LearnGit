 <!-- Get blog page title, featured img, acf field value -->

 <?php 
 $bnr_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
 echo $bnr_img[0]; 

OR

 $postImg = wp_get_attachment_url(get_post_thumbnail_id(get_option('page_for_posts'),'full'));

/*title*/
single_post_title();
 ?>
<?php the_field('banner_text', get_option('page_for_posts'));?>


<!-- Code for Custom image size: -->

 <?php $teamImg = get_the_post_thumbnail_url(get_the_ID(),'blogsliderimage'); ?>

<img src="<?php echo $teamImg; ?>" alt="" />