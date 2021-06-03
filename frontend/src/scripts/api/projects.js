import { makeApiRequest } from '../utils/api';

/**
 * @param {Project} data
 */
export function createProject(data) {
   return makeApiRequest('/projects', 'POST', { data });
}
