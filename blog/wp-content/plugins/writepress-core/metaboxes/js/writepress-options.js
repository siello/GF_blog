jQuery( document ).ready( function() {
	
	jQuery( '.zt_field.writepress-buttonset a' ).on( 'click', function( e ) {
		var $radiosetcontainer;

		e.preventDefault();
		$radiosetcontainer = jQuery( this ).parents( '.zolo-form-radio-button-set' );
		$radiosetcontainer.find( '.ui-state-active' ).removeClass( 'ui-state-active' );
		jQuery( this ).addClass( 'ui-state-active' );
		$radiosetcontainer.find( '.button-set-value' ).val( $radiosetcontainer.find( '.ui-state-active' ).data( 'value' ) ).trigger( 'change' );
	});
	
	jQuery( '.zt_field.writepress-image-buttonset img' ).on( 'click', function( e ) {
		var $radiosetcontainer;

		e.preventDefault();
		$radiosetcontainer = jQuery( this ).parents( '.zolo-form-radio-button-set' );
		$radiosetcontainer.find( '.ui-state-active' ).removeClass( 'ui-state-active' );
		jQuery( this ).addClass( 'ui-state-active' );
		$radiosetcontainer.find( '.button-set-value' ).val( $radiosetcontainer.find( '.ui-state-active' ).data( 'value' ) ).trigger( 'change' );
	});	
	
	function writepressCheckDependency( $currentValue, $desiredValue, $comparison ) {
		var $passed = false;
		if ( '==' === $comparison ) {
			if ( $currentValue == $desiredValue ) {
				$passed = true;
			}
		}
		if ( '=' === $comparison ) {
			if ( $currentValue = $desiredValue ) {
				$passed = true;
			}
		}
		if ( '>=' === $comparison ) {
			if ( $currentValue >= $desiredValue ) {
				$passed = true;
			}
		}
		if ( '<=' === $comparison ) {
			if ( $currentValue <= $desiredValue ) {
				$passed = true;
			}
		}
		if ( '>' === $comparison ) {
			if ( $currentValue > $desiredValue ) {
				$passed = true;
			}
		}
		if ( '<' === $comparison ) {
			if ( $currentValue < $desiredValue ) {
				$passed = true;
			}
		}
		if ( '!=' === $comparison ) {
			if ( $currentValue != $desiredValue ) {
				$passed = true;
			}
		}

		return $passed;
	}
	function writepressLoopDependencies( $container ) {
		var $passed = false;
		$container.find( 'span' ).each( function() {

			var $value = jQuery( this ).data( 'value' ),
				$comparison = jQuery( this ).data( 'comparison' ),
				$field = jQuery( this ).data( 'field' );
			$passed = writepressCheckDependency( jQuery( '#zt_' + $field ).val(), $value, $comparison );
			return $passed;
		});
		if ( $passed ) {
			 $container.parents( '.zt_metabox_field' ).fadeIn( 300 );
		} else {
			 $container.parents( '.zt_metabox_field' ).hide();
		}
	}

	jQuery( '.writepress-dependency' ).each( function() {
		writepressLoopDependencies( jQuery( this ) );
	});
	jQuery( '[id*="zt"]' ).on( 'change', function() {
		var $id = jQuery( this ).attr( 'id' ),
			$field = $id.replace( 'zt_', '' );
		jQuery( 'span[data-field="' + $field + '"]' ).each( function() {
			writepressLoopDependencies( jQuery( this ).parents( '.writepress-dependency' ) );
		});
	});
	
	
	if(jQuery('.zolo_upload_button').length ) {
		window.writepress_uploadfield = '';

		jQuery('.zolo_upload_button').live('click', function() {
			window.writepress_uploadfield = jQuery('.upload_field', jQuery(this).parents( '.zt_upload' ));
			tb_show('Upload', 'media-upload.php?type=image&TB_iframe=true', false);

			return false;
		});

		window.writepress_send_to_editor_backup = window.send_to_editor;
		window.send_to_editor = function(html) {
			if(window.writepress_uploadfield) {
				if(jQuery('img', html).length >= 1) {
					var $image_url = jQuery('img', html).attr('src');
				} else {
					var $image_url = jQuery(jQuery(html)[0]).attr('href');
				}
				jQuery(window.writepress_uploadfield).val($image_url);
				window.writepress_uploadfield = '';

				tb_remove();
			} else {
				window.writepress_send_to_editor_backup(html);
			}
		}
	};
	
	jQuery( function() {
		jQuery( "#zt_metabox_tabs" ).tabs();
	} );
	
	jQuery('.zt_meta_box_upload_button').bind('click',function() {
		var $button = jQuery(this);
		var $clear_button = jQuery(this).siblings('.zt_meta_box_clear_image_button');
		var $input_field = jQuery(this).siblings('input.upload_field');   
		wp.media.editor.send.attachment = function(props, attachment){

			var $attachment_url = '';
			$attachment_url = attachment.sizes[props.size].url;
			$input_field.val($attachment_url);
			if( $input_field.siblings('.preview-image').length > 0 ){
				$input_field.siblings('.preview-image').attr('src', $attachment_url);
			}
			else{
				var img_html = '<img class="preview-image" src="' + $attachment_url + '" />';
				$input_field.parent().append(img_html);
			}
			$clear_button.attr('disabled', false);
		}
		wp.media.editor.open($button);
	}); 
	
	jQuery('.zt_meta_box_clear_image_button').bind('click', function(){
		var $button = jQuery(this);
		$button.attr('disabled', true);
		$button.siblings('input.upload_field').val('');
		$button.siblings('.preview-image').fadeOut(250, function(){
			$button.siblings('.preview-image').remove();
		});
	});
	
	jQuery('.zt_metabox_field .upload_field').bind('change', function(){
		var $input_field = jQuery(this);
		var $input_value = $input_field.val().trim();
		if( $input_value == '' ){
			$input_field.siblings('.zt_meta_box_clear_image_button').trigger('click');
		}
		else{
			if( $input_field.siblings('.preview-image').length > 0 ){
				$input_field.siblings('.preview-image').attr('src', $input_value);
			}
			else{
				var $img_html = '<img class="preview-image" src="' + $input_value + '" />';
				$input_field.parent().append(img_html);
			}
			$input_field.siblings('.zt_meta_box_clear_image_button').attr('disabled', false);
		}
	});
	

});
