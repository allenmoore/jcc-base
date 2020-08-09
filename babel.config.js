/**
 * Babel Config, .babelrc equivalent.
 *
 * @package TenUpScaffold
 *
 * @type {{presets: [[]|String|Object]}}
 */
module.exports = {
	'presets': [
		[
			/**
			 * @link https://babeljs.io/docs/en/babel-preset-env#corejs
			 */
			'@babel/preset-env',
			{
				useBuiltIns: 'usage',
				corejs: {
					version: 3,
					proposals: true
				},
        'forceAllTransforms': true
			}
		],
		'@babel/preset-react',
		'@wordpress/default'
	],
	'plugins': [
		['@babel/plugin-proposal-class-properties', { 'loose': true }],
		'@babel/plugin-syntax-class-properties'
	]
};
