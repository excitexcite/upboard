import { makeApiRequest } from '../utils/api';

/**
 * @param {{ email: string, password: string }} data
 * @returns {User}
 */
export function login(data) {
   return makeApiRequest('/users/login', 'POST', { data });
}
