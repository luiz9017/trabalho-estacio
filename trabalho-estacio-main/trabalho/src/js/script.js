// botão subir ao topo - comportamento
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('btn-top');
  if (!btn) return;

  // mostrar quando rolar 300px
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) btn.classList.add('show');
    else btn.classList.remove('show');
  });

  // rolar suavemente ao topo ao clicar
  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});