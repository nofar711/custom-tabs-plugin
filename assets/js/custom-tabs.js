jQuery(document).ready(function ($) {
	$('.tabs-body .tab-content').not(':first').hide();
	$('.tab-title.default').addClass('active');

	$('.tabs-header .tab-title').on('click', function () {
		$('.tabs-header .tab-title').removeClass('active');
		$(this).addClass('active');
		$('.tabs-body .tab-content').hide();
		var tabId = $(this).attr('id').replace('-button', '');
		$('#' + tabId).fadeIn();
	});
});
