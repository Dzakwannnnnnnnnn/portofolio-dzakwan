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

    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #333;
    }

    @media (max-width: 768px) {
      .admin-wrapper {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: fixed;
        left: -250px;
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

      .main {
        grid-column: 1 / -1;
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
      <div class="loader-logo">Muhammad Dzakwan</div>
      <div class="loader-spinner"></div>
    </div>
  </div>

  <div class="admin-wrapper">

    @include('admin.components.sidebar')


    {{-- MAIN --}}
    <main class="main">

      <header class="topbar">

        <button class="sidebar-toggle" id="sidebarToggle">
          &#9776;
          {{-- Hamburger Icon --}}
        </button>

        <h2>@yield('title')</h2>

        <span>
          {{ auth()->user()->name }}
        </span>

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
      const mainContent = document.querySelector('.main');

      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
      });

      // Close sidebar if clicking outside of it on mobile
      mainContent.addEventListener('click', function() {
        sidebar.classList.remove('active');
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