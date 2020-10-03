module.exports = {
    entry: [
        './js/index.js',
    ],
    output: {
        filename: '../../js/bundle.js',
    },
    watchOptions: {
        ignored: /node_modules/
    },
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                loader: require.resolve('babel-loader'),
                options: {
                    plugins: [
                        [
                            "@babel/plugin-proposal-export-default-from"
                        ]
                    ]
                }
            }
        ],
    },
    resolve: {
        extensions: ['.js',],
    }
};
