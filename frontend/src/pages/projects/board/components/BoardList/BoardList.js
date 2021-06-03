import Events from '@/scripts/lib/Events';
import Task from '../Task/Task';

export default class BoardList {
   /** @type {Task[]} */
   _tasks = [];

   /** @param {HTMLElement} root */
   constructor(root) {
      this.$root = root;
      this._init();
   }

   /** @param {Task} task */
   addTask(task, render = true) {
      this._tasks.push(task);
      if (render) this.render();
   }

   render() {
      this.$list.innerHTML = '';
      this._tasks.sort(this._sortFunc).forEach((task) => {
         this.$list.appendChild(task.root);
      });
   }

   /**
    * @param {string} id
    * @returns {Task}
    */
   deleteById(id) {
      const index = this._tasks.findIndex(t => `${t.data.id}` === `${id}`);
      if (index === -1) return undefined;
      return this._tasks.splice(index, 1)?.[0];
   }

   /**
   * @param {string} id
   * @returns {Task}
   */
   getById(id) {
      return this._tasks.find(t => `${t.data.id}` === `${id}`);
   }

   _init() {
      this._getElements();
   }

   /**
    * @param {Task} a
    * @param {Task} b
    * @returns {bool}
    */
   _sortFunc(a, b) {
      const d = new Date(a.data.start_at) - new Date(b.data.start_at);
      if (d !== 0) {
         return d;
      }

      return a.data.id - b.data.id;
   }

   _getElements() {
      this.$list = this.$root.querySelector('.board-list--list');
   }
}
