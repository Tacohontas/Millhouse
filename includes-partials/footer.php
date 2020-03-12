</div> <!-- Här stängs #content-wrap som öppnas i header.php -->
<footer class="footer">
	<div class="footer__linknav">
		<div class="linknav__griditem">
			<a href="index.php?page=home">
				<h1 class="footer__logo">MILLHOUSE</h1>
			</a>
		</div>
		<?php
		if (isset($_SESSION['Username'])) {
			echo '<ul class="linknav__griditem">
			<li class="linknav_link"><a href="index.php?page=home">Hem</a></li>
			<li>|</li>
			<li class="linknav_link">
				<a href="index.php?page=search">SÖK</a>
			</li>
			<li>|</li>
			<li class="linknav_link">
				<a href="./handlers/logout.php">Logga ut</a>
			</li>
		</ul>';
		}
		?>
		<div class="linknav__griditem">
			<p><span>&copy;</span>2020 Fanny Sundlöf & Jonathan Undhagen</p>
		</div>
	</div>
	<div class="footer__contact">
		<div class="contact__griditem">
			<i class="fas fa-map-marker-alt fa-lg"></i>
			<p><span>Exempelgatan 25</span>123 45 Exempelstaden</p>
		</div>
		<div class="contact__griditem">
			<i class="fas fa-phone-alt fa-lg"></i>
			<p>08 - 123 45 67</p>
		</div>
		<div class="contact__griditem">
			<i class="fas fa-envelope fa-lg"></i>
			<p>info@Millhouse.com</p>
		</div>
	</div>
	<div class="footer__aboutus">
		<div class="aboutus-wrapper">
			<div class="aboutus-container">
				<h2 class="aboutus__header">Om oss</h2>
				<p class="aboutus__info">
					Vi är ett grossistföretag som erbjuder kläder, accessoarer och mindre inredningsartiklar
					till mode- och livsstilsbutiker.
				</p>
			</div>
			<ul class="aboutus__icons-container">
				<li class="aboutus__icon">
					<a href="#"><i class="fab fa-instagram fa-2x"></i></a>
				</li>
				<li class="aboutus__icon">
					<a href="#"><i class="fab fa-facebook fa-2x"></i></a>
				</li>
				<li class="aboutus__icon">
					<a href="#"><i class="fab fa-twitter fa-2x"></i></a>
				</li>
				<li class="aboutus__icon">
					<a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- Den här visas vid mediaquerias max-width 800px -->
	<div class="footer__copy-hidden">
		<p><span>&copy;</span>2020 Fanny Sundlöf & Jonathan Undhagen</p>
	</div>
</footer>

</div>
<!--- Här stängs #page-container som öppnas i header.php -->


<script>
	// CKEDITOR config. 
	// 1. Sätt ett id ett element i din form 
	// 2. Lägg in den i CKEDITOR.replace(ditt_id) för att använda CKeditors funktioner.
	CKEDITOR.replace('content', {

		// Define the toolbar:
		toolbar: [{
				name: 'clipboard',
				items: ['Undo', 'Redo']
			},
			{
				name: 'styles',
				items: ['Styles', 'Format']
			},
			{
				name: 'basicstyles',
				items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
			},
			{
				name: 'paragraph',
				items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
			},
			{
				name: 'links',
				items: ['Link', 'Unlink']
			},
			{
				name: 'insert',
				items: ['EmbedSemantic', 'Table']
			},
			{
				name: 'tools',
				items: ['Maximize']
			},
			{
				name: 'editing',
				items: ['Scayt']
			}
		],

		// Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
		// One HTTP request less will result in a faster startup time.
		// For more information check https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-customConfig
		customConfig: '',

		// Enabling extra plugins, available in the standard-all preset: https://ckeditor.com/cke4/presets-all
		extraPlugins: 'autoembed,embedsemantic,image2',


		// Make the editing area bigger than default.
		height: 400,

		// autoGrow_minHeight = 300,
		// autoGrow_maxHeight = 600,
		// autoGrow_bottomSpace = 50,


		// An array of stylesheets to style the WYSIWYG area.

		// This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
		bodyClass: 'article-editor',

		// Reduce the list of block elements listed in the Format dropdown to the most commonly used.
		format_tags: 'p;h1;h2;h3;pre',

		// Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
		removeDialogTabs: 'image:advanced;link:advanced',

		// Define the list of styles which should be available in the Styles dropdown list.
		// If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
		// (and on your website so that it rendered in the same way).
		// Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
		// that file, which means one HTTP request less (and a faster startup).
		// For more information see https://ckeditor.com/docs/ckeditor4/latest/features/styles.html
		stylesSet: [
			/* Inline Styles */
			{
				name: 'Marker',
				element: 'span',
				attributes: {
					'class': 'marker'
				}
			},
			{
				name: 'Cited Work',
				element: 'cite'
			},
			{
				name: 'Inline Quotation',
				element: 'q'
			},

			/* Object Styles */
			{
				name: 'Special Container',
				element: 'div',
				styles: {
					padding: '5px 10px',
					background: '#eee',
					border: '1px solid #ccc'
				}
			},
			{
				name: 'Compact table',
				element: 'table',
				attributes: {
					cellpadding: '5',
					cellspacing: '0',
					border: '1',
					bordercolor: '#ccc'
				},
				styles: {
					'border-collapse': 'collapse'
				}
			},
			{
				name: 'Borderless Table',
				element: 'table',
				styles: {
					'border-style': 'hidden',
					'background-color': '#E6E6FA'
				}
			},
			{
				name: 'Square Bulleted List',
				element: 'ul',
				styles: {
					'list-style-type': 'square'
				}
			},

			/* Widget Styles */
			// We use this one to style the brownie picture.
			{
				name: 'Illustration',
				type: 'widget',
				widget: 'image',
				attributes: {
					'class': 'image-illustration'
				}
			},
			// Media embed
			{
				name: '240p',
				type: 'widget',
				widget: 'embedSemantic',
				attributes: {
					'class': 'embed-240p'
				}
			},
			{
				name: '360p',
				type: 'widget',
				widget: 'embedSemantic',
				attributes: {
					'class': 'embed-360p'
				}
			},
			{
				name: '480p',
				type: 'widget',
				widget: 'embedSemantic',
				attributes: {
					'class': 'embed-480p'
				}
			},
			{
				name: '720p',
				type: 'widget',
				widget: 'embedSemantic',
				attributes: {
					'class': 'embed-720p'
				}
			},
			{
				name: '1080p',
				type: 'widget',
				widget: 'embedSemantic',
				attributes: {
					'class': 'embed-1080p'
				}
			}
		]
	});
</script>