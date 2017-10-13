/**
 * ZOLOcode Framework
 *
 */

( function( $ ) {

	"use strict";

	$( document ).ready( function() {

		// show or hide megamenu fields on parent and child list items
		zolo_megamenu.menu_item_mouseup();
		zolo_megamenu.megamenu_status_update();
		//$( '.edit-menu-item-megamenu-status' ).status_update();
		zolo_megamenu.update_megamenu_fields();

		// setup automatic thumbnail handling
		$( '.remove-zolo-megamenu-thumbnail' ).manage_thumbnail_display();
		$( '.zolo-megamenu-thumbnail-image' ).css( 'display', 'block' );
		$( ".zolo-megamenu-thumbnail-image[src='']" ).css( 'display', 'none' );

		// setup new media uploader frame
		zolo_media_frame_setup();

	});

	// "extending" wpNavMenu
	var zolo_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( zolo_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-megamenu-status', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'zolo-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'zolo-megamenu' );
				}

				zolo_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-megamenu-status', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );


					if( check_against.is( '.zolo-megamenu' ) ) {

						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'zolo-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'zolo-megamenu' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'zolo-megamenu' );
					}
				}
			});
		}

	};

	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'zolo-media-remove-', '' );
			$( '#edit-menu-item-megamenu-thumbnail-'+button_id ).val( '' );
			$( '#zolo-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function zolo_media_frame_setup() {
		var zolo_media_frame;
		var item_id;

		$( document.body ).on( 'click.zoloOpenMediaManager', '.zolo-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('zolo-media-upload-', '');

			if ( zolo_media_frame ) {
				zolo_media_frame.open();
				return;
			}

			zolo_media_frame = wp.media.frames.zolo_media_frame = wp.media({

				className: 'media-frame zolo-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			zolo_media_frame.on('select', function(){

				var media_attachment = zolo_media_frame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-thumbnail-'+item_id ).val( media_attachment.url );
				$( '#zolo-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			zolo_media_frame.open();
		});

	}
})( jQuery );