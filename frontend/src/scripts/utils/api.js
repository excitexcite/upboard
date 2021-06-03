import { BASE_TXT } from '../common/textMsg';
import { AppError, HttpError } from '../errors/errors';

/**
 * @param {string} path
 * @param {{
 *    method: 'GET'|'POST'|'PUT'|'PATCH'|'DELETE',
 *    data: any,
 *    auth?: boolean,
 *    requestInit: RequestInit,
 * }} param1
 */
export async function makeApiRequest(path, method, {
   data,
} = {}) {
   const headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
   };

   try {
      const resp = await fetch(`${process.env.API}${path}`, {
         body: JSON.stringify(data),
         method, headers,
      });

      if (!resp.ok) {
         throw await HttpError.fromApiResponse(resp);
      }

      return (await resp.json()).data;

   } catch (e) {
      if (isNetworkError(e)) {
         throw new AppError(BASE_TXT.NetworkError, e);
      }
      throw e;
   }
}

export function isNetworkError(e) {
   return e instanceof Error && e.message === 'Failed to fetch';
}
