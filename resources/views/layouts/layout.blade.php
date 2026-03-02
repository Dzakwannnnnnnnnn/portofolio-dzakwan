<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>{{ $title ?? 'Muhammad Dzakwan' }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

  @vite(['resources/css/style.css', 'resources/js/script.js'])
</head>

<body>
  <div class="ios-wrapper">
    <x-navbar />

    <div class="content-area">
      @yield('content')
    </div>

    <x-footer />
  </div>
</body>

</html>