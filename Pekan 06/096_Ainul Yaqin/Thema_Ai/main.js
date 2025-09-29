document.addEventListener("DOMContentLoaded", function() {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 900,
      once: true,
      easing: 'ease-out-cubic'
    });
  }

  // Contoh efek klik: tombol .btn memberi sedikit scale
  document.querySelectorAll('.btn').forEach(function(btn){
    btn.addEventListener('mousedown', function(){ btn.style.transform = 'scale(0.98)'; });
    btn.addEventListener('mouseup', function(){ btn.style.transform = ''; });
    btn.addEventListener('mouseleave', function(){ btn.style.transform = ''; });
  });
});
