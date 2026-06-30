js_addition = """
document.addEventListener('DOMContentLoaded', function() {
  // Mega menu carousel logic
  const carousel = document.querySelector('.incense-carousel');
  const prevBtn = document.querySelector('.carousel-prev');
  const nextBtn = document.querySelector('.carousel-next');

  if (carousel && prevBtn && nextBtn) {
    prevBtn.addEventListener('click', function(e) {
      e.preventDefault();
      carousel.scrollBy({ left: -340, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', function(e) {
      e.preventDefault();
      carousel.scrollBy({ left: 340, behavior: 'smooth' });
    });
  }
});
"""

with open('assets/js/main.js', 'a', encoding='utf-8') as f:
    f.write('\n\n' + js_addition)
print("Added JS for carousel")
