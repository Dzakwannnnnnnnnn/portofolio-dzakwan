<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Panel</title>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <style>
    /* Basic Responsive for Admin */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .theme-toggle-btn {
      background: #f3f4f6;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s;
    }

    .theme-toggle-btn:hover {
      background: #e5e7eb;
    }

    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        left: -240px;
        /* Hidden by default */
        top: 0;
        height: 100%;
        z-index: 1000;
        transition: left 0.3s ease;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      }

      .sidebar.active {
        left: 0;
        /* Shown when active */
      }

      .sidebar-toggle {
        display: block;
      }

      .content .card {
        width: 100% !important;
      }

      .cards {
        display: flex;
        flex-direction: column;
        gap: 1rem;
      }
    }
  </style>

</head>

<body>
  <!-- LOADER -->
  <div id="page-loader">
    <div class="loader-content">
      <div class="loader-logo">Loading...</div>
      <div class="loader-spinner"></div>
    </div>
  </div>

  <div class="admin-wrapper">

    @include('admin.sidebar')


    {{-- MAIN --}}
    <main class="main">

      <header class="topbar">

        <button class="sidebar-toggle" id="sidebarToggle">
          &#9776;
          {{-- Hamburger Icon --}}
        </button>

        <h2>@yield('title')</h2>

        <div class="topbar-right">
          <button id="themeToggleTop" class="theme-toggle-btn" title="Toggle Theme">
            <span class="theme-icon-top">🌙</span>
          </button>
          <span>
            {{ auth()->user()->name }}
          </span>
        </div>

      </header>

      <div class="content">

        @yield('content')

      </div>

    </main>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.querySelector('.sidebar');
      const sidebarToggle = document.getElementById('sidebarToggle');

      sidebarToggle.addEventListener('click', function(event) {
        event.stopPropagation(); // Mencegah event sampai ke document
        sidebar.classList.toggle('active');
      });

      // Menutup sidebar jika klik di luar area sidebar atau toggle button
      document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = sidebarToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('active')) {
          sidebar.classList.remove('active');
        }
      });

      // Theme toggle functionality
      const themeToggleTop = document.getElementById('themeToggleTop');
      const themeIconTop = themeToggleTop.querySelector('.theme-icon-top');
      
      // Check saved theme preference
      const savedTheme = localStorage.getItem('admin-theme');
      if (savedTheme === 'light') {
        document.body.classList.add('light-mode');
        themeIconTop.textContent = '☀️';
      } else {
        themeIconTop.textContent = '🌙';
      }

      themeToggleTop.addEventListener('click', function() {
        document.body.classList.toggle('light-mode');
        
        if (document.body.classList.contains('light-mode')) {
          localStorage.setItem('admin-theme', 'light');
          themeIconTop.textContent = '☀️';
          // Update sidebar toggle if exists
          const sidebarThemeBtn = document.querySelector('#themeToggle .theme-icon');
          const sidebarThemeText = document.querySelector('#themeToggle .theme-text');
          if (sidebarThemeBtn) sidebarThemeBtn.textContent = '☀️';
          if (sidebarThemeText) sidebarThemeText.textContent = 'Light Mode';
        } else {
          localStorage.setItem('admin-theme', 'dark');
          themeIconTop.textContent = '🌙';
          // Update sidebar toggle if exists
          const sidebarThemeBtn = document.querySelector('#themeToggle .theme-icon');
          const sidebarThemeText = document.querySelector('#themeToggle .theme-text');
          if (sidebarThemeBtn) sidebarThemeBtn.textContent = '🌙';
          if (sidebarThemeText) sidebarThemeText.textContent = 'Dark Mode';
        }
      });
    });
    window.addEventListener("load", function(){
      const loader = document.getElementById("page-loader");
      setTimeout(() => {
        loader.classList.add("loader-hidden");
      }, 700);
    });
  </script>
</body>

</html>