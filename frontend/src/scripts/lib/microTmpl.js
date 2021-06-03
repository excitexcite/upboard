import { escapeHtml } from '../utils/base';

const cache = new Map();
const utils = { escapeHtml };

export default function microTemplate(template, data = {}) {
   if (cache.has(template)) {
      return cache.get(template)(data, utils);
   }

   const parsed = template
      .replace(/[\r\t\n]/g, ' ')
      .split('<%').join('\t')
      .replace(/((^|%>)[^\t]*)'/g, '$1\r')
      .replace(/\t=(.*?)%>/g, "',utils.escapeHtml($1),'")
      .replace(/\t-html(.*?)%>/g, "',$1,'")
      .split('\t').join("');")
      .split('%>').join("p.push('")
      .split('\r').join("\\'");

   const fn = new Function('$, utils',
      `let p=[];p.push('${parsed}');return p.join('');`,
   );

   cache.set(template, fn);
   return fn(data, utils);
}
