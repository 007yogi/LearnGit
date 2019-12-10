<h2>Featured Product</h2>

<?php
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
                ),
            )  
    );

    $featured_product = new WP_Query( $args );
    if ( $featured_product->have_posts() ) : 

    while ( $featured_product->have_posts() ) : $featured_product->the_post();
    $post_thumbnail_id     = get_post_thumbnail_id();
    $img = wp_get_attachment_url($post_thumbnail_id);

?>
    
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="product-card">
                <figure><img src="<?=$img;?>" class="img-responsive"></figure>

                <?php
                $title = get_the_title(); 
                 $title_char = substr($title,0,60).'...';
                ?> 
                <p><?php echo $title_char; ?></p>
                <h5><?php do_action( 'woocommerce_after_shop_loop_item_title' );?></h5>
                <ul>
                    <li>
                        <a href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                        <?php do_action( 'woocommerce_after_shop_loop_item' );?>
                       <!--  Add to Cart  -->
                        </a>
                    </li>
                   
                </ul>
            </div>
         </div>


<?php endwhile; endif; wp_reset_query(); ?>    

                </div>
            </div>
        </div>
    </section>