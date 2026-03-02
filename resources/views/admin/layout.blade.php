<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Admin Panel</title>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

  <div class="admin-wrapper">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

      <div class="logo">
        Portfolio Admin
      </div>

      <nav>

        <a href="/admin">Dashboard</a>
        <a href="/admin/profile">Profile</a>
        <a href="/admin/projects">Projects</a>
        <a href="/admin/documentations">Dokumentasi</a>
        <a href="/">View Website</a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="logout-btn">Logout</button>
        </form>

      </nav>

    </aside>


    {{-- MAIN --}}
    <main class="main">

      <header class="topbar">

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

</body>

</html>