module.exports = {
  // ...
  devServer: {
    proxy: {
      '/api': {
        target: 'http://localhost:80/project_vue2_documentation/vue_cdn/vue_crud_2/process.php',
        changeOrigin: true,
        pathRewrite: {               // added this
          '^/api': ''                // added this
        },                           // added this
      }
    }
  }
};