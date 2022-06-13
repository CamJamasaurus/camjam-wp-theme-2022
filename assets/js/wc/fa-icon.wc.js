import { loadStyle } from './wc-utils.js';

class FaIcon extends HTMLElement {
  get family() {
    return this.getAttribute('family') || 'regular';
  }

  get icon() {
    return this.getAttribute('icon') || 'mobile';
  }

  async fetchIcon() {
    const cachedIcon = window.sessionStorage.getItem(`${this.family}-${this.icon}`);
    if (cachedIcon) return cachedIcon;
    const response = await fetch(
      `${window.wpRest.siteUrl}/wp-content/plugins/lnb-fa5/assets/fa/svgs/${this.family}/${this.icon}.svg`
    );
    if (response.status === 404) return '';
    const networkIcon = await response.text();
    window.sessionStorage.setItem(`${this.family}-${this.icon}`, networkIcon);
    return networkIcon;
  }

  static get observedAttributes() {
    return ['family', 'icon'];
  }

  attributeChangedCallback(name, oldValue, newValue) {
    if (!this.loaded) return;
    this.loadIcon();
  }

  loadIcon() {
    this.fetchIcon().then(rawIcon => {
      const styles = `
        fa-icon {
          font-size: inherit;
          display: inline-block;
          line-height: 1em;
        }

        fa-icon svg {
          height: 1em;
          max-width: 100%;
          vertical-align: -0.125em;
        }

        fa-icon path {
          fill: currentColor;
        }
      `;
      loadStyle('fa-wc-style', styles);
      this.innerHTML = `${rawIcon}`;
      this.setAttribute('role', 'presentation');
      this.setAttribute('aria-label', 'Display Icon');
      if (!this.loaded) {
        this.loaded = true;
      }
    });
  }

  constructor() {
    super();
  }

  connectedCallback() {
    this.observer = new IntersectionObserver(
      entry => {
        if (entry[0].isIntersecting) {
          this.loadIcon();
          this.observer.disconnect();
        }
      },
      { rootMargin: '50% 0%' }
    );
    this.observer.observe(this);
  }

  disconnectedCallback() {
    this.observer.disconnect();
  }
}

customElements.define('fa-icon', FaIcon);