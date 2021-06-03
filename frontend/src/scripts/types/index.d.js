
/**
 * @typedef {{
 *    id: number,
 *    name: string,
 *    slug: string,
 *    contract: string,
 *    contract_type: string,
 *    start_at: string,
 *    end_at: string,
 *    user: User,
 * }} ProjectData
 */


/**
 * @typedef {{
 *    id: number,
 *    name: string,
 *    type: TaskType,
 *    status: TaskStatus,
 *    start_at: string,
 *    end_at: string,
 *    estimate: string,
 *    user: User,
 * }} TaskData
 */

/** @typedef {'new'|'in_progress'|'resolved'|'feedback'|'closed'} TaskStatus */
/** @typedef {'bug'|'feature'} TaskType */
