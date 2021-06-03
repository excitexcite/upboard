import { makeApiRequest } from '../utils/api';

/** @param {ProjectData} data */
export function createProject(data) {
   return makeApiRequest('/projects', 'POST', { data });
}

/**
 * @param {string} projectId,
 * @returns {Promise<TaskData[]>}
 */
export function fetchTasks(projectId, data) {
   return makeApiRequest(`/projects/${projectId}/tasks`, 'GET');
}

/**
 * @param {string} projectId,
 * @param {TaskData} data,
 */
 export function addTask(projectId, data) {
   return makeApiRequest(`/projects/${projectId}/tasks`, 'POST', { data });
}

/** @param {TaskData} data */
 export function updateTask(data) {
   return makeApiRequest(`/tasks/${data.id}`, 'PATCH', { data });
}
