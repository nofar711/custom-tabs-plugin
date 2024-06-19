jQuery(document).ready(function ($) {
	$('.tab-contents .tab-content').not(':first').hide();

	$('.tab-titles a').on('click', function () {
		$('.tab-titles li').removeClass('active');
		$(this).closest('li').addClass('active');
		$('.tab-contents .tab-content').hide();
		$($(this).attr('href')).fadeIn();
	});
});
