/* global document */
import animateScrollTo from 'animated-scroll-to';

/**
 * The ScrollTo Class.
 */
class ScrollTo {

  activeCl = '-active';
  activeNav = null;
  body = document.getElementById('js-site-body');
  connectEl = document.getElementById('connect');
  connectLink = document.getElementById('js-connect-link');
  hero = document.getElementById('js-page-hero');
  scrollBtn = document.getElementById('js-back-to-top-btn');
  whyEl = document.getElementById('program-info');
  whyLink = document.getElementById('js-program-info-link');

  /**
   * The ScrollTo Constructor.
   */
  construct() {
    this.init = this.init.bind(this);
  }

  /**
   * Method to handle scrolling to a specific DOM element.
   * 
   * @param   {number} yPos the element to scroll to.
   * @returns {void}
   */
  elemScroll(yPos) {
    animateScrollTo(yPos, {verticalOffset: 0});
  }

  /**
   * Method to initialize the scroll to actions.
   *
   * @returns {void}
   */
  init() {
    this.scrollBtn.onclick = () => {
      this.elemScroll(0);
    }
  }
}

export default ScrollTo;
