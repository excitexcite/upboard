import { BASE_TXT } from '../common/textMsg';
import { logout } from '../utils/app';

export default function initPage() {
   initCommonEvents();
}

function initCommonEvents() {
   document.body.addEventListener('click', (e) => {
      if (!e.target.closest('.logout-js')) return;

      e.preventDefault();
      logout();
   });
}
