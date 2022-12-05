
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');


let conf = {
    entry : './src/main.js',
    stats: { warnings: false }, // Hide warnings
    output : {
        path : path.resolve(__dirname,'./dist'),
        filename : 'main.min.js',
        publicPath : 'dist/'

    },
    module : {
        rules : [
            {
                test : /\.js$/,
                // exclude: /node_modules/,
                use: [{
                    loader: 'babel-loader'
                }]
            },

            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            hmr: process.env.NODE_ENV === 'development',
                        },
                    },
                    'css-loader',
                    'sass-loader',
                ],

            },
            {
                test: /\.css$/,
                use: [ 'style-loader', 'css-loader']
            }
        ]
    },
    plugins: [

        new MiniCssExtractPlugin({
            filename: 'css/main.min.css',
        }),

    ],
    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin({
                cssProcessorOptions: {
                    map: {
                        inline: true
                    }
                }
            })
        ],
    },
};

module.exports = (env, options) => {
    return conf;
};