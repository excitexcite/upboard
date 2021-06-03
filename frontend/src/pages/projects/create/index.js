import './assets';
import { createProject } from '@/scripts/api/projects';

import initAppLayout from '@/layouts/app';

initAppLayout();

document.addEventListener('click', () => {
   test();
});

function test() {
   createProject({
      name: 'TestProject',
      contract: 'Test contract',
      contract_type: 'Type',
      start_at: new Date().toISOString(),
      end_at: new Date(2022, 0).toISOString(),
   });
}
