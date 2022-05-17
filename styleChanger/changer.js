/* Style Changer */


jQuery(document).ready(function(){

	/* Color Scheme */
	jQuery('#stlChanger .hdrStBgs  .hdrCols span').click(function(){
		var hdrCol = jQuery(this).attr('title');
		
		jQuery('#stlChanger .hdrStBgs .hdrCols span').removeClass('current');
		jQuery(this).addClass('current');
		
		jQuery('#stlChanger').find('#cFontWColor1').css({backgroundColor:'#' + hdrCol});
			jQuery('#cFontStyleWColor1').text('a, .color_3, .color_orange, .circle .sf-menu>li>a:hover, .sf-menu>li.current>a, .sf-menu>li.sfHover>a,.sf-menu li li a:hover, .sf-menu li.sfHover li.sfHover>a, ul.list-box .price-text .price, .posttime h1, .smalldate, .posttitle a:hover, .caption.big_green, .caption.very_big_green, .button.white, .openquestion, .item-info h3.title,  .filterable li a:hover, .filterable li.current a, .list a:hover, .more_gray:hover, .entry-utility a:hover, .sf-menu>li>a:hover, .sf-menu>li.current>a, .sf-menu>li.sfHover>a, .botlink a:hover {color:#' + hdrCol + ';}');
			
			jQuery('#cFontStyleWColor2').text('.wp-pagenavi > span.current, .wp-pagenavi a:hover, .view-tenth .mask, .pic:hover, .pic2:hover, .skills li span, .orange, .social a:hover img, .button.orange, .tabs-nav li.active a, .tag-cloud a:hover, .slider_button.green, .pic3:hover, .socialteam a:hover img, ul.list-box .title-box2, .item-info-overlay, .resp_navigation:hover, .resp_navigation.active, .caption.very_big_white {background-color:#' + hdrCol + ';}');
			
			
			jQuery('#cFontStyleWColor3').text('input[type="text"]:focus, textarea:focus, select:focus, #bottom input:focus, #bottom textarea:focus, #bottom select:focus,.tabs > li a.current, .wp-pagenavi > span.current,.wp-pagenavi a:hover, .responsibe_block_inner, .circle:hover, .heading_line span, .filterable li a:hover, .filterable li.current a, header {border-color:#' + hdrCol + ';}');
		return false;
	});
	
	/* Color Scheme */
	jQuery('#stlChanger #cFontWColor1').parent('a').ColorPicker({
		onChange:function(hsb, hex, rgb){
			jQuery('#stlChanger').find('#cFontWColor1').css({backgroundColor:'#' + hex});
			jQuery('#cFontStyleWColor1').text('a, .color_3 {color:#' + hex + ';}');
			jQuery('#cFontStyleWColor2').text('.wp-pagenavi > span.current, .wp-pagenavi a:hover, .view-tenth .mask, .pic:hover, .pic2:hover, .skills li span, .orange, .more, .button.green, .slider_button.green, body, .circle{background-color:#' + hex + ';}');
			jQuery('#cFontStyleWColor3').text('input[type="text"]:focus, textarea:focus, select:focus, #bottom input:focus, #bottom textarea:focus, #bottom select:focus,.tabs > li a.current, .wp-pagenavi > span.current,.wp-pagenavi a:hover, .responsibe_block_inner, body, .circle, .filterable li a:hover, .filterable li.current a {border-color:#' + hex + ';}');
		},
		onSubmit:function(hsb, hex, rgb, el){
			jQuery('#cFontStyleWColor1').text('a, .color_3 {color:#' + hex + ';}');
			jQuery('#cFontStyleWColor2').text('.wp-pagenavi > span.current, .wp-pagenavi a:hover, .view-tenth .mask, .pic:hover, .pic2:hover,  .skills li span, .orange, .slider_button.green, body, .circle{background-color:#' + hex + ';}');
			jQuery('#cFontStyleWColor3').text('input[type="text"]:focus, textarea:focus, select:focus, #bottom input:focus, #bottom textarea:focus, #bottom select:focus,.tabs > li a.current, .wp-pagenavi > span.current,.wp-pagenavi a:hover, .responsibe_block_inner, .circle, .filterable li a:hover, .filterable li.current a {border-color:#' + hex + ';}');
			jQuery(el).find('#cFontWColor1').css({backgroundColor:'#' + hex});
			jQuery(el).find('#cFontWColor1').attr({title:hex});
			jQuery(el).ColorPickerHide();
		},
		onBeforeShow:function(){
			jQuery(this).ColorPickerSetColor(jQuery('#stlChanger').find('#cFontWColor1').attr('title'));
		}
	});

	/* Background Color */
	jQuery('#stlChanger #cFontWColor4').parent('a').ColorPicker({
		onChange:function(hsb, hex, rgb){
			jQuery('body').removeAttr('style');
			jQuery('#stlChanger').find('#cFontWColor4').css({backgroundColor:'#' + hex});
			jQuery('#cFontStyleWColor4').text('body {background:#' + hex + ';}');
		},
		onSubmit:function(hsb, hex, rgb, el){
			jQuery('body').removeAttr('style');
			jQuery('#cFontStyleWColor4').text('body {background:#' + hex + ';}');
			jQuery(el).find('#cFontWColor4').css({background:'#' + hex});
			jQuery(el).find('#cFontWColor4').attr({title:hex});
			jQuery(el).ColorPickerHide();
		},
		onBeforeShow:function(){
			jQuery(this).ColorPickerSetColor(jQuery('#stlChanger').find('#cFontWColor4').attr('title'));
		}
	});

	
	if (jQuery(window).height() < 750){ jQuery('#stlChanger').css({position:'absolute'}); }

	
	/* Style Changer Autohide */
	jQuery('.chBut').parent().delay(1000).animate({left:'-120px'}, 500, function(){
		jQuery(this).find('.chBut').next('.chBody').css({display:'none'});
		jQuery(this).find('.chBut').addClass('closed');
	}); 
	
	
	/* Style Changer Toggle */
	jQuery('.chBut').click(function(){
		if (jQuery(this).hasClass('closed')){
			jQuery(this).next('.chBody').css({display:'block'}).parent().animate({left:0}, 500, function(){
				jQuery(this).find('.chBut').removeClass('closed');
			});
		} else {
			jQuery(this).parent().animate({left:'-120px'}, 500, function(){
				jQuery(this).find('.chBut').next('.chBody').css({display:'none'});
				jQuery(this).find('.chBut').addClass('closed');
			});
		}
		
		return false;
	});
	

	jQuery('#stlChanger .stBgs a').click(function(){
		var bgBgCol = jQuery(this).attr('href');
		jQuery('#stlChanger .stBgs a').removeClass('current');
		jQuery('body').css({backgroundColor:'#ffffff'});
		jQuery(this).addClass('current');
		jQuery('body').css({backgroundImage:'url(' + bgBgCol + ')'});
		if (jQuery(this).hasClass('bg_t')){
			jQuery('body').css({backgroundRepeat:'repeat-x', backgroundPosition:'50% 0', backgroundAttachment:'scroll'});
		} else {
			jQuery('body').css({backgroundRepeat:'repeat', backgroundPosition:'50% 0', backgroundAttachment:'fixed'});
		}
		return false;
	});
	
	
	/* Window Resize Function */
	jQuery(window).resize(function(){
		if (jQuery(window).height() < 750){
			jQuery('#stlChanger').css({position:'absolute'});
		} else {
			jQuery('#stlChanger').css({position:'fixed'});
		}
	});
	
});
