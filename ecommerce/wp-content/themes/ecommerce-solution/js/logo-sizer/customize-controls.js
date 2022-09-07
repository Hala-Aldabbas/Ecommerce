/**
 * File customize-controls.js.
 *
 * Brings logo resizing technology to the Customizer.
 *
 * Contains handlers to change Customizer controls.
 */
;( function( $ ) {
	'use strict';

	var api = wp.customize;

	api.bind( 'ready', function() {
		$( window ).load( function() {
			if ( false == api.control( 'custom_logo' ).setting() ) {
				// api.control( 'logo_size' ).deactivate();
				$( '#customize-control-ecommerce_solution_logo_sizer' ).hide();
			}
		} );
	} );

	// Check logo changes
	api( 'custom_logo', function ( value ){
		value.bind ( function ( to ) {
			if ( '' === to ) {
				api.control( 'ecommerce_solution_logo_sizer' ).deactivate();
			} else {
				$( '#customize-control-ecommerce_solution_logo_sizer' ).show();
				api.control( 'ecommerce_solution_logo_sizer' ).activate();
				api.control( 'ecommerce_solution_logo_sizer' ).setting( 50 );
				api.control( 'ecommerce_solution_logo_sizer' ).setting.preview();
			}
		} );
	} );
} )( jQuery );