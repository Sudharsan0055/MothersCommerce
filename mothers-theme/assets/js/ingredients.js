// Botanical Ingredients Cabinet Logic for Mothers Commerce

const INGREDIENTS_DB = {
  sandalwood: {
    name: "Mysore Sandalwood",
    role: "Aromatic Wood Base",
    origin: "Karnataka Reserves, India",
    harvest: "State-regulated plantations with sustainable replanting replacers.",
    description: "The golden standard of incense bases. We grind aged heartwood logs of Santalum album into a fine powder. It provides a creamy, sweet, and grounding woody aroma that burns slowly and naturally without needing charcoal.",
    benefit: "Calms the nervous system, aids meditation, and acts as a natural preservative."
  },
  jasmine: {
    name: "Royal Mogra Jasmine",
    role: "Top Fragrance Note",
    origin: "Pondicherry Outskirts, India",
    harvest: "Hand-picked at dawn from organic family-owned farms.",
    description: "Night-blooming Jasmine Grandiflorum flowers are harvested when their fragrance is most intense. We dry them naturally under the shade, grinding them and mixing them with jasmine absolute oils to capture the fresh floral freshness of Tamil Nadu.",
    benefit: "Uplifts mood, reduces anxiety, and brings emotional balance."
  },
  halmaddi: {
    name: "Halmaddi Tree Resin",
    role: "Semi-Liquid Resin Binder",
    origin: "Western Ghats, India",
    harvest: "Ethically tapped tree sap from Ailanthus triphysa.",
    description: "Halmaddi is a traditional balsamic resin that has been used in Indian incense for centuries. It acts as a natural binding agent, keeping the masala dough soft and pliable. When burned, it releases a rich, warm, and sweet resinous scent.",
    benefit: "Retains volatile essential oils in the stick, extending shelf life naturally."
  },
  frankincense: {
    name: "Sacred Frankincense",
    role: "Purifying Gum Resin",
    origin: "Dry Forest Regions, India & East Africa",
    harvest: "Wild-harvested gum tears collected by local forest communities.",
    description: "Also known as Loban or Boswellia. This aromatic resin exudes from the bark of Boswellia trees. We select only the highest purity light-amber 'tears' to grind. It burns with a crisp, lemony, and woody-sweet profile.",
    benefit: "Purifies air, deepens breathing, and clears negative energetic states."
  },
  honey: {
    name: "Wild Forest Honey",
    role: "Organic Binder & Humectant",
    origin: "Deciduous Forests, India",
    harvest: "Sourced from tribal honey collectives using non-destructive harvesting.",
    description: "While cheap mass-market brands use synthetic chemical adhesives (such as DEP or diethyl phthalate) to stick dust to bamboo cores, we use pure wild honey. It acts as a natural humectant, keeping our masala moist and releasing a soft caramel undertone when burned.",
    benefit: "Ensures a completely non-toxic burn and adds a soothing warmth to fragrance profiles."
  },
  vetiver: {
    name: "Organic Vetiver (Khus)",
    role: "Earthy Base Note",
    origin: "Local Pondicherry Farms",
    harvest: "Roots dried and harvested every 18 months to protect soil erosion.",
    description: "Vetiver (Chrysopogon zizanioides) is a tall grass native to India. We harvest its complex, deep fibrous roots, wash them in Pondicherry well water, and shade-dry them. The ground root gives a cooling, damp-earth, woody aroma.",
    benefit: "Deeply grounding, cooling for hot climates, and relieves mental fatigue."
  }
};

document.addEventListener('DOMContentLoaded', () => {
  initIngredientsCabinet();
});

function initIngredientsCabinet() {
  const cards = document.querySelectorAll('.ingredient-card');
  
  // Create detail modal template if not present
  if (!document.getElementById('ingredientModal')) {
    const modalHTML = `
      <div class="ingredient-modal-overlay" id="ingredientModalOverlay"></div>
      <div class="ingredient-modal" id="ingredientModal">
        <button class="modal-close-btn" id="modalCloseBtn">&times;</button>
        <div class="modal-body">
          <span class="modal-role" id="modalRole">Aromatic Base</span>
          <h3 class="modal-title" id="modalTitle">Ingredient Name</h3>
          <div class="modal-meta-grid">
            <div>
              <strong>Origin:</strong> <span id="modalOrigin">Karnataka</span>
            </div>
            <div>
              <strong>Harvest:</strong> <span id="modalHarvest">Sourced sustainably</span>
            </div>
          </div>
          <p class="modal-description" id="modalDescription">Detailed story goes here...</p>
          <div class="modal-benefit-box">
            <strong>Therapeutic Benefit:</strong> <span id="modalBenefit">Aids sleep</span>
          </div>
        </div>
      </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);

    // Close handlers
    document.getElementById('modalCloseBtn').addEventListener('click', closeIngredientModal);
    document.getElementById('ingredientModalOverlay').addEventListener('click', closeIngredientModal);
  }

  // Setup cards click
  cards.forEach(card => {
    card.addEventListener('click', () => {
      const ingredientId = card.getAttribute('data-id');
      if (INGREDIENTS_DB[ingredientId]) {
        openIngredientModal(INGREDIENTS_DB[ingredientId]);
      }
    });
  });

  // Check URL hash to auto-open corresponding modal for deep-linking
  const checkHash = () => {
    const hash = window.location.hash.substring(1);
    if (hash && INGREDIENTS_DB[hash]) {
      setTimeout(() => {
        openIngredientModal(INGREDIENTS_DB[hash]);
      }, 300);
    }
  };
  checkHash();
  window.addEventListener('hashchange', checkHash);
}

function openIngredientModal(data) {
  document.getElementById('modalRole').textContent = data.role.toUpperCase();
  document.getElementById('modalTitle').textContent = data.name;
  document.getElementById('modalOrigin').textContent = data.origin;
  document.getElementById('modalHarvest').textContent = data.harvest;
  document.getElementById('modalDescription').textContent = data.description;
  document.getElementById('modalBenefit').textContent = data.benefit;

  document.getElementById('ingredientModalOverlay').classList.add('open');
  document.getElementById('ingredientModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeIngredientModal() {
  document.getElementById('ingredientModalOverlay').classList.remove('open');
  document.getElementById('ingredientModal').classList.remove('open');
  document.body.style.overflow = '';
}
