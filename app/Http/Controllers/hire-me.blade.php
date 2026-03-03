<!DOCTYPE html>
<html>

<head>
  <title>Pesan Baru dari Portofolio</title>
</head>

<body>
  <h2>Anda menerima pesan baru dari form kontak portofolio Anda.</h2>
  <br>
  <p><strong>Nama:</strong> {{ $details['name'] }}</p>
  <p><strong>Email Pengirim:</strong> {{ $details['email'] }}</p>
  <br>
  <p><strong>Pesan:</strong></p>
  <p>{{ $details['message'] }}</p>
</body>

</html>