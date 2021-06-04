import './assets';

import initEmptyLayout from '@/layouts/empty';
import { register } from '@/scripts/api/user';
import { processDefErr } from '@/scripts/utils/base';
import { setCookie } from '@/scripts/lib/cookie';
import { DURATIONS } from '@/scripts/common/constants';

initEmptyLayout();

const $form = document.querySelector('.auth-form-js');

$form.addEventListener('submit', (e) => {
   e.preventDefault();
   submit();
});

async function submit() {
   try {
      await _register();
      location.href = '/';
   } catch(e) {
      processDefErr(e);
   }
}

async function _register() {
   const { token } = await register({
      email: $form.email.value,
      username: $form.username.value,
      password: $form.password.value,
   });

   setCookie('token', token, DURATIONS.year);
}
