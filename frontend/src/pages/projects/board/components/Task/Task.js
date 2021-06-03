import microTemplate from '@/scripts/lib/microTmpl';
import { htmlToElem } from '@/scripts/utils/base';

import tmpl from './task.html';

export default class Task {
   /** @param {TaskData} taskData */
   constructor(taskData) {
      this.data = taskData;
      this._init();
   }

   _init() {
      this._render();
   }

   _render() {
      this.root = htmlToElem(microTemplate(tmpl, this));
      this._initEvents();
   }

   _initEvents() {
      this.root.addEventListener('click', () => {
         console.log(this.data.id);
      });
   }
}
