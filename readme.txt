
===Gutenberg Plugin  ===
Author: Aishan
Tags: gutenberg

== Description ==
	- This plugin can be used as a starter for a general idea to create custom dynamic block element in gutenberg.
	- Usages
		* Gutenberg ServerSideRender for Dynamic render output
== Contains ==
	- All Four plugins in this repo got the same block, with different approach and folder structure.
		* custom-gutenberg-blocks-v1: without webpack used; i.e. simple but requires manual minification on deployment
			- In this plugin i have include two block:
				1) "current-year-shortcode"
					- spl/block-current-year-shortcode: Sample Current Year Shortcode,
					- conversion of shortcode to Gutenberg block render
					- User can change the date format from Inspector Panel
				2) "sample-gridview":
					- spl/block-sample-gridview: Sample Gridview List
					- usages wp_localize_script for populate SelectOption on Inspector Panel
					- User can select postype from Inspector Panel
		* custom-gutenberg-blocks-v2: used webpack & other packages; and is complied end result to "assets" folder on root path
			- In this plugin i have include two block same code as in above versions:
				1) "current-year-shortcode":
					- isn/block-current-year-shortcode: ISN Current Year Shortcode
					- conversion of shortcode to Gutenberg block render
					- User can change the date format from Inspector Panel
				2) "sample-gridview":
					- isn/block-sample-gridview: ISN Sample Gridview,
					- usages wp_localize_script for populate SelectOption on Inspector Panel
					- User can select postype from Inspector Panel
		* custom-gutenberg-blocks-v3: same as custom-gutenberg-blocks-v2 but tweek made to complie end result to "blocks/dist" folder on root path
			- In this plugin i have include two block same code as in above versions:
				1) "current-year-shortcode":
					- isn/block-current-year-shortcode: ISN Current Year Shortcode
					- conversion of shortcode to Gutenberg block render
					- User can change the date format from Inspector Panel
				2) "sample-gridview":
					- isn/block-sample-gridview: ISN Sample Gridview,
					- usages wp_localize_script for populate SelectOption on Inspector Panel
					- User can select postype from Inspector Panel
		* custom-gutenberg-blocks-v4: without webpack used; and utilizes "create-guten-block" package
			(https://www.npmjs.com/package/create-guten-block);
			- In this plugin i have include two block same code as in above versions:
				1) "current-year-shortcode":
					- isn/block-current-year-shortcode: ISN Current Year Shortcode
					- conversion of shortcode to Gutenberg block render
					- User can change the date format from Inspector Panel
				2) "sample-gridview":
					- isn/block-sample-gridview: ISN Sample Gridview,
					- usages wp_localize_script for populate SelectOption on Inspector Panel
					- User can select postype from Inspector Panel


== For Installation & Building Custom Block==
	- Download all file
	- Open gitbash to install packages: npm install
	- Build Dev version: npm start ( UnMinify Version; this command will compiled CSS/JS into dist folder)


== For Deployment to Production ==
	- Build Production version:  npm run build ( CompiledMinify Version; this command will compiled CSS/JS into dist folder)
	- Deploy all files/folder excerpt following files:
		* file: package.json
		* folder: config
		* folder: node_modules
		* folder: scripts

== For Reference
	- https://github.com/ahmadawais/create-guten-block

