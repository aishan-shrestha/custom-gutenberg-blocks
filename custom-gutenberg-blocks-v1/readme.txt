=== Custom Gutenberg Blocks V1 ===
Author: Aishan
Tags: gutenberg


== Description ==
	- This plugin can be used as a starter for a general idea to create custom dynamic block element in gutenberg.
	- custom-gutenberg-blocks-v1: without webpack used; i.e. simple but requires manual minification on deployment
	- This plugin has two Dynamic Block using ServerSideRender
	- Two block were as follow:
		1) "current-year-shortcode"
			- spl/block-current-year-shortcode: Sample Current Year Shortcode,
			- conversion of shortcode to Gutenberg block render
			- User can change the date format from Inspector Panel
		2) "sample-gridview":
			- spl/block-sample-gridview: Sample Gridview List
			- usages wp_localize_script for populate SelectOption on Inspector Panel
			- User can select postype from Inspector Panel

== For Further Reference ==
	- https://wordpress.org/gutenberg/handbook/blocks/creating-dynamic-blocks/
	- https://wordpress.org/gutenberg/handbook/block-api/attributes/

