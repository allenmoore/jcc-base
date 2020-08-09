/* global document, window */

// Polyfill for creating CustomEvents on IE9/10/11

// code pulled from:
// https://github.com/d4tocchini/customevent-polyfill
// https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent#Polyfill

(function() {
  if ('undefined' === typeof window) {
    return;
  }

  try {
    const ce = new window.CustomEvent('test', {cancelable: true});
    
    ce.preventDefault();
    
    if (true !== ce.defaultPrevented) {
      throw new Error('Could not prevent default');
    }
  } catch (e) {
    /* eslint-disable no-trailing-spaces */
    /**
     * Function to trigger a custom event object.
     * 
     * @param {Object}             event  the event object.
     * @param {Object}             params the event parameters.
     * @returns {CustomEvent<any>}        returns a custom event object.
     * @constructor
     */
    const CustomEvent = (event, params) => {
      /* eslint-enable no-trailing-spaces */
      const evt = document.createEvent('CustomEvent'),
        origPrevent = evt.preventDefault;
      
      params = params || {/* eslint-disable-line no-param-reassign */
        bubbles: false,
        cancelable: false,
        detail: undefined
      };
      
      evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
      
      evt.preventDefault = () => {
        origPrevent.call(this);
        try {
          Object.defineProperty(this, 'defaultPrevented', {get: () => true});
        } catch (e) {/* eslint-disable-line no-shadow, no-catch-shadow */
          this.defaultPrevented = true;
        }
      };
      
      return evt;
    };

    CustomEvent.prototype = window.Event.prototype;
    window.CustomEvent = CustomEvent; // expose definition to window
  }
})();
