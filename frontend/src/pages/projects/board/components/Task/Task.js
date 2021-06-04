import { updateTask } from '@/scripts/api/projects';
import microTemplate from '@/scripts/lib/microTmpl';
import { hideModal, htmlToElem, processDefErr, showModal } from '@/scripts/utils/base';

import tmpl from './task.html';

export default class Task {
   /** @param {TaskData} taskData */
   constructor(taskData) {
      this.data = taskData;
      this._init();
   }

   _init() {
      this._getElements();
      this._createRoot();
      this._render();
      this._initEvents();
   }

   _render() {
      this.root.innerHTML = microTemplate(tmpl, this);
   }

   _createRoot() {
      this.root = document.createElement('li');
      this.root.className = 'task board-list--task';
      this.root.dataset.id = this.data.id;
   }

   _initEvents() {
      this.root.addEventListener('click', () => {
         this._startEdit();
      });

      this.$editModalForm.addEventListener('submit', (e) => {
         e.preventDefault();
         if (this.$editModalForm.id.value !== `${this.data.id}`) {
            return;
         }
         this._edit();
      });
   }

   _startEdit() {
      this._setEditModal();
      showModal('edit-task-modal');
   }

   _setEditModal() {
      this.$editModalForm.reset();
      this.$editModalForm.id.value = this.data.id;
      this.$editModalForm.name.value = this.data.name;
      this.$editModalForm.status.value = this.data.status;
      this.$editModalForm.type.value = this.data.type;
      this.$editModalForm.estimate.value = this.data.estimate;
   }

   async _edit() {
      const estimate = this.$editModalForm.estimate.value;
      this.data.name = this.$editModalForm.name.value;
      this.data.status = this.$editModalForm.status.value;
      this.data.type = this.$editModalForm.type.value;
      this.data.estimate = estimate ? new Date(estimate) : null;

      try {
         this.$editModalForm.ok.disabled = true;
         await updateTask(this.data);
         hideModal('edit-task-modal');
      } catch (e) {
         processDefErr(e);
      } finally {
         this.$editModalForm.ok.disabled = false;
      }

      this._render();
   }

   _getElements() {
      this.$editModalForm = document.body.querySelector('.edit-task-form-js');
   }
}
