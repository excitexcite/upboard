
export const DURATIONS = {
   day: 1000 * 60 * 60 * 24,
   year: 1000 * 60 * 60 * 24 * 365,
};

export const MONTHS = {
   full: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
   short: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
};

/** @type {import('micromodal').MicroModalConfig} */
export const COMMON_MICROMODAL = {
   disableScroll: true,
   awaitCloseAnimation: true,
};
