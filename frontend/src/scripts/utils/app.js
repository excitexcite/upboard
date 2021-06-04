import { deleteCookie } from '../lib/cookie';

export function logout() {
   deleteCookie('token');
   location.href = '/';
}

export function isRootRole(role) {
   return role === 'admit' || role === 'pm' || role === 'ceo';
}
