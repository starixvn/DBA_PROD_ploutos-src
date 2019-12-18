const path = require('path')
const webpack = require('webpack')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
// const PreloadWebpackPlugin = require('preload-webpack-plugin')
const ScriptExtHtmlWebpackPlugin = require('script-ext-html-webpack-plugin')
const StyleExtHtmlWebpackPlugin = require('style-ext-html-webpack-plugin')
const CompressionPlugin = require('compression-webpack-plugin')
const autoprefixer = require('autoprefixer')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const staticSourcePath = path.join(__dirname, 'static')
const sourcePath = path.join(__dirname, 'src')
const buildPath = path.join(__dirname, 'build')

module.exports = {
	// devtool: 'cheap-module-source-map',
	devtool: 'none',
	devServer: {
		contentBase: buildPath,
		compress: true,
		hot: true,
		open: true
	},
	entry: {
		app: path.resolve(sourcePath, 'index.js'),
	},
	output: {
		path: path.join(__dirname, 'build'),
		filename: '[name].bundle.js',
		publicPath: '/'
	},
	resolve: {
		extensions: ['.webpack-loader.js', '.web-loader.js', '.loader.js', '.js', '.jsx'],
		modules: [
			sourcePath,
			path.resolve(__dirname, 'node_modules')
		]
	},
	plugins: [
		new webpack.DefinePlugin({
			'process.env.NODE_ENV': JSON.stringify('production'),
			'process.env.NODE_ENVIRONMENT': JSON.stringify('UAT'),
			'process.env.NODE_ENV_ENDPOINT': JSON.stringify('http://uat.api.beachheadsolutionsinc.com')
		}),
		new webpack.optimize.ModuleConcatenationPlugin(),
		new webpack.optimize.CommonsChunkPlugin({
			name: 'vendor',
			filename: 'vendor.[chunkhash].js',
			minChunks (module) {
				return module.context && module.context.indexOf('node_modules') >= 0
			}
		}),
		new webpack.optimize.UglifyJsPlugin({
			compress: {
				warnings: false,
				screw_ie8: true,
				conditionals: true,
				unused: true,
				comparisons: true,
				sequences: true,
				dead_code: true,
				evaluate: true,
				if_return: true,
				join_vars: true
			},
			output: {
				comments: false
			}
		}),
		new webpack.LoaderOptionsPlugin({
			options: {
				postcss: [
					autoprefixer({
						browsers: [
							'last 3 version',
							'ie >= 10'
						]
					})
				],
				context: staticSourcePath
			}
		}),
		new webpack.HashedModuleIdsPlugin(),
		new HtmlWebpackPlugin({
			template: './public/index.html',
			minify: {
				collapseWhitespace: true,
				collapseInlineTagWhitespace: true,
				removeComments: true,
				removeRedundantAttributes: true
			}
		}),
		new ScriptExtHtmlWebpackPlugin({
			defaultAttribute: 'defer'
		}),
		new ExtractTextPlugin({
			filename: '[name].[contenthash].css',
			allChunks: true
		}),
		new StyleExtHtmlWebpackPlugin({
			minify: true
		}),
		new CompressionPlugin({
			asset: '[path].gz[query]',
			algorithm: 'gzip',
			test: /\.js$|\.css$|\.html$|\.eot?.+$|\.ttf?.+$|\.woff?.+$|\.svg?.+$/,
			threshold: 10240,
			minRatio: 0.8
		}),
		new CopyWebpackPlugin([{
			from: './public/img',
			to: 'img'
		}],
		{
			copyUnmodified: false
		}
		),
		new CopyWebpackPlugin([{
			from: './src/sounds',
			to: 'sounds'
		}],
		{
			copyUnmodified: false
		}
		)
	],
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				use: [
					'babel-loader'
				],
				include: sourcePath
			},
			{
				test: /\.scss$/,
				exclude: /node_modules/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: [
						{ 
							loader: 'css-loader', 
							options: { 
								alias: { '../img': '../public/img' },
								minimize: true,
								url: false
							}
						},
						'postcss-loader',
						'sass-loader'
					]
				})
			},
			{
				test: /\.css$/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: 'css-loader'
				})
			},
			{
				test: /\.(eot?.+|svg?.+|ttf?.+|otf?.+|woff?.+|woff2?.+)$/,
				use: 'file-loader?name=assets/[name]-[hash].[ext]'
			},
			{
				test: /\.(png|jpg|jpeg|gif|ico)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: './img/[name].[hash].[ext]'
						}
					}
				]
			},
		]
	}
}
