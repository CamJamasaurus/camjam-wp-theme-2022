/* Add aria attributes to menu li's when they have sub menus */
(() => {
  const navItems = document.querySelectorAll('.menu-item-has-children');
  if (typeof navItems === 'object') {
    for (const item of navItems) {
      item.setAttribute('aria-haspopup', true);
      item.setAttribute('aria-expanded', false);

      item.addEventListener('mouseover', () => {
        item.setAttribute('aria-expanded', true);
      });
      item.addEventListener('mouseout', () => {
        item.setAttribute('aria-expanded', false);
      });
      item.addEventListener('focusin', () => {
        item.setAttribute('aria-expanded', true);
        item.querySelector('.sub-menu').style.visibility = 'visible';
      });
      item.addEventListener('focusout', () => {
        item.setAttribute('aria-expanded', false);
        item.querySelector('.sub-menu').style.visibility = 'hidden';
      });
    }
  }
})();