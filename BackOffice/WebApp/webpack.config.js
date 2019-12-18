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
	devtool: 'none',
	// devtool: 'cheap-module-source-map',
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
			'process.env.NODE_ENVIRONMENT': JSON.stringify('PROD')
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
		// new PreloadWebpackPlugin({
		//     rel: 'preload',
		//     as: 'script',
		//     include: 'all',
		//     fileBlacklist: [/\.(css|map)$/, /base?.+/]
		// }),
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

// const webpack = require('webpack');
// const path = require('path');
// const ExtractTextPlugin = require('extract-text-webpack-plugin');
// const HtmlWebpackPlugin = require('html-webpack-plugin');
// const CopyWebpackPlugin = require('copy-webpack-plugin');
// const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// const extractCSS = new ExtractTextPlugin('[name].fonts.css');
// const extractSCSS = new ExtractTextPlugin('[name].styles.css');

// const BUILD_DIR = path.resolve(__dirname, 'build');
// const SRC_DIR = path.resolve(__dirname, 'src');

// console.log('BUILD_DIR', BUILD_DIR);
// console.log('SRC_DIR', SRC_DIR);

// module.exports = (env = {}) => {
//   return {
//     entry: {
//       index: [SRC_DIR + '/index.js']
//     },
//     output: {
//       path: BUILD_DIR,
//       filename: '[name].bundle.js'
//     },
//     // watch: true,
//     devtool: env.prod ? 'source-map' : 'cheap-module-eval-source-map',
//     devServer: {
//       contentBase: BUILD_DIR,
//       //   port: 9001,
//       compress: true,
//       hot: true,
//       open: true
//     },
//     module: {
//       rules: [
//         {
//           test: /\.(js|jsx)$/,
//           exclude: /node_modules/,
//           use: {
//             loader: 'babel-loader',
//             options: {
//               cacheDirectory: true,
//               presets: ['react', 'env'],
//               plugins: [
//                 'transform-class-properties',
//                 'babel-plugin-transform-class-properties'
//               ]
//             }
//           }
//         },
//         {
//           test: /\.html$/,
//           loader: 'html-loader'
//         },
//         {
//           test: /\.(scss)$/,
//           use: ['css-hot-loader'].concat(extractSCSS.extract({
//             fallback: 'style-loader',
//             use: [
//               {
//                 loader: 'css-loader',
//                 options: {alias: {'../img': '../public/img'}}
//               },
//               {
//                 loader: 'sass-loader'
//               }
//             ]
//           }))
//         },
//         {
//           test: /\.css$/,
//           use: extractCSS.extract({
//             fallback: 'style-loader',
//             use: 'css-loader'
//           })
//         },
//         {
//           test: /\.(png|jpg|jpeg|gif|ico)$/,
//           use: [
//             {
//               loader: 'file-loader',
//               options: {
//                 name: './img/[name].[hash].[ext]'
//               }
//             }
//           ]
//         },
//         {
//           test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
//           loader: 'file-loader',
//           options: {
//             name: './fonts/[name].[hash].[ext]'
//           }
//         }]
//     },
//     plugins: [
//       new webpack.HotModuleReplacementPlugin(),
//       // new webpack.optimize.UglifyJsPlugin(),
//       new UglifyJsPlugin({
//         parallel: true
//       }),
//       new webpack.NamedModulesPlugin(),
//       extractCSS,
//       extractSCSS,
//       new HtmlWebpackPlugin(
//         {
//           inject: true,
//           template: './public/index.html'
//         }
//       ),
//       new CopyWebpackPlugin([
//           {from: './public/img', to: 'img'}
//         ],
//         {copyUnmodified: false}
//       ),
//       new CopyWebpackPlugin([
//           {from: './src/sounds', to: 'sounds'}
//         ],
//         {copyUnmodified: false}
//       )
//     ]
//   }
// };