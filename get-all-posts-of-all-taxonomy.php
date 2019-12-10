<section class="art-lesson">
        <div class="container">
            <h2><?php the_title();?></h2>
            <div class="box-section">

                    <?php
                        $args = array('taxonomy' => 'lesson-cat', 'hide_empty' => true, 'exclude' => array(1) );
                        $terms = get_terms($args);
                        /*echo "<pre>";
                        print_r($terms);*/
                    ?>


                <div class="sidebar">
                    <ul>
                        <?php
                        foreach ($terms as $value) :
                            $term_id        = $value->term_id;
                            $term_name      = $value->name;
                            $term_slug      = $value->slug;
                            $taxonomy_id    = $value->term_taxonomy_id;
                            $taxonomy       = $value->taxonomy;
                        ?>
                        <li><a href="#<?php echo $term_slug;?>"><?php echo $term_name;?></a></li>

                        <?php endforeach ; ?>

                    </ul>
                </div>


                <div class="content-section">
                    <span>Please click on each link beside the grade to see the lesson plan.</span>
                    <div class="content-group">


                    <?php
                        $args = array('taxonomy' => 'lesson-cat', 'hide_empty' => true, 'exclude' => array(1) );
                        $terms = get_terms($args);
                        
                        foreach ($terms as $value) :
                            $termId        = $value->term_id;
                            $slug      = $value->slug;
                    ?>

                   <?php  
                     
                        $args = array(
                            'post_type'         => 'lesson',
                            'post_status'       => 'publish',
                            'tax_query'         => array(
                                array(
                                    'taxonomy'  => 'lesson-cat',
                                    'field'     => 'slug',
                                    'terms'     => $slug
                                )
                            )
                        );

                        $query = new WP_Query( $args ); 
                    ?>
                        
                        <div id="<?php echo $slug;?>" class="colmn-section">

                            <?php                             
                            if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

                            <a href="<?php the_permalink(); ?>" class="colmn-box">

                                <?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'custom-blog-img-size');  ?>

                                <figure>
                                    <img src="<?php echo $featured_img_url;?>">
                                </figure>
                                <p><?php the_title();?></p>
                            </a>

                            <?php endwhile;  endif;  wp_reset_query();  ?>
                            
                        </div>
                                                        
            <?php endforeach ; ?>

                    </div>
                </div>

                 

            </div>
        </div>
    </section>