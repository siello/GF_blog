(function() {
	tinymce.PluginManager.add( 'zolo_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'zolo_shortcodes_mce_button', {
			title: 'ZOLO Shortcodes',
			type: 'menubutton',
			icon: 'icon zolo-shortcodes-icon',
			menu: [

				/** Elements **/
				{
					
							//Drop Cap
							text: 'Drop Cap',
							onclick: function() {
								editor.windowManager.open( {
									title: 'ZOLO Shortcodes - Drop Cap',
									body: [
									{
										type: 'textbox',
										name: 'dropCap',
										label: 'Dropcap Letter',
										value: 'A'
									},
									// Drop Cap font Size
									{
										type: 'textbox',
										name: 'dropcapFontsize',
										label: 'Dropcap Font Size',
										value: '24'
									},
									
									// Drop Cap Style
									{
										type: 'listbox',
										name: 'dropCapStyle',
										label: 'Drop Cap Style',
										'values': [
											{text: 'None', value: 'none'},
											{text: 'Square', value: 'square'},
											{text: 'Round', value: 'round'}
										]
									},
									// Drop Cap Color
									{
										type: 'textbox',
										name: 'dropCapColor',
										label: 'Font Color',
										value: '#333333'
									},
								
									{
										type: 'textbox',
										name: 'dropCapBackground',
										label: 'Background Color',
										value: '#dddddd'
									},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[zolo_dropcaps dropcap="' + e.data.dropCap + '" dropcap_fontsize="' + e.data.dropcapFontsize + '" dropcapstyle="' + e.data.dropCapStyle + '" dropcapcolor="' + e.data.dropCapColor + '" dropcapbackground="' + e.data.dropCapBackground + '"]');
									}
								});
							}
						
							
					}, // End Elements Section

			]
		});
	});
})();