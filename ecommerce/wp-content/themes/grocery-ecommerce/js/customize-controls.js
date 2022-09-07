( function( api ) {

	// Extends our custom "grocery-ecommerce" section.
	api.sectionConstructor['grocery-ecommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

	(function ($) {
	    $(document).ready(function ($) {
	        $('input[data-input-type]').on('input change', function () {
	            var val = $(this).val();
	            $(this).prev('.cs-range-value').html(val);
	            $(this).val(val);
	        });
	    })
	})(jQuery);

	jQuery(document).ready(function($) {
	    $('body').on('click', '.icon-list li', function(){
	        var icon_class = $(this).find('i').attr('class');
	        $(this).addClass('icon-active').siblings().removeClass('icon-active');
	        $(this).parent('.icon-list').prev('.selected-icon').children('i').attr('class','').addClass(icon_class);
	        $(this).parent('.icon-list').next('input').val(icon_class).trigger('change');
	    });

	    $('body').on('click', '.selected-icon', function(){
	        $(this).next().slideToggle();
	    });

	    $(".socialInput").on("keyup", function() {
	        var value = $(this).val().toLowerCase();
	        $(".icon-list li").filter(function() {
	          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	        });
	    });
	});

} )( wp.customize );