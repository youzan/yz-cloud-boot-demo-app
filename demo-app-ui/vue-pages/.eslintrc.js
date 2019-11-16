// https://eslint.org/docs/user-guide/configuring

module.exports = {
  root: true,
  parserOptions: {
    parser: 'babel-eslint'
  },
  env: {
    browser: true,
  },
  extends: [
    // https://github.com/vuejs/eslint-plugin-vue#priority-a-essential-error-prevention
    // consider switching to `plugin:vue/strongly-recommended` or `plugin:vue/recommended` for stricter rules.
    'plugin:vue/essential', 
    // https://github.com/standard/standard/blob/master/docs/RULES-en.md
    'standard'
  ],
  // required to lint *.vue files
  plugins: [
    'vue'
  ],
  // add your custom rules here
  rules: {
    // allow async-await
    'generator-star-spacing': 'off',
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    "one-var": 0,
    "no-var": 1,
    "max-len": 0,
    "comma-dangle": 0,
    "func-names": 0,
    "prefer-const": 0,
    "arrow-body-style": 0,
    "no-param-reassign": 0,
    "no-return-assign": 0,
    "no-underscore-dangle": [1, { "allowAfterThis": true }],
    "consistent-return": 0,
    "no-unused-expressions": 0,
    "no-multiple-empty-lines": [1, { "max": 2 }],
    "prefer-template": 1,
    "camelcase": [1, { "properties": "never" }],
    "indent": [1, 2, { "SwitchCase": 1 }],
    "chonsistent-this": 0,
    "keyword-spacing": [1, { "before": true, "after": true }],
    "space-in-parens": [1, "never"],
    "space-infix-ops": [1, { "int32Hint": false }],
    "space-before-blocks": [1, "always"],
    "key-spacing": [1, { "beforeColon": false, "afterColon": true }],
    "semi": [2, "always"],
    "space-before-function-paren": [0, "always"],//函数定义时括号前面要不要有空格
    "eqeqeq": 1
  }
}
