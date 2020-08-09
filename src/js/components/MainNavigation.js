/* global document */
import { gsap } from 'gsap';
import * as utils from './Utils';

/**
 * MainNavigation Class.
 */
class MainNavigation {

  activeClass = '-active';
  body = document.body;
  btn = document.getElementById('js-navigation-toggle-button');
  duration = .150;
  header = document.getElementById('js-site-header');
  isActive = false;
  menu = document.getElementById('js-main-navigation');
  openClass = 'nav-open';

  /**
   * The PrimaryNavigation Constructor.
   *
   * @returns {void}
   */
  construct() {
    this.activateNav = this.activateNav.bind(this);
    this.deactivateNav = this.deactivateNav.bind(this);
    this.openNav = this.openNav.bind(this);
    this.closeNav = this.closeNav.bind(this);
    this.triggerClick = this.triggerClick.bind(this);
    this.handleKeyDown = this.handleKeyDown.bind(this);
    this.resetView = this.resetView.bind(this);
    this.init = this.init.bind(this);
  }

  /**
   * Method to return a promise resolving the active state of the nav.
   *
   * @returns {Promise<any>} returns a promise Object.
   */
  activateNav() {
    return new Promise((resolve, reject) => { /* eslint-disable-line no-unused-vars */
      this.isActive = true;
      resolve(this.isActive);
    });
  }

  /**
   * Method to return a promise resolving the inactive state of the nav.
   *
   * @returns {Promise<any>} returns a promise Object.
   */
  deactivateNav() {
    return new Promise((resolve, reject) => { /* eslint-disable-line no-unused-vars */
      this.isActive = false;
      resolve(this.isActive);
    });
  }

  /**
   * Method to open the booking navigation.
   *
   * @returns {void}
   */
  openNav() {
    const abH = utils.getAdminBarHeight(),
      startPos = -100,
      headerH = 61,
      topPos = true === utils.isLoggedIn() ? abH + headerH : headerH;

    if (true === this.isActive) {
      return;
    }

    this.activateNav()
      .then((fulfilled) => { /* eslint-disable-line no-unused-vars */
        this.menu.setAttribute('aria-hidden', 'false');
      })
      .then(() => {
        this.menu.classList.add(this.activeClass);
      })
      .then(() => {
        this.btn.classList.add(this.activeClass);
      })
      .then(() => {
        this.header.classList.add(this.activeClass);
      })
      .then(() => {
        gsap.fromTo(this.menu, {
          top: startPos,
          opacity: 0
        }, {
          top: topPos,
          opacity: 1,
          duration: this.duration
        });
      });
  }

  /**
   * Method to close the navigation.
   *
   * @returns {void}
   */
  closeNav() {
    const abH = utils.getAdminBarHeight(),
      endPos = -100,
      headerH = 61,
      topPos = true === utils.isLoggedIn() ? abH + headerH : headerH;

    if (false === this.isActive) {
      return;
    }

    this.deactivateNav()
      .then((fulfilled) => { /* eslint-disable-line no-unused-vars */
        gsap.fromTo(this.menu, {
          top: topPos,
          opacity: 1
        }, {
          top: endPos,
          opacity: 0,
          duration: this.duration
        });
      })
      .then(() => {
        this.header.classList.remove(this.activeClass);
      })
      .then(() => {
        this.menu.classList.remove(this.activeClass);
      })
      .then(() => {
        this.btn.classList.remove(this.activeClass);
      })
      .then(() => {
        this.menu.setAttribute('aria-hidden', 'true');
      })
      .then(() => {
        this.menu.setAttribute('tabindex', '-1');
      });
  }

  /**
   * Method to handle a view reset on viewport resize.
   *
   * @returns {void}
   */
  resetView() {
    const winW = utils.getWinWidth(),
      startPos = -100;

    if (true === this.isActive || winW <= 767) {
      return;
    }

    this.activateNav()
      .then((fulfilled) => { /* eslint-disable-line no-unused-vars */
        this.menu.setAttribute('aria-hidden', 'false');
      })
      .then(() => {
        gsap.fromTo(this.menu, {
          top: startPos,
          opacity: 0
        }, {
          top: 'initial',
          opacity: 1,
          duration: 0
        });
      });
  }

  /**
   * Method to triggle the click event.
   *
   * @returns {void}
   */
  triggerClick() {
    if (false === this.isActive) {
      this.openNav();
    } else {
      this.closeNav();
    }
  }

  /**
   * Method to handle close the navigation when the `esc` key is clicked.
   *
   * @param {object} e the event Object.
   * @returns {void}
   */
  handleKeyDown(e) {
    const escKey = 27,
      key = e.keyCode;

    if (escKey !== key && false === this.isActive) {
      return;
    }

    this.closeNav();
  }

  /**
   * Method to initialize the primary navigation actions.
   *
   * @returns {void}
   */
  init() {
    this.btn.addEventListener('click', this.triggerClick.bind(this));
    document.addEventListener('keyup', this.handleKeyDown.bind(this), false);
    window.addEventListener('resize', this.resetView.bind(this));
  }
}

export default MainNavigation;
