
<?php 




//this checks if $block['align'] is true, and if it is, 
        //sets the value of $align_class to 'align' + the value of the $block's 'align' property
        $align_class = $block['align'] ? 'align' . $block['align'] : ''; 


        //This checks if $block['className'] has a value, and therefore isnt null,
        //and then assigns the value to $class_name variable

        //code from video
        $class_name = isset($block['className']) ? $class_name : ""; 
        
        //my version
        $class_name = isset($block['className']) ? $block['className'] : ""; 

        ?>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>

               .type-post{
                    margin: auto;
                    height: 80px;
                    line-height: 20px;
               } 

                @media only screen and (max-width: 767px) {
                    .type-post {
                        background-color: purple;
                    }
                }
                
            </style>
        </head>

        <body>
            <section id="recent_posts" class="<?php echo $class_name . $align_class; ?>">

                <?php
                $heading = get_field('heading');
                $how_many_posts_to_show = get_field('how_many_posts_to_show');
                $include_image = get_field('include_image'); 
                $add_custom_css_class_to_block = get_field('add_custom_css_class_to_block'); ?>


                <?php if($heading) {
                    echo '<h3>' .
                    $heading . '</h3>';
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
                    <!-- post_class lets you add classes to the posts class list -->
                    <div <?php post_class(); ?>>

                    <?php if($include_image) { 

                        the_post_thumbnail(); 
                        
                    }; ?>

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
        </body>

        
