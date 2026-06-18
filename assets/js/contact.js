// Contact & Export Page Logic for Mothers Commerce

document.addEventListener('DOMContentLoaded', () => {
  renderFormBasket();
  setupContactForm();
  initExportMap();
});

/* --- Render Inquiry Basket items inside Contact Form --- */
function renderFormBasket() {
  const container = document.getElementById('formBasketContainer');
  const listEl = document.getElementById('formBasketList');
  if (!container || !listEl) return;

  const basket = window.getInquiryBasket();

  if (basket.length === 0) {
    container.style.display = 'none';
  } else {
    container.style.display = 'block';
    
    // Render the list of selected samples
    listEl.innerHTML = basket.map(item => `
      <div class="form-basket-item" id="form-bitem-${item.id}">
        <div>
          <strong>${item.name}</strong>
          <span style="font-size: 0.75rem; color: var(--color-text-muted); display: block;">Sample Pack requested</span>
        </div>
        <button type="button" class="form-basket-remove" onclick="removeFormBasketItem('${item.id}')">
          &times;
        </button>
      </div>
    `).join('');

    // Pre-fill hidden input with selected IDs
    const hiddenInput = document.getElementById('requestedSamplesInput');
    if (hiddenInput) {
      hiddenInput.value = basket.map(i => i.id).join(',');
    }
  }
}

window.removeFormBasketItem = function(id) {
  window.removeFromInquiryBasket(id);
  renderFormBasket();
  // Also update global basket badge
  if (window.updateInquiryUI) {
    window.updateInquiryUI();
  }
};

/* --- Wholesale Contact Form Submission --- */
function setupContactForm() {
  const form = document.getElementById('wholesaleContactForm');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Basic Validation
    const company = document.getElementById('company').value.trim();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const country = document.getElementById('country').value;

    if (!company || !name || !email || country === '') {
      alert('Please fill in all required corporate fields.');
      return;
    }

    // Capture basket items
    const basket = window.getInquiryBasket();
    const basketDetails = basket.map(item => item.name).join(', ');

    // Simulate sending email / generating lead
    showFormSuccessModal(name, company, basketDetails);

    // Reset Form and Storage
    form.reset();
    localStorage.removeItem('mc_inquiry_basket');
    if (window.updateInquiryUI) {
      window.updateInquiryUI();
    }
    renderFormBasket();
  });
}

function showFormSuccessModal(name, company, items) {
  // Create success modal on the fly
  const modalHTML = `
    <div class="success-overlay" id="successOverlay">
      <div class="success-modal">
        <div class="success-icon"><i class="fas fa-check-circle"></i></div>
        <h3>Corporate Inquiry Logged</h3>
        <p>Thank you <strong>${name}</strong> from <strong>${company}</strong>.</p>
        <p style="font-size: 0.9rem; color: var(--color-text-muted); margin-top: var(--space-xs);">
          Our export desk has received your request${items ? ` for samples of: <em>${items}</em>` : ''}. A customized shipping quotes datasheet and catalog will be dispatched to your email within 12 business hours.
        </p>
        <button class="btn btn-primary" onclick="closeSuccessModal()" style="margin-top: var(--space-md);">Return to Site</button>
      </div>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', modalHTML);
  document.body.style.overflow = 'hidden';
}

window.closeSuccessModal = function() {
  const overlay = document.getElementById('successOverlay');
  if (overlay) {
    overlay.remove();
  }
  document.body.style.overflow = '';
};

/* --- Interactive World Map --- */
const EXPORT_DATA = {
  usa: {
    title: "United States (USA) Port Operations",
    ports: "NY/NJ (New York), LA/Long Beach (California), Savannah (Georgia)",
    transit: "28 - 35 days Sea Cargo",
    compliance: "FDA organic packaging standards, Lacey Act wood import declaration compliant, pallet fumigation (ISPM-15) pre-certified.",
    moq: "Min 1,000 boxes"
  },
  uk: {
    title: "United Kingdom (UK) Port Operations",
    ports: "Port of Felixstowe, Port of Southampton",
    transit: "22 - 26 days Sea Cargo",
    compliance: "UK REACH chemical regulations compliant, completely charcoal-free safety labels, plastic packaging tax reporting pre-calculated.",
    moq: "Min 500 boxes"
  },
  australia: {
    title: "Australia Port Operations",
    ports: "Port of Sydney, Port of Melbourne",
    transit: "16 - 20 days Sea Cargo",
    compliance: "Strict DAFF biosecurity compliance, bamboo core fumigation certificates, organic botanical safety clearance.",
    moq: "Min 500 boxes"
  },
  eu: {
    title: "European Union (EU) Port Operations",
    ports: "Rotterdam (Netherlands), Hamburg (Germany)",
    transit: "24 - 28 days Sea Cargo",
    compliance: "EU REACH compliance, CPNP declarations, bio-degradable carton standards.",
    moq: "Min 1,000 boxes"
  }
};

function initExportMap() {
  const regions = document.querySelectorAll('.map-region-node');
  const detailsTitle = document.getElementById('mapSpecTitle');
  const detailsPorts = document.getElementById('mapSpecPorts');
  const detailsTransit = document.getElementById('mapSpecTransit');
  const detailsCompliance = document.getElementById('mapSpecCompliance');
  const detailsMOQ = document.getElementById('mapSpecMoq');

  if (!detailsTitle) return;

  regions.forEach(region => {
    region.addEventListener('click', () => {
      // Toggle active classes on map nodes
      regions.forEach(r => r.classList.remove('active'));
      region.classList.add('active');

      const destination = region.getAttribute('data-dest');
      const data = EXPORT_DATA[destination];

      if (data) {
        // Update details display with smooth transition
        const detailsCard = document.getElementById('mapDetailsCard');
        if (detailsCard) {
          detailsCard.style.opacity = 0;
          detailsCard.style.transform = 'translateY(10px)';
          
          setTimeout(() => {
            detailsTitle.textContent = data.title;
            detailsPorts.textContent = data.ports;
            detailsTransit.textContent = data.transit;
            detailsCompliance.textContent = data.compliance;
            detailsMOQ.textContent = data.moq;
            
            detailsCard.style.opacity = 1;
            detailsCard.style.transform = 'translateY(0)';
          }, 200);
        }
      }
    });
  });
}
