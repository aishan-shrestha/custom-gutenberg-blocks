=== Custom Gutenberg Blocks V3 ===
Author: Aishan
Tags: gutenberg


== Description ==
	- This plugin can be used as a starter for a general idea to create custom dynamic block element in gutenberg. Idea of compilation using webpack is taken from Create Guten Block. https://github.com/ahmadawais/create-guten-block.
	- custom-gutenberg-blocks-v3: same as custom-gutenberg-blocks-v2 but tweek made to complie end result to "blocks/dist" folder on root path.
	- This plugin has two Dynamic Block using ServerSideRender
	- Two block were as follow:
	- In this plugin i have include two block:
		1) "current-year-shortcode":
			- isn/block-current-year-shortcode: ISN Current Year Shortcode
			- conversion of shortcode to Gutenberg block render
			- User can change the date format from Inspector Panel
		2) "sample-gridview":
			- isn/block-sample-gridview: ISN Sample Gridview,
			- usages wp_localize_script for populate SelectOption on Inspector Panel
			- User can select postype from Inspector Panel

== For Further Reference ==
	- https://wordpress.org/gutenberg/handbook/blocks/creating-dynamic-blocks/
	- https://wordpress.org/gutenberg/handbook/block-api/attributes/



== For Installation & Building Custom Block==
	- Download all file
	- Open gitbash to install packages: npm install
	- Build Dev version: npm start ( UnMinify Version; this command will compiled CSS/JS into blocks/dist folder)


== For Deployment to Production ==
	- Build Production version:  npm run build ( CompiledMinify Version; this command will compiled CSS/JS into blocks/dist folder)
	- Deploy all files/folder excerpt following files:
		* file: package.json
		* folder: config
		* folder: node_modules
		* folder: scripts