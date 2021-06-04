import { makeApiRequest } from '../utils/api';

/**
 * @param {{ email: string, password: string }} data
 * @returns {User}
 */
export function login(data) {
   return makeApiRequest('/users/login', 'POST', { data });
}

/**
 * @param {{ email: string, username: string, password: string }} data
 * @returns {User}
 */
 export function register(data) {
   return makeApiRequest('/users/register', 'POST', { data });
}

/**
 * @param {User} data
 * @returns {User}
 */
export function updateUser(data) {
   return makeApiRequest(`/users/${data.id}`, 'PATCH', { data });
}

/** @param {{email: string}} data */
 export function sendForgotEmail(data) {
   return makeApiRequest(`/users/send-forgot`, 'POST', { data });
}
