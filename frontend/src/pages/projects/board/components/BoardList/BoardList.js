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

   _init() {
      this._getElements();
   }

   /**
    * @param {Task} a
    * @param {Task} b
    * @returns {bool}
    */
   _sortFunc(a, b) {
      return new Date(a.data.start_at) - new Date(b.data.start_at);
   }

   _getElements() {
      this.$list = this.$root.querySelector('.board-list--list');
   }
}
