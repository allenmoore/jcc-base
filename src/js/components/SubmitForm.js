import { gsap } from 'gsap';

/**
 * The SubmitForm Class.
 */
class SubmitForm {
  
  endpoint = '/_resources/ldp/form_submit.aspx';
  errorView = document.getElementById('js-form-error-view');
  form = document.getElementById('form_3a38e55c-2d0b-4f05-8a58-5526df7bd1e2');
  formView = document.getElementById('js-connect-form-view');
  initView = this.formView;
  processingView = document.getElementById('js-form-processing-view');
  retryBtn = document.getElementById('js-retry-form-submission');
  submittedView = document.getElementById('js-form-submitted-view');
  views = [
    this.formView,
    this.processingView,
    this.submittedView
  ];
  
  /**
   * The SubmitForm Constructor.
   * 
   * @returns {void}
   */
  construct() {
    this.hideView = this.hideView.bind(this);
    this.showView = this.showView.bind(this);
    this.setViews = this.setViews.bind(this);
    this.addListeners = this.addListeners.bind(this);
    this.retrySubmit = this.retrySubmit.bind(this);
    this.submit = this.submit.bind(this);
    this.init = this.init.bind(this);
  }

  /**
   * Method to handle hiding a form view.
   * 
   * @param   {HTMLElement} el the form view to hide.
   * @returns {void}
   */
  hideView(el) {
    gsap.fromTo(el, {opacity: 1}, {opacity: 0, duration: .125});
    el.classList.add('-hidden');
    el.setAttribute('aria-hidden', 'true');
    el.setAttribute('hidden', 'hidden');
  }

  /**
   * Method to handle showing a form view.
   *
   * @param   {HTMLElement} el the form view to show.
   * @returns {void}
   */
  showView(el) {
    this.initView = el;
    gsap.fromTo(el, {opacity: 0}, {opacity: 1, duration: .125});
    if (el.classList.contains('-hidden')) {
      el.classList.remove('-hidden');
    }
    el.setAttribute('aria-hidden', 'false');
    if (el.hasAttribute('hidden')) {
      el.removeAttribute('hidden');
    }
  }

  /**
   * Method to handle form views.
   *
   * @param   {HTMLElement} el the current form view.
   * @returns {void}
   */
  setViews(el) {
    this.hideView(this.initView);
    this.showView(el);
  }

  /**
   * Method to set views when events are triggered.
   *
   * @param   {Object} xhr the data request.
   * @returns {void}
   */
  addListeners(xhr) {
    xhr.onloadstart = () => {
      this.setViews(this.processingView);
    }
    xhr.onerror = () => {
      this.setViews(this.errorView);
    }
    xhr.onload = () => {
      this.setViews(this.submittedView);
    }
  }

  /**
   * Method to handle resetting the view to resubmit the form.
   * 
   * @returns {void}
   */
  retrySubmit() {
    this.setViews(this.formView);
  }

  /**
   * Method to handle the form submission.
   *
   * @returns {boolean} returns false.
   */
  submit() {
    this.form.onsubmit = (e) => {
      const formData = new FormData(this.form),
        xhr = new XMLHttpRequest();

      e.preventDefault();
      this.addListeners(xhr);
      xhr.open('POST', this.endpoint, true);
      xhr.send(formData);

      return false;
    }
  }

  /**
   * Method to initialize the form submission actions.
   *
   * @returns {void}
   */
  init() {
    this.submit();
    this.retryBtn.addEventListener('click', this.retrySubmit.bind(this));
  }
}

export default SubmitForm;
