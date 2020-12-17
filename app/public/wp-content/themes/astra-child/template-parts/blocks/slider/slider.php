
<?php


// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( have_rows('slides') ): ?>
		<div class="slides">
            <?php while( have_rows('slides') ): the_row(); 

                //  ACF Field Initialization
                $image = get_sub_field('image');
                $header = get_sub_field('header');
                $description = get_sub_field('description');
                $author = get_sub_field('author');
                
                ?>
                
                <!-- Block Rendering -->
				<div class="inner-slide">

                    <div class="slide-data">
                        <?php if (!empty($image)) { ?>
                            <div class="image-container">
                                <?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
                            </div>
                        <?php } ?>
                        
                        <?php if (!empty($header)) { ?>
                            <div class="testimonial-header">
                                <h2><?php echo $header; ?> </h2>
                            </div>
                        <?php } ?>

                        <?php if (!empty($description)) { ?>
                            <div class="testimonial-description">
                                <!--<h1 class="testiomonial-start-quote">"</h1><h3><?php echo $description; ?> </h3><h1 class="testiomonial-end-quote">"</h1> -->
                                <h3><?php echo $description; ?> </h3>
                            </div>
                        <?php } ?>

                        <?php if (!empty($author)) { ?>
                            <div class="testimonial-author">
                                <h4><?php echo $author; ?> </h4>
                            </div>
                        <?php } ?>
                    </div>

                </div>

			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add some slides.</p>
	<?php endif; ?>
</div>