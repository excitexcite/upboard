import { deleteCookie } from '../lib/cookie';

export function logout() {
   deleteCookie('token');
   location.href = '/';
}
