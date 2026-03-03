<!-- LOADER -->
<div id="page-loader">
  <div class="loader-content">
    <div class="loader-logo">Muhammad Dzakwan</div>
    <div class="loader-spinner"></div>
  </div>
</div>

<footer class="ios-footer">
  <div class="footer-container">

    <div class="footer-top">
      <h3 class="footer-logo">Muhammad Dzakwan</h3>
      <p class="footer-desc">
        Full-stack Developer yang fokus membuat produk digital
        yang sederhana, cepat, dan indah digunakan.
      </p>
    </div>

    <div class="footer-links">
      <a href="#work">Portfolio</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="footer-social">
      <a href="#"><i class="bi bi-github"></i></a>
      <a href="#"><i class="bi bi-instagram"></i></a>
      <a href="#"><i class="bi bi-linkedin"></i></a>
    </div>

    <div class="footer-bottom">
      <p>© {{ date('Y') }} Muhammad Dzakwan. All rights reserved.</p>
    </div>

  </div>
</footer>

<script>
  window.addEventListener("load", function() {
    const loader = document.getElementById("page-loader");

    setTimeout(() => {
      loader.classList.add("loader-hidden");
    }, 500);
  });
</script>