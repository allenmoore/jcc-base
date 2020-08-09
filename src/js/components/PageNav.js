/* global document, window */

/**
 * The PageNav Class.
 */
class PageNav {

  activeCl = '-active';
  activeNav = null;
  connectEl = document.getElementById('connect');
  connectLink = document.getElementById('js-connect-link');
  scrollBtn = document.getElementById('js-back-to-top-btn');
  whyEl = document.getElementById('program-info');
  whyLink = document.getElementById('js-program-info-link');

  /**
   * The PageNav Constructor.
   */
  construct() {
    this.getRefId = this.getRefId.bind(this)
    this.setActiveNav = this.setActiveNav.bind(this);
    this.checkPosition = this.checkPosition.bind(this);
    this.init = this.init.bind(this);
  }

  /**
   * Method to get the content id of an element.
   * 
   * @param   {HTMLElement} el the element to return the content id for.
   * @returns {string}         the content id.
   */
  getRefId(el) {
    const id = el.dataset.contentId;
    
    return id;
  }

  /**
   * Method to set the active navigation element.
   * 
   * @param {HTMLElement} el the element being scrolled to.
   * @returns {void}
   */
  setActiveNav(el) {
    const id = this.getRefId(el),
      node = document.getElementById(id);
    
    if (null !== this.activeNav) {
      this.activeNav.classList.remove(this.activeCl);
    }
    
    this.activeNav = node;
    node.classList.add(this.activeCl);
  }

  /**
   * Method to reset the active navigation element.
   *
   * @returns {void}
   */
  resetActiveNav() {

    if (null !== this.activeNav) {
      this.activeNav.classList.remove(this.activeCl);
    }

    this.activeNav = null;
  }

  /**
   * Method to handle a test location.
   * 
   * @returns {void}
   */
  checkPosition() {
    const elems = document.querySelectorAll('.page-section'),
      wH = window.innerHeight;
    let curActive, 
      elem,
      i,
      len,
      posFromTop;
    
    for (i = 0, len = elems.length; i < len; i++) {
      elem = elems[i];
      posFromTop = elems[i].getBoundingClientRect().top;
      
      if (posFromTop - wH <= 0) {
        curActive = elem;
        curActive.classList.add('-active');
        this.setActiveNav(curActive);
      } else if (posFromTop - wH >= 80) {
        this.resetActiveNav();
      }
    }
  }

  /**
   * Method to initialize the scroll to actions.
   *
   * @returns {void}
   */
  init() {
    window.addEventListener('scroll', this.checkPosition.bind(this));
    window.addEventListener('resize', this.checkPosition.bind(this));
  }
}

export default PageNav;
