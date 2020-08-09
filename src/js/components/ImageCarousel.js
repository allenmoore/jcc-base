/* global document */
import Glide, { Autoplay } from '@glidejs/glide/dist/glide.modular.esm';

/**
 * MainNavigation Class.
 */
class ImageCarousel {

  /**
   * The PrimaryNavigation Constructor.
   *
   * @returns {void}
   */
  construct() {
    this.setWidth = this.setWidth.bind(this);
    this.init = this.init.bind(this);
  }
  
  setWidth() {
    const el = document.getElementById('js-image-carousel'),
      img = document.getElementById('js-first-slide'),
      rect = img.getBoundingClientRect();
    
    el.style.width = `${rect.width}px`;
  }

  /**
   * Method to initialize the primary navigation actions.
   *
   * @returns {void}
   */
  init() {
    this.setWidth();
    new Glide('#js-image-carousel', {
      autoplay: 3000,
    }).mount({Autoplay});
  }
}

export default ImageCarousel;
