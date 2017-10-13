jQuery(document).ready(function(e) {

	// if clicked on import data button
	jQuery('.button-install-demo').live('click', function(e) {
		var selected_demo = jQuery(this).data('demo-id');
		var loading_img = jQuery('.preview-'+selected_demo);
		var disable_preview = jQuery('.preview-all');

		if( selected_demo == 'main' ) {
			var confirm = window.confirm('WARNING:\n\nImporting demo content will give you sliders, pages, posts, theme options, widgets, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minute to complete.\n\n-----------------------------------------------\n\nWritepress MAIN  REQUIREMENTS:\n\n• Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.\n\n• Visual Composer, Contact form 7, Mailchimp for WP need to be activated.\n\n• Woocommerce must be activated for shop data to import.');
		} else {
			var confirm = window.confirm('WARNING:\n\nImporting demo content will give you sliders, pages, posts, theme options, widgets, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minute to complete.\n\n-----------------------------------------------\n\nWritepress  REQUIREMENTS:\n\n• Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.\n\n• Visual Composer, Contact form 7,  Mailchimp for WP need to be activated.');
		}
		if(confirm == true) {
			loading_img.show();
			disable_preview.show();

			var data = {
				action: 'zolo_import_demo_data',
				demo_type: selected_demo
			};

			jQuery('.importer-notice').hide();

			jQuery.post(ajaxurl, data, function(response) {
				alert(response);
				
				if( response && response.indexOf('imported') == -1 ) {
					jQuery('.importer-notice-1').attr('style','display:block !important');
				} else {
					jQuery('.importer-notice-2').attr('style','display:block !important');
				}
				loading_img.hide();
				disable_preview.hide();
			}).fail(function() {
				jQuery('.importer-notice-3').attr('style','display:block !important');
				loading_img.hide();
				disable_preview.hide();
			});
		}

		e.preventDefault();
	});
});
