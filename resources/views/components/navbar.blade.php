<nav class="main-navbar">
  <div class="nav-container">

    <div class="nav-logo">
      <a href="/">Muhammad Dzakwan</a>
    </div>

    <button class="nav-toggle" aria-label="toggle navigation">
      <span class="hamburger"></span>
    </button>

    <div class="nav-links-container">
      <div class="nav-menu">
        <a href="/">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="{{ route('dokumentasi.index') }}">Documentation</a>
      </div>

      <div class="nav-right">
        <a href="#contact" class="nav-button">Hire Me</a>
      </div>
    </div>

  </div>
</nav>

<style>
  /* ================= NAVBAR BASE ================= */

  .main-navbar {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    transition: transform 0.3s ease, background 0.3s ease;
    background: #f3f4f6;
  }

  .main-navbar.hidden {
    transform: translateY(-100%);
  }

  /* Dark mode support */
  .dark .main-navbar {
    background: rgba(0, 0, 0, 0.8);
  }

  .nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem 2rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .nav-logo a {
    font-size: 1.4rem;
    font-weight: 700;
    text-decoration: none;
    color: #111;
  }

  /* ================= DESKTOP MENU ================= */

  .nav-links-container {
    display: flex;
    align-items: center;
    gap: 2rem;
  }

  .nav-menu {
    display: flex;
    gap: 2rem;
  }

  .nav-menu a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: 0.3s;
  }

  .nav-menu a:hover {
    color: black;
  }

  .nav-button {
    background: black;
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 999px;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
  }

  .nav-button:hover {
    opacity: 0.8;
  }

  /* ================= HAMBURGER ================= */

  .nav-toggle {
    display: none;
    cursor: pointer;
    background: transparent;
    border: 0;
    padding: 0.5em;
    z-index: 1001;
  }

  .hamburger {
    display: block;
    position: relative;
    width: 2em;
    height: 3px;
    background: #333;
    transition: transform 250ms ease-in-out;
  }

  .hamburger::before,
  .hamburger::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    height: 3px;
    background: #333;
    transition: transform 250ms ease-in-out, opacity 250ms linear;
  }

  .hamburger::before {
    top: -8px;
  }

  .hamburger::after {
    bottom: -8px;
  }

  /* Animation ketika open */
  .nav-open .hamburger {
    transform: rotate(45deg);
  }

  .nav-open .hamburger::before {
    transform: rotate(90deg);
    top: 0;
  }

  .nav-open .hamburger::after {
    opacity: 0;
  }

  /* ================= MOBILE ================= */

  @media (max-width: 768px) {

    .nav-toggle {
      display: block;
    }

    .nav-links-container {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: white;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);

      visibility: hidden;
      opacity: 0;
      transform: translateY(-1em);
      transition: 250ms ease;

      flex-direction: column;
      align-items: center;
      padding: 2rem 1rem;
      gap: 1.5rem;
    }

    .nav-open .nav-links-container {
      visibility: visible;
      opacity: 1;
      transform: translateY(0);
    }

    .nav-menu {
      flex-direction: column;
      align-items: center;
      gap: 1.5rem;
      width: 100%;
    }

    .nav-menu a {
      width: 100%;
      text-align: center;
    }

    .nav-right {
      width: 100%;
    }

    .nav-button {
      display: block;
      width: 100%;
      text-align: center;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const navToggle = document.querySelector('.nav-toggle');
  const mainNav = document.querySelector('.main-navbar');

  navToggle.addEventListener('click', () => {
    mainNav.classList.toggle('nav-open');
  });

  // Hide navbar on scroll down (immediately), show after 3 seconds of not scrolling
  let lastScrollY = window.scrollY;
  let showTimeout;
  let isHidden = false;

  const handleScroll = () => {
    const currentScrollY = window.scrollY;
    
    // Clear existing timeout
    clearTimeout(showTimeout);

    // If at top of page, always show navbar
    if (currentScrollY <= 0) {
      mainNav.classList.remove('hidden');
      isHidden = false;
      return;
    }

    if (currentScrollY < lastScrollY && !isHidden) {
      // Scrolling up - immediately hide navbar
      mainNav.classList.add('hidden');
      isHidden = true;
      // Show again after 1 second
      setTimeout(() => {
        mainNav.classList.remove('hidden');
        isHidden = false;
      }, 1000);
    } else if (currentScrollY > lastScrollY && isHidden) {
      // Scrolling down - show immediately
      mainNav.classList.remove('hidden');
      isHidden = false;
    }

    lastScrollY = currentScrollY;
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
});
</script>