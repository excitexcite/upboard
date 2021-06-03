import './assets';

import initAppLayout from '@/layouts/app';

initAppLayout();

document.addEventListener('click', () => {
   test();
});

function test() {
   console.log('hi');
}
