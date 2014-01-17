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

jQuery(document).ready(function() {
	navDropdown();
	sidebarHeight();
	toggleNav();
});

$(window).resize(function() {
	jQuery('body').removeClass('show-nav');
});