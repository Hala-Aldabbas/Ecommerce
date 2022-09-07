( function( api ) {

	// Extends our custom "ecommerce-solution" section.
	api.sectionConstructor['ecommerce-solution'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );