
<?php


//Anchor ID assignment
$id = 'custom-text-' . $block['id'];
if ( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

//Code from first tutorial
//$class_name = isset($block['className']) ? $class_name : ""; 

//my version
//$class_name = isset($block['className']) ? $block['className'] : ""; 

//Adds custom classname
$className = 'custom-text';
if ( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


/* 
    Fields from ACF
*/

//Header Fields
$header_font_size   =  get_typography_field('header_settings', 'font_size'   );
$header_font_family =  get_typography_field('header_settings', 'font_family' );
$header_font_weight =  get_typography_field('header_settings', 'font_weight' );
$header_font_style  =  get_typography_field('header_settings', 'font_style'  );
$header_text_align  =  get_typography_field('header_settings', 'text_align'  );
$header_text_color  =  get_typography_field('header_settings', 'text_color'  );

//Description Fields
$description_font_size   =  get_typography_field('description_settings', 'font_size'   );
$description_font_family =  get_typography_field('description_settings', 'font_family' );
$description_font_weight =  get_typography_field('description_settings', 'font_weight' );
$description_font_style  =  get_typography_field('description_settings', 'font_style'  );
$description_text_align  =  get_typography_field('description_settings', 'text_align'  );
$description_text_color  =  get_typography_field('description_settings', 'text_color'  );

//Button Fields
$add_button         =  the_field('add_button');
$button_font_size   =  get_typography_field('button_text_Settings', 'font_size' );
$button_text_color  =  get_typography_field('button_text_Settings', 'text_color');

?>
<head>
</head>
<body>
    <div class="<?php echo esc_attr($className); ?>">
        <h2 class="styling">Hello There!</h2>
        <h4 class="bob">hello the third</h4>
    </div>
    
</body>
<style> 
     


    .ast-container h2, .interface-interface-skeleton__content h2 {
        font-size: <?php echo $header_font_size?>px !important;
    color: <?php echo $header_text_color?> !important;
    text-align: <?php echo $header_text_align ?> !important;
    }

    .test {
        background-color: red !important;
    }
    
    
</style>