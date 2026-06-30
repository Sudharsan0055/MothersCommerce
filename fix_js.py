import re
with open('assets/js/main.js', 'r', encoding='utf-8') as f:
    js = f.read()

# Replace the single carousel logic with multi-carousel logic
old_logic = """  // Mega menu carousel logic
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
  }"""

new_logic = """  // Mega menu carousel logic for multiple carousels
  const carouselContainers = document.querySelectorAll('.incense-carousel-container');
  carouselContainers.forEach(container => {
    const carousel = container.querySelector('.incense-carousel');
    const prevBtn = container.querySelector('.carousel-prev');
    const nextBtn = container.querySelector('.carousel-next');
    
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
  });"""

if old_logic in js:
    js = js.replace(old_logic, new_logic)
    with open('assets/js/main.js', 'w', encoding='utf-8') as f:
        f.write(js)
    print("Fixed JS")
else:
    print("Could not find old logic in JS")
