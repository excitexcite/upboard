import './assets';

import initAppLayout from '@/layouts/app';
import { getTemplateData, processDefErr } from '@/scripts/utils/base';
import { updateUser } from '@/scripts/api/user';

initAppLayout();

const $form = document.querySelector('.form-js');

const user = getTemplateData('user');

$form.addEventListener('submit', (e) => {
   e.preventDefault();
   submit();
});

async function submit() {
   try {
      await updateUser(getData());
      location.reload();
   } catch (e) {
      processDefErr(e);
   }
}

function getData() {
   return {
      id: user.id,
      first_name: $form.first_name.value.trim(),
      last_name: $form.last_name.value.trim(),
   };
}
