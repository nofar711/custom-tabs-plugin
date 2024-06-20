jQuery(document).ready(function ($) {
	$('.tabs-body .tab-content').not(':first').hide();
	$('.tabs-header-titles .tab-title:first-child').addClass('active');

	$('.tabs-header-titles .tab-title').on('click', function () {
		$('.tabs-header-titles .tab-title').removeClass('active');
		$(this).addClass('active');
		$('.tabs-body .tab-content').hide();
		var tabId = $(this).attr('id').replace('-button', '');
		$('#' + tabId).fadeIn();
	});
});
