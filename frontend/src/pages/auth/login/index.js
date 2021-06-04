import './assets';

import initEmptyLayout from '@/layouts/empty';
import { login, sendForgotEmail } from '@/scripts/api/user';
import { processDefErr } from '@/scripts/utils/base';
import { setCookie } from '@/scripts/lib/cookie';
import { DURATIONS } from '@/scripts/common/constants';

initEmptyLayout();

const $form = document.querySelector('.auth-form-js');
const $forgot = document.querySelector('.forgot-js');

initEvents();

function initEvents() {
   $form.addEventListener('submit', (e) => {
      e.preventDefault();
      submit();
   });

   $forgot.addEventListener('click', (e) => {
      e.preventDefault();
      forgot();
   });
}

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

async function forgot() {
   const email = prompt('Enter your email address');
   if (!email) {
      return;
   }

   try {
      await sendForgotEmail({ email });
      alert('New password has been sent to your email address');
   } catch (e) {
      processDefErr(e);
   }
}

