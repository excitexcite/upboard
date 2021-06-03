/** @template AvailableEventType */
export default class Events {
   /** @typedef {AvailableEventType|RegExp} EventType */
   constructor() {
      /** @private */
      this._handlers = {};

      /** @type {{type: RegExp, handler: function}[]} */
      this._regexpHandlers = [];
   }

   /**
    * @param {EventType|EventType[]} type
    * @param {function} handler
    */
   addListener(type, handler = () => { }) {
      if (Array.isArray(type)) {
         type.forEach(t => this.addListener(t, handler));
         return;
      }

      if (typeof type === 'string') {
         this._handlers[type] = this._handlers[type] || [];
         this._handlers[type].push(handler);
      } else {
         this._regexpHandlers.push({ type, handler });
      }

      return handler;
   }

   /**
    * @param {EventType|EventType[]} type
    * @param {function} handler
    */
   addListenerOnce(type, handler = () => { }) {
      const _handler = (...args) => {
         this.removeListener(type, _handler);
         handler(...args);
      };

      this.addListener(type, _handler);
   }

   /**
    * @param {string|string[]} type
    * @param {function} handler
    */
   removeListener(type, handler) {
      if (Array.isArray(type)) {
         type.forEach(t => this.removeListener(t, handler));
         return;
      }

      if (!this._handlers[type]) return;
      this._handlers[type] = this._handlers[type].filter(h => h !== handler);
   }

   /**
    * @param {AvailableEventType} type
    * @param  {...any} args
    */
   emit(type, ...args) {
      if (type in this._handlers) {
         this._handlers[type].forEach(handler => handler(...args));
      }

      this._regexpHandlers
         .filter(({ type: reg }) => reg.test(type))
         .forEach(({ handler }) => handler(type, ...args));
   }
}