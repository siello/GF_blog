jQuery( '#writepress_data-header_layout img' ).on( 'click', function() {

		// Auto adjust main menu height
		var $header_version = jQuery( this ).attr( 'alt' );
		if ($header_version == 'v1' || $header_version == 'v2' || $header_version == 'v7' || $header_version == 'v8') {
			//nav_item_padding-top
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-top' ).val( '40px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-top' ).val( '40' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-bottom' ).val( '40px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-bottom' ).val( '40' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-left' ).val( '20' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-right' ).val( '20' );
			
		}else if ($header_version == 'v3' || $header_version == 'v4' || $header_version == 'v5' || $header_version == 'v6') {
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-top' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-top' ).val( '20' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-bottom' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-bottom' ).val( '20' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-left' ).val( '20' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-right' ).val( '20' );
			
		}

	});
jQuery(document).on('change', 'input[name="writepress_data[header_position]"]:radio', function(){
		// Navigation Item Padding according to Headers
		var $header_position = jQuery(this).val();
		
		if($header_position == 'Left' || $header_position == 'Right'){
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-top' ).val( '15px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-top' ).val( '15' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-right' ).val( '0px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-right' ).val( '0' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-bottom' ).val( '15px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-bottom' ).val( '15' );
			
			jQuery( '#writepress_data-nav_item_padding #nav_item_padding-left' ).val( '0px' );
			jQuery( '#writepress_data-nav_item_padding .redux-spacing-left' ).val( '0' );
			
			}else{
			
				jQuery( '#writepress_data-nav_item_padding #nav_item_padding-top' ).val( '40px' );
				jQuery( '#writepress_data-nav_item_padding .redux-spacing-top' ).val( '40' );
				
				jQuery( '#writepress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
				jQuery( '#writepress_data-nav_item_padding .redux-spacing-right' ).val( '20' );	
				
				jQuery( '#writepress_data-nav_item_padding #nav_item_padding-bottom' ).val( '40px' );
				jQuery( '#writepress_data-nav_item_padding .redux-spacing-bottom' ).val( '40' );
				
				jQuery( '#writepress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
				jQuery( '#writepress_data-nav_item_padding .redux-spacing-left' ).val( '20' );				
				
				
			}
		
	}); 