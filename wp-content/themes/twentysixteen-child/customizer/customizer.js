( function( $ ) {

	wp.customize( 'social_bg_img', function( value ) {
		value.bind( function( newval ) {
			$( '.site-social-link .social-links' ).css('background-image','url('+newval+')');
		} );
	} );
	
	wp.customize( 'intro_bg_img', function( value ) {
		value.bind( function( newval ) {
			$( '.author-image img' ).attr('src',newval);
		} );
	} );
	
	wp.customize( 'social_title', function( value ) {
		value.bind( function( newval ) {
			$( '.site-social-link .content h2' ).html( newval );
		} );
	} );
	
	wp.customize( 'intro_title', function( value ) {
		value.bind( function( newval ) {
			$( '.brief-intro h2').html( newval );
		} );
	} );
	
	wp.customize( 'intro_title', function( value ) {
		value.bind( function( newval ) {
			$( '.brief-intro p').html( newval );
		} );
	} );

} )( jQuery );