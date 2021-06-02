const pages = [
   page('pages/home/landing'),
   page('pages/home/dashboard'),
   page('pages/auth/register'),
   page('pages/auth/login'),
];

const components = [
   template('components/header'),
   template('components/footer'),
];

const layouts = [
   template('layouts/app'),
   template('layouts/empty'),
];

const allPages = [
   ...pages,
   ...components,
   ...layouts,
];

function page(path) {
   return {
      ...template(path),
      entry: `${path}/index.js`,
   };
}

function template(path) {
   return {
      name: path,
      tmpl: `${path}/index.blade.php`,
      view: `${path}.blade.php`,
   };
}

module.exports = { pages: allPages };
