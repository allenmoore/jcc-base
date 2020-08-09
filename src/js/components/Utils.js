/* global document, window */
/* eslint-disable func-style */
import gsap from 'gsap';

/**
 * Method to add a class and set an attribute.
 *
 * @param   {string} el        the element to add the class to.
 * @param   {string} className the class to add.
 * @returns {void}
 */
export function addClass(el, className) {
  el.classList.add(className);
  el.setAttribute('aria-expanded', 'true');
}

/**
 * Method to animate a DOM element using the `fromTo()` method.
 *
 * @param {array} opts the animation arguments.
 * @returns {void}
 */
export function animateFromTo(opts) {
  gsap.fromTo(opts.el, opts.dur, opts.from, opts.to);
}

/**
 * Method to animate a DOM element using the `to()` method.
 *
 * @param   {string} el   the element to animate.
 * @param   {number} dur  the animation duration.
 * @param   {array}  opts the animation arguments.
 * @returns {void}
 */
export function animateTo(el, dur, opts) {
  gsap.to(el, dur, opts);
}

/**
 * Method to get the window viewport height.
 *
 * @returns {number} the window height.
 */
export function getWinHeight() {
  const h = window.innerHeight;

  return h;
}

/**
 * Method to get the viewport width.
 *
 * @returns {number} the viewport width.
 */
export function getWinWidth() {
  const w = window.innerWidth;

  return w;
}

/**
 * Method to verify if the current page is the front page.
 *
 * @returns {boolean} true/false based on the current page..
 */
export function isFrontPage() {
  const body = document.body,
    cl = body.classList.contains('home');

  return Boolean(true === cl);
}

/**
 * Method to validate logged in state.
 *
 * @returns {boolean} true/false based on the logged in state.
 */
export function isLoggedIn() {
  const body = document.body,
    cl = body.classList.contains('logged-in');

  return Boolean(true === cl);
}

/**
 * Method to get the WP Admin Bar height.
 *
 * @returns {number} the WP Admin Bar height.
 */
export function getAdminBarHeight() {
  const winW = getWinWidth();
  let h = null;

  h = 783 <= winW ? 32 : 46;
  h = true === isLoggedIn() ? h : null;

  return h;
}

/**
 * Method to remove a class and set an attribute.
 *
 * @param   {string} el the element to remove class from.
 * @param   {string} cl the class to remove.
 * @returns {void}
 */
export function removeClass(el, cl) {
  el.classList.remove(cl);
  el.setAttribute('aria-expanded', 'false');
}

/* eslint-enable func-style */
