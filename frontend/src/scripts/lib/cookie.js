
export function getCookie(name) {
   name = name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1');
   const matches = document.cookie.match(new RegExp(`(?:^|; )${name}=([^;]*)`));
   return matches ? decodeURIComponent(matches[1]) : undefined;
}

/**
 * @param {string} name
 * @param {string} value
 * @param {number} ttl
 * @param {{
 *    path: string,
 *    domain: string,
 *    secure: string,
 * }} options
 */
export function setCookie(name, value, ttl, options = {}) {
   options = {
      path: '/',
      'max-age': ttl,
      ...options,
   };

   let cookie = `${encodeURIComponent(name)}=${encodeURIComponent(value)}`;

   for (const key in options) {
      cookie += `; ${key}`;
      const optionValue = options[key];
      if (optionValue !== true) {
         cookie += `= ${optionValue}`;
      }
   }

   document.cookie = cookie;
}

export function deleteCookie(name) {
   setCookie(name, '', -1);
}