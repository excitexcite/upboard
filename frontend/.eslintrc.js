module.exports = {
   env: {
      'browser': true,
      'node': true,
      'es6': true,
   },
   extends: [
      'eslint:recommended',
   ],
   plugins: [
      'literal-blacklist',
   ],
   rules: {
      'semi': ['warn', 'always'],
      'comma-dangle': ['warn', 'always-multiline'],
      'quotes': ['warn', 'single', {
         allowTemplateLiterals: true,
         avoidEscape: true,
      }],
      'prefer-const': ['warn', {
         destructuring: 'all',
      }],
      'no-multiple-empty-lines': ['warn', {
         max: 2,
      }],
      'no-trailing-spaces': ['warn', {
         skipBlankLines: true,
      }],
      'prefer-template': ['warn'],
      'no-useless-concat': ['warn'],
      'prefer-arrow-callback': ['warn'],
      'eqeqeq': ['warn'],
      'no-var': ['warn'],

      'literal-blacklist/literal-blacklist': ['warn', ['DOMContentLoaded']],

      'no-unused-vars': ['off'],
      'no-unreachable': ['off'],
      'no-constant-condition': ['off'],
      'no-useless-escape': ['off'],
   },
   globals: {
      bowser: true,
      google: true,
      FB: true,
      AppleID: true,
      humTracker: true,
   },
   parser: 'babel-eslint',
   parserOptions: {
      ecmaVersion: 2019,
      sourceType: 'module',
   },
};