/* =============================================
   ElegantTex – main.js
   Mock data + UI logic (replace with AJAX/PHP)
   ============================================= */

'use strict';

/* ---- Mock Data (replace with PHP/AJAX) ---- */
const PRODUCTS = [
  { id: 1, name: "Velvet Chair Cover Coffee",       price: 2200, old_price: 2500, discount: 12, category: "chair-cover",  rating: 4.5, reviews: 32, emoji: "🪑", badge: "-12%",  badge_type: "sale", is_best: false },
  { id: 2, name: "Velvet Chair Cover Royal Blue",   price: 2200, old_price: 2500, discount: 12, category: "chair-cover",  rating: 4.8, reviews: 48, emoji: "🪑", badge: "-12%",  badge_type: "sale", is_best: true  },
  { id: 3, name: "Velvet Chair Cover Deep Purple",  price: 2200, old_price: 2500, discount: 12, category: "chair-cover",  rating: 4.6, reviews: 21, emoji: "🪑", badge: "-12%",  badge_type: "sale", is_best: false },
  { id: 4, name: "Flower Print Sofa Cover",         price: 2500, old_price: 3000, discount: 17, category: "sofa-cover",   rating: 4.9, reviews: 76, emoji: "🛋️", badge: "-17%",  badge_type: "sale", is_best: true  },
  { id: 5, name: "White Pint Sofa Cover",           price: 2500, old_price: 3000, discount: 17, category: "sofa-cover",   rating: 4.7, reviews: 54, emoji: "🛋️", badge: "-17%",  badge_type: "sale", is_best: true  },
  { id: 6, name: "Blue Pint Sofa Cover",            price: 2500, old_price: 3000, discount: 17, category: "sofa-cover",   rating: 4.8, reviews: 63, emoji: "🛋️", badge: "-17%",  badge_type: "sale", is_best: false },
  { id: 7, name: "3D Dining Table Cover Set",       price: 3200, old_price: 4000, discount: 20, category: "dining-combo", rating: 4.9, reviews: 89, emoji: "🍽️", badge: "New",   badge_type: "new",  is_best: true  },
  { id: 8, name: "Floral Cushion Cover (Set 4)",    price: 1200, old_price: 1500, discount: 20, category: "cushion-cover",rating: 4.6, reviews: 44, emoji: "🛏️", badge: "-20%",  badge_type: "sale", is_best: false },
  { id: 9, name: "AC Cover Dust Guard",             price: 800,  old_price: 1000, discount: 20, category: "ac-cover",    rating: 4.4, reviews: 28, emoji: "❄️", badge: "-20%",  badge_type: "sale", is_best: false },
  { id:10, name: "Geometric Carpet 5x7ft",          price: 4500, old_price: 5500, discount: 18, category: "carpet",       rating: 4.8, reviews: 37, emoji: "🏡", badge: "-18%",  badge_type: "sale", is_best: true  },
  { id:11, name: "TV Cover Dust Protector 43\"",    price: 600,  old_price: 750,  discount: 20, category: "tv-cover",     rating: 4.3, reviews: 19, emoji: "📺", badge: "-20%",  badge_type: "sale", is_best: false },
  { id:12, name: "Table Runner Cover Embroidered",  price: 950,  old_price: 1100, discount: 14, category: "table-cover",  rating: 4.5, reviews: 31, emoji: "🎨", badge: "New",   badge_type: "new",  is_best: false },
];

const TODAY_DEALS = [
  { id: 2, name: "Velvet Chair Cover Royal Blue", price: 2200, old_price: 2500, emoji: "🪑" },
  { id: 4, name: "Flower Print Sofa Cover",       price: 2500, old_price: 3000, emoji: "🛋️" },
  { id: 5, name: "White Pint Sofa Cover",         price: 2500, old_price: 3000, emoji: "🛋️" },
  { id: 6, name: "Blue Pint Sofa Cover",          price: 2500, old_price: 3000, emoji: "🛋️" },
];

/* ---- Cart State ---- */
let cart = JSON.parse(sessionStorage.getItem('et_cart') || '[]');

function saveCart() {
  sessionStorage.setItem('et_cart', JSON.stringify(cart));
  updateCartBadge();
}

function updateCartBadge() {
  const badge = document.querySelector('.cart-badge');
  if (badge) badge.textContent = cart.reduce((s, i) => s + i.qty, 0);
}

function addToCart(productId) {
  const p = PRODUCTS.find(x => x.id === productId);
  if (!p) return;
  const existing = cart.find(x => x.id === productId);
  if (existing) existing.qty++;
  else cart.push({ id: p.id, name: p.name, price: p.price, qty: 1 });
  saveCart();
  showCartToast();
}

function showCartToast() {
  const toast = document.getElementById('cartToast');
  if (!toast) return;
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 2500);
}

/* ---- Render Stars ---- */
function renderStars(rating) {
  let stars = '';
  for (let i = 1; i <= 5; i++) {
    if (rating >= i) stars += '<i class="fa-solid fa-star"></i>';
    else if (rating >= i - 0.5) stars += '<i class="fa-solid fa-star-half-stroke"></i>';
    else stars += '<i class="fa-regular fa-star"></i>';
  }
  return stars;
}

/* ---- Format Price ---- */
function formatPrice(p) {
  return '৳' + p.toLocaleString('en-BD') + '.00';
}

/* ---- Build Product Card HTML ---- */
function buildProductCard(p) {
  const badgeClass = p.badge_type === 'new' ? 'badge-new' : 'badge-sale';
  return `
    <div class="col-6 col-md-4 col-lg-3">
      <div class="product-card" onclick="window.location='product.html?id=${p.id}'">
        <div class="product-img-wrap">
          <span class="product-emoji">${p.emoji}</span>
          <span class="product-badge ${badgeClass}">${p.badge}</span>
          <div class="product-actions">
            <button class="product-action-btn" title="Wishlist" onclick="event.stopPropagation()">
              <i class="fa-regular fa-heart"></i>
            </button>
            <button class="product-action-btn" title="Quick View" onclick="event.stopPropagation()">
              <i class="fa-regular fa-eye"></i>
            </button>
          </div>
        </div>
        <div class="product-info">
          <p class="product-name" title="${p.name}">${p.name}</p>
          <div class="product-rating">
            ${renderStars(p.rating)}
            <span>(${p.reviews})</span>
          </div>
          <div class="product-price-row">
            <div>
              <span class="price-new">${formatPrice(p.price)}</span>
              <span class="price-old">${formatPrice(p.old_price)}</span>
            </div>
            <button class="add-to-cart-btn" onclick="event.stopPropagation(); addToCart(${p.id})">
              <i class="fa-solid fa-cart-plus me-1"></i>Add
            </button>
          </div>
        </div>
      </div>
    </div>
  `;
}

/* ---- Render Today's Deals ---- */
function renderTodaysDeals() {
  const container = document.getElementById('todaysDealItems');
  if (!container) return;
  container.innerHTML = TODAY_DEALS.map(d => `
    <div class="deal-item" onclick="window.location='product.html?id=${d.id}'">
      <div class="deal-item-img">${d.emoji}</div>
      <div class="deal-item-info">
        <p class="deal-item-title">${d.name}</p>
        <span class="deal-price-new">${formatPrice(d.price)}</span>
        <span class="deal-price-old">${formatPrice(d.old_price)}</span>
      </div>
    </div>
  `).join('');
}

/* ---- Render Featured Products ---- */
function renderFeaturedProducts() {
  const container = document.getElementById('featuredProducts');
  if (!container) return;
  // Show first 8 products
  container.innerHTML = PRODUCTS.slice(0, 8).map(buildProductCard).join('');
}

/* ---- Render Best Selling ---- */
function renderBestSelling() {
  const container = document.getElementById('bestSellingProducts');
  if (!container) return;
  const best = PRODUCTS.filter(p => p.is_best);
  container.innerHTML = best.map(buildProductCard).join('');
}

/* ---- Category Toggle ---- */
function initCategoryToggle() {
  const toggle = document.getElementById('categoryToggle');
  const dropdown = document.getElementById('categoryDropdown');
  if (!toggle || !dropdown) return;

  toggle.addEventListener('click', (e) => {
    e.stopPropagation();
    dropdown.classList.toggle('show');
  });
  document.addEventListener('click', () => {
    dropdown.classList.remove('show');
  });
  dropdown.addEventListener('click', e => e.stopPropagation());
}

/* ---- Category Scroll Arrow ---- */
function initCategoryScroll() {
  const btn = document.getElementById('catScrollRight');
  const scroll = document.getElementById('categoryScroll');
  if (!btn || !scroll) return;
  btn.addEventListener('click', () => {
    scroll.scrollBy({ left: 200, behavior: 'smooth' });
  });
}

/* ---- AJAX helper (for real backend integration) ---- */
/**
 * Example:
 *   fetchAPI('get_products.php', { category: 'sofa-cover', page: 1 })
 *     .then(data => console.log(data));
 */
async function fetchAPI(endpoint, params = {}) {
  const url = new URL(endpoint, window.location.origin + '/api/');
  Object.entries(params).forEach(([k, v]) => url.searchParams.set(k, v));
  try {
    const res = await fetch(url.toString(), {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
    return await res.json();
  } catch (err) {
    console.warn('fetchAPI error:', err);
    return null;
  }
}

/* ---- Init ---- */
document.addEventListener('DOMContentLoaded', () => {
  renderTodaysDeals();
  renderFeaturedProducts();
  renderBestSelling();
  initCategoryToggle();
  initCategoryScroll();
  updateCartBadge();
});
