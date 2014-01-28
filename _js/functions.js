function navDropdown() {
	jQuery('.with-sub > a').click(function() {
		if(jQuery(this).parent().hasClass('expand')) {
			jQuery('.with-sub').removeClass('expand');
			jQuery(this).children('span').attr("data-icon", 'u');
		} else {
			jQuery('.with-sub').removeClass('expand');
			jQuery(this).parent().toggleClass('expand');
			jQuery(this).children('span').attr("data-icon", 'd');
		}
		return false;
	});
}
function sidebarHeight() {
	var mainHeight = jQuery('.content-section').outerHeight() + 7;
	jQuery('.sidebar-section').css('min-height',mainHeight);
}
function toggleNav() {
	jQuery('.toggle-nav').click(function() {
		jQuery('body').toggleClass('show-nav');
		return false;
	});
}
function showTabs() {
	jQuery('.tabs-toggle').click(function() {
		jQuery(this).siblings('li:not(.active)').slideToggle();
		jQuery(this).parent().toggleClass('shown');
		return false;
	});

}

jQuery(document).ready(function() {
	var vw = jQuery(window).width();
	navDropdown();
	toggleNav();
	showTabs();
	if (vw >800) {
		sidebarHeight();
	}
});

jQuery(window).resize(function() {
	jQuery('body').removeClass('show-nav');
});