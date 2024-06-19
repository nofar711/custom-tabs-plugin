jQuery(document).ready(function ($) {
	var tabs = tabsData.tabs;
	var tabCount = tabsData.tabCount;

	$('#add-tab').on('click', function () {
		var index = tabCount;
		$('#tabs-container').append(
			'<div class="tab-panel">' +
				'<h3>Tab ' +
				(index + 1) +
				'</h3>' +
				'<p><label>Title<br>' +
				'<input type="text" name="custom_tabs_settings[' +
				index +
				'][title]" value=""></label></p>' +
				'<p><label>Content<br>' +
				'<textarea name="custom_tabs_settings[' +
				index +
				'][content]" rows="2"></textarea></label></p>' +
				'</div>'
		);
		tabCount++;
	});

	$(document).on('click', '.delete-tab', function () {
		$(this).closest('.tab-panel').remove();
		$('#tabs-container .tab-panel').each(function (i) {
			$(this)
				.find('h3')
				.text('Tab ' + (i + 1));
			$(this)
				.find('input[type="text"]')
				.attr('name', 'custom_tabs_settings[' + i + '][title]');
			$(this)
				.find('textarea')
				.attr('name', 'custom_tabs_settings[' + i + '][content]');
		});

		tabCount--;
	});
});
