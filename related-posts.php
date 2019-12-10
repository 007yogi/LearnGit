<?php
					$tags = wp_get_post_tags($post->ID);
					//print_r($tags);

					if ($tags) {
						//echo 'Related Posts';
						$first_tag = $tags[0]->term_id;
						$args=array(
							'tag__in' => array($first_tag),
							'post__not_in' => array($post->ID),
							'showposts'=>4,
							'caller_get_posts'=>1
						);

				?>

                <div class="new-cards new-detail-card pt-45">
                    <h6><span>Related News</span></h6>
                    <ul class="flex space-around pt-45">

				<?php

					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post(); 

					$postImg = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

					$arr = explode('/', $postImg);

					$img_with_ext = end($arr);

					$broken = explode( '.', $img_with_ext);
					$extension = array_pop($broken);
				    $img_alt_name = implode('.', $broken);

				?>


                        <li>
                            <div class="inner-new-card">
                                <figure>
                                    <img src="<?php echo $postImg ;?>" alt="<?php echo $img_alt_name;?>" />
                                </figure>
                                <figcaption>

                                <?php 
                                	$date  = get_the_date();                        
                                 	$getDate = date('M d, Y', strtotime( $date ));
                                ?>
                                    <span><?php echo $getDate;?></span>

                                    <h5><?php the_title();?></h5>

                                     <?php 
                                        $excerpt_data = get_the_excerpt();
                                        $content =  substr($excerpt_data, 0,150);
                                    ?>
                                    <p><?php echo $content;?></p>

                                       <a href="<?php the_permalink();?>" class="read-btn">Read More</a>
                                </figcaption>
                            </div>
                        </li>

				<?php
					endwhile;
					}
					wp_reset_query();
					}
				?>

                    </ul>
                </div>
