import './assets';

import initEmptyLayout from '@/layouts/empty';
import { login } from '@/scripts/api/user';
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
      await _login();
      location.href = '/';
   } catch(e) {
      processDefErr(e);
   }
}

async function _login() {
   const { token } = await login({
      email: $form.email.value,
      password: $form.password.value,
   });

   setCookie('token', token, DURATIONS.year);
}


