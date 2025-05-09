<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }

    .full-screen {
      height: 100vh;
      background: url('{{ asset('images/smkn 1 kawali.jpg') }}') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0; bottom: 0; left: 0; right: 0;
      backdrop-filter: blur(6px); /* efek blur background */
      background: rgba(0, 0, 0, 0.4); /* sedikit gelap */
    }

    .content {
      position: relative;
      z-index: 2;
      color: white;
      text-shadow: 0 0 10px rgba(0,0,0,0.6);
    }

    .btn-outline-light:hover {
      background-color: rgba(255, 255, 255, 0.2);
      border-color: #fff;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="container-fluid full-screen d-flex justify-content-center align-items-center">
  <div class="overlay"></div>
  <div class="text-center content px-4">
    <h1 class="display-4 fw-bold mb-3">Data Master</h1>
    <p class="lead mb-4">Sistem manajemen data terpusat yang modern dan efisien.</p>
    <a href="{{ url('/login') }}" class="btn btn-outline-light btn-lg">Login</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
