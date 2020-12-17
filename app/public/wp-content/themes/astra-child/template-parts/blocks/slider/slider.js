//alert('s'); 

(function($){

    var initializeBlock = function( $block ) {
        $block.find('.slides').slick({
            dots: true,
            arrows: true,
            //infinite: true,
            centerPadding: '60px',
            speed: 300,
            slidesToShow: 1,
            mobileFirst: true,
            
            // variableWidth: true,
            // adaptiveHeight: true,
            // focusOnSelect: true

            // autoplay: true,
            // autoplaySpeed: 4000,
            
        });
        
      
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }

})(jQuery);