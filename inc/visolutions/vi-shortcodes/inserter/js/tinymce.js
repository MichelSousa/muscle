(function() {	
	tinymce.create('tinymce.plugins.ShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.ShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.ShortcodeMce.theurl +"/images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {
	            	a.render( b, "Alinhamento de Imagem", "image-align" );
	            	a.render( b, "Redes Sociais", "socials-networks" );
	            	a.render( b, "Fomulário de Contato", "contact-form" );
	            	a.render( b, "Slider de Posts", "posts-loop" );
	            	a.render( b, "Barra de COmpartilhamento", "share-bar" );
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {

					if(id == "image-align") {
						tinyMCE.activeEditor.selection.setContent('[image_align image="http://imageurl" align="left/right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.[/image_align] <br />');
					}
					if(id == "socials-networks") {
						tinyMCE.activeEditor.selection.setContent('[socials_networks]<br />');
					}
					if(id == "contact-form") {
						tinyMCE.activeEditor.selection.setContent('[form_contato id="ID do Fomulário"]<br />');
					}
					if(id == "posts-loop") {
						tinyMCE.activeEditor.selection.setContent('[posts_loop thumbnail="false/true" height="600" direction="up/left" navigation="true/false" interval="1800" results="3" post_type="post/others" type="slider/default" ]<br />');
					}
					if(id == "share-bar") {
						tinyMCE.activeEditor.selection.setContent('[social_share form="circle/square/none"]<br />');
					}
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("shortcodes", tinymce.plugins.ShortcodeMce);
})();  