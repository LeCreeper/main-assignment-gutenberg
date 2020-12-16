<?php 




//ensures that CSS in the editor.css affeccts the wordpress editor. 
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style( 'my-block-editor-styles', get_stylesheet_directory_uri() . "/editor.css", false,'1.0', 'all' );
} );


//ensures wordpress uses the style.css stylesheet
function drotved_scripts() {
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'drotved_scripts');


    /**************************************************
     * Gutenberg Blocks
     **************************************************/

    if(function_exists('acf_register_block'))
     {
         add_action('acf/init', 'drotved_custom_blocks');
     }

//this function registers a custom block with ACF. 
    function drotved_custom_blocks() {

        //
        if(function_exists('acf_register_block'))
        {
            acf_register_block(
                
                array(

                    'name'                  => 'drotved_recentposts',
                    'title'                 => __('Recent Posts'),
                    'description'           => __('My first custom recent posts'),
                    'render_template'       => 'template-parts/blocks/recent-posts/recent-posts.php',
                    'category'              => 'drotved_blocks',
                    'keywords'              => array('drotved','recent','post'), 
                )
            );
        }

        if(function_exists('acf_register_block')) {

            acf_register_block(

                array(

                    'name'                  =>  'drotved_custom_text',
                    'title'                 =>  __('Drotved Custom Text'),
                    'description'           =>  __('A custom text block with a header, description and a button'),
                    'render_template'       =>  'template-parts/blocks/drotved-text/drotved-text.php',
                    'category'              =>  'drotved_blocks',
                    'keywords'              =>  array('drotved','text','button'),
                    'supports'              =>  array(
                        
                        'align'             => array( 'wide', 'full'),
                        'align-text'        => true,
                        

                    ),
                    //'enqueue_style'         => get_template_directory_uri() . '/tempalte-parts/blocks/drotved-text/drotved-text.css',
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



    // function drotved_recent_posts_callback($block) {

        

    // }

    
    
?>





    