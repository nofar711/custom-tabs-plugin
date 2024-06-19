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
});
