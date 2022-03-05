module.exports = {
  // redirecta ovunque ci sia la string localhost 
  devServer: {
    proxy: 'http://localhost:80'
  }
};