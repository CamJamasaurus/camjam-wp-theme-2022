export function loadStyle(styleId, css) {
  if (!document.querySelector(`#${styleId}`)) {
    const styleNode = document.createElement('style');
    styleNode.type = 'text/css';
    styleNode.media = 'all';
    styleNode.id = styleId;
    styleNode.innerHTML = minCss(css);
    document.querySelector('#camjam-css').insertAdjacentElement('afterend', styleNode);
    return styleNode;
  }
  return false;
}

export function minCss(css) {
  return css.replace(/\r?\n|\r/g, '').replace(/\s{2,}/g, '');
}

export function randomClass() {
  return Math.random()
    .toString(36)
    .substring(7);
}

export function pipe(...fns) {
  return function(x) {
    fns.reduce((v, f) => f(v), x);
  };
}