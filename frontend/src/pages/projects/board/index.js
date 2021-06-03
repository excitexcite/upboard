import './assets';

import initAppLayout from '@/layouts/app';
import { fetchTasks } from '@/scripts/api/projects';
import BoardList from './components/BoardList/BoardList';
import { AppError } from '@/scripts/errors/errors';
import Task from './components/Task/Task';
import { getTemplateData } from '@/scripts/utils/base';

initAppLayout();

const $page = document.body.querySelector('.p');
const $dragContainer = document.body.querySelector('.drag-container-js');

/** @type {{[status: string]: BoardList}} */
const lists = {
   new: new BoardList($page.querySelector('.board-list[data-list="new"]')),
   in_progress: new BoardList($page.querySelector('.board-list[data-list="in_progress"]')),
   resolved: new BoardList($page.querySelector('.board-list[data-list="resolved"]')),
   feedback: new BoardList($page.querySelector('.board-list[data-list="feedback"]')),
   closed: new BoardList($page.querySelector('.board-list[data-list="closed"]')),
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
}

function initDragDropEvents() {
   /** @type {HTMLElement} */
   let $task = null;
   let drag = false;
   let shiftX = 0;
   let shiftY = 0;

   /** @type {HTMLElement} */
   let $boardList = null;

   document.body.addEventListener('mousedown', (e) => {
      $task = e.target.closest('.task');
      if (!$task) return;

      const pos = $task.getBoundingClientRect();
      shiftX = e.clientX - pos.left;
      shiftY = e.clientY - pos.top;

      $dragContainer.style.setProperty('--w', `${$task.offsetWidth}px`);
      $dragContainer.style.setProperty('--y', `${$task.offsetHeight}px`);

      $dragContainer.innerHTML = '';
      $dragContainer.appendChild($task);
      document.body.classList.add('no-select');
      drag = true;
      move(e);
   });

   document.body.addEventListener('mouseup', () => {
      drag = false;
      document.body.classList.remove('no-select');
   });

   document.body.addEventListener('mousemove', (e) => {
      if (!drag) return;
      move(e);
   });

   function move(e) {
      $dragContainer.style.setProperty('--x', `${e.pageX - shiftX}px`);
      $dragContainer.style.setProperty('--y', `${e.pageY - shiftY}px`);

      $dragContainer.hidden = true;
      const $below = document.elementFromPoint(e.clientX, e.clientY);
      $dragContainer.hidden = false;

      $boardList?.classList.remove('board-list__target');
      $boardList = $below?.closest('.board-list');
      $boardList?.classList.add('board-list__target');
   }
}
async function loadTasks() {
   try {
      const tasks = await fetchTasks(project.id); // TODO: real project id
      tasks.forEach((task) => {
         if (!lists[task.status]) {
            console.error(`Unexpected task status: '${task.status}'`);
         }
         lists[task.status].addTask(new Task(task));
      });
      renderLists();
   } catch (e) {
      if (!(e instanceof AppError)) throw e;
      alert(e.message);
      e.log();
   }
}

function renderLists() {
   lists.new.render();
   lists.in_progress.render();
   lists.resolved.render();
   lists.feedback.render();
   lists.closed.render();
}
