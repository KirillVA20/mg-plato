const path = require("path");
var webpack = require("webpack");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
var ExtractTextPlugin = require("extract-text-webpack-plugin");


module.exports = {
	entry:'./src/js/index.js',
	output: {
		filename: "main.js",
    	path: path.resolve(__dirname, 'js')
	},
	watch: true,
	optimization: {
		minimize: true,
		minimizer: [ new TerserPlugin()],
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [
					{
			        	loader: 'css-loader',
			        	options: { sourceMap: true }
			        },
			        'style-loader',

				]
			},
			 {
		        test: /\.scss$/,
		        use: [
		        	'style-loader',
		              MiniCssExtractPlugin.loader,
		              {
		                loader: 'css-loader',
		                options: { sourceMap: true }
		              }, 
		              {
			            loader: 'sass-loader',
			            options: { sourceMap: true }
			          }
		        ]
		      },
			{
		        test: /\.(gif|png|jpg|jpeg|svg)?$/,
		        loader: 'file-loader',
		        options: {
		        	name: 'IMG/[name].[ext]',
		        },
	        },
		]
	},
	plugins: [
		/*new HtmlWebpackPlugin({
	      filename: 'index.html',
	      template: './src/index.html',
	      chunks: ['index']
	    }),*/
	    new MiniCssExtractPlugin( {
	    	filename: "../css/style.css"
	    }),
	    new CleanWebpackPlugin(),
	]

}
