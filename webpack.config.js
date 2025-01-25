const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
  ...defaultConfig,
  stats: "errors-only", // Only show errors in the terminal
};
