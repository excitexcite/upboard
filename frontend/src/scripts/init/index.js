import globals from '../common/globals';
import { logout } from '../utils/app';
import { getTemplateData } from '../utils/base';

export default function initPage() {
   initUser();
   initCommonEvents();
}

function initUser() {
   globals.user = getTemplateData('auth-user');
}

function initCommonEvents() {
   document.body.addEventListener('click', (e) => {
      if (!e.target.closest('.logout-js')) return;

      e.preventDefault();
      logout();
   });
}
