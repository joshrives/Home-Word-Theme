function navDropdown() {
	jQuery('.with-sub > a').click(function() {
		if(jQuery(this).parent().hasClass('expand')) {
			jQuery('.with-sub').removeClass('expand');
		} else {
			jQuery('.with-sub').removeClass('expand');
			jQuery(this).parent().toggleClass('expand');
		}
		return false;
	});
}

jQuery(document).ready(function() {
	navDropdown();
});