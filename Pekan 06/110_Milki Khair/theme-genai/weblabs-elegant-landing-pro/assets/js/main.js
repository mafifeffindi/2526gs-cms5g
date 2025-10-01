
// Smooth hash scroll offset for sticky header
(function(){
  function smoothScrollTo(y){ window.scrollTo({top:y, behavior:'smooth'}); }
  document.addEventListener('click', function(e){
    const a = e.target.closest('a[href^="#"]');
    if(!a) return;
    const id = a.getAttribute('href').slice(1);
    const el = document.getElementById(id);
    if(!el) return;
    e.preventDefault();
    const header = document.querySelector('.site-header');
    const offset = (header ? header.offsetHeight : 0) + 8;
    const y = el.getBoundingClientRect().top + window.pageYOffset - offset;
    smoothScrollTo(y);
  }, false);
})();
