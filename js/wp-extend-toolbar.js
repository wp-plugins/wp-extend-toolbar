jQuery(document).ready(function(jQuery){
	var title = jQuery("title").text();
	var description = jQuery("meta[name=description]").attr("content");
	
	console.log('Description : ' + description );
	
	jQuery("#wp-admin-bar-extend-toolbar-title .ab-item").text("PAGE TITLE：" + title);
	jQuery("#wp-admin-bar-extend-toolbar-description .ab-item").text("DESCRIPTION：" + description);
});
