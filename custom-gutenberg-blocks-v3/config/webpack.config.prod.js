
/*
 * Added some constants and requires file & packages.
*/
const paths             = require( './paths' );
const webpack           = require( 'webpack' );
const autoprefixer      = require( 'autoprefixer' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );

// Source maps are resource heavy and can cause out of memory issue for large source files.
const shouldUseSourceMap = process.env.GENERATE_SOURCEMAP !== 'false';

/*
 * ExtractTextPlugin enables us to pull in files other than JavaScript into the mix.
 * Extract style.css for both editor and frontend styles.
 * Extract editor.css for editor styles.
 * By default, webpack assumes everything is JavaScript, so ExtractTextPlugin kind of *translates* the other types of files.
*/
const blocksCSSPlugin = new ExtractTextPlugin( {
	filename: './blocks/dist/blocks.style.build.css',
} );
const editBlocksCSSPlugin = new ExtractTextPlugin( {
	filename: './blocks/dist/blocks.editor.build.css',
} );


/*
 * This object is going to tell our webpack instance how to behave when it comes across scss files.
 * Configuration for the ExtractTextPlugin — DRY rule.
*/
const extractConfig = {
	use: [
		// "postcss" loader applies autoprefixer to our CSS.
		{ loader: 'raw-loader' },
		{
			loader: 'postcss-loader',
			options: {
				ident: 'postcss',
				plugins: [
					autoprefixer( {
						browsers: [
							'>1%',
							'last 4 versions',
							'Firefox ESR',
							'not ie < 9', // React doesn't support IE8 anyway
						],
						flexbox: 'no-2009',
					} ),
				],
			},
		},
		// "sass" loader converst SCSS to CSS.
		{
			loader: 'sass-loader',
			options: {
				// Add common CSS file for variables and mixins.
				data: '@import "./blocks/src/common.scss";\n',
				outputStyle: 'compressed',
			},
		},
	],
};

/*
 * Export configuration.
 * entry: is where we tell webpack to start its journey of pack-ery. In our instance, this is the path to our blocks.js file.
 * output: is what it says on the tin. We’re passing an object that defines the output path and the filename that we want to call it.
 * devtool: is where we define what sort of sourcemap we may or may not want. If we’re not in debug mode, we pass null with a ternary operator.
 * module: contain multiple rules. Add if you have other rule needed
 */
module.exports = {
	entry: {
		'./blocks/dist/blocks.build': paths.pluginBlocksJs, // 'name' : 'path/file.ext' ('./blocks/dist/block' : './block/block.js',)
	},
	output: {
		pathinfo: true,
		path: paths.pluginDest, // The blocks folder.
		filename: '[name].js', // [name] = './blocks/blocks.build' as defined above.
	},
	// You may want 'eval' instead if you prefer to see the compiled output in DevTools.
	devtool: 'cheap-eval-source-map',
	module: {
		rules: [
			{
				test: /\.(js|jsx|mjs)$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {

						// This is a feature of `babel-loader` for webpack (not Babel itself).
						// It enables caching results in ./node_modules/.cache/babel-loader/
						// directory for faster rebuilds.
						cacheDirectory: true,
					},
				},
			},
			{
				test: /font-awesome\.s?css$/,
				exclude: /(node_modules|bower_components)/,
				use: blocksCSSPlugin.extract( extractConfig ),
			},
			{
				test: /style\.s?css$/,
				exclude: /(node_modules|bower_components)/,
				use: blocksCSSPlugin.extract( extractConfig ),
			},
			{
				test: /editor\.s?css$/,
				exclude: /(node_modules|bower_components)/,
				use: editBlocksCSSPlugin.extract( extractConfig ),
			},
		],
	},
	// Add plugins.
	plugins: [
		blocksCSSPlugin,
		editBlocksCSSPlugin,
		// Minify the code.
		new webpack.optimize.UglifyJsPlugin( {
			compress: {
				warnings: false,
				// Disabled because of an issue with Uglify breaking seemingly valid code:
				// https://github.com/facebookincubator/create-react-app/issues/2376
				// Pending further investigation:
				// https://github.com/mishoo/UglifyJS2/issues/2011
				comparisons: false,
			},
			mangle: {
				safari10: true,
			},
			output: {
				comments: false,
				// Turned on because emoji and regex is not minified properly using default
				// https://github.com/facebookincubator/create-react-app/issues/2488
				ascii_only: true,
			},
			sourceMap: shouldUseSourceMap,
		} ),
	],
	stats: 'minimal',
	// stats: 'errors-only',
};
