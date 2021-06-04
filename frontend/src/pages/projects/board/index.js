import './assets';

import initAppLayout from '@/layouts/app';
import { addTask, fetchTasks, updateTask, invite } from '@/scripts/api/projects';
import BoardList from './components/BoardList/BoardList';
import { hideModal, processDefErr, showModal } from '@/scripts/utils/base';
import Task from './components/Task/Task';
import { getTemplateData } from '@/scripts/utils/base';
import { throttle } from 'throttle-debounce';

initAppLayout();

const $page = document.body.querySelector('.p');
const $addTaskForm = $page.querySelector('.add-task-form-js');
const $invite = $page.querySelector('.invite-js');
const $settings = $page.querySelector('.settings-js');

/** @type {{[status: string]: BoardList}} */
const lists = {
   new: new BoardList($page.querySelector('.board-list[data-status="new"]')),
   in_progress: new BoardList($page.querySelector('.board-list[data-status="in_progress"]')),
   resolved: new BoardList($page.querySelector('.board-list[data-status="resolved"]')),
   feedback: new BoardList($page.querySelector('.board-list[data-status="feedback"]')),
   closed: new BoardList($page.querySelector('.board-list[data-status="closed"]')),
};

/** @type {ProjectData} */
const project = getTemplateData('project');

init();

function init() {
   loadTasks();
   initEvents();
}

function initEvents() {
   initDragDropEvents();

   $page.addEventListener('click', throttle(500, ({ target }) => {
      const $btn = target.closest('.add-task-js');
      if (!$btn) return;

      const $list = $btn.closest('.board-list');
      showAddTaskModal($list.dataset.status);
   }));

   $addTaskForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      try {
         $addTaskForm.ok.disabled = true;
         await _addTask();
         hideModal('create-task-modal');
      } catch (e) {
         processDefErr(e);
      } finally {
         $addTaskForm.ok.disabled = false;
      }
   });

   $settings.addEventListener('click', () => {
      alert('Coming soon!');
   });

   $invite.addEventListener('click', () => {
      _invite();
   });
}

async function showAddTaskModal(status) {
   $addTaskForm.reset();
   $addTaskForm.status.value = status;
   console.log(status);
   showModal('create-task-modal');
}

async function _addTask() {
   const estimate = $addTaskForm.estimate.value;
   const taskData = await addTask(project.id, {
      status: $addTaskForm.status.value,
      name: $addTaskForm.name.value.trim(),
      type: $addTaskForm.type.value,
      start_at: new Date().toISOString(),
      estimate: estimate ? new Date(estimate).toISOString() : null,
   });
   lists[taskData.status].addTask(new Task(taskData));
}

function initDragDropEvents() {
   /** @type {HTMLElement} */
   let $task = null;
   let drag = false;
   let shiftX = 0;
   let shiftY = 0;

   let possibleDrag = false;

   /** @type {HTMLElement} */
   let $srcList = null;

   /** @type {HTMLElement} */
   let $dstList = null;

   document.body.addEventListener('mousedown', (e) => {
      $task = e.target.closest('.task');
      if (!$task) return;

      $srcList = $task.closest('.board-list');

      const pos = $task.getBoundingClientRect();
      shiftX = e.clientX - pos.left;
      shiftY = e.clientY - pos.top;
      possibleDrag = true;
   });

   document.body.addEventListener('mouseup', async () => {
      possibleDrag = false;
      if (!drag) return;
      drag = false;

      document.body.classList.remove('no-select');
      $dstList?.classList.remove('board-list__target');

      $task.classList.remove('task__dragged');

      if (!$dstList || $dstList === $srcList) {
         renderLists();
         return;
      }

      const srcStatus = $srcList.dataset.status;
      const dstStatus = $dstList.dataset.status;
      const taskId = $task.dataset.id;

      const task = lists[srcStatus].getById(taskId);
      task.data.status = dstStatus;

      lists[srcStatus].deleteById(taskId);
      lists[dstStatus].addTask(task);
      renderLists();

      try {
         await updateTask(task.data);
      } catch (e) {
         processDefErr(e);
      }
   });

   document.body.addEventListener('mousemove', (e) => {
      if (!drag && possibleDrag) {
         $task.style.setProperty('--w', `${$task.offsetWidth}px`);
         $task.style.setProperty('--h', `${$task.offsetHeight}px`);

         document.body.appendChild($task);
         $task.classList.add('task__dragged');
         document.body.classList.add('no-select');
         drag = true;
         possibleDrag = false;

         move(e);
         return;
      }

      if (!drag) return;
      move(e);
   });

   function move(e) {
      $task.style.setProperty('--x', `${e.pageX - shiftX}px`);
      $task.style.setProperty('--y', `${e.pageY - shiftY}px`);

      $task.hidden = true;
      const $below = document.elementFromPoint(e.clientX, e.clientY);
      $task.hidden = false;

      $dstList?.classList.remove('board-list__target');
      $dstList = $below?.closest('.board-list');
      $dstList?.classList.add('board-list__target');
   }
}

async function _invite() {
   const email = prompt('Email address');
   if (!email) {
      return;
   }

   const role = prompt('Role (developer, qa, pm, ceo)');
   if (!email) {
      return;
   }

   try {
      await invite(project.id, { email, role });
   } catch (e) {
      processDefErr(e);
   }
}

async function loadTasks() {
   try {
      const tasks = await fetchTasks(project.id);
      tasks.forEach((task) => {
         if (!lists[task.status]) {
            console.error(`Unexpected task status: '${task.status}'`);
         }
         lists[task.status].addTask(new Task(task));
      });
      renderLists();
   } catch (e) {
      processDefErr(e);
   }
}

function renderLists() {
   lists.new.render();
   lists.in_progress.render();
   lists.resolved.render();
   lists.feedback.render();
   lists.closed.render();
}
