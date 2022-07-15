(function (d) {

  let hhWrap = d.querySelector('.hamburger-helper--wrap');
  let hh = d.querySelector('.hamburger-helper');
  let dd = d.querySelector('.dropdown');

  action = () => {
    hhWrap.classList.toggle('hide-pseudo');
    hh.classList.toggle('spin');
    hh.classList.toggle('unspin');
    dd.classList.toggle('hide');
  }

  hh.addEventListener('click', action);

})(document);