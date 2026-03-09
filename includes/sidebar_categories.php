    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section">
      <div class="container-fluid px-4">
        <div class="row g-3">
          <!-- Sidebar Categories -->
          <div class="col-lg-2 d-none d-lg-block">
            <div class="sidebar-categories">
              <a href="category.php?cat=sofa-cover" class="sidebar-cat-item">
                <i class="fa-solid fa-couch"></i> Sofa Cover
              </a>
              <a href="category.php?cat=chair-cover" class="sidebar-cat-item">
                <i class="fa-solid fa-chair"></i> Chair Cover
              </a>
              <a href="category.php?cat=table-covers" class="sidebar-cat-item">
                <i class="fa-solid fa-table"></i> Table Covers
              </a>
              <a href="category.php?cat=dining-combo" class="sidebar-cat-item">
                <i class="fa-solid fa-utensils"></i> Dining Combo (3D)
              </a>
              <a href="category.php?cat=ac-covers" class="sidebar-cat-item">
                <i class="fa-solid fa-wind"></i> AC Covers
              </a>
              <a href="category.php?cat=tv-covers" class="sidebar-cat-item">
                <i class="fa-solid fa-tv"></i> TV Covers
              </a>
              <a
                href="category.php?cat=cushion-covers"
                class="sidebar-cat-item"
              >
                <i class="fa-solid fa-circle"></i> Cushion Covers
              </a>
              <a href="category.php?cat=carpet" class="sidebar-cat-item">
                <i class="fa-solid fa-rug"></i> Carpet
              </a>
            </div>
          </div>

          <!-- Main Banner Slider -->
          <div class="col-lg-7 col-md-8">
            <div
              id="heroBannerSlider"
              class="carousel slide hero-slider"
              data-bs-ride="carousel"
            >
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#heroBannerSlider"
                  data-bs-slide-to="0"
                  class="active"
                ></button>
                <button
                  type="button"
                  data-bs-target="#heroBannerSlider"
                  data-bs-slide-to="1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#heroBannerSlider"
                  data-bs-slide-to="2"
                ></button>
              </div>
              <div class="carousel-inner rounded-3 overflow-hidden">
                <div class="carousel-item active">
                  <div class="banner-slide banner-slide-1">
                    <div class="banner-content">
                      <span class="banner-badge">17% OFF</span>
                      <h2>Feel the Ocean<br />On Your Sofa</h2>
                      <p>
                        Premium sofa covers that transform your living space
                      </p>
                      <a
                        href="category.php?cat=sofa-cover"
                        class="btn btn-white-outline"
                        >Shop Now <i class="fa-solid fa-arrow-right ms-1"></i
                      ></a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="banner-slide banner-slide-2">
                    <div class="banner-content">
                      <span class="banner-badge">12% OFF</span>
                      <h2>Velvet Chair<br />Covers</h2>
                      <p>Luxurious velvet covers for your dining chairs</p>
                      <a
                        href="category.php?cat=chair-cover"
                        class="btn btn-white-outline"
                        >Shop Now <i class="fa-solid fa-arrow-right ms-1"></i
                      ></a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="banner-slide banner-slide-3">
                    <div class="banner-content">
                      <span class="banner-badge">New</span>
                      <h2>3D Dining<br />Combo Sets</h2>
                      <p>
                        Complete table & chair cover sets in stunning 3D prints
                      </p>
                      <a
                        href="category.php?cat=dining-combo"
                        class="btn btn-white-outline"
                        >Shop Now <i class="fa-solid fa-arrow-right ms-1"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#heroBannerSlider"
                data-bs-slide="prev"
              >
                <span class="carousel-control-prev-icon"></span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#heroBannerSlider"
                data-bs-slide="next"
              >
                <span class="carousel-control-next-icon"></span>
              </button>
            </div>
          </div>

          <!-- Today's Deals Sidebar -->
          <div class="col-lg-3 col-md-4">
            <div class="todays-deal-box">
              <div class="deal-box-header">
                <span>Today's Deal</span>
                <span class="badge-hot">HOT</span>
              </div>
              <div class="deal-items" id="todaysDealItems">
                <!-- Populated by JS -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CATEGORY ICONS SCROLL ===== -->
    <section class="category-scroll-section py-4">
      <div class="container-fluid px-4">
        <div class="category-scroll-wrapper">
          <div class="category-scroll" id="categoryScroll">
            <a href="category.php?cat=sofa-cover" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #ff049e22, #ff6bcd22);
                "
              >
                <i class="fa-solid fa-couch" style="color: var(--primary)"></i>
              </div>
              <span>Sofa Cover</span>
            </a>
            <a href="category.php?cat=chair-cover" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #3490f322, #3490f322);
                "
              >
                <i class="fa-solid fa-chair" style="color: #3490f3"></i>
              </div>
              <span>Chair Cover</span>
            </a>
            <a href="category.php?cat=table-covers" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #ffc51922, #ffc51922);
                "
              >
                <i class="fa-solid fa-table" style="color: #e6a800"></i>
              </div>
              <span>Table Covers</span>
            </a>
            <a href="category.php?cat=dining-combo" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #28a74522, #28a74522);
                "
              >
                <i class="fa-solid fa-utensils" style="color: #28a745"></i>
              </div>
              <span>Dining Combo</span>
            </a>
            <a href="category.php?cat=ac-covers" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #17a2b822, #17a2b822);
                "
              >
                <i class="fa-solid fa-wind" style="color: #17a2b8"></i>
              </div>
              <span>AC Covers</span>
            </a>
            <a href="category.php?cat=tv-covers" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #6f42c122, #6f42c122);
                "
              >
                <i class="fa-solid fa-tv" style="color: #6f42c1"></i>
              </div>
              <span>TV Covers</span>
            </a>
            <a href="category.php?cat=cushion-covers" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #ef486a22, #ef486a22);
                "
              >
                <i class="fa-solid fa-circle" style="color: #ef486a"></i>
              </div>
              <span>Cushion Covers</span>
            </a>
            <a href="category.php?cat=carpet" class="cat-pill">
              <div
                class="cat-pill-img"
                style="
                  background: linear-gradient(135deg, #ff604222, #ff604222);
                "
              >
                <i class="fa-solid fa-rug" style="color: #ff6042"></i>
              </div>
              <span>Carpet</span>
            </a>
          </div>
          <button class="cat-scroll-arrow cat-scroll-right" id="catScrollRight">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </section>