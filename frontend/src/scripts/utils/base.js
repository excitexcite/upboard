import Micromodal from 'micromodal';
import { COMMON_MICROMODAL } from '../common/constants';

export const escapeHtml = (function () {
   const map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#x27;',
      '`': '&#x60;',
   };
   const escaper = function (match) {
      return map[match];
   };
   const source = `(?:${Object.keys(map).join('|')})`;
   const testRegexp = RegExp(source);
   const replaceRegexp = RegExp(source, 'g');

   return function (string) {
      string = string === null ? '' : `${string}`;
      return testRegexp.test(string) ? string.replace(replaceRegexp, escaper) : string;
   };
}());

export function asyncRedirect(url) {
   requestAnimationFrame(() => location.href = url);
}

export function asyncReload() {
   requestAnimationFrame(() => location.reload());
}

export function setClassIf(el, className, val) {
   if (val) el.classList.add(className);
   else el.classList.remove(className);
}

/**
 * @param {string} id
 * @param {import('micromodal').MicroModalConfig} config
 */
export function showModal(id, modalConfig) {
   return new Promise((resolve) => {
      const config = { ...COMMON_MICROMODAL, ...modalConfig };

      Micromodal.show(id, {
         ...config,
         async onClose() {
            await config.onClose?.();
            resolve();
         },
      });
   });
}

export function hideModal(id) {
   Micromodal.close(id);
}

/**
 * @param {String} html
 * @returns {HTMLElement}
 */
export function htmlToElem(html) {
   const template = document.createElement('template');
   template.innerHTML = html;

   return template.content.firstChild;
}

export function getTemplateData(key) {
   try {
      const sel = `script[template-data="${key}"]`;
      const json = document.querySelector(sel);
      return (json) ? JSON.parse(json.textContent) : false;
   } catch (err) {
      console.error(`Couldn't read JSON data from '${key}'`, err);
   }
   return false;
}
