<div class="sidebar">
  <div class="logo">
    <a href="/admin" style="color: white; font-size: 22px; font-weight: 700;">
      🎯 Admin Panel
    </a>
  </div>

  <nav>
    <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
      📊 Dashboard
    </a>
    <a href="/admin/projects" class="{{ request()->is('admin/projects*') ? 'active' : '' }}">
      💼 Projects
    </a>
    <a href="/admin/documentations" class="{{ request()->is('admin/documentations*') ? 'active' : '' }}">
      📁 Dokumentasi
    </a>
    <a href="/admin/profile" class="{{ request()->is('admin/profile*') ? 'active' : '' }}">
      👤 Profile
    </a>
    <a href="/" target="_blank">
      🌐 Lihat Website
    </a>
  </nav>

  <div class="theme-toggle">
    <button id="themeToggle" class="theme-btn">
      <span class="theme-icon">🌙</span>
      <span class="theme-text">Dark Mode</span>
    </button>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">
      🚪 Logout
    </button>
  </form>
</div>

<style>
  .theme-toggle {
    margin-top: 20px;
    padding: 10px;
  }

  .theme-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    background: #374151;
    border: none;
    border-radius: 8px;
    color: #cbd5e1;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s;
  }

  .theme-btn:hover {
    background: #4b5563;
  }

  .theme-icon {
    font-size: 18px;
  }

  /* Light mode styles */
  body.light-mode {
    background: #f5f6fa;
  }

  body.light-mode .sidebar {
    background: #ffffff;
    color: #333;
  }

  body.light-mode .sidebar a {
    color: #475569;
  }

  body.light-mode .sidebar a:hover,
  body.light-mode .sidebar a.active {
    background: #3b82f6;
    color: white;
  }

  body.light-mode .sidebar .logo a {
    color: #0f172a;
  }

  body.light-mode .topbar {
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
  }

  body.light-mode .topbar h2 {
    color: #0f172a;
  }

  body.light-mode .card {
    background: #ffffff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }

  body.light-mode .card h3 {
    color: #0f172a;
  }

  body.light-mode .card p {
    color: #475569;
  }

  body.light-mode .theme-btn {
    background: #e2e8f0;
    color: #475569;
  }

  body.light-mode .theme-btn:hover {
    background: #cbd5e1;
  }

  body.light-mode .logout-btn {
    background: #ef4444;
  }
</style>

<script>
  // Theme toggle functionality
  document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = themeToggle.querySelector('.theme-icon');
    const themeText = themeToggle.querySelector('.theme-text');
    
    // Check saved theme preference
    const savedTheme = localStorage.getItem('admin-theme');
    if (savedTheme === 'light') {
      document.body.classList.add('light-mode');
      themeIcon.textContent = '☀️';
      themeText.textContent = 'Light Mode';
    }

    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('light-mode');
      
      if (document.body.classList.contains('light-mode')) {
        localStorage.setItem('admin-theme', 'light');
        themeIcon.textContent = '☀️';
        themeText.textContent = 'Light Mode';
      } else {
        localStorage.setItem('admin-theme', 'dark');
        themeIcon.textContent = '🌙';
        themeText.textContent = 'Dark Mode';
      }
    });
  });
</script>