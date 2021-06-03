let idCounter = 0;

export class AppError extends Error {
   name = this.constructor.name;
   #id = `${this.name}_${idCounter++}`;

   constructor(message, cause) {
      super(message);
      this.cause = cause;
   }

   /**
    * Prints the error to the console and store in the window object.
    * Use `console.dir(window.<id>)` in the console to see all error properties
    */
   log() {
      console.error(`(window.${this.#id})`, this);
      window[this.#id] = this;
   }
}

export class HttpError extends AppError {
   /** @param {Response} response */
   constructor(error, response) {
      super(error, response);
      this.response = response;
   }

   /** @param {Response} response */
   static async fromApiResponse(response) {
      return new HttpError((await response.json()).message, response);
   }
}
