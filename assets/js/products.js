// Products Database and Page Logic for Mothers Commerce

const PRODUCTS = [
  {
    id: "p_oudh_sandal",
    name: "Traditional Oudh & Sandalwood",
    category: "masala",
    fragrance: "woody",
    description: "A rich, woody, and resinous blend combining dark Aquilaria wood resin (Oudh) and sustainably harvested Mysore sandalwood powder.",
    ingredients: "Oudh resin, Sandalwood powder, Tree gums, Honey",
    burntime: "45-50 mins",
    sticks: "20 sticks per pack",
    image: "./assets/images/product-pkg.png"
  },
  {
    id: "p_jasmine_vetiver",
    name: "Pondicherry Jasmine & Vetiver",
    category: "flora",
    fragrance: "floral",
    description: "A clean, floral, and cooling aroma crafted from handpicked local Jasmine blossoms and cooling roots of organic Vetiver grass.",
    ingredients: "Jasmine petals, Vetiver root, Charcoal-free wood powder, Honey",
    burntime: "50 mins",
    sticks: "20 sticks per pack",
    image: "./assets/images/ingredients-bg.png"
  },
  {
    id: "p_amber_frank",
    name: "Sacred Amber & Frankincense",
    category: "resin",
    fragrance: "resinous",
    description: "A warm, sweet, and comforting blend containing wild-harvested Boswellia frankincense resin chunks and fossilized amber essential oil.",
    ingredients: "Frankincense resin, Amber oil, Sandalwood wood, Honey",
    burntime: "55 mins",
    sticks: "18 sticks per pack",
    image: "./assets/images/global-shipping.png"
  },
  {
    id: "p_rose_saffron",
    name: "Kashmiri Rose & Saffron",
    category: "flora",
    fragrance: "floral",
    description: "An opulent, sweet fragrance made of steam-distilled Damask rose water, crushed rose petals, and a touch of organic Kashmiri saffron.",
    ingredients: "Rose petals, Rose essential oil, Saffron stamens, Wood powder",
    burntime: "45 mins",
    sticks: "20 sticks per pack",
    image: "./assets/images/ingredients-bg.png"
  },
  {
    id: "p_sandalwood_pure",
    name: "Mysore Sandalwood Classic",
    category: "masala",
    fragrance: "woody",
    description: "Our signature single-origin incense. A smooth, buttery, and classic woody aroma utilizing pure aged heartwood powder of Santalum album.",
    ingredients: "Pure Mysore Sandalwood powder, Sandalwood essential oil, Tree bark gum",
    burntime: "50 mins",
    sticks: "20 sticks per pack",
    image: "./assets/images/product-pkg.png"
  },
  {
    id: "p_cedar_patchouli",
    name: "Himalayan Cedar & Patchouli",
    category: "masala",
    fragrance: "spicy",
    description: "Earthy, grounding, and slightly spicy. Himalayan Deodar cedarwood flakes blended with aged Indonesian dark patchouli leaves.",
    ingredients: "Cedarwood powder, Patchouli leaves, Vetiver powder, Honey",
    burntime: "50 mins",
    sticks: "20 sticks per pack",
    image: "./assets/images/hero-banner.png"
  },
  {
    id: "o_sandalwood_oil",
    name: "Sustainably Sourced Sandalwood Oil",
    category: "oil",
    fragrance: "woody",
    description: "100% pure steam-distilled essential oil from aged sandalwood heartwood. Perfect for diffusers or custom blending.",
    ingredients: "100% Santalum Album oil",
    burntime: "N/A (Liquid)",
    sticks: "10ml cobalt dropper vial",
    image: "./assets/images/product-pkg.png"
  },
  {
    id: "o_jasmine_absolute",
    name: "Pondicherry Jasmine Absolute",
    category: "oil",
    fragrance: "floral",
    description: "A highly concentrated floral absolute oil extracted from night-blooming jasmine flowers in Tamil Nadu farms.",
    ingredients: "100% Jasmine Grandiflorum absolute",
    burntime: "N/A (Liquid)",
    sticks: "10ml cobalt dropper vial",
    image: "./assets/images/ingredients-bg.png"
  }
];

document.addEventListener('DOMContentLoaded', () => {
  renderProductCards(PRODUCTS);
  setupFilters();

  // Listen to global basket changes to update button states on this page
  window.addEventListener('storage', () => {
    updateButtonStates();
  });
  
  // Override window.saveInquiryBasket from main.js to also update button states locally
  const originalSave = window.saveInquiryBasket;
  window.saveInquiryBasket = function(basket) {
    originalSave(basket);
    updateButtonStates();
  };
});

function renderProductCards(products) {
  const container = document.getElementById('productsGrid');
  if (!container) return;

  if (products.length === 0) {
    container.innerHTML = `
      <div style="grid-column: 1 / -1; text-align: center; padding: var(--space-3xl) 0;">
        <i class="fas fa-search" style="font-size: 3rem; color: var(--color-border); margin-bottom: var(--space-md);"></i>
        <h3 style="font-size: 1.5rem; color: var(--color-primary);">No products found</h3>
        <p>Try resetting the filters or modifying your search query.</p>
      </div>
    `;
    return;
  }

  const basket = window.getInquiryBasket();

  container.innerHTML = products.map(product => {
    const isInBasket = basket.some(item => item.id === product.id);
    const buttonText = isInBasket ? 'Added &bull; Open Basket' : 'Add to Enquiry';
    const buttonClass = isInBasket ? 'btn btn-primary' : 'btn btn-outline';

    return `
      <div class="product-card reveal revealed" id="card-${product.id}">
        <div class="product-image-container">
          <img src="${product.image}" alt="${product.name}" class="product-image">
          <div class="product-category-tag">${product.category.toUpperCase()}</div>
        </div>
        <div class="product-details">
          <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-xs);">
            <h3 class="product-title">${product.name}</h3>
            <span class="product-fragrance-tag fragrance-${product.fragrance}">${product.fragrance}</span>
          </div>
          <p class="product-description">${product.description}</p>
          <div class="product-ingredients">
            <strong>Key Ingredients:</strong> ${product.ingredients}
          </div>
          <div class="product-specs">
            <div><i class="far fa-clock"></i> ${product.burntime}</div>
            <div><i class="fas fa-box-open"></i> ${product.sticks}</div>
          </div>
          <div class="product-actions">
            <button 
              id="btn-${product.id}"
              class="${buttonClass}" 
              style="width: 100%; font-size: 0.8rem; padding: 0.7rem;" 
              onclick="handleInquiryClick('${product.id}', '${product.name.replace(/'/g, "\\'")}', '${product.description.replace(/'/g, "\\'")}')"
            >
              ${buttonText}
            </button>
          </div>
        </div>
      </div>
    `;
  }).join('');
}

// Handler for adding/opening drawer
window.handleInquiryClick = function(id, name, desc) {
  const basket = window.getInquiryBasket();
  const isInBasket = basket.some(item => item.id === id);

  if (isInBasket) {
    window.openInquiryDrawer();
  } else {
    window.addToInquiryBasket(id, name, desc);
  }
};

function updateButtonStates() {
  const basket = window.getInquiryBasket();
  PRODUCTS.forEach(product => {
    const btn = document.getElementById(`btn-${product.id}`);
    if (btn) {
      const isInBasket = basket.some(item => item.id === product.id);
      if (isInBasket) {
        btn.innerHTML = 'Added &bull; Open Basket';
        btn.className = 'btn btn-primary';
      } else {
        btn.innerHTML = 'Add to Enquiry';
        btn.className = 'btn btn-outline';
      }
    }
  });
}

function setupFilters() {
  const searchInput = document.getElementById('productSearch');
  const catButtons = document.querySelectorAll('.filter-cat-btn');
  const fragButtons = document.querySelectorAll('.filter-frag-btn');

  let activeCategory = 'all';
  let activeFragrance = 'all';
  let searchQuery = '';

  function applyFilters() {
    let results = PRODUCTS;

    // Search query filter
    if (searchQuery) {
      const q = searchQuery.toLowerCase();
      results = results.filter(p => 
        p.name.toLowerCase().includes(q) || 
        p.description.toLowerCase().includes(q) ||
        p.ingredients.toLowerCase().includes(q)
      );
    }

    // Category filter
    if (activeCategory !== 'all') {
      results = results.filter(p => p.category === activeCategory);
    }

    // Fragrance filter
    if (activeFragrance !== 'all') {
      results = results.filter(p => p.fragrance === activeFragrance);
    }

    renderProductCards(results);
  }

  // Category filter click
  catButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      catButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeCategory = btn.getAttribute('data-cat');
      applyFilters();
    });
  });

  // Fragrance filter click
  fragButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      fragButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeFragrance = btn.getAttribute('data-frag');
      applyFilters();
    });
  });

  // Search input typing
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      searchQuery = e.target.value;
      applyFilters();
    });
  }
}
