<?php 


function drotved_scripts() {
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'drotved_scripts');





function gutenberg_setup() {
    // Support Featured Images
    add_theme_support( 'post-thumbnails' );
    
    //Gutenberg
    add_theme_support( 'align-wide' );
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support( 'dark-editor-style' );
    add_theme_support( 'responsive-embeds' );


    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );


}

    add_action( 'after_setup_theme', 'gutenberg_setup' );

    /**************************************************
     * Advanced Custom Fields
     **************************************************/

     

    if(function_exists('acf_register_block'))
     {
         add_action('acf/init', 'drotved_custom_blocks');
     }

//this function registers a custom block with ACF. 
    function drotved_custom_blocks() {

        if(function_exists('acf_register_block'))
        {
            acf_register_block(
                
                array(

                    'name'                  => 'drotved_recentposts',
                    'title'                 => __('Recent Posts'),
                    'description'           => __('My first custom recent posts'),
                    'render_callback'       => 'drotved_recent_posts_callback',
                    'category'              => 'drotved_blocks',
                    'keywords'              => array('drotved','recent','post'),
                )
            );
        }
    }

    //This function assigns a category to the custom block,
    //using the category value given when registering the block.
    function drotved_category( $categories, $post) {

        return array_merge
        (

            $categories, array(

                array(
                    'slug'  => 'drotved_blocks',
                    'title' => __('Drotved blocks', 'drotved_blocks'),
                )
                
            )
        );
    }
    //10 and 2 are priority and number of args
    add_filter('block_categories', 'drotved_category', 10, 2);



    function drotved_recent_posts_callback($block) {

        //this checks if $block['align'] is true, and if it is, 
        //sets the value of $align_class to 'align' + the value of the $block's 'align' property
        $align_class = $block['align'] ? 'align' . $block['align'] : ''; 


        //This checks if $block['className'] has a value, and therefore isnt null,
        //and then assigns the value to $class_name variable

        //code from video
        //$class_name = isset($block['className']) ? $class_name : ""; 
        
        //my version
        $class_name = isset($block['className']) ? $block['class_name'] : ""; 

        ?>

        <section id="recent_posts" class="<?php echo $class_name . $align_class; ?>">

            <?php
            $heading = get_field('heading');
            $how_many_posts_to_show = get_field('how_many_posts_to_show');
            $include_image = get_field('include_image'); 
            $add_custom_css_class_to_block = get_field('add_custom_css_class_to_block'); ?>

            
            <?php if($heading) {
                echo '<h3>' . $heading . '</h3>';
            } ?>

            <!-- this line adds the number from $how_many_posts_to_show to the grid- class, so it can be styled in style.css
            additionally i expanded it to allow for additional custom classes to be added to the div from the wordpress editor, using the field
            $add_custom_css_class_to_block. -->
            <div class="grid grid-<?php echo $how_many_posts_to_show . ' ' . $add_custom_css_class_to_block; ?> ">
                <?php 
                    //conditions to be sent with the query to the database
                    $args = array(
                        'post-type' => "post",
                        'posts_per_page' => $how_many_posts_to_show,
                    );

                    // a query to the WP database, with the above conditions as an args object
                    $recent_posts = new WP_query($args);

            //check to see that if the query above can find any posts, fulfilling the args condition,
            //and if it can it gets the next post object. 
            while($recent_posts -> have_posts()): $recent_posts -> the_post(); ?>

                <!-- rendering of the content of the block -->
                <!-- post_class lets you add classes to the posts class list -->.
                <div <?php post_class(); ?>>

                    <?php if($include_image) { 

                        the_post_thumbnail(); 
                        
                    } ?>

                    <p class="date"><?php echo get_the_date(); ?> </p>

                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p class="excerpt"> <?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Read More</a>;


                </div>

                
                

            <?php endwhile; 

            //this ensures that this blocks loop doesn't interfere with other loops on the page
            wp_reset_postdata(); 
            ?>
            
            </div>

           
        </section>

        <?php

    }


    
?>





    