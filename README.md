# Custom Tabs Plugin

The Custom Tabs Plugin allows you to create custom tabs on your WordPress site, each displaying the content of a selected post or page. Follow the steps below to install and use the plugin.

## Installation

1. **Download and Install:**
   - Download the plugin zip file.
   - Go to your WordPress dashboard.
   - Navigate to `Plugins > Add New`.
   - Click on the `Upload Plugin` button.
   - Select the downloaded zip file and click `Install Now`.
   - Activate the plugin after installation.

## Usage

### Setting Up Content Sources

1. **Create or Use Existing Posts and Pages:**
   - The plugin uses posts and pages as content sources for the tabs. You can create new post type or use existing ones.



### Example Code

To see an example of how the tabs look, add the following code to your post (built with basic Gutenberg):

```html
<!-- wp:columns {"verticalAlignment":null,"className":"main-content"} -->
<div class="wp-block-columns main-content"><!-- wp:column {"verticalAlignment":"center","width":"66.66%","className":"quote-with-background-img"} -->
<div class="wp-block-column is-vertically-aligned-center quote-with-background-img" style="flex-basis:66.66%"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"24px"}}} -->
<p class="has-text-align-left" style="font-size:24px"><strong>Riskified has enabled safe, fast, and seamless payments</strong> throughout our collaboration. We’re excited to see what opportunities we can unlock in the future.</p>
<!-- /wp:paragraph -->

<!-- wp:media-text {"mediaId":631,"mediaLink":"http://localhost/wordpress/blog/tab-content/retail/80-2/","mediaType":"image","mediaWidth":27,"isStackedOnMobile":false,"imageFill":false} -->
<div class="wp-block-media-text" style="grid-template-columns:27% auto"><figure class="wp-block-media-text__media"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/michael.png" alt="" class="wp-image-631 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…","style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><strong>Michael Fleisher<br></strong>Chief Financial Officer</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->

<!-- wp:image {"id":637,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/wayfair.png" alt="" class="wp-image-637"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"stretch","width":"35%"} -->
<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:35%"><!-- wp:group {"className":"right-blocks","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"stretch"},"metadata":{"name":""}} -->
<div class="wp-block-group right-blocks"><!-- wp:group {"style":{"color":{"background":"#f3f5f7"},"layout":{"selfStretch":"fill","flexSize":null}},"className":"number-block","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group number-block has-background" style="background-color:#f3f5f7"><!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"70px"}}} -->
<h1 class="wp-block-heading" style="font-size:70px"><strong>50%</strong></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"25px"}}} -->
<p style="font-size:25px">Reduction in the cost of fraud</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"read-more-button","layout":{"type":"constrained"}} -->
<div class="wp-block-group read-more-button"><!-- wp:media-text {"mediaPosition":"right","mediaId":639,"mediaLink":"http://localhost/wordpress/blog/tab-content/retail/frame-1073713550/","mediaType":"image","mediaWidth":15,"isStackedOnMobile":false,"verticalAlignment":"top","style":{"color":{"background":"#080e3f"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"32px"}},"textColor":"white"} -->
<div class="wp-block-media-text has-media-on-the-right is-vertically-aligned-top has-white-color has-text-color has-background has-link-color" style="background-color:#080e3f;font-size:32px;grid-template-columns:auto 15%"><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"Content…"} -->
<p>Read Wayfair case study</p>
<!-- /wp:paragraph --></div><figure class="wp-block-media-text__media"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/arrow.png" alt="" class="wp-image-639 size-full"/></figure></div>
<!-- /wp:media-text --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"trusted-by"} -->
<div class="wp-block-columns are-vertically-aligned-center trusted-by"><!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"#9ea6ae"}}},"color":{"text":"#9ea6ae"},"typography":{"fontSize":"14px"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#9ea6ae;font-size:14px"><strong>TRUSTED BY</strong></h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:gallery {"columns":4,"imageCrop":false,"linkTo":"none"} -->
<figure class="wp-block-gallery has-nested-images columns-4"><!-- wp:image {"id":619,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-large is-style-default"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/costway.png" alt="" class="wp-image-619"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":620,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/roomtogo.png" alt="" class="wp-image-620"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":621,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="http://localhost/wordpress/wp-content/plugins/custom-tabs-plugin/assets/img/aldo.png" alt="" class="wp-image-621"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":622,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="http://localhost/wordpress/wp-content//plugins/custom-tabs-plugin/assets/img/bluemercury.png" alt="" class="wp-image-622"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
```
 
> **Note:** All necessary images and styles for the post component are included in the plugin, making it compatible with the copy-paste method to view the example.

### Configuring Tabs

1. **Access the Plugin Settings Page:**
   - Go to `Custom Tabs` in your WordPress dashboard.

2. **Add New Tabs:**
   - On the settings page, you can add new tabs by clicking the `Add Tab` button.

3. **Choose Content for Tabs:**
   - For each tab, you can choose the content source by selecting the post type (Post, Page, etc.).
   - After selecting the post type, choose the specific post you want to display in the tab.

4. **Save and Enjoy:**
   - After configuring the tabs, click `Save` to apply the changes.
   - The tabs will display the content of the selected posts/pages.

Enjoy your custom tabs!
