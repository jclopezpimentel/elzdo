window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/enloszapatosdelotro.com.mx\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.5.3"}};
        !function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;if(!g||!g.fillText)return!1;switch(g.textBaseline="top",g.font="600 32px Arial",a){case"flag":return g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3;case"diversity":return g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,d=c[0]+","+c[1]+","+c[2]+","+c[3],g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e;case"simple":return g.fillText(h(55357,56835),0,0),0!==g.getImageData(16,16,1,1).data[0];case"unicode8":return g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0]}return!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);

/* <![CDATA[ */
var gmediaGlobalVar = {"ajaxurl":"http:\/\/enloszapatosdelotro.com.mx\/wp-admin\/admin-ajax.php","uploadPath":"http:\/\/enloszapatosdelotro.com.mx\/wp-content\/grand-media","gmediaKey":"","mash":""};
/* ]]> */
/* <![CDATA[ */
var BP_Confirm = {"are_you_sure":"\u00bfEst\u00e1s seguro?"};
/* ]]> */
/* <![CDATA[ */
var BP_DTheme = {"accepted":"Aceptado","close":"Cerrar","comments":"comentarios","leave_group_confirm":"\u00bfEst\u00e1s seguro que quieres salir del grupo?","mark_as_fav":"Favorito","my_favs":"Mis favoritos","rejected":"Rechazado","remove_fav":"Eliminar favorito","show_all":"Mostrar todo","show_all_comments":"Mostrar todos los comentarios para este hilo.","show_x_comments":"Mostrar todos los %d comentarios","unsaved_changes":"Tu perfil tiene cambios no guardados. Si abandonas esta p\u00e1gina, los cambios se perder\u00e1n. ","view":"Ver"};
/* ]]> */


			jQuery(document).ready(function() {
                                // expand-content-link renamed to expand-cnt-link for compatibility with twentyfourteen theme
				jQuery(".expand-content-link").removeClass("expand-content-link").addClass("expand-cnt-link");
				jQuery(".expand-cnt-link").click(function() {
					jQuery(this).toggleClass("ecf_closed").parent(".exp-col-content-holder").find(".hidden-content").first().stop().slideToggle("slow").css("display","block");
					return false;
				});	
				jQuery(".expand-cnt-link").toggleClass("ecf_closed").parent(".exp-col-content-holder").find(".hidden-content").css("display","none");
			
			//images with no float styles , get floated left
			if(typeof jQuery(".hidden-content > img").attr("float") === "undefined") {
				jQuery(".hidden-content > img:not([class])").addClass("alignleft");
			}
			
			/*
			jQuery(".hidden-content").each(function() {
				if (jQuery(this).find("img").length) {
					var hiddenContentpLength = jQuery(this).find(".hiddenContentp").text().length;
						if( hiddenContentpLength < 200 ) {
							jQuery(this).css("height","150px");
						}
				}
			});
			*/
			
			jQuery(".textwidget > .exp-col-content-holder > .hidden-content > img+p").attr("style","display:inherit !important;");
			
			});
                        
 