import './assets';

import initAppLayout from '@/layouts/app';
import { processDefErr } from '@/scripts/utils/base';
import { createProject } from '@/scripts/api/projects';

initAppLayout();

const $form = document.querySelector('.form-js');

$form.addEventListener('submit', (e) => {
   e.preventDefault();
   submit();
});

async function submit() {
   try {
      const { slug } = await createProject(getData());
      const username = 'lorem';
      location.href = `/users/${username}/slug`;
   } catch (e) {
      processDefErr(e);
   }
}

function getData() {
   return {
      name: $form.name.value.trim(),
      contract: $form.contract.value.trim(),
      contract_type: $form.contract_type.value.trim(),
      start_at: $form.start_at.value,
      end_at: $form.end_at.value,
   };
}
