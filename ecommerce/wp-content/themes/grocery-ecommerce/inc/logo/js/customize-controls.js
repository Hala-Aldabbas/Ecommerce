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
				// api.control( 'logo_width' ).deactivate();
				$( '#customize-control-logo_size' ).hide();
			}
		} );
	} );

	// Check logo changes
	api( 'custom_logo', function ( value ){
		value.bind ( function ( to ) {
			if ( '' === to ) {
				api.control( 'logo_width' ).deactivate();
			} else {
				$( '#customize-control-logo_size' ).show();
				api.control( 'logo_width' ).activate();
				api.control( 'logo_width' ).setting( 25 );
				api.control( 'logo_width' ).setting.preview();
			}
		} );
	} );
} )( jQuery );