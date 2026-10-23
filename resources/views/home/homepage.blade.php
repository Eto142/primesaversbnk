@include('home.header', ['homepageTheme' => true])

<!-- ============================================================
     HERO CAROUSEL
     ============================================================ -->
<section class="bk-hero">
  <div class="bk-hero-slides" id="bkHeroTrack">

    <!-- Slide 1: Digital banking -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('{{ asset('frontassets/images/banner/banner-slide-1.jpg') }}')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label"><i class="ri-sparkling-2-fill"></i> Banking for everyday life</span>
          <h1>A clearer way to manage <em>your money.</em></h1>
          <p>Primesavers Bank brings your everyday banking tools together online, so you can review your account, manage payments, and stay informed wherever you are.</p>
          <div class="bk-hero-actions">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open an Account <i class="ri-arrow-right-line"></i></a>
            <a href="{{ route('login') }}" class="bk-btn bk-btn--glass">Sign In <i class="ri-login-circle-line"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2: Personal and business banking -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('{{ asset('frontassets/images/banner/banner-slide-2.jpg') }}')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label"><i class="ri-briefcase-4-fill"></i> Banking options for you</span>
          <h1>Tools to support <em>your goals.</em></h1>
          <p>Explore the banking services available through Primesavers Bank and choose the options that fit your personal or business needs.</p>
          <div class="bk-hero-actions">
            <a href="{{ url('services') }}" class="bk-btn bk-btn--white">Explore Services <i class="ri-arrow-right-line"></i></a>
            <a href="{{ route('register') }}" class="bk-btn bk-btn--glass">Create an Account <i class="ri-user-add-line"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 3: Transfers -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('{{ asset('frontassets/images/banner/banner-slide-3.jpg') }}')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label"><i class="ri-earth-fill"></i> Domestic and international transfers</span>
          <h1>Move money with <em>confidence.</em></h1>
          <p>Make payments through your account and review the available exchange rate, fees, and estimated timing before confirming an international transfer.</p>
          <div class="bk-hero-actions">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Explore Transfers <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Talk to Us <i class="ri-customer-service-2-line"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 4: Savings -->
    <div class="bk-hero-slide">
      <div class="bk-hero-bg" style="background-image:url('{{ asset('frontassets/images/banner/4.jpg') }}')"></div>
      <div class="bk-wrap">
        <div class="bk-hero-body">
          <span class="bk-hero-label"><i class="ri-pie-chart-2-fill"></i> Savings and deposits</span>
          <h1>Make a plan for <em>what's next.</em></h1>
          <p>Explore savings and deposit options, review the terms that apply, and choose an approach that works for your plans.</p>
          <div class="bk-hero-actions">
            <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Explore Savings <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('about') }}" class="bk-btn bk-btn--glass">Learn More <i class="ri-information-line"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <button class="bk-hero-arr bk-hero-arr--prev" onclick="bkSlide(-1)" aria-label="Previous slide"><i class="ri-arrow-left-s-line"></i></button>
  <button class="bk-hero-arr bk-hero-arr--next" onclick="bkSlide(1)" aria-label="Next slide"><i class="ri-arrow-right-s-line"></i></button>
  <div class="bk-hero-dots" id="bkDots">
    <button class="active" onclick="bkGo(0)" aria-label="Go to slide 1"></button>
    <button onclick="bkGo(1)" aria-label="Go to slide 2"></button>
    <button onclick="bkGo(2)" aria-label="Go to slide 3"></button>
    <button onclick="bkGo(3)" aria-label="Go to slide 4"></button>
  </div>
  <div class="bk-hero-progress"><div class="bk-hero-progress-bar" id="bkProgress"></div></div>
</section>

<!-- ============================================================
     FEATURE TICKER
     ============================================================ -->
<div class="bk-ticker" aria-hidden="true">
  <div class="bk-ticker-track">
    <span class="bk-ticker-item"><i class="ri-shield-check-fill"></i> Account security</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-flashlight-fill"></i> Online transfers</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-global-fill"></i> International payments</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-customer-service-2-fill"></i> Customer support</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-bank-card-fill"></i> Clear account information</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-percent-fill"></i> Savings and deposits</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-pie-chart-fill"></i> Account overview</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-smartphone-fill"></i> Online account access</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-exchange-dollar-fill"></i> International exchange rates</span>
    <span class="bk-ticker-sep"></span>
    <!-- duplicate for seamless loop -->
    <span class="bk-ticker-item"><i class="ri-shield-check-fill"></i> Account security</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-flashlight-fill"></i> Online transfers</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-global-fill"></i> International payments</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-customer-service-2-fill"></i> Customer support</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-bank-card-fill"></i> Clear account information</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-percent-fill"></i> Savings and deposits</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-pie-chart-fill"></i> Account overview</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-smartphone-fill"></i> Online account access</span>
    <span class="bk-ticker-sep"></span>
    <span class="bk-ticker-item"><i class="ri-exchange-dollar-fill"></i> International exchange rates</span>
    <span class="bk-ticker-sep"></span>
  </div>
</div>

<!-- ============================================================
     TRUST STRIP
     ============================================================ -->
<section class="bk-trust">
  <div class="bk-wrap">
    <div class="bk-trust-grid">
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-lock-2-line"></i></div>
        <div><strong>Account security</strong><span>Security measures help protect your account</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-global-line"></i></div>
        <div><strong>International payments</strong><span>Review supported destinations when arranging a transfer</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-customer-service-2-line"></i></div>
        <div><strong>Customer support</strong><span>Contact our team for assistance with your account</span></div>
      </div>
      <div class="bk-trust-item">
        <div class="bk-trust-icon"><i class="ri-flashlight-line"></i></div>
        <div><strong>Transfer details</strong><span>Review timing and fees before confirming a payment</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SERVICES / FEATURES BENTO GRID
     ============================================================ -->
<section class="bk-section" id="services">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Our Services</span>
      <h2 class="bk-title">Banking options for <em>everyday needs</em></h2>
      <p class="bk-desc">Explore the services available through Primesavers Bank, from account management and payments to savings and financing options. Terms and eligibility vary by product.</p>
    </div>
    <div class="bk-cards-grid bk-cards-grid--bento">
      <div class="bk-card bk-card--featured sr">
        <span class="bk-card-badge">Payments</span>
        <div class="bk-card-icon"><i class="ri-exchange-dollar-line"></i></div>
        <h3>International Transfers</h3>
        <p>Send money to supported destinations from your account. Review the exchange rate, applicable fees, and estimated delivery time before you confirm.</p>
        <a href="{{ route('register') }}" class="bk-card-link">Explore Transfers <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-bank-line"></i></div>
        <h3>Personal Banking</h3>
        <p>Manage your account online, review activity, and find the account information you need in one place. Check the product terms for applicable fees and rates.</p>
        <a href="{{ url('services') }}" class="bk-card-link">View Account Options <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-briefcase-4-line"></i></div>
        <h3>Business Solutions</h3>
        <p>Explore account and payment options for business banking. Contact our team to discuss your requirements and confirm which services are available.</p>
        <a href="{{ url('services') }}" class="bk-card-link">View Business Services <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-bank-card-line"></i></div>
        <h3>Premium Cards</h3>
        <p>Review the card options available to eligible customers, including the features, fees, and terms for each card.</p>
        <a href="{{ url('services') }}" class="bk-card-link">View Card Options <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-hand-coin-line"></i></div>
        <h3>Loans &amp; Financing</h3>
        <p>Find information about available financing options, eligibility requirements, rates, and repayment terms before you apply.</p>
        <a href="{{ url('services') }}" class="bk-card-link">Explore Financing <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card sr">
        <div class="bk-card-icon"><i class="ri-pie-chart-2-line"></i></div>
        <h3>Wealth &amp; Deposits</h3>
        <p>Compare savings and deposit products, including their rates, time periods, access rules, and other terms.</p>
        <a href="{{ url('about') }}" class="bk-card-link">Explore Savings Options <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="bk-card bk-card--cta sr">
        <div class="bk-card-icon"><i class="ri-question-answer-line"></i></div>
        <h3>Need assistance?</h3>
        <p>Get in touch with our team for help understanding our services, opening an account, or finding the right contact for your question.</p>
        <a href="{{ url('contact') }}" class="bk-card-link">Contact Our Team <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     HOW IT WORKS
     ============================================================ -->
<section class="bk-section bk-section--gray">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">How It Works</span>
      <h2 class="bk-title">Getting started is <em>straightforward</em></h2>
      <p class="bk-desc">Set up your account online by following these steps. The information and checks required may vary depending on your circumstances.</p>
    </div>
    <div class="bk-steps">
      <div class="bk-step sr">
        <div class="bk-step-num">01</div>
        <h3>Apply online</h3>
        <p>Complete the registration form with your details and submit your application for review.</p>
      </div>
      <div class="bk-step-line"></div>
      <div class="bk-step sr">
        <div class="bk-step-num">02</div>
        <h3>Verify your details</h3>
        <p>Provide any requested information or documents so we can verify your identity and process your application.</p>
      </div>
      <div class="bk-step-line"></div>
      <div class="bk-step sr">
        <div class="bk-step-num">03</div>
        <h3>Manage your account</h3>
        <p>Once your account is approved, sign in to review your account details and use the services available to you.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     SMART BANKING FEATURES
     ============================================================ -->
<section class="bk-features-dark" id="features">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label bk-label--light">Online Banking</span>
      <h2 class="bk-title bk-title--white">Your account, <em>within reach.</em></h2>
      <p class="bk-desc bk-desc--light">Use your online account to review your information, follow payments, and keep track of your banking activity.</p>
    </div>
    <div class="bk-fd-grid">
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-send-plane-fill"></i></div>
        <h4>Payments and transfers</h4>
        <p>Set up eligible domestic or international payments and check the details before you confirm them.</p>
      </div>
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-smartphone-line"></i></div>
        <h4>Online account access</h4>
        <p>Sign in to review your account and activity using a supported device and browser.</p>
      </div>
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-fingerprint-line"></i></div>
        <h4>Account security</h4>
        <p>Use the available sign-in and verification steps to help protect access to your account.</p>
      </div>
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-notification-3-line"></i></div>
        <h4>Account updates</h4>
        <p>Review account messages and any notifications available through our services to stay informed about activity.</p>
      </div>
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-line-chart-line"></i></div>
        <h4>Activity overview</h4>
        <p>Review your transaction history to keep track of payments, deposits, and other account activity.</p>
      </div>
      <div class="bk-fd-item">
        <div class="bk-fd-icon"><i class="ri-shield-star-line"></i></div>
        <h4>Payment awareness</h4>
        <p>Check payment details carefully before confirming a transaction, and contact us promptly if you notice activity you do not recognise.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     ABOUT / WHY CHOOSE US
     ============================================================ -->
<section class="bk-section" id="about">
  <div class="bk-wrap">
    <div class="bk-split">
      <div class="bk-split-media sr">
        <div class="bk-img-stack">
          <img src="{{ asset('frontassets/images/banner/5.jpg') }}" alt="Primesavers Bank" class="bk-img-main">
          <div class="bk-img-badge">
            <span class="bk-img-badge-num">You</span>
            <span class="bk-img-badge-txt">at the heart<br>of our service</span>
          </div>
        </div>
      </div>
      <div class="bk-split-text sr">
        <span class="bk-label">Why Choose Us</span>
        <h2 class="bk-title">Banking with <em>clarity and care</em></h2>
        <p class="bk-desc" style="margin:0 0 20px">We aim to make it easier to understand your banking options and manage your account. Our team is available to help you find information and support when you need it.</p>
        <div class="bk-check-list">
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Clear product information</strong>
              <p>Review the fees, rates, eligibility requirements, and terms for a product before deciding whether it is right for you.</p>
            </div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Protecting your account</strong>
              <p>Follow good security practices, keep your sign-in details private, and contact us if you have concerns about account activity.</p>
            </div>
          </div>
          <div class="bk-check-item">
            <i class="ri-checkbox-circle-fill"></i>
            <div>
              <strong>Support when you need it</strong>
              <p>Reach out to our team with questions about your account or the services we offer. Contact channels and response times may vary.</p>
            </div>
          </div>
        </div>
        <a href="{{ url('about') }}" class="bk-btn bk-btn--fill" style="margin-top:20px">Learn About Us <i class="ri-arrow-right-line"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     WHY SWITCH / COMPARISON
     ============================================================ -->
<section class="bk-section bk-section--gray">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Compare Your Options</span>
      <h2 class="bk-title">Choose the banking that <em>fits your needs</em></h2>
      <p class="bk-desc">Use these topics as a starting point when reviewing an account or payment service. Check the current product terms for full details.</p>
    </div>
    <div class="bk-compare sr">
      <div class="bk-compare-row bk-compare-row--head">
        <div class="bk-compare-label">Feature</div>
        <div class="bk-compare-col bk-compare-col--us">Primesavers Bank</div>
        <div class="bk-compare-col">What to consider</div>
      </div>
      <div class="bk-compare-row">
        <div class="bk-compare-label">Opening an account</div>
        <div class="bk-compare-col bk-compare-col--us">Apply online</div>
        <div class="bk-compare-col">Check eligibility and required information</div>
      </div>
      <div class="bk-compare-row">
        <div class="bk-compare-label">Transfer timing</div>
        <div class="bk-compare-col bk-compare-col--us">Review estimated timing before confirming</div>
        <div class="bk-compare-col">Consider destination and payment method</div>
      </div>
      <div class="bk-compare-row">
        <div class="bk-compare-label">Customer support</div>
        <div class="bk-compare-col bk-compare-col--us">Contact our team</div>
        <div class="bk-compare-col">Review contact methods and availability</div>
      </div>
      <div class="bk-compare-row">
        <div class="bk-compare-label">Fees and rates</div>
        <div class="bk-compare-col bk-compare-col--us">Read the relevant product terms</div>
        <div class="bk-compare-col">Compare all applicable charges</div>
      </div>
      <div class="bk-compare-row">
        <div class="bk-compare-label">Account security</div>
        <div class="bk-compare-col bk-compare-col--us">Review our security information</div>
        <div class="bk-compare-col">Understand the protections available</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     EXCHANGE RATES
     ============================================================ -->
<section class="bk-section" id="rates">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Exchange Rates</span>
      <h2 class="bk-title">Understand the rate before you <em>send.</em></h2>
      <p class="bk-desc">Exchange rates change over time. The figures shown below are examples only; check the rate and any applicable fees presented for your transfer before confirming it.</p>
    </div>
    <div class="bk-rates-wrap sr">
      <table class="bk-rates-table">
        <thead>
          <tr>
            <th>Currency Pair</th>
            <th>Buy Rate (USD)</th>
            <th>Sell Rate (USD)</th>
            <th>24h Change</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/gb.png" alt="GBP"><div><b>GBP</b><small>British Pound</small></div></div></td>
            <td class="bk-mono">1.2645</td>
            <td class="bk-mono">1.2590</td>
            <td><span class="bk-badge bk-badge--up">+0.12%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/eu.png" alt="EUR"><div><b>EUR</b><small>Euro</small></div></div></td>
            <td class="bk-mono">1.0842</td>
            <td class="bk-mono">1.0790</td>
            <td><span class="bk-badge bk-badge--up">+0.08%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/jp.png" alt="JPY"><div><b>JPY</b><small>Japanese Yen</small></div></div></td>
            <td class="bk-mono">0.00671</td>
            <td class="bk-mono">0.00665</td>
            <td><span class="bk-badge bk-badge--down">-0.15%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/ca.png" alt="CAD"><div><b>CAD</b><small>Canadian Dollar</small></div></div></td>
            <td class="bk-mono">0.7410</td>
            <td class="bk-mono">0.7365</td>
            <td><span class="bk-badge bk-badge--up">+0.05%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
          <tr>
            <td><div class="bk-cur"><img src="https://flagcdn.com/w40/ch.png" alt="CHF"><div><b>CHF</b><small>Swiss Franc</small></div></div></td>
            <td class="bk-mono">1.1290</td>
            <td class="bk-mono">1.1235</td>
            <td><span class="bk-badge bk-badge--down">-0.03%</span></td>
            <td><a href="{{ route('register') }}" class="bk-btn-xs">Send <i class="ri-send-plane-line"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ============================================================
     BANKING SUPPORT
     ============================================================ -->
<section class="bk-section bk-section--gray" id="testimonials">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label">Here to Help</span>
      <h2 class="bk-title">Support for your <em>banking needs</em></h2>
      <p class="bk-desc">Whether you are exploring our services or managing an account, start with the information you need and contact our team if you have a question.</p>
    </div>
    <div class="bk-rating-summary">
      <span><strong>Helpful information</strong> to help you understand our services and next steps</span>
    </div>
    <div class="bk-testimonials-scroll">
      <div class="bk-testimonial sr">
        <p>Find account information, review recent activity, and use the online tools available to manage your banking.</p>
        <div class="bk-testimonial-author">
          <div class="bk-avatar"><i class="ri-bank-line"></i></div>
          <div><strong>Manage your account</strong><span>Account access and activity</span></div>
        </div>
      </div>
      <div class="bk-testimonial sr">
        <p>Before making a payment, check the recipient details, applicable charges, exchange rate, and estimated delivery time.</p>
        <div class="bk-testimonial-author">
          <div class="bk-avatar"><i class="ri-send-plane-line"></i></div>
          <div><strong>Make a payment</strong><span>Review details before confirming</span></div>
        </div>
      </div>
      <div class="bk-testimonial sr">
        <p>Compare the terms, fees, and rates for available products so you can make an informed decision about your finances.</p>
        <div class="bk-testimonial-author">
          <div class="bk-avatar"><i class="ri-file-list-3-line"></i></div>
          <div><strong>Explore your options</strong><span>Product details and terms</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="bk-cta">
  <div class="bk-wrap">
    <div class="bk-cta-box sr">
      <div class="bk-cta-content">
        <h2>Ready to get started?</h2>
        <p>Explore the services available through Primesavers Bank, review the relevant terms, and apply online when you are ready.</p>
        <div class="bk-cta-btns">
          <a href="{{ route('register') }}" class="bk-btn bk-btn--white">Open an Account <i class="ri-arrow-right-line"></i></a>
          <a href="{{ url('contact') }}" class="bk-btn bk-btn--glass">Contact Our Team <i class="ri-customer-service-2-line"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('home.footer')