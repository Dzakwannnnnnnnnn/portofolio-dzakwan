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